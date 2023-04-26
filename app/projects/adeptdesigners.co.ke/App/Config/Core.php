<?php

/**
 * @author Peter Mwambi
 * @content Autoload functions
 * @date Sat Sep 12 2020 20:16:50 GMT+0300 (East Africa Time)
 * @updated Mon Feb 15 2021 23:14:13 GMT+0300 (East Africa Time)
 * 
 * Class autoloading function and session_init
 */
defined("PATHNAME") === TRUE or exit(header("location:../../errors/"));
/**
 * Start new session
 */
if (!session_id()) {
    session_start();
}
/**
 * @param string the required file
 * @return mixed path to file
 * 
 */
spl_autoload_register(function ($class) {
    $path_separator = array("../", "../../", "../../../", "../../../../");
    $root = "App/";
    $directorys = array("Models", "Config", "HTML");
    foreach ($path_separator as $path) {
        foreach ($directorys as $directory) {
            if (file_exists($path . $root . $directory . "/" . $class . ".php")) {
                require($path . $root . $directory . "/" . $class . ".php");
            }
        }
    }
});


$directories = array("../", "../../", "../../../", "../../../../");


/**
 * Set default timezone
 */
date_default_timezone_set("Africa/Nairobi");

error_reporting(1);
