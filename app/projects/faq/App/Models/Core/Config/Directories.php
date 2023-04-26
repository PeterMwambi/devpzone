<?php
namespace Models\Core\Config;

use Exception;


/**
 * @author Peter Mwambi
 * @date Tue Jan 18 2022 09:14:17 GMT+0300 (East Africa Time)
 * @updated Sat Dec 03 2022 14:47:35 GMT+0300 (East Africa Time)
 * @content Output stream
 */

class Directories
{



    /**
     * Returns a file path or includes a file to script
     * @param string $filePath
     * @param int $requireFlag
     * @return mixed
     */

    protected static function GetRootDir()
    {
        $rootDir = str_replace("Models\Core\Config", "", dirname(__FILE__));
        $rootDir = str_replace("\\", "/", $rootDir);
        return $rootDir;
    }


    public static function GetFilePath(string $filePath)
    {
        $directories = array("../../", "../", "../../../../", "./");
        foreach ($directories as $directory) {
            if (file_exists($directory . $filePath)) {
                return $directory . $filePath;
            }
        }
    }

    public static function IncludeFile(string $filePath)
    {
        if (file_exists(self::GetRootDir() . $filePath)) {
            require self::GetRootDir() . $filePath;
        }
        throw new Exception("File not exist");
    }
}