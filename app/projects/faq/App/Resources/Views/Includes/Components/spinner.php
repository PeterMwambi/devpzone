<?php

namespace Resources\Views\Includes\Components;

use Models\Components\SpinnerComponent;

class Spinner extends SpinnerComponent
{
    private static $instance;

    public static function GetInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Spinner;
        }
        return self::$instance;
    }

    public static function Display($nameSource, $title = "")
    {
        $instance = self::GetInstance();
        echo $instance->GetComponent($nameSource, $title);
    }
}