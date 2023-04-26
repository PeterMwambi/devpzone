<?php
define("PATHNAME", true);
require "../../../app/config/core.php";

$request = Sanitize::__string(Input::grab("request"));

switch ($request) {
    case 'home':
        $pageTitle = "Home";
        break;
    case 'about':
        $pageTitle = "About Us";
        break;
    case 'products':
        $pageTitle = "Products";
        break;
    case 'cart':
        $pageTitle = "My Cart";
        break;
    case 'register':
        $pageTitle = "Register";
        break;
    case 'login':
        $pageTitle = "Login";
        break;
}

$reference = Sanitize::__string(Input::grab("reference"));

$categoryId = Sanitize::__string(Input::grab("identifier"));

$databaseHandler = new DatabaseHandler;

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
    <title><?php echo $pageTitle; ?></title>
</head>

<body>

    <script src="<?php echo Directories::getLocation("tools/js/global/jquery.js") ?>"></script>

    <?php
    require_once(Directories::getLocation("app/views/admin/includes/modals.php"));
    $pages = array(
        "page" => array("home", "about", "products", "cart", "login", "register", "viewItem"),
        "links" => array(
            "home" => Directories::getLocation("App/views/client/pages/home.php"),
            "about" => Directories::getLocation("App/views/client/pages/about.php"),
            "products" => Directories::getLocation("App/views/client/pages/products.php"),
            "cart" => Directories::getLocation("App/views/client/pages/cart.php"),
            "login" => Directories::getLocation("App/Views/client/pages/login.php"),
            "register" => Directories::getLocation("App/Views/client/pages/register.php"),
            "viewItem" => Directories::getLocation("App/Views/client/pages/viewItem.php")
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
                require_once(Directories::getLocation("App/Views/Client/Includes/navbar.php"));
                require_once(Directories::getLocation("App/Views/Client/Includes/Header/header.php"));
                require_once($pages["links"][trim($request)]);
            } else {
                require_once(Directories::getLocation("App/Views/Client/Includes/navbar.php"));
                require_once(Directories::getLocation("App/Views/Client/Includes/Header/header.php"));
                require_once($pages["links"][trim($request)]);
            }
            break;
    }
    ?>


    <?php require_once(Directories::getLocation("App/Views/Client/Includes/footer.php")); ?>

    <script src="<?php echo Directories::getLocation("tools/js/global/bootstrap.min.js") ?>"></script>
    <script src="<?php echo Directories::getLocation("tools/js/global/uniform.js"); ?>"></script>
    <script src="<?php echo Directories::getLocation("tools/js/pages/client.js"); ?>"></script>
</body>

</html>