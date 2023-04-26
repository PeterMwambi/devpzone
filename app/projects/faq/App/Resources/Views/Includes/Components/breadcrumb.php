<?php

namespace Resources\Views\Includes;

use Models\Components\BreadCrumbComponent;


class BreadCrumb extends BreadCrumbComponent
{

    private static $instance;

    public static function GetInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new BreadCrumbComponent;
        }
        return self::$instance;
    }


    public static function Display()
    {
        return self::GetInstance()->GetComponent();
    }
}