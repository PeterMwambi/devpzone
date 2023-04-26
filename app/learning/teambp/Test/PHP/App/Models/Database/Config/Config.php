<?php

namespace App\Models\Database\Config;

use App\Models\Database\Config\Constants\Config;
use Exception;

////////////////////////////////////////////////////////////////
// NO DIRECT ACCESS
// Deny Access to all script except the scripts 
// that have been authenticated 
//////////////////////////////////////////////////////////////

defined("ALLOW_DBCONFIG_ACCESS") or exit(throw new Exception("Script Access Not allowed"));


////////////////////////////////////////////////////////////
//PERMITTED SCRIPTS
//1. 
///////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////
//PERMIT DATABASE CONFIGURATION CONSTANTS FILE
////////////////////////////////////////////////////////////


define("ALLOW_CONFIG_CONSTANTS_ACCESS", true);
/**
 * Get DBConstants file
 * 
 * Calls in the connection constants
 * Connection constants are defined as constants
 */
require("DBConstants.php");

/**
 * @author Peter Mwambi
 * @content Database Configuration Class\
 * Retreives Database configuration constants
 */

class DBConfig
{
    /**
     * @param string $dsnparam The data source name
     * allowed dsnparams
     * 
     */
    public static function get(string $dsnparam)
    {
        !in_array($dsnparam, DSN_NAMES) ?? throw new Exception("DSN name passed is invalid");
        switch ($dsnparam) {
            case 'host':
                return DB_HOST;
            case 'dbname':
                return DB_NAME;
            case 'username':
                return DB_USERNAME;
            case 'password':
                return DB_PASSWORD;
            case 'options':
                return DB_OPTIONS;
            default:
                throw new Exception("DSN name is required");
        }

    }
}