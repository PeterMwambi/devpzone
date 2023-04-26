<?php

/**
 * @author Peter Mwambi
 * @abstract Auto load scripts
 * Please reconfigure the autoload scripts to 
 * use different handlers
 */

require_once  "../Models/Autoload.php";

$autoload = new Autoload;

$autoload->setPathSeparator(array("../", "../../", "./", "../../../"));

$autoload->setDirectories(array("Models", "Controller", "Config"));

$autoload->setRootPath("App/");

$autoload->autoload();
