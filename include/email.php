<div class="package">
<div class="tour-panel">
<div class="page-title mail-title">
    <?php
        $result = $conn->query("select * from contact where id=".$_SESSION['email-id']);
        $emailSubject = mysqli_fetch_assoc($result);
    ?>
        <p style="font-weight:bold"><span><?php echo $emailSubject['subject'];?></span><br>
        <span class="ka-mail" onclick="showDetail()">to me <i class="fa-solid fa-angle-down"></i></span>
    </p>
        <div id="mail-details">
            <p class="merge-p"><span>from: </span> <?php echo $emailSubject['email'];?></p>
            <p class="merge-p"><span>date: </span> <?php 
            $dateFromMySQL = $emailSubject['date'];

            // Convert the MySQL date format to a human-readable format
            $formattedDate = date("j F Y", strtotime($dateFromMySQL));
            
            // Output the formatted date
            echo $formattedDate;?></p>
            <p class="merge-p"><span>subject: </span> <?php echo $emailSubject['subject'];?></p>
        </div>
    </div>

<!-- chat panel -->
<div class="chat-panel">
    <div class="chat-panel-body">
        <?php
            $userMail = $emailSubject["email"];
            $emailResult = $conn->query("select * from emails where sender_email ='$userMail' or receiver_email = '$userMail'");

            while($mailRows = mysqli_fetch_assoc($emailResult)){?>
                
                <div class="received-mail">
                    <?php 
                    if($mailRows['type']=="0"){?>

                <div class='client-sent msg-body'>
                    <div class="msg-del" hidden><?php echo $mailRows['id'];?></div>
                    <div class='mail-title'>
                    <div class='mail-title-sender'>
                        <?php 
                        echo $emailSubject['name'];
                        $fileId = $emailSubject['id']; ?>
                    </div> <div class='mail-title-time'>
                    <span><a href='#reply-form'><i class='fa-solid fa-reply btn-reply' onclick='showReplyForm()'></i></a></span>
                    <span><i class='fa-solid fa-trash xlose'></i></span>
                </div>
                </div>
                    <?php echo $mailRows['message'];?>
                </div>
                        <?php }else{?>
                            <div class='user-sent msg-body'>
                            <div class="msg-del" hidden><?php echo $mailRows['id'];?></div>
                                <div class='mail-title'><div class='mail-title-sender'>
                                <?php echo $companyName; ?>
                            </div>
                            <div class='mail-title-time'>
                                <span><i class='fa-solid fa-trash xlose'></i></span>
                            </div>
                        </div>
                            <?php echo $mailRows['message']."<br>";
                            $fileId = $mailRows['id'];
// Fetch file data from the database
$result = $conn->query("SELECT * FROM mail_files WHERE email_id = '$fileId' ");

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fileName = $row['file'];
    $fileIdentification = $row['file_id'];
    // Display a button to view the file
    echo "<span style='font-weight:bold;font-size:14px;'>Attachment</span><br>";
    echo '<a style="color:rgb(150,150,150);font-size:32px;" href="include/view_file.php?file_id=' . $fileIdentification . '" target="_blank"><i class="fa-solid fa-file"></i></a>';
} else {
    
} ?>
                    
                        </div>
                </div>
            <?php }}?>
    </div>
</div>
    <div class="chat-body-reply">
        <div id="reply-form">
        <div class="reply-top">
            <i class="fa-solid fa-trash" onclick="hideReplyForm()"></i>
            <p>To: <?php echo $emailSubject['email'];?></p>
        </div>
        <form action="" method="POST" id="sendMail" enctype="multipart/form-data">
            <input type="hidden" name="receiver_email"value="<?php echo $emailSubject['email'];?>" >
            <input type="hidden" name="sender_email"value="<?php echo $companyEmail;?>" >
            <textarea name="message" id="le-msg" cols="" rows=""placeholder="Type Your Message" required></textarea>
            <div class="merge-p image-upload-container">
                <button class="mybtn">Send <i class="fa-solid fa-paper-plane"></i></button>
                <input type="file" id="imageInput" name="files[]" onchange="updateFileCount()">
        <label for="imageInput"><i class="fa-solid fa-paperclip"></i></label>
        <span class="file-count" id="fileCount"></span>
               
            </div>
        </form>
        </div>
        <div id="email-response">

        </div>
    </div>
</div>
</div>
</div>
<script>
     $("#imageInput").on('change',function() {
        var file = this.files[0];
var fileType = file.type.toLowerCase();
$allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'application/pdf', 'application/msword', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

if (!allowedTypes.includes(fileType)) {
    // Display a message on the webpage
    alert('Sorry, ' + fileType + ' is not allowed for upload.');
    $("#imageInput").val('');
    return false;
}

});

    function showReplyForm(){
        document.getElementById('reply-form').style.display='block'
    }
    function hideReplyForm(){
        document.getElementById('reply-form').style.display='none'
    }

    function updateFileCount() {
            var fileInput = document.getElementById('imageInput');
            var fileCount = document.getElementById('fileCount');

            if (fileInput.files.length === 1) {
                fileCount.textContent = '1';
            } else {
                fileCount.textContent = fileInput.files.length + '';
            }
        }
        $('#sendMail').on('submit', function(e){
            e.preventDefault()
                data=$('#sendMail').serialize()


        $.ajax({
    url: 'class/class.php?action=email-reply',
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   beforeSend : function()
   {
    // $("#preview").fadeOut();
    // $("#err").fadeOut();
   },
   success: function(data)
      {
        $('#email-response').html(data)
            document.getElementById("sendMail").reset()
        setTimeout(() => {
            $('#email-response').html("")
        }, 2000);
      },
     error: function(e) 
      {
    // $("#frm-car").html(e).fadeIn();
      }          
    });

        })

$('.xlose').on('click', function(){
    var con = confirm("Delete this mail?")
    if(con==true){
        var data = $(this).closest('.msg-body').find('.msg-del').text().trim()
    
    $.ajax({
        url:'class/class.php?action=del-email',
        method:'POST',
        data:{data:data},
        success:function(data){
        $('#email-response').html(data);
    }
    })
    }else{

    }
   
})

</script>