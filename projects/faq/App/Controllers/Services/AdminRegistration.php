<?php

namespace Controllers\Services;





use Models\Services\Ajax\Request as AjaxRequest;

use Models\Authentication\Services\Input   as Input;

use Models\Authentication\Services\Sanitize as Sanitize;

use Exception;

class AdminRegistration extends AjaxRequest{



    public function RunRegisterService(string $passKey){
        if(!empty($passKey)){
            parent::LoadServices($passKey, $this->GenerateFormData());
            return true;
        }
        throw new Exception("Invalid Pass Key");
       
    }

    private  function GenerateFormData(){
        $firstname = Sanitize::String(Input::Get("firstname"));
        $lastname = Sanitize::String(Input::Get("lastname"));
        $email = Sanitize::String(Input::Get("email"));
        $username = Sanitize::String(Input::Get("username"));
        $phoneNumber = Sanitize::String(Input::Get("phone-number"));
        $password = Sanitize::String(Input::Get("password"));
        $confirmPassword = Sanitize::String(Input::Get("confirm-password"));
        $data = array(
            "firstname" => $firstname,
            "lastname" => $lastname,
            "phone-number" => $phoneNumber,
            "email" => $email,
            "username" => $username,
            "password" => $password,
            "confirm-password" => $confirmPassword
        );
        return $data;
    }

}