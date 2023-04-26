<?php


define("PATHNAME", TRUE);
require_once("../../App/Config/Core.php");

if (!Session::exists("AUTHENTICATED_CLIENT")) {
    die(header("location:" . Directories::getLocation("accounts/logout.php")));
}
function getOptions($table, $fields = array())
{
    $databaseHandler = new DatabaseHandler;
    $databaseHandler->setTable($table);
    $databaseHandler->setField($fields);
    $databaseHandler->queryDb("select", 0);
    $results = $databaseHandler->getOutput();
    return $results;
}
$places = getOptions("areas", array("name"));
$placeOptions = [];
foreach ($places as $place) {
    array_push($placeOptions, $place);
}
$request = Sanitize::__string(Input::grab("request"));

$viewTicket = !empty($request) && $request === "viewTicket";

$paymentOptions = !empty($request) && $request === "paymentOptions";

$viewReceipt = !empty($request) && $request === "viewReceipt";
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
    <?php $page = "client"; ?>
    <script src="<?php echo Directories::getLocation("tools/js/global/jquery.js") ?>"></script>
    <div class="homeBackground overlay">
        <?php require_once(Directories::getLocation("app/views/includes/navbar.php")); ?>

        <div class="container">
            <div class="mt-sm bg-translucent-white p-3 mb-5 rounded">
                <div class="d-flex justify-content-center mt-5">
                    <h1 class="text-nowrap">Howdy <?php echo Session::getValue("clientUsername"); ?></h1>
                </div>
                <div class="d-flex justify-content-center">
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
                <?php if (!empty($viewReceipt)) { ?>
                    <?php require_once(Directories::getLocation("app/views/includes/receipt.php")); ?>
                    <?php } else {
                    if (!empty($paymentOptions)) { ?>
                        <?php require_once(Directories::getLocation("app/views/includes/payments.php")); ?>
                    <?php } else { ?>
                        <?php if ((Session::exists("REQUEST_STATUS") && Session::getValue("REQUEST_STATUS") === "open") || !empty($viewTicket)) { ?>
                            <?php require_once(Directories::getLocation("app/views/includes/ticket.php")); ?>
                        <?php } else { ?>
                            <?php if (Session::exists("PROCEED_REQUEST") && Session::getValue("PROCEED_REQUEST") === true) { ?>
                                <?php require_once(Directories::getLocation("app/views/includes/confirmlocation.php")); ?>
                            <?php } else { ?>
                                <?php require_once(Directories::getLocation("app/views/includes/signlocation.php")); ?>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>


    <script src="<?php echo Directories::getLocation("tools/js/global/bootstrap.min.js") ?>"></script>
    <script src="<?php echo Directories::getLocation("tools/js/validator/subscription.js") ?>"></script>
    <script src="<?php echo Directories::getLocation("tools/js/pages/page.js"); ?>"></script>
</body>

</html>