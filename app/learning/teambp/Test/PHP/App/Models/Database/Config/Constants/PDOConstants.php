<?php

/**
 * @author Peter Mwambi
 * @content Database Configuration Constants;
 * Contains DSN(Data Source Names) parameters 
 */



////////////////////////////////////////////////////////////////
// NO DIRECT ACCESS
//////////////////////////////////////////////////////////////
defined("ALLOW_CONFIG_CONSTANTS_ACCESS") or exit(throw new Exception("Script Access Not allowed"));


////////////////////////////////////////////////////////////
//PERMITTED SCRIPTS
//1. DBConfig.php
///////////////////////////////////////////////////////////

/**
 * @var string
 * @const DB_HOST\
 * The server name or IP address hosting the database 
 */
define("DB_HOST", "127.0.0.1");

/**
 * @var string
 * @const DB_NAME\
 * The database name
 */

define("DB_NAME", "blog101");

/**
 * @var string
 * @const DB_USERNAME\
 * The database login username
 */

define("DB_USERNAME", "root");

/**
 * @var string 
 * @const DB_PASSWORD\
 * The database login password
 */

define("DB_PASSWORD", "");

/**
 * @var array
 * @const DB_OPTIONS\
 * An array of options to define how 
 * data will be handled in our database
 */

define("DB_OPTIONS", array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

/**
 * @var array
 * @const DSN_NAMES
 * A list of allowed DSN_NAMES 
 */

define("DSN_NAMES", array("host", "dbname", "username", "password", "options"));