<?php

namespace Models\Core\Config;

use Exception;


if (file_exists(str_replace("Models\Core\Config", "", dirname(__FILE__)) . "models\core\settings\config.php")) {
    require_once(str_replace("Models\Core\Config", "", dirname(__FILE__)) . "models\core\settings\config.php");
}
class Settings
{

    /**
     * @var null $constants
     * 
     * Stores the db constants as an array
     */
    private static $constants = null;


    private static function GetDBSettings()
    {
        return DB_SETTINGS;
    }

    public static function GetDBHost()
    {
        return self::GetDBSetting("host");
    }

    public static function GetDBUsername()
    {
        return self::GetDBSetting("username");
    }

    public static function GetDBpassword()
    {
        return self::GetDBSetting("password");
    }

    public static function GetDBName()
    {
        return self::GetDBSetting("name");
    }

    public static function GetDBOptions()
    {
        return self::GetDBSetting("options");
    }
    /**
     * @param string $key required
     * @return mixed
     * 
     * Checks if the key passed as a parameter to the function exists
     * if the specified key does not exist, it returns a user level error
     * else it returns the database configuration data as a string
     */
    public static function GetDBSetting($key)
    {
        self::$constants = self::GetDBSettings();
        if (array_key_exists($key, self::$constants)) {
            return self::$constants[$key];
        }
        throw new Exception("Access denied:Invalid database key");
    }


    public static function GetPageSettings()
    {
        return PAGE_SETTINGS;
    }

    /**
     * Summary of GetPageSetting
     * @param string $key
     * @throws Exception 
     * @return mixed
     */
    public static function GetPageSetting(string $key)
    {
        self::$constants = self::GetPageSettings();
        if (array_key_exists($key, self::$constants)) {
            return self::$constants[$key];
        }
        throw new Exception("Access denied: Invalid page auth key");
    }
    /**
     * Returns the page title and heading of loaded page
     * @param string $key auth key
     * @param mixed $page requested page
     * @return string $page title;
     */
    public static function GetPageTitle(string $key, string $page)
    {
        $constants = self::GetPageSetting($key);
        if (self::CheckPageExists($key, $page)) {
            $pageConfigItems = $constants[$page];
            return $pageConfigItems["title"];
        }
        throw new Exception("Access denied: Invalid page name");
    }

    private static function CheckPageExists(string $key, string $page)
    {
        $constants = self::GetPageSetting($key);
        if (array_key_exists($page, $constants)) {
            return true;
        }
        throw new Exception("Access denied: Invalid page");
    }


    public static function GetPage(string $key, string $page)
    {
        $constants = self::GetPageSetting($key);
        if (self::CheckPageExists($key, $page)) {
            $pageConfigItems = $constants[$page];
            require_once($pageConfigItems["page"]);
            return;
        }
        throw new Exception("Access denied: Page location was not found");
    }

    public static function CheckPageParams($key, $page)
    {

    }


}