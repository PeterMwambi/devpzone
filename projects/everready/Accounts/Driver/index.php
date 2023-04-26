<?php
define("PATHNAME", TRUE);
require_once("../../App/Config/Core.php");

if (!Session::exists("AUTHENTICATED_DRIVER")) {
    die(header("location:" . Directories::getLocation("accounts/logout.php")));
}

$services = new Services;

$hasVehicle = $services->checkDriverStatus("hasVehicle");
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

<body>
    <?php $page = "driver"; ?>

    <script src="<?php echo Directories::getLocation("tools/js/global/jquery.js") ?>"></script>



    <div class="homeBackground overlay">
        <?php require_once(Directories::getLocation("app/views/includes/navbar.php")); ?>
        <div class="container-fluid p-0">
            <div class="d-flex justify-content-center mt-5">
                <?php if ($hasVehicle === false) { ?>
                    <div class="w-100 mt-1">
                        <div class="alert alert-info alert-dismissible fade show">
                            <div class="d-flex justify-content-center">
                                <p class="text-left text-dark mt-3">You have not yet registered your vehicle.
                                    You can still maintain your account but you will not be able to receive any contracts.
                                    Click here and <a href="<?php echo Directories::getLocation("accounts/driver/") . "?action=register&query=vehicle" ?>" class="btn-sm btn-info">Register Your Ride</a> to get started</p>
                                <button type="button" class="close mt-3" data-dismiss="alert">&times;</button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="container">
            <div class="mt-sm bg-translucent-white p-4 rounded mb-5">
                <div class="d-flex justify-content-center">
                    <h1 class="text-nowrap">Howdy <?php echo Session::getValue("driverUsername"); ?></h1>
                </div>
                <div class="d-flex justify-content-center">
                    <span>Today is <?php echo date("l, d M Y") ?></span>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <div class="alert col-md-5 col-12 alert-danger form-alert d-none">
                        <div class="d-flex justify-content-center">
                            <h4 class="text-center form-alert-heading"></h4>
                        </div>
                        <div class="d-flex justify-content-center">
                            <span class="form-alert-text text-center"></span>
                        </div>
                        <div class="d-flex justify-content-center mt-2">
                            <?php for ($x = 0; $x <= 4; $x++) { ?>
                                <span class="spinner-grow spinner-grow-sm mr-2 d-none"></span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php
                $action = Sanitize::__string(Input::grab("action"));

                switch ($action) {
                    case 'home':
                        require_once(Directories::getLocation("App/views/Pages/Driver/home.php"));
                        break;
                    case 'register':
                        require_once(Directories::getLocation("App/views/pages/Driver/register.php"));
                        break;
                    case 'contracts':
                        require_once(Directories::getLocation("App/views/pages/Driver/contracts.php"));
                        break;
                    case 'profile':
                        require_once(Directories::getLocation("App/views/pages/Driver/profile.php"));
                        break;
                    case 'balance':
                        require_once(Directories::getLocation("App/views/pages/Driver/balance.php"));
                        break;
                    case 'vehicle':
                        require_once(Directories::getLocation("App/views/pages/Driver/vehicle.php"));
                        break;
                    case 'payments':
                        require_once(Directories::getLocation("App/views/pages/Driver/payments.php"));
                        break;
                    default:
                        require_once(Directories::getLocation("App/views/Pages/Driver/home.php"));
                        break;
                }
                ?>
            </div>
        </div>
    </div>
    <script src="<?php echo Directories::getLocation("tools/js/global/bootstrap.min.js") ?>"></script>
    <script src="<?php echo Directories::getLocation("tools/js/validator/subscription.js") ?>"></script>
    <script src="<?php echo Directories::getLocation("tools/js/pages/page.js"); ?>"></script>
</body>

</html>