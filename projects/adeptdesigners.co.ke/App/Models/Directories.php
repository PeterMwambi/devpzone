<?php

/**
 * @author Peter Mwambi
 * @date Tue Jan 18 2022 09:14:17 GMT+0300 (East Africa Time)
 * @content Output stream
 * 
 * REQUIRES REMODELLING
 */

class Directories
{

    private static $directoryList = array("/", "./", "../", "../../", "../../../", "../../../../");

    private static $pageRequestList = array(
        "LOGIN_PAGE" => "login",
        "ADD_CATEGORY" => "add-category",
        "ADD_SUB_CATEGORY" => "add-sub-category",
        "ADD_ADMINISTRATOR" => "add-administrator",
        "ADD_PRODUCT" => "add-product",
        "REPLY_MESSAGE" => "reply-message",
        "UPDATE_CATEGORY" => "update-category",
        "UPDATE_SUB_CATEGORY" => "update-sub-category",
        "UPDATE_PRODUCT" => "update-product",
        "VIEW_MESSAGES" => "view-message",
        "LANDING_PAGE" => "home",
        "VIEW_COMMENTS" => "view-comments",
        "VIEW_PRODUCTS" => "view-products",
        "VIEW_CATEGORY" => "view-category",
        "VIEW_SUB_CATEGORY" => "view-sub-category",
        "VIEW_SUBSCRIPTIONS" => "view-subscriptions",
        "VIEW_COMMENTS" => "view-comments",
        "VIEW_ADMINISTRATORS" => "view-administrator",
        "UPDATE_PROFILE" => "update-profile",
    );


    private static function setPath(int $pathIdentifier)
    {
        if (isset($pathIdentifier)) {
            return self::$directoryList[$pathIdentifier];
        }
        return false;
    }

    private static function generatePath(string $pathPrefix)
    {
        if (!empty(self::$directoryList)) {
            $directories = self::$directoryList;
            for ($x = 0; $x <= count($directories); $x++) {
                if (file_exists(self::setPath($x) . $pathPrefix)) {
                    return (self::setPath($x) . $pathPrefix);
                    break;
                }
            }
        }
        return false;
    }
    public static function getLocation(string $pathPrefix)
    {
        return self::generatePath($pathPrefix);
    }
}
