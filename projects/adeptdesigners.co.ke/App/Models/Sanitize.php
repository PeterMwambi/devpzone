<?php

/**
 * @author Peter Mwambi
 * @time Sun Nov 22 2020 14:37:18 GMT+0300 (East Africa Time)
 * @content Sanitize library
 */
defined("PATHNAME") or exit(header("location:../../errors/"));

class Sanitize
{

    public static function __string($data)
    {
        $data = filter_var($data, FILTER_SANITIZE_SPECIAL_CHARS);
        return $data;
    }
    public static function __int($data)
    {
        $data = filter_var($data, FILTER_VALIDATE_INT);
        return $data;
    }
    public static function __bool($data)
    {
        $data = filter_var($data, FILTER_VALIDATE_BOOLEAN);
        return $data;
    }
    public static function __email($email)
    {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return $email;
    }
}
