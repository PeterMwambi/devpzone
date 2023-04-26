<?php

namespace Models\Core\Config;

/**
 * @author Peter Mwambi
 * @time Thu Sep 24 2020 09:56:28 GMT+0300 (East Africa Time)
 * @content session handling
 */

class Session
{
    /**
     * @param string $name the session name
     * @param string $value the session value
     * @return string
     *
     * Returns a string with a session name and session value
     */
    public static function Set($name, $value, $type = "string")
    {
        switch ($type) {
            case 'string':
                return $_SESSION[$name] = $value;
            case 'array':
                return $_SESSION[$name][] = $value;
            default:
                return false;
        }
    }

    /**
     * @param string $name the session name
     * @return bool
     *
     * Checks if a session exists and returns false if session is not found
     */
    public static function Exists($name)
    {
        if (isset($_SESSION[$name])) {
            return true;
        }
        return false;
    }

    /**
     * @param string $name the session name
     * @return mixed
     *
     * Checks if a session exists and returns the session value
     */

    public static function Get($name)
    {
        if (self::Exists($name)) {
            return $_SESSION[$name];
        } else {
            return false;
        }

    }

    /**
     * @param string $name the session name
     * @return bool
     *
     * Checks if a session is set, returns true and unsets the session
     * otherwise returns false if session does not exist
     */
    public static function Destroy($name)
    {
        if (isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
            return true;
        }
        return false;
    }

    public static function Start()
    {
        if (!isset($_SESSION)) {
            return session_start();
        }
    }
}