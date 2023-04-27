<?php

namespace Models\Core\App\Env;


/**
 * @author Peter Mwambi
 * @abstract Load an external .env file to project environment variables
 * @date Thu Apr 27 2023 18:40:36 GMT+0300 (East Africa Time)
 */
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
