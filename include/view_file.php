<?php 
include('sec.php');
include('connection.php');
$fileId = $_GET['file_id'];

// Fetch file name from the database
$result = $conn->query("SELECT * FROM mail_files WHERE file_id = '$fileId'  limit 1");

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fileName = $row['file'];

$fileDirectory = '../../assets/uploads/email_files/';  // Replace with the actual path

function getMimeType($file) {
    // Function to determine the MIME type of a file
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $file);
    finfo_close($finfo);
    return $mimeType;
}

    $result = $conn->query("SELECT * FROM mail_files WHERE file_id = '$fileId'  limit 1");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fileName = $row['file'];

        $filePath = $fileDirectory . $fileName;

        if (file_exists($filePath)) {
            $mimeType = getMimeType($filePath);

            // Output an HTML page with an iframe for preview
            echo '<html>';
            echo '<head><title>File Preview</title></head>';
            echo '<body>';
            echo '<iframe src="data:' . $mimeType . ';base64,' . base64_encode(file_get_contents($filePath)) . '" width="100%" height="800px"></iframe>';
            echo '</body>';
            echo '</html>';
        } else {
            echo 'File not found';
        }
    } else {
        echo 'File not found';
    }
}

?>