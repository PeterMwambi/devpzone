<?php
use Models\Core\App\Utilities\Session;
use Models\Core\App\Utilities\Url;

use Tests\Constants\Loader;

require_once(Url::getPath("app/views/includes/widgets/renders/renders.php"));

Session::start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(Url::GetPath("app/views/includes/meta/head.php")); ?>
    <!-- <link type="text/css" rel="stylesheet" href="<?php // echo Url::getReference("resources/css/custom/style.php") ?>"> -->
</head>

<body>

    <!-- Navbar minimalist -->
    <nav class="navbar navbar-expand-sm navbar-light shadow-sm">
        <a class="navbar-brand mt-1 mx-3" href="#"><img
                src="<?php echo Url::getReference("resources/assets/icons/devpzonelogo2.0.png") ?>"
                class="img-fluid devpzone__logo"></a>
        <button class="navbar-toggler d-lg-none me-3" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
            aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ms-auto my-2 my-lg-0">
                <li class="nav-item mx-3">
                    <a class="nav-link mt-3 mt-md-0" href="#">
                        <img src="<?php echo Url::getReference("resources/assets/images/png/user1.png"); ?>"
                            class="img-fluid small">
                        Hi Peter
                    </a>
                </li>
                <li class="mx-3">
                    <a class="nav-link my-2 my-md-0" href="javascript:void(0)" data-bs-toggle="offcanvas"
                        data-bs-target="#Id1" aria-controls="Id1">
                        <img src="<?php echo Url::getReference("resources/assets/images/png/menu.png") ?>"
                            class="img-fluid small canvas-toggler ">
                        Options
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Nav bar minimalist with off canvas -->
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="Id1"
        aria-labelledby="Enable both scrolling & backdrop">
        <div class="offcanvas-header">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo Url::getReference("resources/assets/icons/devpzonelogo.png") ?>"
                        class="img-fluid large">
                </div>
                <div class="col-md-8">
                    <div class="d-flex justify-content-end">
                        <h5 class="offcanvas-title" id="Enable both scrolling & backdrop">Profile options</h5>
                    </div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <p>Try scrolling the rest of the page to see this option in action.</p>
        </div>
    </div>





    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="First slide"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="<?php echo Url::getReference("resources/assets/images/png/edited/png/header-image-1.png") ?>"
                    class="w-100 d-block" alt="First slide">

            </div>
            <div class="carousel-item">
                <img src="<?php echo Url::getReference("resources/assets/images/png/edited/png/web-design.png") ?>"
                    class="w-100 d-block" alt="Second slide">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <?php require_once(Url::GetPath("app/views/includes/meta/scripts.php")); ?>

</body>

</html>