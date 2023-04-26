<?php

namespace Models\Services\FAQ;

use Models\Database\DatabaseHandler;


class FAQServices
{
    protected $databaseHandler;
    public function __construct()
    {
        $this->databaseHandler = new DatabaseHandler();
    }
    protected function GetPostedQuestions(string $resultFlag, int $flag = 0)
    {
        $this->databaseHandler->RunSQL("SELECT questions.qn_id,
         questions.qn_content, 
         questions.qn_dateposted, 
         questions.qn_dayposted, 
         questions.qn_timeposted FROM questions WHERE questions.qn_flag = ? LIMIT 6", array($resultFlag), $flag);

        return $this->databaseHandler->GetOutput();
    }

    protected function GetQuestionById(string $id)
    {
        $this->databaseHandler->RunSQL("SELECT questions.qn_id,
         questions.qn_content, 
         questions.qn_dateposted, 
         questions.qn_dayposted, 
         questions.qn_timeposted FROM questions WHERE questions.qn_id = ?", array($id), 1);
        return $this->databaseHandler->GetOutput();
    }

    protected function GetRepliedQuestionById(string $id)
    {
        $this->databaseHandler->RunSQL("SELECT questions.qn_id,
         questions.qn_content, 
         questions.qn_dateposted, 
         questions.qn_dayposted, 
         questions.qn_timeposted,
        replies.rp_id,
        replies.rp_dateposted,
        replies.rp_dayposted,
        replies.rp_timeposted,
        replies.rp_content,
        replies.rp_sender 
        FROM questions 
        INNER JOIN replies ON replies.qn_id = questions.qn_id
        WHERE questions.qn_id = ?", array($id), 1);
        return $this->databaseHandler->GetOutput();
    }


    protected function GetRepliedCount()
    {
        $this->databaseHandler->RunSQL("SELECT qn_id FROM questions WHERE qn_flag =?", array("replied"), 0);
        return $this->databaseHandler->getCount();
    }

    protected function GetNotRepliedCount()
    {
        $this->databaseHandler->RunSQL("SELECT qn_id FROM questions WHERE qn_flag =?", array("not replied"), 0);
        return $this->databaseHandler->getCount();
    }


}