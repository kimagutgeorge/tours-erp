<div class="package">
    <?php
    $result=$conn->query("select * from hotel inner join destinations where hotel_location=id and hotel_id=".$_SESSION['hotel-id']);
    $row=mysqli_fetch_assoc($result);
    ?>
<div class="page-title">
        <p>Hotel: <?php echo "<span style='color:rgb(0,130,189)'>".$row['hotel_name']."</span>";?></p>
    </div>
    <div class="package-button">
        <button>DETAILS</button>
    </div>
    <div class="line"></div>
    <div class="package-bottom">
    <div id="package_overview">
        <div class="detail">
        <?php echo "<span>Name:</span>".$row['hotel_name'];?><br>
        <?php echo "<span>Location:</span>".$row['destination_name']."";?><br>
        <?php echo "<span>Price (Kshs):</span>".$row['hotel_price']." /Day";?><br>
        <?php $imageresult=$conn->query("select * from hotel_images where hotel=".$_SESSION['hotel-id']);?>
        <div class="show-flex-image">
        <?php while($row=mysqli_fetch_assoc($imageresult)){?>
            <div class="slider-image">
            <div class="image_id"hidden><?php echo $rows['id'];?></div>
            <?php echo "<img src='../assets/uploads/hotels/".$row['image_name']."'>";?>
        </div>
        <?php }
        ?>
        </div>
        </div>
        
    </div>
    
    </div>
    
</div>
<?php include('footer.php');?>
<script>
    document.getElementById('btnOverview').onclick=function(){
        document.getElementById('package_overview').style.display='block'
        document.getElementById('package_iterinary').style.display='none'
        document.getElementById('package_images').style.display='none'
        // buttons
        document.getElementById('btnOverview').style.backgroundColor='rgba(0, 26, 29, 0.842)'
        document.getElementById('btnIterinary').style.backgroundColor='green'
        document.getElementById('btnImages').style.backgroundColor='green'
    }
    document.getElementById('btnIterinary').onclick=function(){
        document.getElementById('package_overview').style.display='none'
        document.getElementById('package_iterinary').style.display='block'
        document.getElementById('package_images').style.display='none'
        // buttons
        document.getElementById('btnOverview').style.backgroundColor='green'
        document.getElementById('btnIterinary').style.backgroundColor='rgba(0, 26, 29, 0.842)'
        document.getElementById('btnImages').style.backgroundColor='green'
    }
    document.getElementById('btnImages').onclick=function(){
        document.getElementById('package_overview').style.display='none'
        document.getElementById('package_iterinary').style.display='none'
        document.getElementById('package_images').style.display='flex'
        // buttons
        document.getElementById('btnOverview').style.backgroundColor='green'
        document.getElementById('btnIterinary').style.backgroundColor='green'
        document.getElementById('btnImages').style.backgroundColor='rgba(0, 26, 29, 0.842)'
    }
</script>