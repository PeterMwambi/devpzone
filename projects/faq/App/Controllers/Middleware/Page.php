<?php


namespace Controllers\Middleware;

use Models\Core\Config\Page as PageConfig;

class Page extends PageConfig
{

    private static $instance;

    private static function GetPageInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new PageConfig;
        }
        return self::$instance;
    }

    public function __construct()
    {
        self::$instance = self::GetPageInstance();
    }

    public static function SetPageTitle($title)
    {
        self::$instance->SetTitle($title);
    }

    public static function GetPageTitle()
    {
        return self::$instance->GetTitle();
    }

    public static function GetPageContents(string $page)
    {
        return self::$instance->GetPage($page);
    }
}