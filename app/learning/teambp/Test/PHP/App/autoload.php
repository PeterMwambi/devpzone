<?php

namespace App;

use Exception;

////////////////////////////////////////////////////////////////
// NO DIRECT ACCESS
//////////////////////////////////////////////////////////////

defined("ALLOW_AUTOLOAD_ACCESS") or exit(throw new Exception("Script Access Not allowed"));

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
                $className = str_replace("\\", "/", $className);
                $dirName = str_replace("\App", "", dirname(__FILE__));
                $fileURI = str_replace("\\", "/", $dirName) . "/" . $className . ".php"; //Returns a parent directory path 
                include_once $fileURI;
            }
        )
            ;
    }

}