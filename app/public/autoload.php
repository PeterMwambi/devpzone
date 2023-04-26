<?php

use Models\Core\App\Utilities\Autoloader as Autoload;


if (!file_exists(dirname(__DIR__) . "\models\core\app\utilities\autoloader.php")) {
    die;
}
require_once dirname(__DIR__) . "\models\core\app\utilities\autoloader.php";

Autoload::start();