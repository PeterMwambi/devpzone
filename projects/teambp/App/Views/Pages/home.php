<?php

use Models\Core\App\Utilities\Url;

?>

<!DOCTYPE html>
<html lang="en">
<?php require_once(Url::GetPath("app/views/includes/meta/head.php")); ?>

<body>


    <header class="container-fluid teambp__header p-0">


        <div class="teambp__header-navigation">
            <?php require_once(Url::GetPath("app/views/includes/components/navigation/clientnavigation.php")) ?>
        </div>

        <div class="teambp__header-content">
            <div>
                <h1 class="animate__animated animate__fadeIn teambp__heading">A network of dedicated professionals
                </h1>
            </div>
            <div class="d-flex justify-content-start">
                <p class="col-md-5 teambp__paragraph">We are a team of proficient technical experts, each member
                    specialising on a different area in Information Technology.
                    We are here to provide you full package solutions, to help you meet all your digital needs under one
                    platform.</p>
            </div>
            <div class="d-flex justify-content-start">
                <div>
                    <a class="btn btn-success" href="member-registration">Get Started &raquo;</a>
                </div>
                <div class="mx-3">
                    <a class="btn btn-primary" href="javascript:void(0)">Find out more &raquo;</a>
                </div>
            </div>
        </div>
    </header>



    <?php require_once(Url::GetPath("app/views/includes/meta/scripts.php")); ?>
</body>

</html>