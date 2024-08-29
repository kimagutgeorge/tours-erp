<div class="package settings">
<div class="tour-panel">
    <p>General Settings</p>
    <?php
        $get=$conn->query('select * from company_info');
        while($content=mysqli_fetch_assoc($get)){
            ?>
            <form id="frmDetail">
        <label for="">Company Name</label>
        <input type="text"name="name" required value="<?php echo $content['name'];?>">
        <label for="">Phone Number</label>
        <input type="text"name="phone" required value="<?php echo $content['contact'];?>">
        <label for="">Email</label>
        <input type="text"name="email" required value="<?php echo $content['email'];?>">
        <label for="">About Us</label>
        <textarea name="about" id="" cols="30" rows="10" ><?php echo $content['about'];?></textarea>
        <?php }?>
        
        <button class="mybtn">SAVE</button>
        
        </form>
</div>
<div class="tour-panel">
    <p>Google reCAPTCHA</p>
<form id="">
    <label for="">Enable reCAPTCHA</label>
    <select name="" id="">
        <option value="">No</option>
        <option value="">Yes</option>
    </select>
    <label for="">reCAPTCHA Site Key</label>
       <input type="text">
       <label for="">reCAPTCHA Secret Key</label>
       <input type="text">
        <button class="mybtn">SAVE</button>
        
        </form>
</div>

<div class="tour-panel">
    <p>Email Configuration</p>
<form id="">
    <label for="">SMTP Host</label>
    <input type="text">
    <label for="">SMTP Username</label>
       <input type="text">
       <label for="">SMTP Password</label>
       <input type="text">
        <button class="mybtn">SAVE</button>
        
        </form>
</div>
</div>