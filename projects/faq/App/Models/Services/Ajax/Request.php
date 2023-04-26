<?php

namespace Models\Services\Ajax;


class Request extends Services
{
    public function LoadServices(string $passKey, array $formData)
    {
        parent::SetAjaxPassKey($passKey);
        parent::SetAjaxFormData($formData);
        parent::AssignToService();
        return;
    }

}