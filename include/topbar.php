<div class="top-bar">
   <div class="left">
    <?php include('connection.php');
        $result=$conn->query("select * from company_info limit 1");
        $row=mysqli_fetch_assoc($result);
        $companyName = $row['name'];
        $companyEmail = $row['email'];
        echo "<p>".$row['name']."</p>";
    ?>
   </div>
   <div class="right">
   <?php include('connection.php');
        $result=$conn->query("select full_name from users where user_id=".$_SESSION["det"]." limit 1");
        $row=mysqli_fetch_assoc($result);
        ?>
        <div class="ka-box-kadogo">
        <p id='p_user'onclick="showProfile()"><?php echo $row['full_name'];?> <i class='fa fa-angle-down'id='user_arrow'></i></p>
        <div id="ka-prof">
        <a href="home.php?link=<?php echo 'profile'?>"><li><i class="fa fa-user"></i> Profile</li></a>
        <a href="home.php?link=<?php echo 'logout'?>"><li><i class="fa fa-power-off"></i> Logout</li></a>
        </div>
        </div>
        <?php
        
    ?>
   </div>
</div>
