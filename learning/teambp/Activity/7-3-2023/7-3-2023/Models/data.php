<?php
/**
 * Requires a script on to the current file
 * @param string file path
 */
require_once("conn.php");
/**
 * Generates a unique client id
 * @var string clientId
 */


if (isset($_POST["submit"])) {
    $error = null;
    $clientId = uniqid();
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $gender = $_POST["gender"];
    $nationality = $_POST["nationality"];
    $nationalId = $_POST["national-id"];
    $phoneNumber = $_POST["phone-number"];
    $email = $_POST["email"];

    if (empty($firstname)) {
        $error = "Your first name is required";
    }
    if (empty($lastname)) {
        $error = "Your last name is required";
    }
    if (empty($gender)) {
        $error = "Your gender is required";
    }
    if (empty($nationality)) {
        $error = "Your nationality is required";
    }
    if (empty($nationalId)) {
        $error = "Your national id is required";
    }
    if (empty($phoneNumber)) {
        $error = "Your phone number is required";
    }
    if (empty($email)) {
        $error = "Your email is required";
    }

    if (is_null($error)) {
        $conn = connect();
        /**
         * 
         */
        $sql = "INSERT INTO client_personal_info
(cl_id,
cl_firstname,
cl_lastname,
cl_gender,
cl_nationality,
cl_national_id,
cl_phone_no,
cl_email) VALUES(?,?,?,?,?,?,?,?)";
        /**
         * Uses the PDO prepare() method to prepare an sql statement
         * @var object stmt
         * @param string sql
         */
        $stmt = $conn->prepare($sql);
        /**
         * Binds the first prepared statement value to the client id
         * @var object stmt 
         * @param int 1
         * @param string clientId
         */
        $stmt->bindparam(1, $clientId);
        $stmt->bindparam(2, $firstname);
        $stmt->bindparam(3, $lastname);
        $stmt->bindparam(4, $gender);
        $stmt->bindparam(5, $nationality);
        $stmt->bindparam(6, $nationalId);
        $stmt->bindparam(7, $phoneNumber);
        $stmt->bindparam(8, $email);
        $stmt->execute();
    }
}