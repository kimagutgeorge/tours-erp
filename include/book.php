<div class="package">
    <div class="book-panel tour-panel">
<div class="left">
<form id="frmBook">
    <input type="text"placeholder="Full Names"name="full_name" required>
    <input type="text"placeholder="Email Address"name="email"required>
    <input type="number"placeholder="Phone Number"name="phone" required>
    <select name="package" id="">
        <?php $result=$conn->query("select * from packages");
        ?><option disabled selected="true">Package</option><?php
        while($rows=mysqli_fetch_assoc($result)){?>
        <option value="<?php echo $rows['id'];?>"><?php echo $rows['package_name'];?></option>
        <?php }?>
    </select>
</div>
<div class="right">
<input type="number"placeholder="No. of Children"name="children" required>
<input type="text"placeholder="ENo. of Adults" name="adults"><br>
<label for="">Check In</label><br>
<input type="date"placeholder=""name="check_in"><br>
<label for="">Comments</label><br>
<textarea name="requirements" id="" cols="10" rows="5"placeholder="Any requirement?"></textarea><br>
<div class="submit-panel">
<input type="submit"value="SAVE"class="mybtn">
<!-- <a href="home.php?link=<?php echo 'booking'?>"><button class="btncancel">CANCEL</button></a> -->
</div>
</div>
</form>
</div>
</div>
<?php include('footer.php');?>
<script>
    $(document).ready(function(){
        $('#frmBook').on('submit', function(e){
            e.preventDefault()
            $.ajax({
                url:'class/class.php?action=book',
                method:'POST',
                data:$('#frmBook').serialize(),
                success:function(data){
                    document.getElementById('black-panel').style.display='block';
                    document.getElementById('response_panel').style.display='block';
                    $('#response_panel').html(data)
                    setTimeout(() => {
                        document.getElementById('black-panel').style.display='none';
                        document.getElementById('response_panel').style.display='none';
                        $('#response_panel').html('')
                    }, 2500);
                }
            })
        })
    })
</script>