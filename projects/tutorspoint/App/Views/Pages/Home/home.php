<?php

use Models\Core\App\Utilities\Url;
use Views\Includes\Components\Classes\Page;

require_once(Url::getPath("app/views/includes/components/renders/navbar.php"));
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once(Url::getPath("app/views/includes/meta/head.php")); ?>

<body>
    <?php runDefaultNavbarSetup(Page::run()->getTitle()); ?>

    <section class="container-fluid mt-md">
        <div class="row">
            <div class="col-md-6 mt-lg">
                <div class="d-flex justify-content-md-center">
                    <div class="mt-md">
                        <h2>Hello, Welcome to tutors point</h2>
                        <p><strong>Where quality education meets excellence</strong></p>
                        <p class="col-md-9">We are your online trainer, mentor, career builder, and learning companion.
                        </p>
                        <p class="col-md-9">We offer certificate and diploma courses in Business studies, and
                            Information
                            technology</p>
                        <div class="d-flex">
                            <a class="btn btn-dark" href="courses">Our courses &raquo;</a>
                            <a class="btn btn-primary ms-3" href="#">Find out more &raquo;</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-lg">
                <img src="<?php echo Url::getReference("resources/assets/images/png/kyc.png"); ?>" class="img-fluid">
            </div>
        </div>
    </section>

    <?php require_once(Url::getPath("app/views/includes/meta/scripts.php")); ?>
</body>

</html>