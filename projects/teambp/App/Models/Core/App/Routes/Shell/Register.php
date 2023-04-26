<?php

namespace Models\Core\App\Routes\Shell;

use Exception;
use Models\Auth\Input;
use Models\Core\App\Utilities\Url;
use Models\Core\Services\Ajax\Shell\Api as AjaxAPI;

class Register
{

    public function Homepage()
    {
        if (file_exists(Url::GetPath("app/views/pages/home.php"))) {
            require_once(Url::GetPath("app/views/pages/home.php"));
            return;
        }
        throw new Exception("Warning: Requested file was not found");

    }

    public function Page404()
    {
        require_once(Url::GetPath("app/views/pages/404.php"));
    }

    public function MemberRegistration()
    {
        if (file_exists(Url::GetPath("app/views/pages/forms/MemberRegistrationForm.php"))) {
            if (Input::Get("form-identifier")) {
                AjaxAPI::RunService(Input::Get("form-identifier"));
                return;
            }
            require_once(Url::GetPath("app/views/pages/forms/MemberRegistrationForm.php"));
            return;
        }
        throw new Exception("Warning: Requested file was not found");
    }

    public function MemberLogin()
    {
        if (file_exists(Url::GetPath("app/views/pages/forms/MemberLoginForm.php"))) {
            if (Input::Get("form-identifier")) {
                AjaxAPI::RunService(Input::Get("form-identifier"));
                return;
            }
            require_once(Url::GetPath("app/views/pages/forms/MemberLoginForm.php"));
            return;
        }
        throw new Exception("Warning: Requested file was not found");
    }

}