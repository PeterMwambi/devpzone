<?php

namespace Models\Services\FAQ;

defined("ALLOW_SERVICE_ACCESS") or exit("Service access Denied");


class GuestServices extends FAQServices
{

    public function GuestPostQuestion(array $formData)
    {
        if (count($formData)) {
            $question = $formData["text"];
            $questionId = strtoupper(uniqid());
            $dayposted = date("l");
            $dateposted = date("d/M/Y");
            $timeposted = date("g:ia");
            $flag = "not replied";

            $queryItems = array(
                "qn_id" => $questionId,
                "qn_content" => $question,
                "qn_dayposted" => $dayposted,
                "qn_dateposted" => $dateposted,
                "qn_timeposted" => $timeposted,
                "qn_flag" => $flag
            );
            $this->databaseHandler->SetTable("questions");
            $this->databaseHandler->SetQueryItems($queryItems);
            $this->databaseHandler->QueryDb("insert");
            return true;
        }
        return false;
    }

    public function GuestGetPostedQuestions()
    {
        return parent::GetPostedQuestions("not replied");
    }

    public function GuestGetRepliedQuestions()
    {
        return parent::GetPostedQuestions("replied");
    }

    public function GuestGetRepliedQuestionById(string $id)
    {
        return parent::GetRepliedQuestionById($id);
    }
}