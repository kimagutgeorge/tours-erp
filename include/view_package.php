<div class="package">
    <?php
    $result=$conn->query("select * from package_images inner join packages on packages.id=package_images.package_id inner join destinations on packages.package_destination = destinations.id inner join seasons on packages.seasons = seasons.season_id inner join tour_type on package_tour = tour_type.id and packages.id=".$_SESSION['package-id']);
    $row=mysqli_fetch_assoc($result);
    ?>
    <div class="tour-panel">
<div class="page-title">
        <p>Package: <?php echo "<span style='color:rgb(0,130,189)'>".$row['package_name']."</span>";?></p>
    </div>
    <div class="package-button">
        <button id="btnOverview">OVERVIEW</button>
        <button id="btnIterinary">ITINERARY</button>
        <button id="btnImages">IMAGES</button>
    </div>
    <div class="line"></div>
    <div class="package-bottom">
    <div id="package_overview">
        <div class="detail">
        <?php echo "<span>Duration: </span>".$row['package_duration']." Days";?><br>
        <?php echo "<span>Destination: </span>".$row['destination_name']."";?><br>
        <?php echo "<span>Tour Type: </span>".$row['tour_name']."";?><br>
        <?php echo "<span>Price (".$currency."): </span>"; if($row["offer"] > 0)
        { 
            echo "<i style='text-decoration:line-through'>".number_format($row['package_price'])."</i> ". number_format($row['package_price'] - $row['package_price'] * ($row['offer']/100)) ."<br>";  
        }else{ echo number_format($row['package_price'])."<br>";} 
        if($row["offer"] > 0){
            echo "<span>Discount: </span>".$row['offer']."% <br>";
        }
        ?>
        <?php echo "<span>Season: </span>".$row['season']."";?><br>
        <?php echo "<span>Tour Type: </span>".$row['tour_name']."";?><br>
        <?php 
            $unformatted = $row['package_creation'];
            echo "<span>Date Created: </span>".date('d/m/y', strtotime($unformatted))."";
        ?><br>
        </div>
        <?php echo $row['package_overview'];?>
    </div>
    <div id="package_iterinary">



    <?php // Fetch data from the database
$packId = $_SESSION['package-id'];
$sql = "SELECT * FROM itinerary WHERE pack_id =? ";
    $statement = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($statement, $sql);
    mysqli_stmt_bind_param($statement,"s",$packId);
    $statement->execute();
    $faqs = mysqli_stmt_get_result($statement);
    while($faq = mysqli_fetch_assoc($faqs)){?>
    <div class="itinerary-card">
        <div class="itinerary-title">
            <h4><?php echo $faq['day_title'];?></h4>
        </div>
        <div class="itinerary-body">
        <p><?php echo $faq['activity'];?></p>
        </div>
    </div>
    <?php }?>   
    
    </div>
    <div id="package_images" class="view-package">
        <?php $imageresult=$conn->query("select * from package_images where package_id=".$_SESSION['package-id']);
        while($row=mysqli_fetch_assoc($imageresult)){?>
            <div class="slider-image">
            <div class="image_id"hidden><?php echo $rows['id'];?></div>
            <?php echo "<img src='../assets/uploads/package/".$row['image_name']."'>";?>
        </div>
        <?php }
        ?>
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