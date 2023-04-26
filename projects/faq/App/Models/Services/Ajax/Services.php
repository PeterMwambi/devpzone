<?php


namespace Models\Services\Ajax;

use Exception;

use Models\Authentication\Services\Validation as ValidationService;

use Models\Services\FAQ\AdminServices;
use Models\Services\FAQ\GuestServices;

class Services extends Security
{


    private $ajaxFlag = false;


    private $validationGateway;

    private $redirectUrl = null;

    private $GuestServices;

    private $AdminServices;


    private $formData = array();


    public function __construct()
    {
        $this->validationGateway = new ValidationService();
    }


    protected function SetAjaxFormData(array $formData)
    {
        $this->formData = $formData;
    }

    protected function GetAjaxFormData()
    {
        return $this->formData;
    }

    public function RunAjaxValidation()
    {
        if ($this->VerifyAjaxPassKey()) {
            $this->validationGateway->SetForm($this->GetForm());
            $this->validationGateway->SetFormData($this->GetAjaxFormData());
            $this->validationGateway->RunRequest();
            if ($this->validationGateway->VerifyRequestStatus()) {
                $this->ajaxFlag = true;
            }
            return $this->ajaxFlag;
        }
        throw new Exception("Passkey Verification Failed");
    }

    public function AssignToService()
    {

        $this->RunAjaxValidation();
        switch ($this->ajaxFlag) {
            case true:
                define("ALLOW_SERVICE_ACCESS", TRUE);
                $this->GuestServices = new GuestServices();
                $this->AdminServices = new AdminServices();
                switch ($this->GetForm()) {
                    case "admin-register":
                        if ($this->AdminServices->AdminRegister($this->GetAjaxFormData())) {
                            $this->SetRedirectUrl("?page=profile&auth=admin");
                            $this->GetSuccessMessage("Account has been created successfuly");
                        }
                        break;
                    case "admin-login":
                        if ($this->AdminServices->AdminLogin($this->GetAjaxFormData())) {
                            $this->SetRedirectUrl("?page=profile&auth=admin");
                            $this->GetSuccessMessage("You will be redirected shortly");
                        }
                        break;
                    case "post-question":
                        if ($this->GuestServices->GuestPostQuestion($this->GetAjaxFormData())) {
                            $this->GetSuccessMessage("Your question has been sent");
                        }
                        break;
                    case "delete-question":
                        if ($this->AdminServices->AdminDeleteQuestion($this->GetAjaxFormData())) {
                            $this->GetSuccessMessage("Question has been deleted");
                        }
                        break;
                    case "reply-question":
                        if ($this->AdminServices->AdminReplyQuestion($this->GetAjaxFormData())) {
                            $this->GetSuccessMessage("Question reply has been sent");
                        }
                        break;
                }
                break;
            case false:
                $this->GetErrorMessage();
                break;
        }
    }

    protected function GetErrorMessage()
    {
        $message = $this->validationGateway->GetErrorMessage();
        echo json_encode(array("flag" => 0, "message" => $message));
    }

    protected function SetRedirectUrl(string $url)
    {
        $this->redirectUrl = $url;
    }

    protected function GetSuccessMessage($message)
    {
        if (isset($this->redirectUrl)) {
            $jsonMessage = json_encode(array("flag" => 1, "message" => $message, "destination" => $this->redirectUrl));
        } else {
            $jsonMessage = json_encode(array("flag" => 1, "message" => $message));
        }
        echo $jsonMessage;
    }

}