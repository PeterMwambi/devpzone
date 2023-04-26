<?php

use Models\Auth\Hashing;
use Models\Auth\Token;

define(
    "MEMBER_REGISTRATION_RULES",
    [
        "form" => "user-registration-form-step-1",
        "csrf-token" => Token::run()->generate("USER_REGISTRATION_FORM_STEP_1"),
        "form-identifier" => Hashing::Encrypt("USER_REGISTRATION_FORM_STEP_1"),
        "rules" => [
            "firstname" => [
                "required" => true,
                "type" => "text",
                "min" => 2,
                "max" => 30,
                "verify" => "length",
                "pattern" => "letters only",
            ],
            "lastname" => [
                "required" => true,
                "type" => "text",
                "min" => 2,
                "max" => 30,
                "pattern" => "letters only",
            ],
            "gender" => [
                "required" => true,
                "type" => "select",
                "min" => 2,
                "max" => 30,
                "values" => ["Male", "Female", "Rather not say"]
            ],
            "date-of-birth" => [
                "required" => true,
                "type" => "date",
                "rules" => [
                    "start-year" => (date("Y") - 70),
                    "end-year" => (date("Y") - 18)
                ]
            ],
            "age" => [
                "required" => true,
                "type" => "number",
                "min" => 2,
                "max" => 30,
                "pattern" => "numbers only"
            ],
            "phone-number" => [
                "required" => true,
                "type" => "number",
                "min" => 2,
                "max" => 30,
                "pattern" => "numbers only",
                "unique" => true,
                "exists" => false,
                "database" => "dpz_app_data",
                "table" => "dpz_users_personal_info",
                "column" => "dpzu_phone_number"
            ],
            ""
        ]
    ]
);


print_r(MEMBER_REGISTRATION_RULES);