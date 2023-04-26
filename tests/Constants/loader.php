<?php

namespace Tests\Constants;

use Models\Core\App\Utilities\Url;

class Loader
{

    private $memberRegistration;


    private function loadConstants()
    {
        require_once(Url::getPath("app/tests/constants/constants.php"));
    }


    protected function setMemberRegistrationRules()
    {
        $this->loadConstants();
        if (defined("MEMBER_REGISTRATION_RULES")) {
            $this->memberRegistration = MEMBER_REGISTRATION_RULES;
            return $this;
        } else {
            die("Warning: Member Registration constant has not been defined");
        }
    }

    public function getMemberRegistrationRules()
    {
        $this->setMemberRegistrationRules();
        return $this->memberRegistration;
    }
}