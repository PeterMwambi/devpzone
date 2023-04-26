<?php

namespace Models\Authentication\Validation;

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
        "firstname" => [
            "required" => true,
            "name" => "Firstname",
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
        "text" => [
            "required" => true,
            "name" => "Question",
            "min" => 2,
            "max" => 500,
            "pattern" => "/^[A-Z a-z0-9?.,-\/]*$/",
        ],
        "email" => [
            "required" => true,
            "name" => "Email",
            "unique" => true,
            "constant" => FILTER_VALIDATE_EMAIL,
            "table" => "admin",
            "field" => "adm_email",
            "permit" => false,
            "allowIfExists" => false,
            "mustConfirm" => false,
            "uniqueId" => ""
        ],
        "phone-number" => [
            "required" => true,
            "name" => "Phone number",
            "pattern" => "/^[0-9]{9,10}$/",
            "table" => "admin",
            "field" => "adm_phonenumber",
            "unique" => true,
            "permit" => false,
            "allowIfExists" => false,
            "mustConfirm" => false,
            "uniqueId" => ""
        ],
        "username" => [
            "required" => true,
            "name" => "Username",
            "min" => 2,
            "max" => 15,
            "pattern" => "/^[A-Za-z]*$/",
            "table" => "admin",
            "unique" => true,
            "field" => "adm_username",
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
        "question-id" => [
            "min" => 2,
            "max" => 30,
            "pattern" => "/^[A-Za-z0-9]*$/",
        ]
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

    protected function GetRules(array $data)
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