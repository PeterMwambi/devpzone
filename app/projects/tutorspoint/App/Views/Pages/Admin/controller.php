<?php

use Models\Core\App\Utilities\Session;
use Models\Core\App\Utilities\Url;
use Views\Includes\Components\Classes\Page;


Session::start();

Page::runAuth(
    [
        "course-registration",
        "course-category-registration",
        "admin-registration",
        "admin-home",
        "admin-payments"
    ],
    "ADMIN_ACCOUNT_ACCESS",
    "ADMIN_USER_AUTH",
    "admin-login"
);


require_once(Url::getPath("app/views/includes/components/renders/renders.php"));


runAdminPageSetup();

?>