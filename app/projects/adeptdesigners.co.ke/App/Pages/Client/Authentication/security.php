<?php

defined("PATHNAME") === TRUE or exit(header("location:../"));

if (!Session::exists("CLIENT_PASSKEY_AUTHENTICATOR") && !Functions::decrypt(Session::getValue("CLIENT_PASSKEY_AUTHENTICATOR"))) {
    die(header("location:../?request=login"));
}
