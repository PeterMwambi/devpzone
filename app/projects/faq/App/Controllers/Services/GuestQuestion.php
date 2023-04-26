<?php

namespace Controllers\Services;






use Models\Authentication\Services\Input   as Input;

use Models\Authentication\Services\Sanitize as Sanitize;

use Exception;
use Models\Services\Ajax\Request as AjaxRequest;

class GuestQuestion extends AjaxRequest{

    public function RunQuestionService(string $passKey){
        if(!empty($passKey)){
            parent::LoadServices($passKey, $this->GenerateFormData());
            return true;
        }
        throw new Exception("Invalid Pass Key");
       
    }

    private  function GenerateFormData(){
        $question = Sanitize::String(Input::Get("question"));
        $data = array(
            "text" => $question,
        );
        return $data;
    }

}