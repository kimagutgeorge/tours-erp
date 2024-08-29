<div class="package">
    <div class="book-panel tour-panel">
<div class="left">
<?php
            $packageresult=$conn->query("select * from booking inner join packages on packages.id = booking.package_id and booking_id=".$_SESSION['view-booking-id']);
            $row=mysqli_fetch_assoc($packageresult);
            $packid = $row["package_id"];
        ?>
<form action="" id="frmLipa">
<input type="hidden"value="<?php echo $_SESSION['view-booking-id'];?>"name="id" id="book-id">
<label for="">Full Name</label><br>
    <input type="text"value="<?php echo $row['full_name'];?>" placeholder="Full Names" id="jina" readonly ><br>
    <label for="">Email</label><br>
    <input type="text" value="<?php echo $row['email'];?>" placeholder="Email Address" readonly ><br>
    <label for="">Phone</label><br>
    <input type="number" value="<?php echo $row['phone'];?>" readonly ><br>
    <label for="">Package Name</label><br>
    <input type="number" value="<?php echo $row['package_name'];?>" placeholder="Phone Number" readonly ><br>
    <label for="">Package Price</label><br>
    <input type="number" value="<?php echo $row['package_price'];?>" placeholder="Phone Number"id="person-price"  readonly ><br>
    <label for="">Nationality</label><br>
    <input type="text" value="<?php echo $row["nationality"];?>" readonly ><br>
    <label for="">Adults (12+)</label><br>
<input type="text" value="<?php echo $row['adults'];?>" placeholder="No. of Adults" readonly><br>     
</div>
<div class="right">
<label for="">Children (12-)</label><br>
<input type="number" value="<?php echo $row['children'];?>" placeholder="No. of Children"  readonly><br> 
<label for="">Check In</label><br>
<input type="text" value="<?php
$check_in_date = date('F j, Y', strtotime($row['check_in']));
echo $check_in_date;
?>" placeholder=""name="check_in" id="date-id" readonly><br>
<label for="">Comments</label><br>
<textarea name="requirements" id="" cols="10" readonly rows="5"placeholder="Any requirement?"><?php echo $row['requirements'];?></textarea><br>

<!-- <div class="pay-method">
            <div class="pay-title">
            <h4>Payment Information</h4>
            </div>
            <div class="pay-method-body">
            <h4>M-pesa Payment Number</h4>
            <input type="text" placeholder="Safaricom Number" id="pay-number">
            <input type="text" placeholder="Safaricom Number" value="<?php echo $row['package_price'];?>" id="pay-price" readonly>
        <button class="mybtn"id="btn-mpesa"><img src="../assets/uploads/static/mpesa.png"> Mpesa</button>
</form>
            </div>
        
        <!-- <button class="mybtn">VISA</button> -->
        </div> -->
        <div id="pay-response">
            
        </div>
</div>
</div>
</div>
<?php include('footer.php');?>
<script>
    $('#frmLipa').on('submit', function(e){
        e.preventDefault()
        var id= document.getElementById("book-id").value
        var phone=document.getElementById("pay-number").value
        var price = document.getElementById("pay-price").value

    $.ajax({
            url:'class/stkpush.php',
            method:'POST',
            data:{id:id,
                phone:phone,
                price:price
            },
            success:function(resp){
            $('#pay-response').html(resp);
             console.log(resp)   
            }
        })
        
    })
</script>