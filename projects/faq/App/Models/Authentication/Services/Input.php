<?php


namespace Models\Authentication\Services;

/**
 * @author Peter Mwambi
 * @time Mon Oct 05 2020 10:23:29 GMT+0300 (East Africa Time)
 * @content Input Controller
 */

class Input
{
    /**
     * @param string type
     * @return bool|void
     * 
     * Checks if the form has been submitted via GET 
     * or POST Method and returns the method of submission
     */
    public static function GetData($type = "post")
    {
        switch ($type) {
            case 'get':
                return (!empty($_GET)) ? true : false;
            case 'post':
                return (!empty($_POST)) ? true : false;
            default:
                return false;
        }
    }

    /**
     * @param string $data
     * @return string
     * 
     * Gets input from post or get data
     */

    public static function Get($data)
    {
        switch ($data) {
            case isset($_POST[$data]):
                return $_POST[$data];
            case isset($_GET[$data]):
                return $_GET[$data];
            case isset($_FILES[$data]["name"]):
                return $_FILES[$data]["name"];
            default:
                return "";
        }
    }
}