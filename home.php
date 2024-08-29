<?php
error_reporting(E_ERROR | E_PARSE);
include('include/sec.php');
include('include/connection.php');
include('include/header.php');
include('include/panels.php');
include('include/topbar.php');
include('include/navbar.php');
?>
<div class="view">
<?php 
$fileId = $_GET['file_id'] ?? null;
if($_GET['link']=='home'){
    include('include/dashboard.php');
}else if($_GET['link']=='package'){
    include('include/package.php');
}else if($_GET['link']=='tour'){
    include('include/tour.php');
}else if($_GET['link']=='booking'){
    include('include/booking.php');
}else if($_GET['link']=='destination'){
    include('include/destination.php');
}else if($_GET['link']=='website'){
    include('include/website.php');
}else if($_GET['link']=='blog'){
    include('include/blog.php');
}else if($_GET['link']=='payment'){
    include('class/mpesa-pay/callback.php');
}else if($_GET['link']=='add_package'){
    include('include/add_package.php');
}else if($_GET['link']=='add_destination'){
    include('include/add_destination.php');
}else if($_GET['link']=='add_image'){
    include('include/add_image.php');
}else if($_GET['link']=='reinclude'){
    include('include/reinclude.php');
}else if($_GET['link']=='add_blog'){
    include('include/add_blog.php');
}else if($_GET['link']=='book'){
    include('include/book.php');
}else if($_GET['link']=='review'){
    include('include/review.php');
}else if($_GET['link']=='view_package'){
    include('include/view_package.php');
}else if($_GET['link']=='edit_package'){
    include('include/edit_package.php');
}else if($_GET['link']=='edit_destination'){
    include('include/edit_destination.php');
}else if($_GET['link']=='edit_blog'){
    include('include/edit_blog.php');
}else if($_GET['link']=='edit_booking'){
    include('include/edit_booking.php');
}else if($_GET['link']=='profile'){
    include('include/profile.php');
}else if($_GET['link']=='logout'){
    include('include/logout.php');
}else if($_GET['link']=='contact'){
    include('include/contact.php');
}else if($_GET['link']=='callback'){
    include('class/mpesa-pay/callback.php');
}else if($_GET['link']=='hotel'){
    include('include/hotel.php');
}else if($_GET['link']=='view_hotel'){
    include('include/view_hotel.php');
}else if($_GET['link']=='reports'){
    include('include/report.php');
}else if($_GET['link']=='tailor'){
    include('include/tailor.php');
}else if($_GET['link']=='reply'){
    include('include/email.php');
}else if($_GET['link']=='faqs'){
    include('include/faqs.php');
}else if($_GET['link']=='add_faq'){
    include('include/add_faq.php');
}else if($_GET["link"]=='seasons'){
    include('include/seasons.php');
}else if($_GET["link"]=='settings'){
    include('include/settings.php');
}else if($_GET["link"]=='users'){
    include('include/users.php');
}else if($_GET["link"]=='payments'){
    include('include/payment_method.php');
}else if($_GET["link"]=='view_booking'){
    include('include/view_booking.php');
}else if($_GET['link']=='forgot'){
    include('include/forgot.php');
}
else if (is_numeric($fileId)) {
    header("Location:include/view_file.php");
  
}
//end of ifs
else{
    include('include/dashboard.php');
}


?>
</div>
<?php

include('include/footer.php');
?>