<?php

namespace Controllers\Services;





use Models\Services\Ajax\Request as AjaxRequest;

use Models\Authentication\Services\Input   as Input;

use Models\Authentication\Services\Sanitize as Sanitize;

use Exception;


class AdminLogin extends AjaxRequest{



    public function RunLoginService(string $passKey){
        if(!empty($passKey)){
            parent::LoadServices($passKey, $this->GenerateFormData());
            return true;
        }
        throw new Exception("Invalid Pass Key");
       
    }

    private  function GenerateFormData(){
        $username = Sanitize::String(Input::Get("username"));
        $password = Sanitize::String(Input::Get("password"));
        $data = array(
            "username" => $username,
            "password" => $password
        );
        return $data;
    }

}