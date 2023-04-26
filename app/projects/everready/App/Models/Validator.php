<?php
defined("PATHNAME") === TRUE or exit(header("location:../../errors/"));
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

    protected function __construct(array $data, $form = "client-login-form")
    {
        parent::__construct($data);
        $this->data = $data;
        $this->conn = new DatabaseHandler;
        $this->form = $form;
        switch ($form) {
            case 'client-login-form':
                $this->generated_rules["username"]["table"] = "clients";
                $this->generated_rules["username"]["checkField"] = "cl_username";
                $this->generated_rules["username"]["permit"] = true;
                break;
            case 'client-register-form':
                $this->generated_rules["username"]["table"] = "clients";
                $this->generated_rules["username"]["checkField"] = "cl_username";
                $this->generated_rules["email"]["table"] = "clients";
                $this->generated_rules["email"]["checkField"] = "cl_email";
                $this->generated_rules["username"]["permit"] = false;
                $this->generated_rules["phone-number"]["table"] = "clients";
                $this->generated_rules["phone-number"]["checkField"] = "cl_phone_number";
                break;
            case 'administrators-login-form':
                $this->generated_rules["username"]["table"] = "administrators";
                $this->generated_rules["username"]["checkField"] = "adm_username";
                $this->generated_rules["username"]["permit"] = true;
                break;
            case 'administrators-register-form':
                $this->generated_rules["username"]["table"] = "administrators";
                $this->generated_rules["email"]["table"] = "administrators";
                $this->generated_rules["email"]["checkField"] = "adm_email";
                $this->generated_rules["username"]["checkField"] = "adm_username";
                $this->generated_rules["username"]["permit"] = false;
                break;
            case 'location-register-form':
                $this->generated_rules["name"]["table"] = "locations";
                $this->generated_rules["name"]["checkField"] = "name";
                $this->generated_rules["name"]["name"] = "Location";
                break;
            case 'vehicle-register-form':
                $this->generated_rules["number-plate"]["table"] = "vehicles";
                $this->generated_rules["number-plate"]["checkField"] = "number_plate";
                $this->generated_rules["driver-id"]["table"] = "drivers";
                $this->generated_rules["driver-id"]["name"] = "Drivers Id";
                $this->generated_rules["number-plate"]["checkField"] = "number_plate";
                break;
            case 'driver-register-form':
                $this->generated_rules["username"]["table"] = "drivers";
                $this->generated_rules["username"]["checkField"] = "dr_username";
                $this->generated_rules["vehicle-id"]["table"] = "vehicles";
                $this->generated_rules["vehicle-id"]["checkField"] = "vehicle_id";
                $this->generated_rules["phone-number"]["table"] = "drivers";
                $this->generated_rules["email"]["table"] = "drivers";
                $this->generated_rules["email"]["checkField"] = "dr_email";
                $this->generated_rules["phone-number"]["checkField"] = "dr_phone_number";
                $this->generated_rules["location"]["table"] = "locations";
                $this->generated_rules["location"]["checkField"] = "name";
                break;
            case 'driver-login-form':
                $this->generated_rules["username"]["table"] = "drivers";
                $this->generated_rules["username"]["checkField"] = "dr_username";
                $this->generated_rules["username"]["permit"] = true;
                break;
            case 'area-register-form':
                $this->generated_rules["name"]["table"] = "areas";
                $this->generated_rules["name"]["grantAccessIfExists"] = false;
                $this->generated_rules["name"]["checkField"] = "name";
                $this->generated_rules["name"]["name"] = "Area name";
                $this->generated_rules["location"]["table"] = "locations";
                $this->generated_rules["location"]["checkField"] = "name";
                break;
        }
        $this->validate();
    }
    private function validate()
    {
        $_rules = $this->generated_rules;
        $data = $this->data;
        $count = null;
        $result = null;
        foreach ($_rules as $key => $item_value) {
            foreach ($item_value as $rule_key => $rule_value) {
                switch ($rule_key) {
                    case 'required':
                        switch ($item_value["required"]) {
                            case true:
                                if (empty($data[$key])) {
                                    $this->error(ucfirst($item_value["name"]) . " is required");
                                }
                                break;
                        }
                        break;
                    case 'pattern':
                        if ($data[$key] != '' && !preg_match($item_value["pattern"], $data[$key])) {
                            $this->error("Your {$item_value["name"]} is invalid. Please check the field and try again");
                        }
                        break;
                    case 'min':
                        if ($data[$key] != '' && strlen($data[$key]) < $item_value["min"]) {
                            $this->error("{$item_value["name"]} cannot be less than {$rule_value} characters");
                        }
                        break;
                    case 'max':
                        if ($data[$key] != '' && strlen($data[$key]) > $item_value["max"]) {
                            $this->error("{$item_value["name"]} cannot be greater than {$rule_value} characters");
                        }
                        break;
                    case 'constant':
                        if ($data[$key] != '' && !filter_var($data[$key], $item_value["constant"])) {
                            $this->error("{$item_value["name"]} is invalid");
                        }
                        break;
                    case 'unique':
                        switch ($item_value["unique"]) {
                            case true:
                                if ($data[$key] != '') {
                                    $field = $item_value["checkField"];
                                    $this->conn->setTable($item_value["table"]);
                                    $this->conn->setField(array("*"));
                                    $this->conn->setQueryItems(array($field, "=", $data[$key]));
                                    $this->conn->queryDb("select", 1);
                                    $count = $this->conn->getCount();
                                    $result = $this->conn->getOutput();
                                    $passwords = array("dr_password", "cl_password", "adm_password");
                                    foreach ($passwords as $password) {
                                        if (!empty($result->$password)) {
                                            $queryPassword = $result->$password;
                                        }
                                    }
                                    switch ($item_value["permit"]) {
                                            /**
                                         * Account should not exist- Used when creating new accounts
                                         * Deny Access if account exists
                                         */
                                        case false:
                                            if ($count) {
                                                if ($item_value["grantAccessIfExists"] === false) {
                                                    $this->error("{$item_value["name"]} already exists");
                                                }
                                            }
                                            break;

                                            /**
                                             * Account should exist - Used when signing in an already existing account
                                             * Allow Access if account exists
                                             */
                                        case true:
                                            if ($count) {
                                                if (!password_verify($this->data["password"], $queryPassword)) {
                                                    $this->error("Wrong password");
                                                }
                                            } else {
                                                $this->error("Account not found");
                                            }
                                            break;
                                    }
                                }
                        }
                        break;
                    case 'matches':
                        if ($data[$key] != '' && $data[$key] != $data[$item_value["matches"]]) {
                            $this->error("{$item_value["name"]} does not match {$item_value["matches"]}");
                        }
                        break;
                }
            }
        }
        return $this;
    }

    protected function error($error)
    {
        array_push($this->errors, $error);
    }

    /**
     * @param null
     * @return string
     * 
     * Process Validation Errors
     */

    protected function processErrorMsg()
    {
        if (count($this->errors)) {
            foreach ($this->errors as $error) {
                return $error;
            }
        }
    }

    /**
     * @param null
     * @return bool
     * 
     * Confirms if validation has succeded. Returns true 
     * if validation has passed otherwise false
     */

    protected function confirmRequestStatus()
    {
        if (empty($this->errors)) {
            $this->passed = true;
        }
        return $this->passed;
    }
}
