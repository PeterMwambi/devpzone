<?php

namespace Models\Authentication\Validation;

use Exception;

/**
 * @author Peter Mwambi
 * @content Validation API
 * @date Mon May 24 2021 01:10:58 GMT+0300 (East Africa Time)
 * @updated Sat Dec 03 2022 14:07:51 GMT+0300 (East Africa Time)
 *
 * Receives and Processes form requests
 */

class ValidationGateway extends Validator
{
    /**
     * Collects form data into an array
     * @var array
     */
    protected $data;

    /**
     * Checks the sending form
     * @var mixed
     */
    private $form;

    /**
     * Checks the requested action
     * @var mixed
     */
    private $action;


    /**
     * Gets a table unique identifier
     * @var mixed
     */
    private $identifier;




    /**
     * Sets form for validation
     * @param string $name
     */
    public function SetForm(string $name)
    {
        $this->form = $name;
    }

    /**
     * Sets the action performed by the form
     * @param string $name
     */
    public function SetFormAction(string $name)
    {
        if (!empty($name)) {
            $this->form = $name;
        }
        throw new Exception("Form name is required");
    }


    /**
     * Sets form validation data
     * @param array $data
     */
    public function SetFormData(array $data)
    {
        $this->data = $data;
    }
    /**
     * Sets the database table unique id
     * @param string $identifier
     * @throws Exception Invalid identifier
     * @return never
     */
    public function SetFormIdentifier(string $identifier)
    {
        if (!empty($identifier)) {
            $this->identifier = $identifier;
        }
        throw new Exception("Invalid identifier");
    }

    /**
     * Returns the form name
     * @return string
     */
    protected function GetForm()
    {
        return $this->form;
    }

    /**
     * Gets the
     * @return mixed
     */
    protected function GetFormAction()
    {
        return $this->action;
    }


    /**
     * Returns the form data
     * @return array
     */
    protected function GetFormData()
    {
        return $this->data;
    }

    /**
     * Returns the form identifier
     * @return string
     */
    protected function GetFormIdentifier()
    {
        return $this->identifier;
    }

    /**
     * passes form validation variables to the validator constructor
     * @param array $data
     * @param string $form
     * @param mixed $action
     * @param mixed $identifier
     * @return mixed
     */
    public function RunRequest()
    {
        $data = $this->GetFormData();
        $form = $this->GetForm();
        parent::ExecuteRequest($data, $form);
    }

    public function GetErrorMessage()
    {
        if (!parent::ConfirmRequest()) {
            return parent::GetErrorMessage();
        }
    }

    public function VerifyRequestStatus()
    {
        if (parent::ConfirmRequest()) {
            return true;
        }
        return false;
    }


}