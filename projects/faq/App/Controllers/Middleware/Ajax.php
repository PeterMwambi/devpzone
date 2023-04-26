<?php

use Controllers\Middleware\Middleware;
use Models\Authentication\Services\Functions;
use Models\Authentication\Services\Input;

require(str_replace("Controllers\Middleware", "", dirname(__FILE__))) . "\Config\Bootstrap.php";


class Ajax extends Middleware
{
    public function RunRequest(string $requestFlag)
    {
        if (Functions::decrypt($requestFlag)) {
            $requestFlag = Functions::decrypt($requestFlag);
            switch ($requestFlag) {
                case "register-admin":
                    parent::RegisterAdmin();
                    break;
                case "login-admin":
                    parent::LoginAdmin();
                    break;
                case "post-question":
                    parent::PostQuestion();
                    break;
                case "delete-question":
                    parent::DeleteQuestion();
                    break;
                case "reply-question":
                    parent::ReplyQuestion();
                    break;
            }
        }
    }

}
$ajax = new Ajax;


$ajax->RunRequest(Input::Get("FormRequestFlag"));