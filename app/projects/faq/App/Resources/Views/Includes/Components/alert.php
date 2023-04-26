<?php

namespace Resources\Views\Includes\Components;

use Models\Components\AlertComponent;

class Alert extends AlertComponent
{
    private static $instance;

    public static function GetInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Alert;
        }
        return self::$instance;
    }

    public static function Display($alertName)
    {
        $instance = self::GetInstance();
        $instance->SetName($alertName);
        echo $instance->GetComponent();
    }
} 