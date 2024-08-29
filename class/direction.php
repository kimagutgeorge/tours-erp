<?php
session_start();
$action=$_GET['action'];
if($action=='view_package'){
    $_SESSION['package-id']=$_POST['data'];
    ?><script>
        location.href='home.php?link=<?php echo 'view_package'?>'
    </script>
<?php }else if($action=='view_hotel'){
    $_SESSION['hotel-id']=$_POST['data'];
    ?><script>
        location.href='home.php?link=<?php echo 'view_hotel'?>'
    </script>
<?php }else if($action=='edit_package'){
    $_SESSION['edit-package-id']=$_POST['data'];
    ?><script>
    location.href='home.php?link=<?php echo 'edit_package'?>'
</script>
<?php }else if($action=='edit_destination'){
     $_SESSION['edit-destination-id']=$_POST['data'];
     ?><script>
     location.href='home.php?link=<?php echo 'edit_destination'?>'
 </script>
<?php }else if($action=='edit_blog'){
     $_SESSION['edit-blog-id']=$_POST['data'];
     ?><script>
     location.href='home.php?link=<?php echo 'edit_blog'?>'
 </script>
<?php }else if($action=='edit_booking'){
     $_SESSION['edit-booking-id']=$_POST['data'];
     ?><script>
     location.href='home.php?link=<?php echo 'edit_booking'?>'
 </script>
<?php }else if($action=='view_booking'){
     $_SESSION['view-booking-id']=$_POST['data'];
     ?><script>
     location.href='home.php?link=<?php echo 'view_booking'?>'
 </script>
<?php }
?>