<?php
session_start();
if(empty($_SESSION['det'])){
    ?><script>location.href='index.php'</script><?php
    die();
}
?>