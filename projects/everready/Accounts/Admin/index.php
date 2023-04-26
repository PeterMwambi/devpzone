<?php

define("PATHNAME", TRUE);
require_once("../../App/Config/Core.php");

if (!Session::exists("AUTHENTICATED_ADMINISTRATOR")) {
    die(header("location:" . Directories::getLocation("accounts/logout.php")));
}
$action = Sanitize::__string(Input::grab("action"));

?>



<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

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

<body>
    <?php $page = "admin"; ?>
    <script src="<?php echo Directories::getLocation("tools/js/global/jquery.js") ?>"></script>
    <div class="homeBackground overlay">
        <?php require_once(Directories::getLocation("app/views/includes/navbar.php")); ?>

        <?php
        switch ($action) {
            case 'view':
                require_once(Directories::getLocation("app/views/pages/admin/view.php"));
                break;
            case 'register':
                require_once(Directories::getLocation("app/views/pages/admin/register.php"));
                break;
            case 'delete':
                require_once(Directories::getLocation("app/views/pages/admin/delete.php"));
                break;
            case 'home':
                require_once(Directories::getLocation("app/views/pages/admin/home.php"));
                break;
            default:
                require_once(Directories::getLocation("app/views/pages/admin/home.php"));
                break;
        }

        ?>
    </div>


    <script src="<?php echo Directories::getLocation("tools/js/global/bootstrap.min.js") ?>"></script>
    <script src="<?php echo Directories::getLocation("tools/js/validator/subscription.js") ?>"></script>
    <script src="<?php echo Directories::getLocation("tools/js/pages/page.js"); ?>"></script>
</body>

</html>