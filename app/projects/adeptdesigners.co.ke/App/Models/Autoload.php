<?php

class Autoload
{

    private $pathSeparator = array();

    private $root = "";

    private $directories = array();

    private $file = "";

    public function setPathSeparator(array $pathSeparator)
    {
        if (count($pathSeparator)) {
            $this->pathSeparator = $pathSeparator;
        }
        $this->pathSeparator = array();
    }

    private function getPathSeparator()
    {
        if (count($this->pathSeparator)) {
            return $this->pathSeparator;
        }
        throw new Exception("Path separator array has not been set");
        return false;
    }


    public function setRootPath(string $root)
    {
        if (!empty($root)) {
            $this->root = $root;
        }
        $this->root = "";
    }

    private function getRootPath()
    {
        if (!empty($this->root)) {
            return $this->root;
        }
        throw new Exception("Root path has not been Initialized");
        return false;
    }

    public function setDirectories(array $directories)
    {
        if (count($directories)) {
            $this->directories = $directories;
        }
        $this->directories = array();
    }

    private function getDirectories()
    {
        if (count($this->directories)) {
            return $this->directories;
        }
        throw new Exception("Cannot trace directory array please reconfirm your syntax again");
        return false;
    }
    public function autoload()
    {
        return spl_autoload_register(function ($class) {
            $root = $this->getRootPath();
            $pathSeparator = $this->getPathSeparator();
            $directories = $this->getDirectories();
            foreach ($pathSeparator as $path) {
                foreach ($directories as $directory) {
                    if (file_exists($path . $root . $directory . "/" . $class . ".php")) {
                        $this->file = $path . $root . $directory . "/" . $class . ".php";
                        break;
                    }
                }
            }
            if (!empty($this->file)) {
                require($this->file);
            }
            throw new Exception("File not found");
            return false;
        });
    }
}
