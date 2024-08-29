<?php include('../include/connection.php');
session_start();

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
//image resize

function createImage($path)
{
    $info = getimagesize($path);
    $fileType = $info[2]; // The image type

    switch ($fileType) {
        case IMAGETYPE_JPEG:
            return imagecreatefromjpeg($path);
        case IMAGETYPE_PNG:
            return imagecreatefrompng($path);
        default:
            // Handle unsupported image type
            return false;
    }
}




$action=$_GET['action'];
if($action=='login'){
    $username=$_POST['username'];
    $password= md5($_POST['password']);
    $loginqry="select * from users where username=? and password=? limit 1";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$loginqry)){
        echo "Statements Failed";
    }else{
        mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        $count=mysqli_num_rows($result);
        if($count >= 1){
            $row=mysqli_fetch_assoc($result);
            $_SESSION['det']=$row['user_id'];
            echo "Loading ...";
            ?><script>setTimeout(function(){location.href='home.php?link=home'},3000)</script><?php
        }else{
            echo "Incorrect Username or Password";
        }
    }
}else if($action=='add_destination'){
    $title=$_POST['destinationname'];
    $profile=$_POST['profile'];

    $condest="select * from destinations where destination_name=? ";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$condest)){
        echo "Statements failed";
    }else{
        mysqli_stmt_bind_param($stmt, 's', $title);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        $rowcount=mysqli_num_rows($result);
        if($rowcount>=1){
            echo "Destination Already Exists";
        }else{
            //inserting data into db

$insertdest="insert into destinations(destination_name,destination_profile) values(?,?) ";
$stmtinsert=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmtinsert, $insertdest)){
	echo " Statements Failed";
}else{
	mysqli_stmt_bind_param($stmtinsert, "ss",$title,$profile);
	mysqli_stmt_execute($stmtinsert);
 
}

       
        $idqry="select * from destinations order by id DESC limit 1";
        $idresult=$conn->query($idqry);
        $row=mysqli_fetch_assoc($idresult);
        $idno=$row['id'];

        // File upload configuration 
        $targetDir = "../../assets/uploads/images/";
        $allowTypes = array('jpg','png','jpeg','gif','webp'); 
         
        
        $fileNames = array_filter($_FILES['files']['name']); 
        if(!empty($fileNames)){ 
            foreach($_FILES['files']['name'] as $key=>$val){ 
                // File upload path 
                $fileName = basename($_FILES['files']['name'][$key]); 
                $targetFilePath = $targetDir . $fileName; 
                 
                // Check whether file type is valid 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                if(in_array($fileType, $allowTypes)){ 
                    // Upload file to server 
                    if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                        // Image db insert sql 
                        $insert = $conn->query("INSERT INTO destination_images (destination_id, image_name) VALUES ('$idno','$fileName')"); 
                if($insert){ 
                    echo "Destination added successfully";
                }else{ 
                    echo "Sorry, there was an error uploading your file."; 
                }
                    }else{ 
                        // $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                    } 
                }else{ 
                    // $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
                } 
            } 
             
                //$insertValuesSQL = trim($insertValuesSQL, ','); 
                // Insert image file name into database 
                 
            
        }else{ 
            echo "Please select a file to upload" ;
        } 
        }
    }
}else if($action=='add_tour'){
    $name=$_POST['tour_name'];
    $id=$_POST['tour_id'];
    if(!empty($id)){
        $tourQry="update tour_type set tour_name=? where id=?";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$tourQry)){
            echo "Statments Failed!";
        }else{
            mysqli_stmt_bind_param($stmt, 'ss',$name,$id);
            if(mysqli_stmt_execute($stmt)){
                echo "Record updated";
                ?><script>
                    setTimeout(() => {
                        location.reload()
                    }, 3000);
                </script><?php
            }else{
                echo "Failed!";
            }
        }  
    }else{
    $tourQry="insert into tour_type(tour_name) values(?)";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$tourQry)){
        echo "Statments Failed!";
    }else{
        mysqli_stmt_bind_param($stmt, 's',$name);
        if(mysqli_stmt_execute($stmt)){
            echo "Tour Type Added Successful";
            ?><script>
                setTimeout(() => {
                    location.reload()
                }, 3000);
            </script><?php
        }else{
            echo "Failed!";
        }
    }
}
}else if($action=='add_user'){
    $username=$_POST['username'];
    $name = $_POST['fullname'];
    $type = $_POST['type'];
    $password= md5($_POST['password']);
    $id=$_POST['user-id'];

    if(!empty($id)){
        $tourQry="update tour_type set tour_name=? where id=?";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$tourQry)){
            echo "Statments Failed!";
        }else{
            mysqli_stmt_bind_param($stmt, 'ss',$name,$id);
            if(mysqli_stmt_execute($stmt)){
                echo "Record updated";
                ?><script>
                    setTimeout(() => {
                        location.reload()
                    }, 3000);
                </script><?php
            }else{
                echo "Failed!";
            }
        }  
    }else{
    $checkuser = "select username from users where username = ?";
    $checkstmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($checkstmt,$checkuser)){
        echo "Failed";
    }else{
        mysqli_stmt_bind_param($checkstmt, 's', $username);
        mysqli_stmt_execute($checkstmt);
        $result = mysqli_stmt_get_result($checkstmt);
        $count = mysqli_num_rows($result);
        if($count < 1){
            $tourQry="insert into users(username, full_name, password, type) values(?,?,?,?)";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$tourQry)){
        echo "Statments Failed!";
    }else{
        mysqli_stmt_bind_param($stmt, 'ssss',$username, $name, $password, $type);
        if(mysqli_stmt_execute($stmt)){
            echo "User Added Successful";
            ?><script>
                setTimeout(() => {
                    location.reload()
                }, 3000);
            </script><?php
        }else{
            echo "Failed!";
        }
    }
        }else{
            echo "User Already Exists";
        }
    }
    
}
}else if($action=='add_season'){
    $name=$_POST['tour_name'];
    $id=$_POST['tour_id'];
    if(!empty($id)){
        $tourQry="update seasons set season=? where season_id=?";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$tourQry)){
            echo "Statments Failed!";
        }else{
            mysqli_stmt_bind_param($stmt, 'ss',$name,$id);
            if(mysqli_stmt_execute($stmt)){
                echo "Record updated";
                ?><script>
                    setTimeout(() => {
                        location.reload()
                    }, 3000);
                </script><?php
            }else{
                echo "Failed!";
            }
        }  
    }else{
    $tourQry="insert into seasons(season) values(?)";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$tourQry)){
        echo "Statments Failed!";
    }else{
        mysqli_stmt_bind_param($stmt, 's',$name);
        if(mysqli_stmt_execute($stmt)){
            echo "Season Added Successful";
            ?><script>
                setTimeout(() => {
                    location.reload()
                }, 3000);
            </script><?php
        }else{
            echo "Failed!";
        }
    }
}
}

else if($action=="add_package"){
    $title=$_POST['name'];
    $duration=$_POST['duration'];
    $destination=$_POST['destination'];
    $tour=$_POST['tour'];
    $price=$_POST['price'];
    $activity=$_POST['txtactivity'];
    $additionalFields = $_POST['day-title'];
    $additionalFields2 = $_POST['day-activity'];
    $deal=$_POST['deal'];
    $offer =$_POST['offer'];
    if(empty($offer)){
        $offer = "0";
    }
    $season = $_POST['season'];

    $condest="select * from packages where package_name=? ";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$condest)){
        echo "Statements failed";
    }else{
        mysqli_stmt_bind_param($stmt, 's', $title);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        $rowcount=mysqli_num_rows($result);
        if($rowcount>=1){
            echo "Package Already Exists";
        }else{
            //inserting data into db

$insertdest="insert into packages(package_name,package_duration,package_destination,package_tour,package_price,package_overview,deal,offer,seasons) values(?,?,?,?,?,?,?,?,?) ";
$stmtinsert=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmtinsert, $insertdest)){
	echo " Statements Failed";
}else{
	mysqli_stmt_bind_param($stmtinsert, "sssssssss",$title,$duration,$destination,$tour,$price,$activity,$deal,$offer,$season);
	mysqli_stmt_execute($stmtinsert);
 
}
/*get id */
        $idqry="select * from packages order by id DESC limit 1";
        $idresult=$conn->query($idqry);
        $row=mysqli_fetch_assoc($idresult);
        $idno=$row['id'];
        
/*add day-itinerary*/
foreach ($additionalFields as $index => $value) {
    // Perform any necessary validation or sanitation

    $insertdest="insert into itinerary(pack_id,day_title) values(?,?)";
    $stmtinsert=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmtinsert, $insertdest)){
        echo $stmtinsert ->error;
    }else{
        mysqli_stmt_bind_param($stmtinsert, "ss",$idno,$value);
        mysqli_stmt_execute($stmtinsert);
     
    }
}

// Process and store dynamically added fields for the second class
foreach ($additionalFields2 as $index => $value) {
    // Perform any necessary validation or sanitation
    // Insert the value into the database
    // $sql = "update itinerary set activity=? where pack_id= ?";
    $insertdest="update itinerary set activity=? where pack_id= ?";
    $stmtinsert=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmtinsert, $insertdest)){
        echo " Statements Failed";
    }else{
        mysqli_stmt_bind_param($stmtinsert, "ss",$value,$idno);
        mysqli_stmt_execute($stmtinsert);
     
    }
    
}

        // File upload configuration 
        $targetDir = "../../assets/uploads/package/"; 
        $allowTypes = array('jpg','png','jpeg'); 
        $fileNames = array_filter($_FILES['files']['name']);

        if(!empty($fileNames)){ 

        /* beginning of image upload */ 
        /* with resize */
            
            // from hapa
            foreach ($_FILES['files']['name'] as $key => $val) {
                // File upload path
                $fileName = basename($_FILES['files']['name'][$key]);
                $targetFilePath = $targetDir . $fileName;
            
                // Check whether file type is valid
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to server
                    if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
                        // Resize image to 880x430
                        $imagePath = $targetFilePath;
                        $image = createImage($imagePath);
            
                        if ($image !== false) {
                            list($width, $height) = getimagesize($imagePath);
                            $newWidth = 700;
                            $newHeight = 500;
                            $imageResized = imagecreatetruecolor($newWidth, $newHeight);
            
                            if ($fileType == 'png') {
                                imagealphablending($imageResized, false); // Set to false before performing operations
                                imagesavealpha($imageResized, true);      // Set to true before saving the image
                            }
            
                            // Resize and save the image
                            imagecopyresampled($imageResized, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            
                            // Save the resized image
                            switch ($fileType) {
                                case 'jpg':
                                case 'jpeg':
                                    imagejpeg($imageResized, $targetFilePath);
                                    break;
                                case 'png':
                                    imagepng($imageResized, $targetFilePath);
                                    break;
                                default:
                                    // Handle unsupported image type
                                    break;
                            }
            
                            imagedestroy($imageResized);
                            imagedestroy($image);
            
                            // Insert image file name into the database
                            $insert = $conn->query("INSERT INTO package_images (package_id, image_name) VALUES ('$idno','$fileName')");
            
                            if ($insert) {
                                // Image uploaded and inserted successfully
                            } else {
                                echo "Sorry, there was an error uploading your file.";
                            }
                        } else {
                            // Handle image creation failure
                            echo "Failed to create image from file: $imagePath";
                        }
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
            echo "Package Added";
                ?><script>
                setTimeout(() => {
                    location.reload()
                }, 2700);
            </script><?php
            
    
             //hadi hapa
         }
    
            /* end of resize */
}}
}else if($action=="add_image"){
    // File upload configuration 
    $targetDir = "../../uploads/homeslider/"; 
    $allowTypes = array('jpg','png','jpeg','gif','webp'); 
     
    
    $fileNames = array_filter($_FILES['files']['name']); 
    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]); 
            $targetFilePath = $targetDir . $fileName; 
             
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                    // Image db insert sql 
                    $insert = $conn->query("INSERT INTO home_slide (image_name) VALUES ('$fileName')"); 
                    if($insert){ 
                        echo "Updated successfully";
                    }else{ 
                        echo "Sorry, there was an error uploading your file."; 
                    }  
                }else{ 
                    // $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                // $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 
         
            
            
        
    }else{ 
        echo "Please select a file to upload" ;
    } 
}else if($action=="add_blog"){
    $title=$_POST['blogname'];
    $profile=$_POST['profile'];

    $profileNew = str_replace ( '../assets/uploads/blog/','assets/uploads/blog/', $profile);

    $condest="select * from blog where blog_name=? ";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$condest)){
        echo "Statements failed";
    }else{
        mysqli_stmt_bind_param($stmt, 's', $title);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        $rowcount=mysqli_num_rows($result);
        if($rowcount>=1){
            echo "Blog Already Exists";
        }else{
            //inserting data into db

$insertdest="insert into blog(blog_name,blog) values(?,?) ";
$stmtinsert=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmtinsert, $insertdest)){
	echo " Statements Failed";
}else{
	mysqli_stmt_bind_param($stmtinsert, "ss",$title,$profileNew);
	mysqli_stmt_execute($stmtinsert);
 
}

       
        $idqry="select * from blog order by id DESC limit 1";
        $idresult=$conn->query($idqry);
        $row=mysqli_fetch_assoc($idresult);
        $idno=$row['id'];

        // File upload configuration 
        $targetDir = "../../assets/uploads/blog/"; 
        $allowTypes = array('jpg','png','jpeg','gif','webp'); 
         
        
        $fileNames = array_filter($_FILES['files']['name']); 
        if(!empty($fileNames)){ 
            /* beginning of image upload */ 
        /* with resize */
            
            // from hapa
            foreach ($_FILES['files']['name'] as $key => $val) {
                // File upload path
                $fileName = basename($_FILES['files']['name'][$key]);
                $targetFilePath = $targetDir . $fileName;
            
                // Check whether file type is valid
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to server
                    if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
                        // Resize image to 880x430
                        $imagePath = $targetFilePath;
                        $image = createImage($imagePath);
            
                        if ($image !== false) {
                            list($width, $height) = getimagesize($imagePath);
                            $newWidth = 700;
                            $newHeight = 500;
                            $imageResized = imagecreatetruecolor($newWidth, $newHeight);
            
                            if ($fileType == 'png') {
                                imagealphablending($imageResized, false); // Set to false before performing operations
                                imagesavealpha($imageResized, true);      // Set to true before saving the image
                            }
            
                            // Resize and save the image
                            imagecopyresampled($imageResized, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            
                            // Save the resized image
                            switch ($fileType) {
                                case 'jpg':
                                case 'jpeg':
                                    imagejpeg($imageResized, $targetFilePath);
                                    break;
                                case 'png':
                                    imagepng($imageResized, $targetFilePath);
                                    break;
                                default:
                                    // Handle unsupported image type
                                    break;
                            }
            
                            imagedestroy($imageResized);
                            imagedestroy($image);
            
                            // Insert image file name into the database
                            $insert = $conn->query("INSERT INTO blog_images (blog_id, image_name) VALUES ('$idno','$fileName')"); 
            
                            if ($insert) {
                                // Image uploaded and inserted successfully
                            } else {
                                echo "Sorry, there was an error uploading your file.";
                            }
                        } else {
                            // Handle image creation failure
                            echo "Failed to create image from file: $imagePath";
                        }
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
            echo "Blog Added";
                ?><script>
                setTimeout(() => {
                    location.reload()
                }, 2700);
            </script><?php
            
    
             //hadi hapa
        }
    }
}}else if($action=="book"){
    $name=$_POST['full_name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $package=$_POST['package'];
    $children=$_POST['children'];
    $adults=$_POST['adults'];
    $checkin=$_POST['check_in'];
    $requirements=$_POST['requirements'];

    $conbook="select * from booking where full_name=? and phone=? and email=? and package_id=?";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$conbook)){
        echo "Statements Failed!";
    }else{
        mysqli_stmt_bind_param($stmt, "ssss",$name,$phone,$email,$package);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        $count=mysqli_num_rows($result);
        if($count>=1){
            echo "Already booked!";
        }else{
            $bookQry="insert into booking (full_name, email, phone, adults, children, check_in, requirements, package_id) values(?,?,?,?,?,?,?,?)";
            $statement=mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($statement,$bookQry)){
                echo "Statements Failed!";
            }else{
                mysqli_stmt_bind_param($statement, "ssssssss", $name,$email,$phone,$adults,$children,$checkin,$requirements,$package);
                if(mysqli_stmt_execute($statement)){
                    echo "Tour booked successfully!";
                    ?><script>
                setTimeout(() => {
                    location.reload()
                }, 3000);
            </script><?php
                }else{
                    echo "Failed";
                }
            }
        }
    }
}else if($action=="edit_book"){
    $id=$_POST['id'];
    $name=$_POST['full_name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $package=$_POST['package'];
    $children=$_POST['children'];
    $national = $_POST['nationality'];
    $adults=$_POST['adults'];
    $checkin=$_POST['check_in'];
    $requirements=$_POST['requirements'];

  
            $bookQry="update booking set full_name =?, email =?, phone =?, adults =?, children =?, check_in =?, requirements =?, package_id =?, nationality=? where booking_id=?";
            $statement=mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($statement,$bookQry)){
                echo "Statements Failed!";
            }else{
                mysqli_stmt_bind_param($statement, "ssssssssss", $name,$email,$phone,$adults,$children,$checkin,$requirements,$package,$national,$id);
                if(mysqli_stmt_execute($statement)){
                    echo "Updated successfully!";
                    ?><script>
                setTimeout(() => {
                    location.reload()
                }, 3000);
            </script><?php
                }else{
                    echo "Failed";
                }
            }
        
    
}else if($action=='delete_package'){
    $packageId=$_POST['data'];
        $query ="SELECT * FROM package_images where package_id='$packageId' ";
        $gotton=$conn->query($query);
        while($row = mysqli_fetch_assoc($gotton)){
                $imageURL = '../../assets/uploads/package/'.$row["image_name"];
          //check if image exists
            
          if(file_exists($imageURL)){
        
            //delete the image
            unlink($imageURL);
          }
            //after deleting image you can delete the record
            if($conn->query("delete from packages where id='$packageId'")){
                $conn->query("delete from package_images where package_id='$packageId'");
            }else{
                echo "Failed";
            }
          }
        //   
          echo "Deletion successful";
                ?><script>
                setTimeout(() => {
                    location.reload()
                }, 2700);
            </script><?php

}else if($action=='del-faq'){
    $id=$_POST['data'];
        if($conn->query("delete FROM faqs where faq_id='$id'")){
            echo "Deletion successful";
            ?><script>
            setTimeout(() => {
                location.reload()
            }, 2700);
        </script><?php
        }else{
                echo "Failed";
            }
}
else if($action=='delete_tour'){
    $tourId=$_POST['data'];
        if($conn->query("delete FROM tour_type where id='$tourId'")){
            echo "Deletion successful";
            ?><script>
            setTimeout(() => {
                location.reload()
            }, 2700);
        </script><?php
        }else{
                echo "Failed";
            }
          
}else if($action=='edit_package'){
    $id=$_POST['id'];
    $title=$_POST['name'];
    $duration=$_POST['duration'];
    $destination=$_POST['destination'];
    $tour=$_POST['tour'];
    $price=$_POST['price'];
    $activity=$_POST['txtactivity'];
    $additionalFields = $_POST['day-title'];
    $additionalFields2 = $_POST['day-activity'];
    $deal=$_POST['deal'];
    $offer =$_POST['offer'];
    if(empty($offer)){
        $offer = "0";
    }
    $season = $_POST['season'];
    
    //inserting data into d
$insertdest="update packages set package_name=?,package_duration=?,package_destination=?,package_tour=?,package_price=?,package_overview=?, deal=?, offer=?, seasons = ? where id=? ";
$stmtinsert=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmtinsert, $insertdest)){
	echo " Statements Failed";
}else{
	mysqli_stmt_bind_param($stmtinsert, "ssssssssss",$title,$duration,$destination,$tour,$price,$activity,$deal,$offer,$season,$id);
	mysqli_stmt_execute($stmtinsert);
}

/*add day-itinerary*/
$conn->query("delete from itinerary where pack_id ='$id' ");

/*add day-itinerary*/
foreach ($additionalFields as $index => $value) {
    // Perform any necessary validation or sanitation
   
    $insertdest="insert into itinerary(pack_id,day_title) values(?,?)";
    $stmtinsert=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmtinsert, $insertdest)){
        echo $stmtinsert ->error;
    }else{
        mysqli_stmt_bind_param($stmtinsert, "ss",$id,$value);
        mysqli_stmt_execute($stmtinsert);
     
    }
}

// Process and store dynamically added fields for the second class
foreach ($additionalFields2 as $index => $value) {
    // Perform any necessary validation or sanitation
    // Insert the value into the database
    // $sql = "update itinerary set activity=? where pack_id= ?";
    $insertdest="update itinerary set activity=? where pack_id= ?";
    $stmtinsert=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmtinsert, $insertdest)){
        echo " Statements Failed";
    }else{
        mysqli_stmt_bind_param($stmtinsert, "ss",$value,$id);
        mysqli_stmt_execute($stmtinsert);
     
    }
    
}


        // File upload configuration 
        $targetDir = "../../assets/uploads/package/"; 
        $allowTypes = array('jpg','png','jpeg','gif','webp'); 
         
        
        $fileNames = array_filter($_FILES['files']['name']); 
        if(!empty($fileNames)){ 
           
             /* beginning of image upload */ 
        /* with resize */
            
            // from hapa
            foreach ($_FILES['files']['name'] as $key => $val) {
                // File upload path
                $fileName = basename($_FILES['files']['name'][$key]);
                $targetFilePath = $targetDir . $fileName;
            
                // Check whether file type is valid
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to server
                    if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
                        // Resize image to 880x430
                        $imagePath = $targetFilePath;
                        $image = createImage($imagePath);
            
                        if ($image !== false) {
                            list($width, $height) = getimagesize($imagePath);
                            $newWidth = 700;
                            $newHeight = 500;
                            $imageResized = imagecreatetruecolor($newWidth, $newHeight);
            
                            if ($fileType == 'png') {
                                imagealphablending($imageResized, false); // Set to false before performing operations
                                imagesavealpha($imageResized, true);      // Set to true before saving the image
                            }
            
                            // Resize and save the image
                            imagecopyresampled($imageResized, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            
                            // Save the resized image
                            switch ($fileType) {
                                case 'jpg':
                                case 'jpeg':
                                    imagejpeg($imageResized, $targetFilePath);
                                    break;
                                case 'png':
                                    imagepng($imageResized, $targetFilePath);
                                    break;
                                default:
                                    // Handle unsupported image type
                                    break;
                            }
            
                            imagedestroy($imageResized);
                            imagedestroy($image);
            
                            // Insert image file name into the database
                            if($conn->query("delete from package_images where package_id='$id'")){
                                $insert = $conn->query("INSERT INTO package_images (package_id, image_name) VALUES ('$id','$fileName')"); 
                                if($insert){ 
                                    echo "Updated successfully";
                                }else{ 
                                    echo "Sorry, there was an error uploading your file."; 
                                } 
                            }else{
                                echo "Failed";
                            }
                        
                        } else {
                            // Handle image creation failure
                            echo "Failed to create image from file: $imagePath";
                        }
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
            echo "Package Updated";
                ?><script>
                setTimeout(() => {
                    location.reload()
                }, 2700);
            </script><?php
            
    
             //hadi hapa

    }

}else if($action=="delete_image"){
        $id=$_POST['data'];
        $query ="SELECT * FROM home_slide where id='$id' ";
        $gotton=$conn->query($query);
        while($row = mysqli_fetch_assoc($gotton)){
                $imageURL = '../../uploads/homeslider/'.$row["image_name"];
          //check if image exists
            
          if(file_exists($imageURL)){
            //delete the image
            unlink($imageURL);
          }
        }
        if($conn->query("delete from home_slide where id='$id' ")){
            echo "Image deleted";
            ?><script>
            setTimeout(() => {
                location.reload()
            }, 2700);
        </script><?php
        }else{
            echo "Failed";
        }
    }else if($action=='delete_destination'){
        $packageId=$_POST['data'];
        $query ="SELECT * FROM destination_images where destination_id='$packageId' ";
        $gotton=$conn->query($query);
        while($row = mysqli_fetch_assoc($gotton)){
                $imageURL = '../../uploads/'.$row["image_name"];
          //check if image exists
            
          if(file_exists($imageURL)){
        
            //delete the image
            unlink($imageURL);
          }
            //after deleting image you can delete the record
            if($conn->query("delete from destinations where id='$packageId'")){
                echo "Deletion successful";
                ?><script>
                setTimeout(() => {
                    location.reload()
                }, 2700);
            </script><?php
            }else{
                echo "Failed";
            }
          }
    }else if($action=='edit_destination'){
        $id=$_POST['id'];
        $title=$_POST['destinationname'];
        $profile=$_POST['profile'];
        
        //inserting data into d
    $insertdest="update destinations set destination_name=?,destination_profile=? where id=?";
    $stmtinsert=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmtinsert, $insertdest)){
        echo " Statements Failed";
    }else{
        mysqli_stmt_bind_param($stmtinsert, "sss",$title,$profile,$id);
        mysqli_stmt_execute($stmtinsert);
     
    }
    
            // File upload configuration 
            $targetDir = "../../assets/uploads/images/";
            $allowTypes = array('jpg','png','jpeg','gif','webp'); 
             
            
            $fileNames = array_filter($_FILES['files']['name']); 
            if(!empty($fileNames)){ 
                // delete current images
                $query ="SELECT * FROM destination_images where destination_id='$id' ";
                $gotton=$conn->query($query);
                while($row = mysqli_fetch_assoc($gotton)){
                        $imageURL = '../../uploads/'.$row["image_name"];
                  //check if image exists
                    
                  if(file_exists($imageURL)){
                    //delete the image
                    unlink($imageURL);
                  }
                }
                //   insert new images
                foreach($_FILES['files']['name'] as $key=>$val){ 
                    // File upload path 
                    $fileName = basename($_FILES['files']['name'][$key]); 
                    $targetFilePath = $targetDir . $fileName; 
                     
                    // Check whether file type is valid 
                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                    if(in_array($fileType, $allowTypes)){ 
                        // Upload file to server 
                        if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                            //after deleting image you can delete the record
                    if($conn->query("delete from destination_images where destination_id='$id'")){
                        $insert = $conn->query("INSERT INTO destination_images (destination_id, image_name) VALUES ('$id','$fileName')"); 
                        if($insert){ 
                            echo "Updated successfully";
                        }else{ 
                            echo "Sorry, there was an error uploading your file."; 
                        } 
                    }else{
                        echo "Failure";
                    }
                        }else{ 
                            // nothing
                        } 
                    }else{ 
                        
                    } 
                } 
                   
                
                  }else{ 
                echo "Updated successfully" ;
            }
    }else if($action=='delete_blog'){
        $packageId=$_POST['data'];
        $query ="SELECT * FROM blog_images where blog_id='$packageId' ";
        $gotton=$conn->query($query);
        while($row = mysqli_fetch_assoc($gotton)){
                $imageURL = '../../assets/uploads/blog/'.$row["image_name"];
          //check if image exists
            
          if(file_exists($imageURL)){
        
            //delete the image
            unlink($imageURL);
          }
            //after deleting image you can delete the record
            if($conn->query("delete from blog where id='$packageId'")){
                echo "Deletion successful";
                ?><script>
                setTimeout(() => {
                    location.reload()
                }, 2700);
            </script><?php
            }else{
                echo "Failed";
            }
          }
    }else if($action=='edit_blog'){
        $id=$_POST['id'];
        $title=$_POST['blogname'];
        $profile=$_POST['profile'];
        
        //inserting data into d
    $insertdest="update blog set blog_name=?,blog=? where id=?";
    $stmtinsert=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmtinsert, $insertdest)){
        echo " Statements Failed";
    }else{
        mysqli_stmt_bind_param($stmtinsert, "sss",$title,$profile,$id);
        mysqli_stmt_execute($stmtinsert);
     
    }
    
            // File upload configuration 
            $targetDir = "../../assets/uploads/blog/"; 
            $allowTypes = array('jpg','png','jpeg','gif','webp'); 
             
            
            $fileNames = array_filter($_FILES['files']['name']); 
            if(!empty($fileNames)){ 
                // delete current images
                $query ="SELECT * FROM blog_images where blog_id='$id' ";
                $gotton=$conn->query($query);
                while($row = mysqli_fetch_assoc($gotton)){
                        $imageURL = '../../uploads/blog/'.$row["image_name"];
                  //check if image exists
                    
                  if(file_exists($imageURL)){
                    //delete the image
                    unlink($imageURL);
                  }
                }
                //   insert new images
                foreach($_FILES['files']['name'] as $key=>$val){ 
                    // File upload path 
                    $fileName = basename($_FILES['files']['name'][$key]); 
                    $targetFilePath = $targetDir . $fileName; 
                     
                    // Check whether file type is valid 
                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                    if(in_array($fileType, $allowTypes)){ 
                        // Upload file to server 
                        if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                            //after deleting image you can delete the record
                    if($conn->query("delete from blog_images where blog_id='$id'")){
                        $insert = $conn->query("INSERT INTO blog_images (blog_id, image_name) VALUES ('$id','$fileName')"); 
                        if($insert){ 
                            echo "Updated successfully";
                        }else{ 
                            echo "Sorry, there was an error uploading your file."; 
                        } 
                    }else{
                        echo "Failure";
                    }
                        }else{ 
                            // nothing
                        } 
                    }else{ 
                        
                    } 
                } 
                   
                
                  }else{ 
                echo "Updated successfully" ;
            }
    }else if($action=='delete_review'){
        $id=$_POST['data'];
        if($conn->query("delete from reviews where id='$id'")){
            echo "Review deleted";
            ?>
            <script>
                    setTimeout(() => {
                        location.reload()
                    }, 2700);
                </script><?php
        }
        
        
    }else if($action=='delete_msg'){
        $id=$_POST['data'];
        if($conn->query("delete from contact where id='$id'")){
            echo "Deleted";
            ?>
            <script>
                    setTimeout(() => {
                        location.reload()
                    }, 2700);
                </script><?php
        }
        
        
    }else if($action=='approve_msg'){
        $id=$_POST['data'];
        if($conn->query("update contact set status='1' where id='$id'")){
            ?>
            <script>
                    setTimeout(() => {
                        location.reload()
                    }, 1000);
                </script><?php
        }
        
        
    }else if($action=='approve_review'){
        $id=$_POST['data'];
        if($conn->query("update reviews set status='1' where id='$id'")){
            ?>
            <script>
                    
                        location.reload()
                   
                </script><?php
        }
        
        
    }else if($action=='approve_booking'){
        $id=$_POST['data'];
        if($conn->query("update booking set status='1' where tour_id='$id'")){
            ?>
            <script>
                    setTimeout(() => {
                        location.reload()
                    }, 1000);
                </script><?php
        }
        
        
    }else if($action=='delete_booking'){
        $id=$_POST['data'];
        if($conn->query("delete from booking where booking_id='$id'")){
            echo "Booking deleted";
            ?>
            <script>
                    setTimeout(() => {
                        location.reload()
                    }, 2700);
                </script><?php
        }
    }else if($action=='delete_all'){
        $id=$_POST['data'];
        if($conn->query("delete from booking where status='$id'")){
            echo "Booking deleted";
            ?>
            <script>
                    setTimeout(() => {
                        location.reload()
                    }, 2700);
                </script><?php
        }
    }else if($action=='edit_details'){
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $about=$_POST['about'];
        $currency = $_POST['currency'];

        $changeQry="update company_info set name=? ,contact=? ,email=?,about=?";
        $changeStatement=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($changeStatement,$changeQry)){
            echo "Statements failed";
        }else{
            mysqli_stmt_bind_param($changeStatement, 'ssss', $name,$phone,$email,$about);
            if(mysqli_stmt_execute($changeStatement)){
                $curquery = "update settings set currency = ?";
                $curstmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($curstmt,$curquery);
                mysqli_stmt_bind_param($curstmt, 's',$currency);
                mysqli_stmt_execute($curstmt);
                echo "Updated";?>
            <script>
                setTimeout(() => {
                    location.reload()
                }, 3000);
            </script>
            <?php }else{
                echo "Failed";
            }
        }
            
}else if($action=='save-transaction'){
         $transaction=$_POST['transaction'];
         $date=$_POST['date'];
         $phone=$_POST['phone'];
         $amount=$_POST['amount'];
         $method="M-pesa";

         $check="select * from payment where transaction_id=?";
         $stmt=mysqli_stmt_init($conn);
         if(!mysqli_stmt_prepare($stmt,$check)){
            echo "Statements Failed";
         }else{
            mysqli_stmt_bind_param($stmt, 's', $transaction);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
            $count=mysqli_num_rows($result);
            if($count < 1){
                $insertqry="insert into payment(phone, date,transaction_id, amount,method) values(?,?,?,?,?)";
                $changeStatement=mysqli_stmt_init($conn);
                       if(!mysqli_stmt_prepare($changeStatement,$insertqry)){
                           echo "Statements failed";
                       }else{
                           mysqli_stmt_bind_param($changeStatement, 'sssss', $phone,$date,$transaction,$amount,$method);
                           if(mysqli_stmt_execute($changeStatement)){

                            // deleting from Mpesastkresponse.json
                            $data = file_get_contents('mpesa-pay/Mpesastkresponse.json');
                            $json = json_decode($data);

                            // unset($json);
                        
                            // $json = json_encode($json, JSON_PRETTY_PRINT);
                            json_encode((object) null);
                            file_put_contents('mpesa-pay/Mpesastkresponse.json', $json);
                             // end
                               echo "Record inserted";
                            //    $stkCallbackResponse = file_get_contents('../mpesa-pay/Mpesastkresponse.json');
                            //    $stkCal
                            //    file_put_contents($file, json_encode($emptydata));
                               ?>
                               
                               <script>
                                   setTimeout(() => {
                                       location.reload()
                                   }, 3000);
                               </script>
                               <?php
                           }else{
                               echo "Failed";
                           }
                       }
            }else{
                echo "Payment already exists";
            }
         }
         
    }else if($action=='delete-payment'){
        $id=$_POST['data'];
        if($conn->query("delete FROM payment where id='$id'")){
            echo "Deletion successful";
            ?><script>
            setTimeout(() => {
                location.reload()
            }, 2700);
        </script><?php
        }else{
                echo "Failed";
            }
    }else if($action == 'add_hotel'){
        $id=$_POST['hotel_id'];
        $name=$_POST['hotel_name'];
        $price=$_POST['hotel_price'];
        $destination=$_POST['destination'];

        if(!empty($id)){
            $insertdest="update hotel set hotel_name=?, hotel_price=? ,hotel_location=? where hotel_id=?";
$stmtinsert=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmtinsert, $insertdest)){
	echo " Statements Failed";
}else{
	mysqli_stmt_bind_param($stmtinsert, "ssss",$name,$price,$destination,$id);
	mysqli_stmt_execute($stmtinsert);
    
    echo "Updated";
    ?><script>
            setTimeout(() => {
                location.reload()
            }, 2700);
        </script><?php
}
        }else{

    $condest="select * from hotel where hotel_name=? ";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$condest)){
        echo "Statements failed";
    }else{
        mysqli_stmt_bind_param($stmt, 's', $title);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        $rowcount=mysqli_num_rows($result);
        if($rowcount>=1){
            echo "Package Already Exists";
        }else{
            //inserting data into db

$insertdest="insert into hotel(hotel_name,hotel_price,hotel_location) values(?,?,?) ";
$stmtinsert=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmtinsert, $insertdest)){
	echo " Statements Failed";
}else{
	mysqli_stmt_bind_param($stmtinsert, "sss",$name,$price,$destination);
	mysqli_stmt_execute($stmtinsert);
 
}
        $idqry="select * from hotel order by hotel_id DESC limit 1";
        $idresult=$conn->query($idqry);
        $row=mysqli_fetch_assoc($idresult);
        $idno=$row['hotel_id'];

        // File upload configuration 
        $targetDir = "../../assets/uploads/hotels/"; 
        $allowTypes = array('jpg','png','jpeg','gif','webp'); 
         
        
        $fileNames = array_filter($_FILES['files']['name']); 
        if(!empty($fileNames)){ 
            foreach($_FILES['files']['name'] as $key=>$val){ 
                // File upload path 
                $fileName = basename($_FILES['files']['name'][$key]); 
                $targetFilePath = $targetDir . $fileName; 
                 
                // Check whether file type is valid 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                if(in_array($fileType, $allowTypes)){ 
                    // Upload file to server 
                    if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                        // Image db insert sql 
                       // Insert image file name into database 
                $insert = $conn->query("INSERT INTO hotel_images (image_name, hotel) VALUES ('$fileName','$idno')"); 
                if($insert){ 
                    
                }else{ 
                    echo "Sorry, there was an error uploading your file."; 
                } 
                    }else{ 
                        // $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                    } 
                }else{ 
                    // $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
                } 
            } 
            echo "Hotel Added";
            ?><script>
            setTimeout(() => {
                location.reload()
            }, 2700);
        </script><?php
                //$insertValuesSQL = trim($insertValuesSQL, ','); 
                
            
        }else{ 
            echo "Please select a file to upload" ;
        } 
        }
    }
    }
}else if($action=='delete_hotel'){
        $packageId=$_POST['data'];
        $query ="SELECT * FROM hotel_images where hotel='$packageId' ";
        $gotton=$conn->query($query);
        while($row = mysqli_fetch_assoc($gotton)){
                $imageURL = '../../uploads/hotels/'.$row["image_name"];
          //check if image exists
            
          if(file_exists($imageURL)){
            //delete the image
            unlink($imageURL);
          }
            //after deleting image you can delete the record
            if($conn->query("delete from hotel where hotel_id='$packageId'")){
                
                ?><script>
                setTimeout(() => {
                    location.reload()
                }, 2700);
            </script><?php
            }else{
                echo "Failed";
            }
          }
          echo "Deletion successful";
}else if($action=='btn-contact'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $qry="insert into contact (name, email, phone, subject, message) values(?,?,?,?,?)";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$qry)){
        echo "Statements Failed";
    }else{
        mysqli_stmt_bind_param($stmt, 'sssss', $name, $email, $phone, $subject, $message);
        mysqli_stmt_execute($stmt);
        
        $res = $conn->query("select email from company_info limit 1");
        $emailrow = mysqli_fetch_assoc($res);
        $receiver_email = $emailrow['email'];

        $stmt = $conn->prepare("INSERT INTO emails (sender_email, receiver_email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $receiver_email, $message);
        $stmt->execute();
        echo "Thank You. We'll get back to you soon";
    }

}else if($action=='blog-image'){
    //image upload
    $file = $_FILES['upload']['tmp_name'];
    $file_name = $_FILES['upload']['name'];
    $file_name_array = explode(".", $file_name);
    $extension = end($file_name_array);
    $new_image_name = rand() . '.' . $extension;
    chmod('../../assets/uploads/blog/', 0777);
    $allowed_extension = array("jpg", "gif", "jpeg", "png");
    if(in_array($extension, $allowed_extension))
    {
     move_uploaded_file($file, '../../assets/uploads/blog/' . $new_image_name);
     $function_number = $_GET['CKEditorFuncNum'];
     $url = '../assets/uploads/blog/' . $new_image_name;
     $message = '';
     echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
    }
}else if($action=='edit-blog-image'){
    //image upload
    $file = $_FILES['upload']['tmp_name'];
    $file_name = $_FILES['upload']['name'];
    $file_name_array = explode(".", $file_name);
    $extension = end($file_name_array);
    $new_image_name = rand() . '.' . $extension;
    chmod('../../assets/uploads/blog/', 0777);
    $allowed_extension = array("jpg", "gif", "jpeg", "png");
    if(in_array($extension, $allowed_extension))
    {
     move_uploaded_file($file, '../../assets/uploads/blog/' . $new_image_name);
     $function_number = $_GET['CKEditorFuncNum'];
     $url = '../assets/uploads/blog/' . $new_image_name;
     $message = '';
     echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
    }
}else if($action=='destination-image'){
    //image upload
    $file = $_FILES['upload']['tmp_name'];
    $file_name = $_FILES['upload']['name'];
    $file_name_array = explode(".", $file_name);
    $extension = end($file_name_array);
    $new_image_name = rand() . '.' . $extension;
    chmod('../../assets/uploads/images/', 0777);
    $allowed_extension = array("jpg", "gif", "jpeg", "png");
    if(in_array($extension, $allowed_extension))
    {
     move_uploaded_file($file, '../../assets/uploads/images/' . $new_image_name);
     $function_number = $_GET['CKEditorFuncNum'];
     $url = '../assets/uploads/images/' . $new_image_name;
     $message = '';
     echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
    }
}else if($action=='edit-destination-image'){
    //image upload
    $file = $_FILES['upload']['tmp_name'];
    $file_name = $_FILES['upload']['name'];
    $file_name_array = explode(".", $file_name);
    $extension = end($file_name_array);
    $new_image_name = rand() . '.' . $extension;
    chmod('../../assets/uploads/images/', 0777);
    $allowed_extension = array("jpg", "gif", "jpeg", "png");
    if(in_array($extension, $allowed_extension))
    {
     move_uploaded_file($file, '../../assets/uploads/images/' . $new_image_name);
     $function_number = $_GET['CKEditorFuncNum'];
     $url = '../assets/uploads/images/' . $new_image_name;
     $message = '';
     echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
    }
}else if($action=='btn-review'){
    $package = $_POST['package'];
    $rating = $_POST['rating'];
    $name = $_POST['name'];
    $review = $_POST['review'];
    

    $qry="insert into reviews (reviewer, review, package_id, rating) values(?,?,?,?)";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$qry)){
        echo "Statements Failed";
    }else{
        mysqli_stmt_bind_param($stmt, 'ssss', $name, $review, $package, $rating);
        mysqli_stmt_execute($stmt);
        echo "Thank You For Your Review";
    }

}else if($action=='btn-tailor'){
    $date = $_POST['arrival'];
    $days = $_POST['days'];
    $adults = $_POST['adults'];
    $children = $_POST['child'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $qry="insert into tailor (arrival_date, days, adults, children, full_name, email, phone, message) values(?,?,?,?,?,?,?,?)";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$qry)){
        echo "Statements Failed";
    }else{
        mysqli_stmt_bind_param($stmt, 'ssssssss', $date, $days, $adults, $children, $name, $email, $phone, $message);
        mysqli_stmt_execute($stmt);
        echo "Thank You. We'll get back to you as soon as possible.";
    }
}
/* send emails */
else if($action == "redirect-mail"){
    $_SESSION['email-id'] = $_POST['data'];?>
    <script>location.href="?link=reply"</script>
<?php }
else if($action =='email-reply'){

    $sender_email = $_POST['sender_email']; // Change to your email address
    $receiver_email = $_POST['receiver_email'];
    $message = $_POST['message'];
    $type = "1";
//     $attachment_path = $_FILES['files']['tmp_name'];
//    $attachment_name = $_FILES['files']['name'];
   for ($i = 0; $i < count($_FILES['files']['tmp_name']); $i++) {
    // Get the path and name for each file
    $attachment_path = $_FILES['files']['tmp_name'][$i];
    $attachment_name = $_FILES['files']['name'][$i];
   }
   //get mail settings
   $smtpresult = $conn->query("select smtp_host, smtp_username, smtp_password, system_email from settings limit 1");
   $smtp_rows = mysqli_fetch_assoc($smtpresult);
   
   //get company info
   $comresult = $conn->query("select name from company_info limit 1");
   $comrows = mysqli_fetch_assoc($comresult);


    $mail = new PHPMailer(true);
        
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = $smtp_rows['smtp_host'];                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $smtp_rows['smtp_username'];                    //SMTP username
            $mail->Password   = $smtp_rows['smtp_password'];                               //SMTP password
            $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom($smtp_rows['system_email'], $comrows['name']);
            $mail->addAddress($receiver_email);     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');
        
            //Attachments
            if(!empty($attachment_name)){
                $mail->addAttachment($attachment_path, $attachment_name, 'base64', 'application/octet-stream', 'attachment');
            }else{
                //empty
            }
            //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = "Reply ".$comrows['name']."";
            $mail->Body    = $message;
            $mail->AltBody = $message;
            
            $mail->send();
        } catch (Exception $e) {
           
        }

    $stmt = $conn->prepare("INSERT INTO emails (sender_email, receiver_email, message, type) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $sender_email, $receiver_email, $message, $type);

    if ($stmt->execute()) {

        $result = $conn->query("select id from emails order by id desc limit 1");
        $row = mysqli_fetch_assoc($result);
        $id=$row['id'];


          // File upload configuration 
          $targetDir = "../../assets/uploads/email_files/"; 
          $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'mp4', 'mp3', 'gif', 'docs', 'doc', 'xls', 'xlsx', ''); 
          
          $fileNames = array_filter($_FILES['files']['name']); 
          if(!empty($fileNames)){ 
              foreach($_FILES['files']['name'] as $key=>$val){ 
                  // File upload path 
                  $fileName = basename($_FILES['files']['name'][$key]); 
                  $targetFilePath = $targetDir . $fileName; 
                   
                  // Check whether file type is valid 
                  $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                  if(in_array($fileType, $allowTypes)){ 
                      // Upload file to server 
                      if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                          // Image db insert sql 
                         // Insert image file name into database 
                  $insert = $conn->query("INSERT INTO mail_files (email_id, file) VALUES ('$id','$fileName')"); 
                  if($insert){ 
                      
                  }else{ 
                      echo "Sorry, there was an error uploading your file."; 
                  } 
                      }else{ 
                          // $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                      } 
                  }else{ 
                      // $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
                  } 
              } 
        
          }

        echo "Sent";?>
        <script>
            setTimeout(() => {
        location.reload()
            }, 2000);
        </script>
    <?php } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}else if($action == 'del-email'){
    $data = $_POST['data'];
    $results = $conn->query("select * from mail_files where email_id = '$data'");
    $count = mysqli_num_rows($results);
    if($count > 0){
        while($row = mysqli_fetch_assoc($results)){
        $imageURL = '../../assets/uploads/email_files/'.$row["file"];
      //check if image exists
        
      if(file_exists($imageURL)){
    
        //delete the image
        unlink($imageURL);
      }
        //after deleting image you can delete the record
        if($conn->query("delete from emails where id='$data'")){
            $conn->query("delete from mail_files where email_id='$data'");
            
        }else{
            echo "Failed";
        }
      }
    }else{
        if($conn->query("delete from emails where id='$data'")){
        }else{
            echo "Failed";
        }
    }
   
  echo "Mail Deleted";?>
    <script>
        setTimeout(() => {
           location.reload()
        }, 1000);
    </script>
<?php }else if($action=='btn-faq'){
    $id = $_POST['faqid'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    if(!empty($id)){
        $qry="update faqs set faq_question =?, faq_answer=? where faq_id=? ";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$qry)){
        echo "Statements Failed";
    }else{
        mysqli_stmt_bind_param($stmt, 'sss', $question,$answer,$id);
        mysqli_stmt_execute($stmt);
        echo "Updated";?>
        <script>location.reload()</script>
    <?php }}else{
        $qry="insert into faqs(faq_question, faq_answer) values(?,?) ";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$qry)){
        echo "Statements Failed";
    }else{
        mysqli_stmt_bind_param($stmt, 'ss', $question,$answer);
        mysqli_stmt_execute($stmt);
        echo "Saved";
    }
    }
    
}else if($action == 'btn-booking'){
        $name=$_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['mobile'];
        $national = $_POST['nationality'];
        $date = $_POST['date'];
        $adults = $_POST['adults'];
        $children = $_POST['children'];
        $message = $_POST['message'];
        $package = $_POST['package'];


        $qry="insert into booking(full_name, email, phone, nationality, adults, children, check_in, requirements, package_id) values(?,?,?,?,?,?,?,?,?) ";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$qry)){
            echo "Statements Failed";
        }else{
            mysqli_stmt_bind_param($stmt, 'sssssssss', $name,$email, $phone, $national, $adults, $children, $date, $message, $package);
            mysqli_stmt_execute($stmt);
            echo "Thank You. We'll get back to you.";
        }

}else if($action == 'edit-captcha'){
    $yesno = $_POST['yesno'];
    $key = $_POST['key'];
    $secret = $_POST['secret'];

    $stmt = $conn->prepare("UPDATE settings SET recaptcha=?, recaptcha_key=?, recaptcha_secret=?");
    $stmt->bind_param("sss", $yesno, $key, $secret);
    $stmt->execute();
    echo "Updated Successfully";
}else if($action == 'edit-smtp'){
    $email = $_POST['system_email'];
    $host = $_POST['smtp_host'];
    $username = $_POST['smtp_username'];
    $password = $_POST['smtp_password'];

    $stmt = $conn->prepare("UPDATE settings SET system_email=?, smtp_host=?, smtp_username=?, smtp_password=?");
    $stmt->bind_param("ssss", $email, $host, $username, $password);
    $stmt->execute();
    echo "Updated Successfully";
}else if($action == 'edit-maps'){
    $name = $_POST['name'];
    $long = $_POST['long'];
    $lat = $_POST['lat'];

    $stmt = $conn->prepare("UPDATE locations SET name=?, longitude=?, latitude=?");
    $stmt->bind_param("sss", $name, $long, $lat);
    $stmt->execute();
    echo "Updated Successfully";
}else if($action == 'btn-profile'){
    $prevname = $_POST['prevname'];
    $username = $_POST['username'];
    $full_name = $_POST['full_name'];
    $new_password = $_POST['new_password'];
    $password = md5($_POST['password']);
    $constmt = $conn->prepare("select * from users where username = ? and password = ?");
    $constmt->bind_param('ss',$prevname,$password);
    $constmt->execute();
    $conresult = mysqli_stmt_get_result($constmt);
    $rowcount = mysqli_num_rows($conresult);
    if($rowcount < 1){
        echo "Incorrect Password";
    }else{
   
    if(empty($new_password)){
        $stmt = $conn->prepare("UPDATE users SET username=?, full_name=? where username = ? and password =? ");
        $stmt->bind_param("ssss", $username, $full_name, $prevname, $password);
        $stmt->execute();
        echo "Updated Successfully";
    }else{
        $new_password = md5($new_password);
    $stmt = $conn->prepare("UPDATE users SET username=?, full_name=?, password=? where username = ? and password =? ");
    $stmt->bind_param("sssss", $username, $full_name, $new_password, $prevname, $password);
    $stmt->execute();
    echo "Updated Successfully";
}
}
     
}else if($action=='edit-faq'){
    $_SESSION['faq-id'] = $_POST['data'];?>
    <script>
        location.href="home.php?link=add_faq"
    </script>
<?php }else if($action == 'get_booking'){
// Query to fetch booking dates
$query = "SELECT check_in from booking where status = '0'";
$result = $conn->query($query);

// Array to store booking dates
$bookingDates = array();

// Fetch booking dates and add them to the array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bookingDates[] = $row['check_in'];
    }
}


// Return booking dates in JSON format
echo json_encode($bookingDates);

}else if($action == 'search-date'){
    $_SESSION['search-date'] = $_POST['data'];?>
    <script>
    location.href = "home.php?link=booking"
    </script>
<?php }

