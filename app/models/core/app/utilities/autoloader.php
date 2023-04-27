<?php

namespace Models\Core\App\Utilities;


class Autoloader
{

    private static $instance = null;

    public static function start()
    {
        if (!isset(self::$instance)) :
            self::$instance = new Autoloader;
        endif;
        return self::$instance;
    }

    public function __construct()
    {
        spl_autoload_register(
            function ($className) {
                $root = str_replace("\\", "//", str_replace("models/core/app/utilities", "", dirname(__FILE__)));
                $file = strtolower($root . str_replace("\\", "/", $className) . ".php");
                if (file_exists($file)) {
                    include_once $file;
                } else {
                    throw new \RuntimeException(sprintf("%s file was not found", $file));
                }
            }
        );
        date_default_timezone_set("Africa/Nairobi");
    }
}
