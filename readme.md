# Devpzone

A simple, lightweight project in php, mysql, html, css, bootstrap, javascript and jquery

## Loading an environment variable from a .env file into the $\_ENV variable and $\_SERVER variable

1. Checks if env file is readable
2. Break file contents into an array ignoring new lines
   and skipping empty lines
3. Find any comments on the file and skip them
4. Get all key value pairs in the .env file as strings
   then store them in variables with keys as variable names
   and values as variable values
5. Trim the variable values to remove any characters before
   and after variable names
6. Check if .env variable exists in $\_SERVER variable
   and $\_ENV variable
7. If not exists set the value of environment variables
   from variable names in both $\_ENV and $\_SERVER

```php
class Dotenv
{
    /**
     * The directory where the .env file is located
     */
    protected $path;

    /**
     * Check if path to .env file is valid path
     * if valid initialize path property
     *
     * @param string
     * @return void
     */
    public function __construct(string $path)
    {
        if (!file_exists($path)) {
            throw new \InvalidArgumentException(sprintf("%s does not exist", $path));
        }
        $this->path = $path;
    }

    /**
     * Set environment variables from .env file
     * @param null
     * @return void
     */
    public function load()
    {
        if (!is_readable($this->path)) {
            throw new \RuntimeException(sprintf("%s file is not readable", $this->path));
        }
        $lines = file($this->path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), "#") === 0) {
                continue;
            }
            list($name, $value) = explode("=", $line, 2);
            $name = trim($name);
            $value = trim($value);
            if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                putenv(sprintf("%s=%s", $name, $value));
                $_ENV[$name] =  $value;
                $_SERVER[$name] = $value;
            }
        }
    }
}
```
