<?php


define("ALLOW_AUTOLOAD_ACCESS", true);
require_once '../autoload.php';

define ("ALLOW_DBCONFIG_ACCESS", true);

use App\Autoloader as Autoloader;
use App\Models\Blogpost\Blogpost as Blogpost;
use App\Models\Database\Config\Constants\Config as DBConstantsConfig;

Autoloader::start();

$blogPost = new Blogpost;


$DBConstant = DBConstantsConfig::GetInstance();


$DBConstant->SetConstant("CONSTANT", 123, "test");

$DBConstant->SetConstant("ANOTHER_CONSTANT", true, "constant2");