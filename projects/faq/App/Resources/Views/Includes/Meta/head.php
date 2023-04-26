<?php

use Models\Authentication\Services\Input;
use Models\Core\Config\Settings;
use Models\Core\Config\Directories as Directories;
?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php 
        echo Settings::GetPageTitle(Input::Get("auth"), Input::Get("page")); 
        ?>
    </title>
    <link rel="stylesheet" type="text/css"
        href="<?php echo Directories::GetFilePath("App/Resources/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" type="text/css"
        href="<?php echo Directories::GetFilePath("App/Resources/css/custom/style.css"); ?>">
</head>