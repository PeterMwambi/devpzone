<?php

use Models\Authentication\Services\Input;
use Models\Core\Config\Directories as Directories;


require(str_replace("\Public", "", dirname(__FILE__))) . "\Config\Bootstrap.php";


if(empty(Input::Get("auth")) || empty (Input::Get("page"))){
    require_once(Directories::GetFilePath("app/resources/views/pages/error/404.php"));
    die;
}



require(Directories::GetFilePath("app/resources/views/pages/render.php"));






?>