<?php

use Models\Auth\Input;
use Models\Core\App\Utilities\Session;
use Models\Core\App\Utilities\Url;
use Views\Includes\Components\Classes\Page;

Session::start();

require_once(Url::getPath("app/views/includes/components/renders/navbar.php"));
require_once(Url::getPath("app/views/includes/components/renders/page.php"));


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(Url::getPath("app/views/includes/meta/head.php")); ?>

</head>

<body>
    <?php
    runStudentNavbarSetUp(Page::run()->getTitle());
    ?>

    <section class="container-fluid mt-md">

        <?php if (!getStudentClasses()) { ?>
            <div class="d-flex justify-content-center">
                <div class="mt-md">
                    <h2>Oops! It seems you have not been enrolled into any classes</h2>

                    <h4><strong>Dont panic!</strong></h4>
                    <p>Here is a few things you can do</p>
                    <div class="d-flex">
                        <a class="btn btn-primary me-3" href="student-home">Go to home page</a>
                        <a class="btn btn-dark me-3" href="courses">View courses</a>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <?php if (Input::get("clid")) { ?>
                <?php require_once(Url::getPath("app/views/includes/containers/student/classroom.php")) ?>
            <?php } else { ?>
                <?php require_once(Url::getPath("app/views/includes/containers/student/classes.php")) ?>
            <?php } ?>
        <?php } ?>
    </section>




    <?php require_once(Url::getPath("app/views/includes/meta/scripts.php")); ?>


</body>

</html>