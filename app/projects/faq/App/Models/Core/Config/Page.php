<?php


namespace Models\Core\Config;

use Exception;
use Models\Authentication\Services\Functions;
use Models\Authentication\Services\Sanitize;

class Page
{

    private $title;


    private $auth;

    private $page;


    public function SetTitle(string $title)
    {
        $this->title = Sanitize::String($title);
    }

    protected function GetTitle()
    {
        return $this->title;
    }

    public function SetAuth(string $auth)
    {
        $auth = Sanitize::String($auth);
        if (array_key_exists($auth, Settings::GetPageSettings())) {
            $this->auth = $auth;
        }
        throw new Exception("Access denied: Invalid auth key");
    }


    private function ValidateAuth()
    {
        if (Session::Exists("ADMIN_PASSKEY_PHRASE") && Functions::Decrypt("ADMIN_PASSKEY_PHRASE")) {
            return true;
        }
        throw new Exception("Access denied:Invalid pass phrase");
    }

    protected function HasAuth()
    {
        if ($this->auth === "admin" && $this->ValidateAuth()) {
            return true;
        }
        throw new Exception("Access denied: Invalid auth access");
    }

    protected function SetPage(string $page)
    {
        $pages = Settings::GetPageSetting($this->auth);
        switch ($this->auth) {
            case 'admin':
                if ($this->HasAuth()) {
                    if (array_key_exists($page, $pages)) {
                        $this->page = $pages[$page];
                    }
                    throw new Exception("Access denied: Invalid admin page");
                }
                throw new Exception("Access denied: Admin priveledges not set");
            case 'guest':
                if (array_key_exists($page, $pages)) {
                    $this->page = $pages[$page];
                }
                throw new Exception("Access denied: Invalid guest page");

            case 'meta':
                if (array_key_exists($page, $pages)) {
                    $this->page = $pages[$page];
                }
                throw new Exception("Access denied: Invalid meta page");
        }
    }

    public function GetPage(string $page)
    {
        $this->GetPage($page);
        require_once($this->page);
    }

}