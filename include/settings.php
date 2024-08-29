<div class="package settings">
<div class="tour-panel">
    <p>General Settings</p>
    <?php
        $get=$conn->query('select * from company_info');
        $content=mysqli_fetch_assoc($get); ?>
            <form id="frmDetail">
        <label for="">Company Name</label>
        <input type="text"name="name" required value="<?php echo $content['name'];?>">
        <label for="">Phone Number</label>
        <input type="text"name="phone" required value="<?php echo $content['contact'];?>">
        <label for="">Email</label>
        <input type="text"name="email" required value="<?php echo $content['email'];?>">
        <label for="">About Us</label>
        <textarea name="about" id="" cols="30" rows="10" ><?php echo $content['about'];?></textarea>
        <label for="">Currency</label>
        <?php 
        $settingResult = $conn->query("select * from settings limit 1");
        $settingRows = mysqli_fetch_assoc($settingResult);?>
        <input type="text" name="currency" value="<?php echo $settingRows['currency'];?>">
        <button class="mybtn">SAVE</button>
        
        </form>
</div>
<div class="tour-panel">
    <p>Google reCAPTCHA</p>
<form id="frmRecaptcha">
    <label for="">Enable reCAPTCHA</label>
    <select name="yesno" id="">
        <option value="<?php echo $settingRows['recaptcha'];?>"><?php echo $settingRows['recaptcha'];?></option>
        <?php
            if($settingRows['recaptcha']=="No"){?>
                <option value="Yes">Yes</option>
            <?php }else{?>
                <option value="No">No</option>
            <?php }?>
    </select>
    <label for="">reCAPTCHA Site Key</label>
       <input type="text" name="key" value="<?php echo $settingRows['recaptcha_key'];?>">
       <label for="">reCAPTCHA Secret Key</label>
       <input type="text" name="secret" value="<?php echo $settingRows['recaptcha_secret'];?>">
        <button class="mybtn">SAVE</button>
        
        </form>
</div>

<div class="tour-panel">
    <p>Email Configuration</p>
<form id="frmSmtp">
<label for="">System Email</label>
       <input type="text" name="system_email" value="<?php echo $settingRows['system_email'];?>">
    <label for="">SMTP Host</label>
    <input type="text" value="<?php echo $settingRows['smtp_host'];?>" name="smtp_host">
    <label for="">SMTP Username</label>
       <input type="text" value="<?php echo $settingRows['smtp_username'];?>" name="smtp_username">
       <label for="">SMTP Password</label>
       <input type="password" value="<?php echo $settingRows['smtp_password'];?>" name="smtp_password">
        <button class="mybtn">SAVE</button>
        
        </form>
</div>
<div class="tour-panel">
    <p>Location Configuration</p>
    <form id="frmMaps">
<?php
$result = $conn->query("select * from locations");
$rows = mysqli_fetch_assoc($result);
?>
<label for="">Location Name</label>
       <input type="text" name="name" value="<?php echo $rows['name'];?>">
    <label for="">Longitude</label>
    <input type="text" value="<?php echo $rows['longitude'];?>" name="long">
    <label for="">Latitude</label>
       <input type="text" value="<?php echo $rows['latitude'];?>" name="lat">
        <button class="mybtn">SAVE</button>
        
        </form>         
</div>
</div>

<!-- javascript -->
<script>
    $('#frmDetail').on('submit', function(e){
    e.preventDefault()
    
    $.ajax({
        url:'class/class.php?action=edit_details',
        method:'POST',
        data:$('#frmDetail').serialize(),
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

})

/* recaptcha */
$('#frmRecaptcha').on('submit', function(e){
    e.preventDefault()
    
    $.ajax({
        url:'class/class.php?action=edit-captcha',
        method:'POST',
        data:$('#frmRecaptcha').serialize(),
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

})

/* SMTP */
$('#frmSmtp').on('submit', function(e){
    e.preventDefault()
    
    $.ajax({
        url:'class/class.php?action=edit-smtp',
        method:'POST',
        data:$('#frmSmtp').serialize(),
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

})

/* Maps */
$('#frmMaps').on('submit', function(e){
    e.preventDefault()
    
    $.ajax({
        url:'class/class.php?action=edit-maps',
        method:'POST',
        data:$('#frmMaps').serialize(),
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

})
</script>