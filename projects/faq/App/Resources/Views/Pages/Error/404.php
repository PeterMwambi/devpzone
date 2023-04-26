<?php

use Models\Authentication\Services\Input;
use Models\Core\Config\Settings;
use Models\Core\Config\Directories as Directories;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $title = "404 | Resource was not found" ?>
    </title>
    <link rel="stylesheet" type="text/css"
        href="<?php echo Directories::GetFilePath("App/Resources/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" type="text/css"
        href="<?php echo Directories::GetFilePath("App/Resources/css/custom/style.css"); ?>">
</head>

<body>


    <div class="container-fluid">
        <div class="faq-error__navigation mx-4 my-4">
            <a href="?page=home&auth=guest">Home</a>
        </div>
    </div>

    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="faq-error__body card col-md-5">
                <div class="card-body p-4">
                    <div class="d-md-flex justify-content-center ">
                        <div class="col-md-11 col-12">
                            <div class="faq-error__heading mt-4 ">
                                <h3>
                                    Oops!
                                    <?php echo $title; ?>
                                </h3>
                            </div>
                            <div class="faq-error__message">
                                <emp>We couldn't find your request</emp>
                            </div>
                        </div>
                    </div>
                    <div class="faq-error__options d-flex justify-content-center">
                        <div class="col-md-11 col-12">
                            <div class="faq-error__options-heading">
                                <h5>Don't worry</h5>
                            </div>
                            <div class="faq-error__options-heading">
                                <emp>Here are a few things you can do</emp>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </ <?php require_once(Directories::GetFilePath("app/resources/views/pages/error/404.php")) ?> </body>

</html>