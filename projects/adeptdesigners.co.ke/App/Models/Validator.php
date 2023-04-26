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
    private $identifier = null;

    protected function __construct(array $data, $form = "register", $action = null, $identifier = null)
    {
        parent::__construct($data);
        $this->data = $data;
        $this->conn = new DatabaseHandler;
        $this->form = $form;
        $this->identifier = $identifier;
        switch ($form) {
            case 'subscription':
                $this->generatedRules["email"]["table"] = "subscriptions";
                $this->generatedRules["email"]["permit"] = false;
                break;
            case 'suppliers':
                if (!empty($action) && $action === "update") {
                    $this->generatedRules["supplier-name"]["allowIfExists"] = true;
                    $this->generatedRules["company"]["allowIfExists"] = true;
                    $this->generatedRules["phone-number"]["allowIfExists"] = true;
                    $this->generatedRules["suppliers-email"]["allowIfExists"] = true;
                }
                break;
            case 'employees':
                if (!empty($action) && $action === "add") {
                    $this->generatedRules["national-id"]["table"] = "employees";
                    $this->generatedRules["current-email"]["table"] = "employees";
                    $this->generatedRules["username"]["table"] = "employee_account";
                    $this->generatedRules["phone-number"]["table"] = "employees";
                } else {
                    if (!empty($action) && $action === "update") {
                        $this->generatedRules["national-id"]["table"] = "employees";
                        $this->generatedRules["national-id"]["allowIfExists"] = true;
                        $this->generatedRules["national-id"]["mustConfirm"] = true;
                        $this->generatedRules["national-id"]["uniqueId"] = "employee_id";

                        //Employees Personal email
                        $this->generatedRules["current-email"]["table"] = "employees";
                        $this->generatedRules["current-email"]["mustConfirm"] = true;
                        $this->generatedRules["current-email"]["allowIfExists"] = true;
                        $this->generatedRules["current-email"]["uniqueId"] = "employee_id";

                        //Username
                        $this->generatedRules["username"]["table"] = "employee_account";
                        $this->generatedRules["username"]["allowIfExists"] = true;
                        $this->generatedRules["username"]["mustConfirm"] = true;
                        $this->generatedRules["username"]["uniqueId"] = "employee_id";

                        //Phone Number
                        $this->generatedRules["phone-number"]["table"] = "employees";
                        $this->generatedRules["phone-number"]["allowIfExists"] = true;
                        $this->generatedRules["phone-number"]["mustConfirm"] = true;
                        $this->generatedRules["phone-number"]["uniqueId"] = "employee_id";

                        //Bank Account Number
                        $this->generatedRules["bank-account-no"]["table"] = "employee_account";
                        $this->generatedRules["bank-account-no"]["allowIfExists"] = true;
                        $this->generatedRules["bank-account-no"]["mustConfirm"] = true;
                        $this->generatedRules["bank-account-no"]["uniqueId"] = "employee_id";

                        //Password
                        $this->generatedRules["password"]["required"] = false;

                        //Confirm Password
                        $this->generatedRules["confirm-password"]["required"] = false;
                    }
                }
                break;
            case 'message':
                $this->generatedRules["email"]["table"] = "messages";
                $this->generatedRules["message"]["table"] = "messages";
                $this->generatedRules["email"]["unique"] = false;
                break;
            case 'comment':
                $this->generatedRules["email"]["table"] = "comments";
                $this->generatedRules["message"]["table"] = "comments";
                $this->generatedRules["email"]["unique"] = false;
                break;
            case 'admin-login-form':
                $this->generatedRules["username"]["table"] = "administrators";
                $this->generatedRules["username"]["permit"] = true;
                $this->generatedRules["password"]["table"] = "administrators";
                $this->generatedRules["password"]["match-found"] = true;
                break;
            case 'category':
                if (!empty($action) && $action === "update") {
                    $this->generatedRules["category-name"]["allowIfExists"] = true;
                    $this->generatedRules["category-name"]["mustConfirm"] = true;
                    $this->generatedRules["category-name"]["uniqueId"] = "category_id";
                }
                break;
            case 'sub-category':
                if (!empty($action) && $action === "update") {
                    $this->generatedRules["sub-category-name"]["allowIfExists"] = true;
                    $this->generatedRules["sub-category-name"]["mustConfirm"] = true;
                    $this->generatedRules["sub-category-name"]["uniqueId"] = "category_id";
                    $this->generatedRules["category-name"]["allowIfExists"] = true;
                } else {
                    if (!empty($action) && $action === "add") {
                        $this->generatedRules["category-name"]["allowIfExists"] = true;
                    }
                }
                break;
            case 'administrators':
                $this->generatedRules["username"]["table"] = "administrators";
                break;
            case 'purchases':
                $this->generatedRules["supplier-name"]["allowIfExists"] = true;
                if (!empty($action) && $action === "update") {
                    $this->generatedRules["supplier-name"]["allowIfExists"] = true;
                    $this->generatedRules["transaction-id"]["allowIfExists"] = true;
                }
                break;
            case 'products':
                if (!empty($action) && $action === "add") {
                    $this->generatedRules["category-name"]["unique"] = false;
                    $this->generatedRules["sub-category-name"]["unique"] = false;
                } else {
                    if (!empty($action) && $action === "update") {
                        $this->generatedRules["category-name"]["unique"] = false;
                        $this->generatedRules["sub-category-name"]["unique"] = false;
                        $this->generatedRules["product-name"]["allowIfExists"] = true;
                        $this->generatedRules["product-name"]["mustConfirm"] = true;
                        $this->generatedRules["product-name"]["uniqueId"] = "product_id";
                    }
                }
                break;
            case 'client':
                if (!empty($action) && $action === "register") {
                    //Employees Personal email
                    $this->generatedRules["user-email"]["unique"] = true;
                    $this->generatedRules["user-email"]["table"] = "users";
                    $this->generatedRules["user-email"]["mustConfirm"] = true;
                    $this->generatedRules["user-email"]["allowIfExists"] = false;
                    $this->generatedRules["user-email"]["uniqueId"] = "email";
                    //Username
                    $this->generatedRules["username"]["table"] = "users";
                    $this->generatedRules["username"]["allowIfExists"] = false;
                    $this->generatedRules["username"]["mustConfirm"] = true;
                    $this->generatedRules["username"]["uniqueId"] = "user_id";
                    //PhoneNumber
                    $this->generatedRules["phone-number"]["unique"] = true;
                    $this->generatedRules["phone-number"]["table"] = "users";
                    $this->generatedRules["phone-number"]["allowIfExists"] = false;
                    $this->generatedRules["phone-number"]["mustConfirm"] = true;
                    $this->generatedRules["phone-number"]["uniqueId"] = "user_id";
                } else {
                    if (!empty($action) && $action === "login") {
                        // Username
                        $this->generatedRules["username"]["table"] = "users";
                        $this->generatedRules["username"]["allowIfExists"] = true;
                        $this->generatedRules["username"]["mustConfirm"] = true;
                        $this->generatedRules["username"]["uniqueId"] = "user_id";
                        $this->generatedRules["username"]["permit"] = true;
                        $this->generatedRules["password"]["table"] = "users";
                        $this->generatedRules["password"]["match-found"] = true;
                    }
                }
                break;
            case 'checkout':
                $this->generatedRules["national-id"]["unique"] = false;
                $this->generatedRules["phone-number"]["unique"] = false;
                $this->generatedRules["customer-email"]["unique"] = false;
                $this->generatedRules["residence"]["name"] = "Residence";
                break;
            case 'orders':
                $this->generatedRules["payment-method"]["required"] = true;
                $this->generatedRules["payment-status"]["required"] = true;
                $this->genertedRules["payment-amount"]["required"] = true;
                $this->generatedRules["transaction-id"]["table"] = "order_details";
                $this->generatedRules["transaction-id"]["uniqueId"] = "order_id";
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
                            $this->error("Your {$itemValue["name"]} is invalid. Please check the field and try again");
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
