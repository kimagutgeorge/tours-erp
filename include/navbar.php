<div class="nav-bar">
    <ul>
<a href="home.php?link=<?php echo 'home'?>"id="home-link"><li <?php if($_GET['link']=='home'){?> style="color:#FFFFFF" <?php } ?>><i class="fa fa-home"></i> Dashboard</li></a>
<a href="home.php?link=<?php echo 'package'?>"><li <?php if($_GET['link']=='package'){?> style="color:#FFFFFF" <?php } ?>><i class="fa fa-gift"></i> Package</li></a>
<a href="home.php?link=<?php echo 'tour'?>"><li <?php if($_GET['link']=='tour'){?> style="color:#FFFFFF" <?php } ?>><i class="fa fa-th-list"></i> Tour Types</li></a>
<a href="home.php?link=<?php echo 'seasons'?>"><li <?php if($_GET['link']=='seasons'){?> style="color:#FFFFFF" <?php } ?>><i class="fa fa-th-list"></i> Seasons</li></a>
<a href="home.php?link=<?php echo 'destination'?>"><li <?php if($_GET['link']=='destination'){?> style="color:#FFFFFF" <?php } ?>><i class="fa fa-map"></i> Destinations</li></a>
<a href="home.php?link=<?php echo 'blog'?>"><li <?php if($_GET['link']=='blog'){?> style="color:#FFFFFF" <?php } ?>><i class="fa fa-book"></i> Blog</li></a>
<a href="home.php?link=<?php echo 'booking'?>"><li <?php if($_GET['link']=='booking'){?> style="color:#FFFFFF" <?php } ?>><i class="fa fa-calendar"></i> Booking</li></a>
<a href="home.php?link=<?php echo 'payment'?>"><li <?php if($_GET['link']=='payment'){?> style="color:#FFFFFF" <?php } ?>><i class="fa fa-money-bill"></i> Payments</li></a>
<a href="home.php?link=<?php echo 'hotel'?>"><li <?php if($_GET['link']=='hotel'){?> style="color:#FFFFFF" <?php } ?>><i class="fa-solid fa-hotel"></i> Hotel & Air Bnbs</li></a>
<a href="#" onclick="shownavcard()"><li <?php if($_GET['link']=="review" || $_GET['link']=="contact" || $_GET['link']=="tailor" || $_GET['link']=='faqs' || $_GET['link']=="add_faq"){?> style="color:#FFFFFF" <?php } ?>><i class="fa fa-globe"></i> Website <i class="fa-solid fa-angle-down"></i></li></a>
<?php
    if($_GET['link']=="review" || $_GET['link']=="contact" || $_GET['link']=="tailor" || $_GET['link']=="faqs" || $_GET['link']=='reply'|| $_GET['link']=="add_faq"){?>
    <style>
    #nav-card{
        display: block;
    }
    </style>
    <?php }else{?>
        <style>
    #nav-card{
        display: none;
    }
    </style>
    <?php }?>
<div id="nav-card">
    <a href="?link=review"><li <?php if($_GET['link']=='review'){?> style="color:#FFFFFF" <?php } ?>><i class="fa-solid fa-book-open"></i> Reviews</li></a>
    <a href="?link=contact"><li <?php if($_GET['link']=='contact'){?> style="color:#FFFFFF" <?php } ?>><i class="fa-solid fa-phone"></i> Contacts</li></a>
    <a href="?link=tailor"><li <?php if($_GET['link']=='tailor'){?> style="color:#FFFFFF" <?php } ?>><i class="fa-solid fa-pen"></i> Tailor Made</li></a>
    <a href="?link=faqs"><li <?php if($_GET['link']=='faqs'){?> style="color:#FFFFFF" <?php } ?>><i class="fa-solid fa-question"></i> FAQs</li></a>
    <a href="?link=add_faq"><li <?php if($_GET['link']=='add_faq'){?> style="color:#FFFFFF" <?php } ?>><i class="fa-solid fa-plus"></i> Add FAQ</li></a>
</div>
<a href="home.php?link=<?php echo 'reports'?>"><li <?php if($_GET['link']=='reports'){?> style="color:#FFFFFF" <?php } ?>><i class="fa fa-book"></i> Reports</li></a>
<a href="#" onclick="shownavcard2()"><li <?php
    if($_GET['link']=="settings" || $_GET['link']=="profile" || $_GET['link']=="payments" || $_GET['link']=="users" || $_GET['link']=="logout"){?>style="color:#FFFFFF;"<?php }?>><i class="fa-solid fa-wrench"></i> Account Settings <i class="fa-solid fa-angle-down"></i></li></a>
<?php
    if($_GET['link']=="settings" || $_GET['link']=="profile" || $_GET['link']=="payments" || $_GET['link']=="users" || $_GET['link']=="logout"){?>
    <style>
    #nav-card-2{
        display: block;
    }
    </style>
    <?php }else{?>
        <style>
    #nav-card-2{
        display: none;
    }
    </style>
    <?php }?>

<div id="nav-card-2">
    <a href="?link=settings"><li <?php if($_GET['link']=='settings'){?> style="color:#FFFFFF" <?php } ?>><i class="fa-solid fa-gear"></i> General Settings</li></a>
    <a href="?link=profile"><li <?php if($_GET['link']=='profile'){?> style="color:#FFFFFF" <?php } ?>><i class="fa-solid fa-user"></i> Profile</li></a>
    <a href="?link=payments"><li <?php if($_GET['link']=='payments'){?> style="color:#FFFFFF" <?php } ?>><i class="fa-solid fa-dollar"></i> Payments</li></a>
    <a href="?link=users"><li <?php if($_GET['link']=='users'){?> style="color:#FFFFFF" <?php } ?>><i class="fa-solid fa-users"></i> Users</li></a>
    <a href="?link=logout"><li <?php if($_GET['link']=='logout'){?> style="color:#FFFFFF" <?php } ?>><i class="fa fa-power-off"></i> Logout</li></a>
</div>
</ul>
</div>