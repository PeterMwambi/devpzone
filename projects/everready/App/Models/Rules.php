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
    protected $generated_rules = array();

    /**
     * @var array $rule_keys
     * 
     * Obtains data keys from the data presented after form has been submitted
     */

    protected $data_keys = array();

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
            "checkField" => "",
            "grantAccessIfExists" => false,
            "unique" => true,
            "permit" => false,
        ],
        "firstname" => [
            "required" => true,
            "name" => "Firstname",
            "min" => 2,
            "max" => 25,
            "pattern" => "/^[A-Za-z ]*$/",
        ],
        "pickup-point" => [
            "required" => true,
            "name" => "Pickup Point",
            "min" => 2,
            "max" => 25,
            "pattern" => "/^[A-Za-z ]*$/",
        ],
        "destination-point" => [
            "required" => true,
            "name" => "Destination point",
            "min" => 2,
            "max" => 25,
            "pattern" => "/^[A-Za-z ]*$/",
        ],
        "start-location" => [
            "required" => true,
            "name" => "Start Location",
            "min" => 2,
            "max" => 25,
            "pattern" => "/^[A-Za-z ]*$/",
        ],
        "destination-location" => [
            "required" => true,
            "name" => "Destination Location",
            "min" => 2,
            "max" => 25,
            "pattern" => "/^[A-Za-z ]*$/",
        ],

        "fare" => [
            "name" => "Fare",
            "required" => true,
            "pattern" => "/^[0-9]*$/",
        ],
        "middlename" => [
            "required" => true,
            "name" => "Middlename",
            "min" => 2,
            "max" => 25,
            "pattern" => "/^[A-Za-z ]*$/",
        ],
        "lastname" => [
            "required" => true,
            "name" => "Lastname",
            "min" => 2,
            "max" => 30,
            "pattern" => "/^[A-Za-z]*$/",
        ],
        "role" => [
            "required" => true,
            "name" => "Role",
            "min" => 2,
            "max" => 30,
            "pattern" => "/^[A-Za-z]*$/",
        ],
        "email" => [
            "required" => true,
            "name" => "Email",
            "unique" => true,
            "update" => false,
            "constant" => FILTER_VALIDATE_EMAIL,
            "checkField" => "",
            "table" => "",
            "permit" => false,
            "grantAccessIfExists" => false
        ],
        "password" => [
            "name" => "Password",
            "required" => true,
            "pattern" => "/^[0-9A-Za-z$@#%!*?_,]*$/",
            "min" => 6,
        ],
        "confirm-password" => [
            "required" => true,
            "name" => "Confirm password",
            "matches" => "password"
        ],
        "phone-number" => [
            "required" => true,
            "name" => "Phone number",
            "pattern" => "/^[0-9]{9,10}$/",
            "table" => "",
            "checkField" => "",
            "unique" => true,
            "permit" => false,
        ],
        "gender" => [
            "name" => "Gender",
            "required" => false,
            "values" => array("male", "female", "rather-not-say")
        ],
        "relation" => [
            "name" => "Kin",
            "required" => false,
            "values" => array("Mother", "Father", "Spouse", "Friend")
        ],
        "contact-mode" => [
            "required" => false,
            "name" => "Contact mode",
            "values" => array("Email", "Mobile")
        ],
        "nickname" => [
            "name" => "Nickname",
            "required" => false,
            "pattern" => "/^[a-zA-Z]*$/",
            "min" => 2,
            "max" => 20
        ],
        "payment-mode" => [
            "name" => "Payment mode",
            "required" => true,
            "values" => array("Mpesa", "Paypal")
        ],
        "marital-status" => [
            "name" => "Marital Status",
            "required" => true,
            "values" => array("Single", "Married", "Divorced")
        ],
        "name" => [
            "name" => "",
            "required" => true,
            "table" => "",
            "permit" => false,
            "grantAccessIfExists" => false,
            "checkField" => "",
            "unique" => true,
            "pattern" => "/^[a-z A-Z,&-]*$/",
            "min" => 2,
            "max" => 100
        ],
        "driver-id" => [
            "required" => true,
            "name" => "Unique identifier",
            "unique" => true,
            "checkField" => "",
            "grantAccessIfExists" => false,
            "table" => "",
            "permit" => false
        ],
        "website" => [
            "required" => false,
            "name" => "Website",
            "constant" => FILTER_VALIDATE_URL,
        ],
        "vehicle-id" => [
            "name" => "Vehicle Id",
            "required" => true,
            "unique" => true,
            "checkField" => "",
            "grantAccessIfExists" => false,
            "permit" => false,
            "table" => ""
        ],
        "number-plate" => [
            "required" => true,
            "unique" => true,
            "permit" => false,
            "table" => "",
            "pattern" => "/^[a-z A-Z0-9]*$/",
            "checkField" => "",
            "grantAccessIfExists" => false,
            "min" => 7,
            "max" => 7
        ],
        "model" => [
            "name" => "Car Model",
            "required" => true,
            "pattern" => "/^[a-z A-Z0-9]*$/",
            "min" => 2,
            "max" => 100
        ],
        "make" => [
            "required" => true,
            "name" => "Car Make",
            "required" => true,
            "pattern" => "/^[a-z A-Z,&-]*$/",
            "min" => 2,
            "max" => 100
        ],
        "location" => [
            "required" => true,
            "name" => "Location",
            "unique" => true,
            "table" => "",
            "permit" => false,
            "checkField" => "",
            "grantAccessIfExists" => true,
        ],
        "pickup" => [
            "required" => true,
            "name" => "Pick up Point",
            "min" => 2,
            "max" => 50,
            "pattern" => "/^[A-Za-z ]*$/",
        ],
        "destination" => [
            "required" => true,
            "name" => "Destination",
            "min" => 2,
            "max" => 50,
            "pattern" => "/^[A-Za-z ]*$/",
        ]
    ];

    /**
     * @param array $data - Form Data
     * @return mixed
     * 
     * The rule engine. Extracts the array keys in the data submitted
     * Checks if the individual keys from the data exist in the rules array
     * Pushes rules that match keys of the data into an array - the generated_rules
     * array. 
     * Replaces the new keys created with the initial keys of the rules array 
     * found in the data keys.
     */

    protected function __construct(array $data)
    {
        $this->data_keys[] = array_keys($data);
        foreach ($this->data_keys as $data_key => $keys) {
            foreach (array_values($keys) as $key) {
                if (!array_key_exists($key, $this->rules)) {
                    unset($data[$key]);
                    $this->data_keys = array_keys($data);
                } else
                    array_push($this->generated_rules, $this->rules[$key]);
            }
            if (count($this->generated_rules)) {
                $_keys = array_keys($this->generated_rules);
                $values = array_values($this->generated_rules);
                foreach ($this->data_keys as $key) {
                    $_keys = array_replace($_keys, $key);
                }
                $this->generated_rules = array_combine($_keys, $values);
            }
        }
        return $this;
    }
}
