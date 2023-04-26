<?php

defined("PATHNAME") or die(header("location:../../errors/"));
/**
 * @author Peter Mwambi
 * @content Validation rules
 * @date Tue Apr 20 2021 12:46:26 GMT+0300 (East Africa Time)
 * 
 * Generates login validation rules based on data keys after 
 * form submission 
 */
class Rules
{
    /**
     * @var array $generated rules
     * 
     * Stores the generated rules in an array that are passed 
     * to the validator class for data validation
     */
    protected $generatedRules = array();

    /**
     * @var array $rule_keys
     * 
     * Obtains data keys from the data presented after form has been submitted
     */

    protected $dataKeys = array();

    /**
     * @var array $rules The rules array
     * 
     * Contains the validation rules.
     * Identifiers are required, name, min, max, pattern, table, unique, match-found
     * Identifier 
     * Required - States that the data field is required an cannot be left empty
     * Name- The field name
     * Min - The minimum length of the field
     * Max - The maximum length of the field
     * Pattern - The pattern to be followed by the field
     * Table - The table in database where the field is located
     * Match-found - Significant during login, Checks if user account unique
     * Identifier - Significant during login, The field to check in database
     */
    private $rules = [
        "username" => [
            "required" => true,
            "name" => "Username",
            "min" => 2,
            "max" => 15,
            "pattern" => "/^[A-Za-z]*$/",
            "table" => "",
            "unique" => true,
            "field" => "username",
            "permit" => false,
            "allowIfExists" => false,
            "mustConfirm" => false,
            "uniqueId" => ""

        ],
        "firstname" => [
            "required" => true,
            "name" => "Firstname",
            "min" => 2,
            "max" => 25,
            "pattern" => "/^[A-Za-z ]*$/",
        ],
        "middlename" => [
            "required" => false,
            "name" => "Lastname",
            "min" => 2,
            "max" => 30,
            "pattern" => "/^[A-Za-z]*$/",
        ],
        "lastname" => [
            "required" => false,
            "name" => "Lastname",
            "min" => 2,
            "max" => 30,
            "pattern" => "/^[A-Za-z]*$/",
        ],
        "role" => [
            "required" => true,
            "name" => "Role Field",
            "min" => 2,
            "max" => 30,
            "pattern" => "/^[A-Z a-z]*$/",
        ],
        "current-email" => [
            "required" => true,
            "name" => "Email",
            "unique" => true,
            "constant" => FILTER_VALIDATE_EMAIL,
            "table" => "employees",
            "field" => "current_email",
            "permit" => false,
            "allowIfExists" => false,
            "mustConfirm" => false,
            "uniqueId" => ""
        ],
        "user-email" => [
            "required" => true,
            "name" => "Email",
            "unique" => true,
            "constant" => FILTER_VALIDATE_EMAIL,
            "table" => "users",
            "field" => "user_email",
            "permit" => false,
            "allowIfExists" => false,
            "mustConfirm" => false,
            "uniqueId" => ""
        ],
        "customer-email" => [
            "required" => true,
            "name" => "Email",
            "unique" => true,
            "constant" => FILTER_VALIDATE_EMAIL,
            "table" => "customers",
            "field" => "customer_email",
            "permit" => false,
            "allowIfExists" => false,
            "mustConfirm" => false,
            "uniqueId" => ""
        ],
        "suppliers-email" => [
            "required" => true,
            "name" => "Email",
            "unique" => true,
            "constant" => FILTER_VALIDATE_EMAIL,
            "table" => "suppliers",
            "field" => "suppliers_email",
            "permit" => false,
            "allowIfExists" => false,
            "mustConfirm" => false,
            "uniqueId" => ""
        ],
        "password" => [
            "name" => "Password",
            "required" => true,
            "pattern" => "/^[0-9A-Za-z$@#%!*?_,]*$/",
            "min" => 6,
        ],
        "confirm-password" => [
            "required" => true,
            "name" => "Password confirmation",
            "matches" => "password"
        ],
        "phone-number" => [
            "required" => true,
            "name" => "Phone number",
            "pattern" => "/^[0-9]{9,10}$/",
            "table" => "",
            "field" => "phone_number",
            "unique" => true,
            "permit" => false,
            "allowIfExists" => false,
            "mustConfirm" => false,
            "uniqueId" => ""
        ],
        "gender" => [
            "name" => "Gender",
            "required" => true,
            "values" => array("male", "female", "rather-not-say")
        ],
        "payment-method" => [
            "name" => "Payment Method",
            "required" => true,
            "values" => array("Mpesa", "Cash")
        ],
        "balance" => [
            "name" => "Balance",
            "required" => false,
            "pattern" => "/^[0-9]*$/",
            "min" => 1,
            "max" => 20
        ],
        "payment-amount" => [
            "name" => "Payment Amount",
            "required" => true,
            "pattern" => "/^[0-9]*$/",
            "min" => 1,
            "max" => 20
        ],
        "payment-status" => [
            "name" => "Payment Status",
            "required" => true,
            "values" => array("Pending", "Verified")
        ],
        "marital-status" => [
            "name" => "Marital Status",
            "required" => true,
            "values" => array("Single", "Married", "Divorced")
        ],
        "salary" => [
            "name" => "Salary Field",
            "required" => true,
            "pattern" => "/^[0-9]*$/"
        ],
        "category-name" => [
            "name" => "Category name",
            "required" => true,
            "pattern" => "/^[a-z A-Z,&-]*$/",
            "min" => 2,
            "max" => 100,
            "table" => "category",
            "field" => "category_name",
            "permit" => false,
            "unique" => true,
            "allowIfExists" => false,
            "mustConfirm" => false,
            "uniqueId" => ""
        ],
        "category-description" => [
            "name" => "Category Description",
            "required" => true,
            "min" => 2,
            "max" => 500
        ],
        "sub-category-name" => [
            "name" => "Sub-Category Name",
            "required" => true,
            "pattern" => "/^[a-z A-Z,&-]*$/",
            "min" => 2,
            "max" => 100,
            "table" => "sub_category",
            "field" => "sub_category_name",
            "permit" => false,
            "unique" => true,
            "allowIfExists" => false,
            "mustConfirm" => false,
            "uniqueId" => ""
        ],
        "sub-category-description" => [
            "name" => "Sub Category Description",
            "required" => true,
            "min" => 2,
            "max" => 500
        ],
        "product-name" => [
            "name" => "Product name",
            "required" => true,
            "pattern" => "/^[a-z A-Z,&-?\/]*$/",
            "min" => 2,
            "max" => 100,
            "table" => "products",
            "field" => "product_name",
            "permit" => false,
            "unique" => true,
            "allowIfExists" => false,
            "mustConfirm" => false,
            "uniqueId" => ""
        ],

        "supplier-name" => [
            "name" => "Supplier name",
            "required" => true,
            "pattern" => "/^[a-z A-Z,&-]*$/",
            "min" => 2,
            "max" => 100,
            "table" => "suppliers",
            "field" => "supplier_name",
            "permit" => false,
            "unique" => true,
            "allowIfExists" => false,
            "mustConfirm" => false,
            "uniqueId" => ""
        ],
        "company" => [
            "name" => "Company name",
            "required" => false,
            "pattern" => "/^[a-z A-Z0-9]*$/",
            "min" => 2,
            "max" => 100,
            "unique" => true,
            "table" => "suppliers",
            "field" => "company",
            "permit" => false,
            "allowIfExists" => false,
            "mustConfirm" => false,
            "uniqueId" => ""
        ],
        "transaction-id" => [
            "required" => false,
            "name" => "Transaction Id",
            "pattern" => "/^[A-Z0-9]*$/",
            "min" => 10,
            "max" => 10,
            "unique" => true,
            "table" => "purchases",
            "field" => "transaction_id",
            "permit" => false,
            "allowIfExists" => false,
            "mustConfirm" => false,
            "uniqueId" => ""
        ],
        "market-price" => [
            "name" => "Market Price",
            "required" => true,
            "pattern" => "/^[0-9]*$/",
            "min" => 2,
            "max" => 20
        ],
        "discounted-price" => [
            "name" => "Discounted Price",
            "required" => true,
            "pattern" => "/^[0-9]*$/",
            "min" => 2,
            "max" => 20
        ],
        "buying-price" => [
            "name" => "Buying Price",
            "required" => true,
            "pattern" => "/^[0-9]*$/",
            "min" => 2,
            "max" => 20
        ],
        "product-description" => [
            "name" => "Product Description",
            "required" => true,
            "min" => 2,
            "max" => 500
        ],
        "product-features" => [
            "name" => "Product Features",
            "required" => true,
            "min" => 2,
            "max" => 500
        ],
        "sub-category" => [
            "name" => "Sub-Category",
            "required" => true
        ],
        "count" => [
            "required" => false,
            "min" => 0,
            "max" => 5
        ],
        "nationality" => [
            "required" => true,
            "name" => "Nationality",
            "min" => 2,
            "max" => 30,
            "pattern" => "/^[A-Za-z]*$/",
        ],
        "national-id" => [
            "name" => "National Id",
            "required" => true,
            "pattern" => "/^[0-9]*$/",
            "min" => 6,
            "max" => 10,
            "table" => "",
            "field" => "national_id",
            "unique" => true,
            "permit" => false,
            "allowIfExists" => false,
            "mustConfirm" => false,
            "uniqueId" => ""
        ],
        "dob" => [
            "required" => true,
            "name" => "Date of Birth",
            "date" => true
        ],
        "bank-account-no" => [
            "name" => "Bank Account Number",
            "required" => true,
            "min" => 6,
            "max" => 100,
            "pattern" => "/$[0-9A-Z]*$/",
            "unique" => true,
            "table" => "employee_account",
            "field" => "bank_account_no",
            "permit" => false,
            "allowIfExists" => false,
            "mustConfirm" => false,
            "uniqueId" => ""
        ],
        "bank" => [
            "name" => "Bank name",
            "required" => false,
            "pattern" => "/$[0-9A-Z]*$/",
            "min" => 2,
            "max" => 20,
        ],
        "salary-paid" => [
            "name" => "Bank",
            "required" => false,
            "min" => 2,
            "pattern" => "/$[0-9,]*$/",
            "max" => 20,
        ],
        "residence" => [
            "name" => "Current Residence",
            "required" => true,
            "pattern" => "/^[a-zA-z ]*$/",
            "min" => 2,
            "max" => 500,
        ],
        "pickup-station" => [
            "name" => "Pickup station",
            "required" => true,
            "pattern" => "/^[a-z,A-z ]*$/",
            "min" => 2,
            "max" => 500,
        ],
        "website" => [
            "required" => false,
            "name" => "Website",
            "constant" => FILTER_VALIDATE_URL,
        ],
        "county" => [
            "name" => "County name",
            "required" => true,
            "pattern" => "/^[a-zA-Z]*$/",
            "min" => 2,
            "max" => 500,
        ],
        "city" => [
            "name" => "City",
            "required" => true,
            "pattern" => "/^[a-zA-Z]*$/",
            "min" => 2,
            "max" => 500,
        ],
        "postal-address" => [
            "name" => "Postal Address",
            "required" => true,
            "pattern" => "/^[a-zA-Z0-9- ]*$/",
            "min" => 2,
            "max" => 500,
        ],
        "employee-id" => [
            "required" => true,
            "pattern" => "/^[A-Z0-9]*$/",
            "min" => 10,
            "max" => 15,
            "table" => "employees",
            "permit" => false,
            "unique" => true,
            "field" => "employee_id",
            "allowIfExists" => true,
            "mustConfirm" => false,
            "uniqueId" => ""
        ],
    ];

    /**
     * @param array $data - Form Data
     * @return mixed
     * 
     * The rule engine. Extracts the array keys in the data submitted
     * Checks if the individual keys from the data exist in the rules array
     * Pushes rules that match keys of the data into an array - the generatedRules
     * array. 
     * Replaces the new keys created with the initial keys of the rules array 
     * found in the data keys.
     */

    protected function __construct(array $data)
    {
        $this->dataKeys[] = array_keys($data);
        foreach ($this->dataKeys as $data_key => $keys) {
            foreach (array_values($keys) as $key) {
                if (!array_key_exists($key, $this->rules)) {
                    unset($data[$key]);
                    $this->dataKeys = array_keys($data);
                } else
                    array_push($this->generatedRules, $this->rules[$key]);
            }
            if (count($this->generatedRules)) {
                $_keys = array_keys($this->generatedRules);
                $values = array_values($this->generatedRules);
                foreach ($this->dataKeys as $key) {
                    $_keys = array_replace($_keys, $key);
                }
                $this->generatedRules = array_combine($_keys, $values);
            }
        }
        return $this;
    }
}
