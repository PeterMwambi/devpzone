<?php

defined("PATHNAME") === TRUE or exit(header("location:../"));
//Check Authentication key
//If isset Authentication key in session
//Validate Authentication key
//If Authentication key is not set
//Redirect user to admin login page
if (!Session::exists("ADMIN-PASSKEY-PHRASE")) {
    session_destroy();
    exit(header("location:" . Directories::getLocation("authentication/logout.php")));
} else {
    if (!Functions::decrypt(Session::getValue("ADMIN-PASSKEY-PHRASE"))) {
        session_destroy();
        exit(header("location:" . Directories::getLocation("authentication/logout.php")));
    }
}
