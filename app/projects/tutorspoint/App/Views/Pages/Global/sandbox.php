<?php


use Models\Core\App\Database\Queries\Read\Admin;
use Models\Core\App\Database\Queries\Read\Student;
use Models\Core\App\Database\Queries\Read\Tutor;
use Models\Core\App\Utilities\Url;

require_once(Url::getPath("app/views/includes/components/renders/renders.php"));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(Url::GetPath("app/views/includes/meta/head.php")); ?>
</head>

<body>


    <div class="alert alert-info" role="alert">
        <div class="d-flex justify-content-center">

        </div>
        <?php
        print_r(Admin::run()->getClassesFullInfo());
        ?>
    </div>
    </div>





    <?php require_once(Url::GetPath("app/views/includes/meta/scripts.php")); ?>

</body>

</html>