<?php

use Models\Core\App\Utilities\Url;
use Views\Includes\widgets\Classes\Page;

require_once(Url::getPath("app/views/includes/widgets/renders/navbar.php"));
require_once(Url::getPath("app/views/includes/widgets/renders/carousel.php"));
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once(Url::getPath("app/views/includes/meta/head.php")); ?>

<body>
    <header class="container-fluid p-0 bg-header">
        <!-- Primary navbar -->
        <?php runTransparentNavbarSetup(Page::run()->getTitle()); ?>
        <div class="row mx-0 my-3">
            <div class="col-md-6">
                <div class="d-flex justify-content-center ms-3 ms-md-0">
                    <div class="col-md-8 mt-lg">
                        <h2 class="font-berlin">Hi, Welcome to Devpzone</h2>
                        <h4 class="my-3">A Home for Quality Digital Service</h4>
                        <p>We are a team of dedicated technical professionals, Ready to provide you
                            assistance in all your digital needs.</p>
                        <p>We offer software development, graphics design, digital marketing
                            computer networking, cyber security and so much more to help you run your business online in
                            a comfortable and secure way.
                        </p>
                        <p>Click on the button bellow to check out our service catalog or you can chat with us
                            to find out more about what we offer.
                        </p>
                        <div class="d-flex">
                            <a class="btn btn-info" href="services">
                                <img src="<?php echo Url::getReference("resources/assets/images/png/cog.png") ?>"
                                    class="img-fluid small">
                                Our services &raquo;</a>
                            <a class="btn btn-dark ms-3" href="">
                                <img src="<?php echo Url::getReference("resources/assets/images/png/chat.png") ?>"
                                    class="img-fluid small">
                                Chat with us &raquo;</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mt-3 mx-3">
                    <?php runHeaderCarouselSetup() ?>
                </div>
            </div>
        </div>
    </header>

    <?php //runDefaultNavbarSetup(Page::run()->getTitle()); ?>



    <?php require_once(Url::getPath("app/views/includes/meta/scripts.php")); ?>
</body>

</html>