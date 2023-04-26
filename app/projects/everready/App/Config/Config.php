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

    public static function getForm($key)
    {
        self::$constants = FORMS;
        if (!array_key_exists($key, self::$constants)) {
            return false;
        }
        return self::$constants[$key];
    }

    public static function getIcon($key)
    {
        self::$constants = ICONS;
        if (!array_key_exists($key, self::$constants)) {
            return false;
        }
        return self::$constants[$key];
    }
    public static function getLinks($key)
    {
        self::$constants = LINKS;
        if (!array_key_exists($key, self::$constants)) {
            return false;
        }
        return self::$constants[$key];
    }
}
