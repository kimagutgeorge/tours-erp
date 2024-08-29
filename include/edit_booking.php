<div class="package">
    <div class="book-panel tour-panel">
<div class="left">
<?php
            $packageresult=$conn->query("select * from booking inner join packages on packages.id = booking.package_id and booking_id=".$_SESSION['edit-booking-id']);
            $row=mysqli_fetch_assoc($packageresult);
            $packid = $row["package_id"];
        ?>
<form id="frmBook">
<input type="hidden"value="<?php echo $_SESSION['edit-booking-id'];?>"name="id">
<label for="">Full Name</label><br>
    <input type="text"value="<?php echo $row['full_name'];?>" placeholder="Full Names"name="full_name" required><br>
    <label for="">Email</label><br>
    <input type="text" value="<?php echo $row['email'];?>" placeholder="Email Address"name="email"required><br>
    <label for="">Phone</label><br>
    <input type="number" value="<?php echo $row['phone'];?>" placeholder="Phone Number"name="phone" required><br>
    <label for="">Package</label><br>
    <select name="package" id="">
        <?php 
        $currentpackage = $row['package_name'];
        $result=$conn->query("SELECT * FROM packages WHERE package_name <> '$currentpackage'");
        ?><option selected="true" value="<?php echo $row['id'];?>"><?php echo $row['package_name'];?></option><?php
        while($rows=mysqli_fetch_assoc($result)){?>
        <option value="<?php echo $rows['id'];?>"><?php echo $rows['package_name'];?></option>
        <?php }?>
    </select><br>
    <label for="">Nationality</label><br>
    <select name="nationality" id="">
            <option value="<?php echo $row["nationality"];?>"><?php echo $row["nationality"];?></option>
            <?php if($row["nationality"]=="Kenyan citizen"){?>
                <option value="Kenyan Resident">Kenyan Resident</option>
                <option value="East Africa Resident">East Africa Resident</option>
                <option value="Non Resident">Non Resident</option>
            <?php }else if($row["nationality"]=="Kenyan Resident"){?>
                <option value="Kenyan citizen">Kenyan citizen</option>
                <option value="East Africa Resident">East Africa Resident</option>
                <option value="Non Resident">Non Resident</option>
            <?php }else if($row["East Africa Resident"]=="East Africa Resident"){?>
                <option value="Kenyan citizen">Kenyan citizen</option>
                <option value="Kenyan Resident">Kenyan Resident</option>
                <option value="Non Resident">Non Resident</option>
            <?php }else{?>
                <option value="Kenyan citizen">Kenyan citizen</option>
                <option value="Kenyan Resident">Kenyan Resident</option>
                <option value="East Africa Resident">East Africa Resident</option>
            <?php }?>
    </select>
</div>
<div class="right">
    <label for="">Adults (12+)</label><br>
<input type="text" value="<?php echo $row['adults'];?>" placeholder="No. of Adults" name="adults"><br>
<label for="">Children (12-)</label><br>
<input type="number" value="<?php echo $row['children'];?>" placeholder="No. of Children"name="children" required><br>
<label for="">Check In</label><br>
<input type="text" value="<?php echo $row['check_in'];?>" placeholder=""name="check_in" id="date-id"><br>
<label for="">Comments</label><br>
<textarea name="requirements" id="" cols="10" rows="5"placeholder="Any requirement?"><?php echo $row['requirements'];?></textarea><br>
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
        $('#date-id').on('click', function(){
            var btn = document.getElementById('date-id')
            btn.setAttribute("type", "date");
        })

        $('#frmBook').on('submit', function(e){
            e.preventDefault()
            $.ajax({
                url:'class/class.php?action=edit_book',
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