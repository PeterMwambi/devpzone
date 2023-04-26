<?php

define("PATHNAME", TRUE);
require_once("../../App/Config/Core.php");

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
    <link rel="stylesheet" href="<?php echo Directories::getLocation("tools/css/page/style.css") ?>">
    <title>Driveways Taxi Service -Login</title>
</head>

<body class="text-dark">

    <script src="<?php echo Directories::getLocation("tools/js/global/jquery.js") ?>"></script>
    <div class="homeBackground overlay">
        <div class="container">
            <div class="d-flex justify-content-center mt-5">
                <?php require_once(Directories::getLocation("app/views/includes/forms.php")) ?>
            </div>
        </div>
    </div>


    <script src="<?php echo Directories::getLocation("tools/js/global/bootstrap.min.js") ?>"></script>
    <script src="<?php echo Directories::getLocation("tools/js/validator/subscription.js") ?>"></script>
    <script src="<?php echo Directories::getLocation("tools/js/pages/page.js"); ?>"></script>
</body>

</html>