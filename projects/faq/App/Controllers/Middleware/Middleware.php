<?php

namespace Controllers\Middleware;

use Controllers\Services\AdminRegistration;
use Controllers\Services\AdminLogin;
use Controllers\Services\DeleteQuestion;
use Controllers\Services\GuestQuestion;
use Controllers\Services\ReplyQuestion;
use Models\Authentication\Services\Input;

class Middleware
{
    protected function RegisterAdmin()
    {
        $adminRegistration = new AdminRegistration;
        $adminRegistration->RunRegisterService(Input::Get("AdminRegisterPassKey"));
        return;
    }

    protected function LoginAdmin()
    {
        $adminLogin = new AdminLogin;
        $adminLogin->RunLoginService(Input::Get("AdminLoginPassKey"));
        return;
    }

    protected function PostQuestion()
    {
        $guestQuestion = new GuestQuestion;
        $guestQuestion->RunQuestionService(Input::Get("PostQuestionPassKey"));
        return;
    }

    protected function DeleteQuestion()
    {
        $deleteQuestion = new DeleteQuestion;
        $deleteQuestion->RunDeleteQuestionService(Input::Get("DeleteQuestionPassKey"));
    }

    protected function ReplyQuestion()
    {
        $replyQuestion = new ReplyQuestion;
        $replyQuestion->RunReplyQuestionService(Input::Get("ReplyQuestionPassKey"));
    }
}