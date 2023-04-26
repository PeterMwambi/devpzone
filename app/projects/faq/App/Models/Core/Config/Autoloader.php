<?php

namespace Models\Core\Config;


class Autoloader
{

    private static $instance = null;

    public static function start()
    {
        if (!isset(self::$instance)):
            self::$instance = new Autoloader;
        endif;
        return self::$instance;
    }

    public function __construct()
    {
        spl_autoload_register(
            function ($className) {
                $rootDir = str_replace("Models\Core\Config", "", dirname(__FILE__));
                $fileURI = $rootDir . $className . ".php";
                include_once $fileURI;
            }
        );
    }

}