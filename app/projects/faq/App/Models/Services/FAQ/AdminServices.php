<?php

namespace Models\Services\FAQ;

defined("ALLOW_SERVICE_ACCESS") or exit("Service access Denied");

use Models\Authentication\Services\Functions;
use Models\Core\Config\Session;

class AdminServices extends FAQServices
{


    private $results;

    public function AdminRegister(array $formData)
    {
        if (count($formData)) {
            $firstname = $formData["firstname"];
            $lastname = $formData["lastname"];
            $phoneNumber = $formData["phone-number"];
            $email = $formData["email"];
            $username = $formData["username"];
            $password = password_hash($formData["password"], PASSWORD_DEFAULT);
            $adminId = strtoupper(uniqid());
            $queryItems = array(
                "adm_id" => $adminId,
                "adm_firstname" => $firstname,
                "adm_lastname" => $lastname,
                "adm_phonenumber" => $phoneNumber,
                "adm_email" => $email,
                "adm_username" => $username,
                "password" => $password,
            );
            $this->databaseHandler->SetTable("admin");
            $this->databaseHandler->SetQueryItems($queryItems);
            $this->databaseHandler->QueryDb("insert");
            Session::Start();
            Session::Set("username", $username);
            Session::Set("ADMIN_PASSKEY_PHRASE", Functions::encrypt($username . $password));
            return true;
        }
        return false;
    }

    public function AdminLogin(array $formData)
    {
        if (count($formData)) {
            $username = $formData["username"];
            $password = $formData["password"];
            Session::Start();
            Session::Set("username", $username);
            Session::Set("ADMIN_PASSKEY_PHRASE", Functions::encrypt($username . $password));
            return true;
        }
        return false;
    }


    public function VerifyAdminEntry()
    {
        Session::Start();
        if (Session::Exists("ADMIN_PASSKEY_PHRASE") && Functions::decrypt(Session::Get("ADMIN_PASSKEY_PHRASE"))) {
            return true;
        }
        return false;
    }

    public function GetFirstname()
    {
        if (Session::exists("username")) {
            $this->databaseHandler->runSQL("SELECT adm_firstname FROM admin WHERE adm_username = ?", array(Session::Get("username")), 1);
            return $this->databaseHandler->getOutput()->adm_firstname;
        }
        return false;

    }

    public function GetPresentDate()
    {
        return date("l, d/M/Y");
    }

    public function AdminGetPostedQuestions()
    {
        return parent::GetPostedQuestions("not replied");
    }

    public function AdminGetRepliedQuestions()
    {
        return parent::GetPostedQuestions("replied");
    }

    public function AdminDeleteQuestion(array $formData)
    {
        if (count($formData)) {
            $questionId = $formData["question-id"];
            $this->databaseHandler->RunSQL("DELETE FROM questions WHERE questions.qn_id = ?", array($questionId), null);
            return true;
        }
        return false;
    }

    public function AdminGetQuestionById(string $id)
    {
        return parent::GetQuestionById($id);
    }

    public function AdminReplyQuestion(array $formData)
    {
        if (count($formData)) {
            $reply = $formData["text"];
            $replyId = strtoupper(uniqid());
            $questionId = $formData["question-id"];
            $datePosted = date("d/M/Y");
            $dayPosted = date("l");
            $timePosted = date("g:iA");
            $sender = $this->GetFirstname();
            $flag = "replied";

            $replyQueryItems = array(
                "rp_id" => $replyId,
                "qn_id" => $questionId,
                "rp_dateposted" => $datePosted,
                "rp_dayposted" => $dayPosted,
                "rp_timeposted" => $timePosted,
                "rp_content" => $reply,
                "rp_sender" => $sender,
                "rp_flag" => $flag
            );
            $questionQueryItems = array(
                "qn_flag" => $flag
            );
            $this->databaseHandler->SetTable("replies");
            $this->databaseHandler->SetQueryItems($replyQueryItems);
            $this->databaseHandler->QueryDb("insert");
            $this->databaseHandler->setTable("questions");
            $this->databaseHandler->SetQueryItems($questionQueryItems);
            $this->databaseHandler->SetQueryIdentifier(array("qn_id" => $questionId));
            $this->databaseHandler->QueryDb("update");
            return true;
        }
        return false;
    }

    public function AdminGetRepliedCount()
    {
        return parent::GetRepliedCount();
    }
    public function AdminGetNotRepliedCount()
    {
        return parent::GetNotRepliedCount();
    }

}