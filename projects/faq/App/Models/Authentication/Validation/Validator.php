<?php
namespace Models\Authentication\Validation;

use Models\Authentication\Validation\Rules;

use Models\Database\DatabaseHandler as DatabaseHandler;

use Exception;

/**
 * @author Peter Mwambi
 * @content Validation Class
 * @time Wed Dec 30 2020 10:27:13 GMT+0300 (East Africa Time)
 * @updated on Sat Feb 20 2021 17:50:05 GMT+0300 (East Africa Time)
 * 
 */


class Validator extends Rules
{
    private $passed = false;
    private $errors = [];
    protected $conn = null;
    protected $data = [];
    private $form = null;
    private $identifier = null;


    public function __construct(){
        $this->conn = new DatabaseHandler;
    }
    protected function ExecuteRequest(array $data, $form = "admin-register")
    {
        parent::GetRules($data);
        $this->data = $data;
        $this->form = $form;
        switch($form){
            case 'admin-login':
                $this->generatedRules["username"]["permit"] = true;
                break;
        }
        $this->validate();
    }
    private function validate()
    {
        $rules = $this->generatedRules;
        $data = $this->data;
        $count = null;
        $result = null;
        foreach ($rules as $key => $itemValue) {
            foreach ($itemValue as $ruleKey => $ruleValue) {
                switch ($ruleKey) {
                    case 'required':
                        switch ($itemValue["required"]) {
                            case true:
                                if (empty($data[$key])) {
                                    $this->error(ucfirst($itemValue["name"]) . " is required");
                                }
                                break;
                        }
                        break;
                    case 'pattern':
                        if (!empty($data[$key]) && !preg_match($itemValue["pattern"], $data[$key])) {
                            $this->error("{$itemValue["name"]} is invalid. Please check the field and try again");
                        }
                        break;
                    case 'min':
                        if (!empty($data[$key]) && strlen($data[$key]) < $itemValue["min"]) {
                            $this->error("{$itemValue["name"]} cannot be less than {$ruleValue} characters");
                        }
                        break;
                    case 'max':
                        if (!empty($data[$key]) && strlen($data[$key]) > $itemValue["max"]) {
                            $this->error("{$itemValue["name"]} cannot be greater than {$ruleValue} characters");
                        }
                        break;
                    case 'constant':
                        if (!empty($data[$key]) && !filter_var($data[$key], $itemValue["constant"])) {
                            $this->error("{$itemValue["name"]} is invalid");
                        }
                        break;
                    case 'unique':
                        switch ($itemValue["unique"]) {
                            case true:
                                if (!empty($data[$key])) {
                                    $field = $itemValue["field"];
                                    $table = $itemValue["table"];
                                    $uniqueId = $itemValue["uniqueId"];
                                    $this->conn->setTable($table);
                                    $this->conn->setField(array("*"));
                                    $this->conn->setQueryItems(array($field, "=", $data[$key]));
                                    $this->conn->queryDb("select", 1);
                                    $count = $this->conn->getCount();
                                    $result = $this->conn->getOutput();
                                    switch ($itemValue["permit"]) {
                                        /**
                                         * Account should not exist- Used when creating new accounts
                                         * Deny Access if account exists
                                         */
                                        case false:
                                            if ($count) {
                                                switch ($itemValue["allowIfExists"]) {
                                                    case false:
                                                        $this->error("{$itemValue["name"]} already exists");
                                                        break;
                                                    case true:
                                                        switch ($itemValue["mustConfirm"]) {
                                                            case true:
                                                                $this->conn->runSQL("SELECT {$field} FROM {$table} WHERE {$uniqueId} = ? LIMIT 1", array($this->identifier), 1);
                                                                $count = $this->conn->getCount();
                                                                if ($count > 0) {
                                                                    $result = $this->conn->getOutput();
                                                                    $result = $result->$field;
                                                                    if ($result !== $data[$key]) {
                                                                        $this->error("{$itemValue["name"]} already exists in " . str_replace("_", " ", $table) . " table");
                                                                    }
                                                                }
                                                                break;
                                                        }
                                                        break;
                                                }
                                            }
                                            break;

                                        /**
                                         * Account should exist - Used when signing in an already existing account
                                         * Allow Access if account exists
                                         */
                                        case true:
                                            if ($count) {
                                                if (!password_verify($this->data["password"], $result->password)) {
                                                    $this->error("Wrong password");
                                                }
                                            } else {
                                                $this->error("Account not found. Please confirm your username and password then try again");
                                            }
                                            break;
                                    }
                                }
                        }
                        break;
                    case 'matches':
                        if (!empty($data[$key]) && $data[$key] != $data[$itemValue["matches"]]) {
                            $this->error("{$itemValue["name"]} does not match {$itemValue["matches"]}");
                        }
                        break;
                }
            }
        }
        return $this;
    }

    private function error($error)
    {
        array_push($this->errors, $error);
    }



    /**
     * Summary of processErrorMsg
     * @throws Exception 
     * @return mixed
     */
    protected function GetErrorMessage()
    {
        if (count($this->errors)) {
            foreach ($this->errors as $error) {
                return $error;
            }
        }
        throw new Exception("No errors found");
    }

    /**
     * @param null
     * @return mixed
     * 
     * Confirms if validation has succeded. Returns true 
     * if validation has passed otherwise false
     */

    protected function ConfirmRequest()
    {
        if (empty($this->errors)) {
            $this->passed = true;
        }
        return $this->passed;
    }
}