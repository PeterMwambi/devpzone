<?php
class Form
{



    private static string $options = '';
    // private $encryptedDataValues = array(
    //     "name" => array("mandatory-security-identifier", "mandatory-security-name", "mandatory-security-passcode", "mandatory-security-passcode-value"),
    //     "value" => $addCategoryEncryption,
    // );

    public static function getClassNames(array $classNames = [])
    {
        if (count($classNames)) {
            $className = "";
            $x = 1;
            foreach ($classNames as $class) {
                $className .= $class;
                if ($x < count($classNames)) {
                    $className .= " ";
                }
                $x++;
            }
            return $className;
        }
    }
    public static function Input(string $type = "", string $name = "", array $classNames = [],  $value = null)
    {
        if (count($classNames)) {
            $className = self::getClassNames($classNames);
            return '<input type="' . $type . '" name="' . $name . '" class="' . $className . '" value="' . $value . '">';
        } else
            return '<input type="' . $type . '" name="' . $name .  '" value="' . $value . '">';
    }

    public static function Label(string $for = "", string $value = "", array $classNames = [])
    {
        if (count($classNames)) {
            $className = self::getClassNames($classNames);
            return '<label for="' . $for . '" class="' . $className . '">' . $value . '</label>';
        } else {
            return '<label for="' . $for . '">' . $value . '</label>';
        }
    }

    public static function Textarea(string $name = "",  array $classNames = [], string $value = "")
    {
        if (count($classNames)) {
            $className = self::getClassNames($classNames);
            return '<textarea name="' . $name . '" class="' . $className . '">' . $value . '</textarea>';
        } else {
            return '<textarea name="' . $name . '">' . $value . '</textarea>';
        }
    }

    private static function selectOptions($options = ["name" => null, "value" => null])
    {
        foreach ($options as $option) {
            if (!is_null($options["name"] && !is_null($options["value"]))) {
                self::$options .=  '<option value="' . $option["value"] . '">' . $option["name"] . '</option>';
                continue;
            }
            self::$options .=  '<option>' . $option . '</option>';
        }
        return self::$options;
    }
    public static function initializeOptions()
    {
        return self::$options = "";
    }
    public static function Select(string $name, array $options = array(), array $classNames = [])
    {
        if (!empty($name)) {
            if (count($classNames)) {
                $className = self::getClassNames($classNames);
                return '<select name="' . $name . '" class="' . $className . '">' . self::selectOptions($options) . '</select>';
            } else {
                return '<select name="' . $name . '">' . self::selectOptions($options) . '</select>';
            }
        }
    }

    public static function file($name, $classNames, $id)
    {
        if (!empty($name)) {
            if (count($classNames)) {
                $className = self::getClassNames($classNames);
                return '<input name="' . $name . '" type="file" class="' . $className . '" id="' . $id . '" onchange="readFile(this)">';
            }
            return '<input name="' . $name . '" type="file" id="' . $id . '">';
        } else {
            throw new Exception("You have not selected any name for the file" . $id);
        }
    }
}
