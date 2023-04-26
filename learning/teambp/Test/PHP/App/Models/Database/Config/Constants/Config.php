<?php

namespace App\Models\Database\Config\Constants;

use ErrorException;
use Exception;


class Config
{

    private $constants = array();


    private static $instance = null;


    public static function GetInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Config;
            return self::$instance;
        }
    }


    /**
     * @param string $name - The Constant name
     * @return bool
     */
    private function SaveConstant(string $name, string $alias)
    {
        if (!empty($name) && !empty($alias)) {
            $constants = array($alias => $name);
            array_push($this->constants, $constants);
            return true;
        }
        throw new Exception("A Constant name is required");
    }


    public function GetAllConstants()
    {
        if (count($this->constants)) {
            $constants = "";
            foreach ($this->constants as $constantKey => $constantValue) {
                foreach ($constantValue as $constantKey => $constantValue) {
                    $constants .= $constantKey . " : " . $constantValue .= "<br>";
                }
            }
            return $constants;
        }
        throw new Exception("Constants repository is empty");
    }

    public function GetConstantByAlias(string $alias)
    {
        if (count($this->constants)) {
            $constant = "";
            foreach ($this->constants as $constantValue) {
                if (array_key_exists($alias, $constantValue)) {
                    $constant .= $constantValue[$alias];
                    return $constant;
                }
                throw new Exception("Invalid Constant Alias");
            }
        }
    }









    public function SetConstant(string $name, mixed $value, string $alias)
    {
        if (!empty($name) && preg_match("/^[A-Z]*/", $name)) {
            $name = strtoupper($name);
            if (!empty($alias) && preg_match("/^[A-Z]*/", $alias)) {
                if ($this->SaveConstant($name, $alias)) {
                    define($name, $value);
                    return true;
                }
                throw new Exception("Constant name was not saved");
            }
        }
        throw new Exception("Constant name is empty or contains invalid characters");
    }

}