<?php

namespace App\Database\PDO\Query;

use Exception;
use PDO;

////////////////////////////////////////////////////////////////
// NO DIRECT ACCESS
//////////////////////////////////////////////////////////////

defined("ALLOW_PDO_MYSQL_CONNECT_ACCESS") || exit(throw new Exception("No Direct access to pdo execute callback"));


////////////////////////////////////////////////////////////
//PERMITTED SCRIPTS
//
///////////////////////////////////////////////////////////

define("ALLOW_DBCONFIG_ACCESS", true);


/**
 * @author Peter Mwambi
 * @content PDO Connector Class
 * 
 * Connect to Databases mysql, postgresql,  
 */
class Connect
{

    public function __construct()
    {


    }

}