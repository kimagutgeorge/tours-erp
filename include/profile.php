<div class="package settings">
<div class="tour-panel">
    <div class="page-title">
        <p>Account Details</p>
    </div>
    
<?php
$get=$conn->query("select * from users where user_id=".$_SESSION['det']." limit 1" );
while($content=mysqli_fetch_assoc($get)){?>
        <form action="" id="frmProfile">
            <label for="">Username</label>
            <input type="text" hidden value="<?php echo $content['username'];?>" name="prevname" required>
            <input type="text" value="<?php echo $content['username'];?>" name="username" required>
            <label for="">Full Name</label>
            <input type="text" value="<?php echo $content['full_name'];?>" name="full_name" required>
            <label for="">New Password</label>
            <input type="password" name="new_password" id="new_pass" onkeyup="checkPassword()">
            <p>Leave Blank if You do not want to change</p>
            <label for="">Confirm Password</label>
            <input type="password" name="" id="con_pass" onkeyup="checkPassword()">
            <p id="show-pass-result">Leave Blank if You do not want to change</p>
            <label for="">Password</label>
            <input type="password" name="password" required>
            <button class="mybtn">SAVE</button>
            <div id="profile-response" style="margin-top:20px"></div>
        </form>
<?php }
?>
</div>
</div>
<?php include('include/footer.php');?>
<script>

/* profile */
$('#frmProfile').on('submit', function(e){
    e.preventDefault()

    var newpass = document.getElementById('new_pass').value
    var conpass = document.getElementById('con_pass').value
    profileResult = document.getElementById('show-pass-result')
    btnProfile = document.getElementById('profile-response')

    if(conpass != newpass){
        btnProfile.innerHTML = "Passwords do not match"
        btnProfile.style.color = 'red'
        setTimeout(() => {
            btnProfile.innerHTML =""
            btnProfile.style.color = "black"
        }, 2000);
    }else{
        $.ajax({
        url:'class/class.php?action=btn-profile',
        method:'POST',
        data:$('#frmProfile').serialize(),
        success:function(resp){
            document.getElementById('black-panel').style.display='block';
        document.getElementById('response_panel').style.display='block';
        $('#response_panel').html(resp);
        setTimeout(() => {
            document.getElementById('black-panel').style.display='none';
        document.getElementById('response_panel').style.display='none';
            
        }, 2500);
        }
    })
    }
})

function checkPassword(){
    var newpass = document.getElementById('new_pass').value
    var conpass = document.getElementById('con_pass').value
    passDiv = document.getElementById('show-pass-result')
    btnProfile = document.getElementById('btn-profile')

    if(conpass != newpass){
        passDiv.innerHTML = "Passwords do not match!";
        passDiv.style.color = "red"
    }else{
        passDiv.innerHTML = "Leave Blank if You do not want to change";
        passDiv.style.color = "black"
    }
}

$('.fa-edit').on('click', function(){
    document.getElementById('edit-detail').style.display='flex';
    document.getElementById('company-detail').style.display='none';
})
$('#fa-cancel').on('click', function(){
    document.getElementById('edit-detail').style.display='none';
    document.getElementById('company-detail').style.display='block';
})
</script>