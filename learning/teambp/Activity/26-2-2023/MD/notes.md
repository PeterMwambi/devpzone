# PHP variables

Variables are containers for storing data. Variables are declared using the $ sign.
Examples:
`$name` `$peter` `$num1` `$page`

## Rules for declaring variables

- Variable names cannot start with a number.
- Keywords cannot be used as variable names.
- Variable names are case sensitive.
- Special characters are not allowed in naming variables but you can use an underscore (\_)

```php
<?php
$num1 = 1;
$page = "home";
$state = false;
$array = [];
$float = 0.11;

echo "num1: " . var_dump($num1);
echo "<br>";
echo "page: " . var_dump($page);
echo "<br>";
echo "state: " . var_dump($state);
echo "<br>";
echo "array: " . var_dump($array);
echo "<br>";
echo "float: " . var_dump($float);
// Output
// int(1)
// string(4) "home"
// bool(false)
// array(0) { }
// float(0.11)
?>
```
