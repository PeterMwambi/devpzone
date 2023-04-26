<?php

namespace Controllers\Services;

use Models\Services\Ajax\Request as AjaxRequest;

use Models\Authentication\Services\Input   as Input;

use Models\Authentication\Services\Sanitize as Sanitize;

use Exception;

class DeleteQuestion extends AjaxRequest{



    public function RunDeleteQuestionService(string $passKey){
        if(!empty($passKey)){
            parent::LoadServices($passKey, $this->GenerateFormData());
            return true;
        }
        throw new Exception("Invalid Pass Key");
       
    }

    private  function GenerateFormData(){
        $questionId = Sanitize::String(Input::Get("questionId"));
        $data = array(
            "question-id" => $questionId,
        );
        return $data;
    }

}