<?php

namespace Controllers\Services;

use Models\Services\Ajax\Request as AjaxRequest;

use Models\Authentication\Services\Input   as Input;

use Models\Authentication\Services\Sanitize as Sanitize;

use Exception;

class ReplyQuestion extends AjaxRequest{



    public function RunReplyQuestionService(string $passKey){
        if(!empty($passKey)){
            parent::LoadServices($passKey, $this->GenerateFormData());
            return true;
        }
        throw new Exception("Invalid Pass Key");
       
    }

    private  function GenerateFormData(){
        $reply = Sanitize::String(Input::Get("reply-message"));
        $questionId = Sanitize::String(Input::Get("question-id"));
        $data = array(
            "text" => $reply,
            "question-id" => $questionId
        );
        return $data;
    }

}