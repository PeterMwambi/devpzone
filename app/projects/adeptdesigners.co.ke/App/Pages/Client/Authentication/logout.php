<?php
define("PATHNAME", TRUE);
require_once("../../../../app/Config/Core.php");
session_destroy();
//Redirect user to login page
header("location:../../client/?request=login");


// SetCookie