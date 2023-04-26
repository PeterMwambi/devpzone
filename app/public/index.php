<?php
use Models\Core\App\Routes\Shell\Api as RouteAPI;


//Call the autoload function
require_once("autoload.php");


//Run the route api service
RouteAPI::runService();

?>