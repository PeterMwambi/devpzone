<?php

use Models\Core\App\Utilities\Autoloader as Autoload;


if (!file_exists(str_replace("\\", "/", dirname(__DIR__)) . "/models/core/app/utilities/autoloader.php")) {
    die;
}
require_once str_replace("\\", "/", dirname(__DIR__)) . "/models/core/app/utilities/autoloader.php";

Autoload::start();
