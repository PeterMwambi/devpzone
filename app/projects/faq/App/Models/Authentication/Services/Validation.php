<?php

namespace Models\Authentication\Services;

use Models\Authentication\Validation\ValidationGateway as ValidationGateway;

class Validation extends ValidationGateway{
   public function SetFormVariables(string $formName, array $formData){
        parent::SetForm($formName);
        parent::SetFormData($formData);
   }
   public function VerifyFormData(){
        parent::RunRequest();
        if(parent::VerifyRequestStatus()){
            return true;
        }
        return parent::GetErrorMessage();
   }
}