<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN | Manage</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootmin.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootmin5.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="assets/font-awesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/fontawesome.css">
    <link rel="stylesheet" href="assets/font-awesome/css/brands.css">
    <link rel="stylesheet" href="assets/font-awesome/css/solid.css">
    <link rel="stylesheet" href="assets/font-awesome/css/regular.css">
    <!-- css links -->
    <link rel="stylesheet" href="style/css.css?v=<?php echo time();?>">
</head>
<body>
<div id="direction-response"></div>
<!-- end -->
<?php 
    $settingResult = $conn->query("select currency from settings limit 1");
    $settingRows = mysqli_fetch_assoc($settingResult);
    $currency = $settingRows['currency'];
    ?>