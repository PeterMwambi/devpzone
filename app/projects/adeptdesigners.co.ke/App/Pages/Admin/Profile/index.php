<?php
define("PATHNAME", true);
require "../../../../app/config/core.php";
require_once(Directories::getLocation("authentication/security.php"));

$request = Sanitize::__string(Input::grab("request"));

$reference = Sanitize::__string(Input::grab("reference"));


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
    <link rel="stylesheet" href="<?php echo Directories::getLocation("tools/css/admin/styles.css") ?>">
    <title>Administrators Dashboard</title>
</head>

<body>

    <script src="<?php echo Directories::getLocation("tools/js/global/jquery.js") ?>"></script>

    <?php
    require_once(Directories::getLocation("app/views/admin/includes/modals.php"));
    $pages = array(
        "page" => array("view", "add", "update", "item", "home"),
        "links" => array(
            "item" => Directories::getLocation("App/views/admin/page/item.php"),
            "view" => Directories::getLocation("App/views/admin/page/view.php"),
            "add" => Directories::getLocation("App/views/admin/page/forms.php"),
            "update" => Directories::getLocation("App/views/admin/page/forms.php"),
            "home" => Directories::getLocation("App/views/admin/page/home.php"),
        ),


    );
    if (!in_array($request, $pages["page"])) {
        die("Bad Gateway");
    }

    switch ($reference) {
        case $reference:
            $table = Config::getTable($reference);
            break;
    }

    ?>


    <?php
    switch ($request) {
        case $request:
            if (trim($request) === "home") {
                require_once(Directories::getLocation("app/views/admin/includes/navbar.php"));
                require_once(Directories::getLocation("app/views/admin/includes/sidenavbar.php"));
                require_once(Directories::getLocation("app/views/admin/includes/HomeBanner.php"));
                require_once($pages["links"][trim($request)]);
            } else {
                require_once(Directories::getLocation("app/views/admin/includes/navbar.php"));
                require_once(Directories::getLocation("app/views/admin/includes/sidenavbar.php"));
                require_once($pages["links"][trim($request)]);
            }
            break;
    }
    ?>
    <?php require_once(Directories::getLocation("app/views/admin/includes/footer.php")); ?>

    <script src="<?php echo Directories::getLocation("tools/js/global/bootstrap.min.js") ?>"></script>
    <script src="<?php echo Directories::getLocation("tools/js/pages/admin.js"); ?>"></script>
</body>

</html>