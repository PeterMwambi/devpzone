<?php
define("PATHNAME", true);
require "../../../../app/config/core.php";
$product_cartegory = array("Men Fashion", "Women Fashion", "Beauty and Salon", "Shoes", "Bags", "Jewelery");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="icon" href="<?php echo Directories::getLocation("tools/assets/icons/apple-touch-icon-iphone-60x60.png") ?>">
    <link rel="icon" sizes="60x60" href="<?php echo Directories::getLocation("tools/assets/icons/apple-touch-icon-ipad-76x76.png") ?>">
    <link rel="icon" sizes="114x114" href="<?php echo Directories::getLocation("tools/assets/icons/apple-touch-icon-iphone-retina-120x120.png") ?>">
    <link rel="icon" sizes="144x144" href="<?php echo Directories::getLocation("tools/assets/icons/apple-touch-icon-ipad-retina-152x152.png") ?>">
    <link rel="stylesheet" href="<?php echo Directories::getLocation("tools/css/global/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?php echo Directories::getLocation("tools/css/global/uniform.css") ?>">
    <link rel="stylesheet" href="<?php echo Directories::getLocation("tools/css/global/animate.css") ?>">
    <link rel="stylesheet" href="<?php echo Directories::getLocation("tools/css/global/responsive.css") ?>">
    <title>Administrators Login</title>
    <style>
        body {
            background-color: rgb(213, 215, 212);
        }
    </style>
</head>

<body>
    <script src="<?php echo Directories::getLocation("tools/js/global/jquery.js") ?>"></script>


    <?php require_once(Directories::getLocation("App/views/admin/page/login.php")); ?>
    <script src="<?php echo Directories::getLocation("tools/js/global/bootstrap.min.js") ?>"></script>
    <script src="<?php echo Directories::getLocation("tools/js/validator/subscription.js") ?>"></script>
    <script src="<?php echo Directories::getLocation("tools/js/pages/admin.js") ?>"></script>

</body>

</html>