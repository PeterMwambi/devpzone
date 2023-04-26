<?php

require_once("Constants.php");
class Config
{

    /**
     * @var null $constants
     * 
     * Stores the db constants as an array
     */
    private static $constants = null;

    /**
     * @var null $reference
     * 
     * Stores the db constants as an array
     */
    private $reference = null;
    /**
     * @var null $reference
     * 
     * Stores the db constants as an array
     */
    private static $forms = null;


    private static $instance = null;

    /**
     * @param string $key required
     * @return mixed
     * 
     * Checks if the key passed as a parameter to the function exists
     * if the specified key does not exist, it returns a user level error
     * else it returns the database configuration data as a string
     */
    public static function getConstant($key)
    {
        self::$constants = DBCONSTANTS;
        if (!array_key_exists($key, self::$constants)) {
            return false;
        }
        return self::$constants[$key];
    }

    /**
     * @param string $table_alias 
     * @return string|bool
     * 
     * Returns a database table name when called from an alias. i.e 
     * personal => user_personal_info 
     * bio => users bio info and
     * subscribers => subscription 
     */
    public static function getTable($key)
    {
        self::$constants = TABLES;
        if (!array_key_exists($key, self::$constants)) {
            return false;
        }
        return self::$constants[$key];
    }


    public function __construct()
    {
        // if (!isset(self::$instance)) {
        //     self::$instance = new Config();
        // }
        // return self::$instance;
    }



    public static function getBanner($key)
    {
        self::$constants = [
            "intro" => BANNER,
        ];
        if (!array_key_exists($key, self::$constants)) {
            return false;
        }
        return self::$constants[$key];
    }

    public static function getForm(string $reference, string $cardItem)
    {
        if (!empty($reference) && !empty($cardItem)) {
            self::$forms = FORMS;
            if (!array_key_exists($reference, self::$forms)) {
                return false;
            }
            if (!array_key_exists($cardItem, self::$forms[$reference])) {
                return false;
            }
            return self::$forms[$reference][$cardItem];
        }
        return false;
    }

    public static function getIcon($key)
    {
        self::$constants = ICONS;
        if (!array_key_exists($key, self::$constants)) {
            return false;
        }
        return self::$constants[$key];
    }
}
