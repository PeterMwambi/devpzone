<?php

namespace Models\Core\App\Routes\Shell;

use Exception;
use Models\Auth\Input;
use Models\Core\App\Routes\Kernel\Handler;
use Models\Core\App\Utilities\Url;
use Models\Core\Services\Ajax\Shell\Handler\Api as AjaxApi;

class Register extends Handler
{


    private function getStudentPage()
    {
        return Url::getPath("app/views/pages/students/controller.php");
    }
    private function getTutorsPage()
    {
        return Url::getPath("app/views/pages/tutors/controller.php");
    }

    private function getAdminPage()
    {
        return Url::GetPath("app/views/pages/admin/controller.php");
    }

    public function getSandbox()
    {
        require_once(Url::getPath("app/views/pages/global/sandbox.php"));
    }

    public function getHomepage()
    {
        if (file_exists(Url::getPath("app/views/pages/home/home.php"))) {
            require_once(Url::getPath("app/views/pages/home/home.php"));
            return;
        }
        throw new Exception("Warning: Requested file was not found");
    }

    public function getCourses()
    {
        if (file_exists(Url::getPath("app/views/pages/home/courses.php"))) {
            require_once(Url::getPath("app/views/pages/home/courses.php"));
            return;
        }
        throw new Exception("Warning: Requested file was not found");
    }

    public function get404page()
    {
        require_once(Url::getPath("app/views/pages/global/404.php"));
    }

    public function getClassroom()
    {
        require_once(Url::getPath("app/views/pages/students/classroom.php"));
    }


    public function getLogout()
    {
        $url = Url::getPath("app/views/pages/global/logout.php");
        if (file_exists($url)) {
            require_once($url);
        } else {
            die("false");
        }
    }

    public function getTutorViews()
    {
        $url = $this->getTutorsPage();
        if (file_exists($url)) {
            require_once($url);
            return;
        }
    }
    public function getStudentViews()
    {
        $url = $this->getStudentPage();
        if (file_exists($url)) {
            require_once($url);
            return;
        }
    }

    public function getAdminViews()
    {
        $url = $this->getAdminPage();
        if (file_exists($url)) {
            require_once($url);
            return;
        }
    }


    private function setFormPrimitives(string $url, string $identifier)
    {
        if (file_exists($url)) {
            if (Input::get($identifier)) {
                AjaxApi::run()->formService(Input::get($identifier));
                return;
            }
            require_once($url);
            return;
        }
        throw new Exception("Warning: Requested file was not found");
    }

    public function getStudentForms()
    {
        $url = $this->getStudentPage();
        $identifier = "form-identifier";
        $this->setFormPrimitives($url, $identifier);
    }
    public function getAdminForms()
    {
        $url = $this->getAdminPage();
        $identifier = "form-identifier";
        $this->setFormPrimitives($url, $identifier);
    }

    public function getTutorForms()
    {
        $url = $this->getTutorsPage();
        $identifier = "form-identifier";
        $this->setFormPrimitives($url, $identifier);
    }






}