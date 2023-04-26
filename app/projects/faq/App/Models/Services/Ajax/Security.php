<?php

namespace Models\Services\Ajax;

use Models\Authentication\Services\Functions;

use Exception;

class Security
{

    private $ajaxPasskey;


    private $form;

    private $allowedAjaxPasskeys = array(
        "ADMIN_LOGIN" => "admin-login",
        "ADMIN_REGISTER" => "admin-register",
        "POST_QUESTION" => "post-question",
        "DELETE_QUESTION" => "delete-question",
        "REPLY_QUESTION" => "reply-question"
    );

    protected function GetForm()
    {
        return $this->form;
    }


    protected function SetAjaxPassKey(string $key)
    {
        $this->ajaxPasskey = $key;
    }

    public function DecryptAjaxPassKey()
    {
        $this->ajaxPasskey = Functions::decrypt($this->ajaxPasskey);
    }

    protected function VerifyAjaxPassKey()
    {
        if (!empty($this->ajaxPasskey)) {
            $this->DecryptAjaxPassKey();
            if (array_key_exists($this->GetAjaxPasskey(), $this->allowedAjaxPasskeys)) {
                $this->form = $this->allowedAjaxPasskeys[$this->GetAjaxPasskey()];
                return true;
            }
            throw new Exception("Pass key was not verified");
        }
        throw new Exception("Invalid Pass Key");
    }


    private function GetAjaxPasskey()
    {
        return $this->ajaxPasskey;
    }
}