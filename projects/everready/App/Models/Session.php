<?php

/**
 * @author Peter Mwambi
 * @time Thu Sep 24 2020 09:56:28 GMT+0300 (East Africa Time)
 * @content session handling
 */

defined("PATHNAME") or exit(header("location:../../errors/"));

class Session
{
    /**
     * @param string $name the session name
     * @param string $value the session value
     * @return string
     * 
     * Returns a string with a session name and session value
     */
    public static function generate($name, $value, $type = "string")
    {
        switch ($type) {
            case 'string':
                return $_SESSION[$name] = $value;
                break;
            case 'array':
                return $_SESSION[$name][] = $value;
                break;
        }
    }

    /**
     * @param string $name the session name
     * @return bool
     * 
     * Checks if a session exists and returns false if session is not found
     */
    public static function exists($name)
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

    public static function getValue($name)
    {
        if (self::exists($name))
            return $_SESSION[$name];
        else
            return false;
    }

    /**
     * @param string $name the session name
     * @return bool
     * 
     * Checks if a session is set, returns true and unsets the session 
     * otherwise returns false if session does not exist
     */
    public static function destroy($name)
    {
        if (isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
            return true;
        }
        return false;
    }
}
