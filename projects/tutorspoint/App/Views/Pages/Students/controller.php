<?php

use Models\Auth\Input;
use Models\Core\App\Utilities\Session;
use Models\Core\App\Utilities\Url;
use Views\Includes\Components\Classes\Page;


require_once(Url::getPath("app/views/includes/components/renders/renders.php"));

Session::start();

Page::runAuth(
    [
        "fee-payment",
        "student-home",
        "student-payments",
        "student-courses"
    ],
    "STUDENT_ACCOUNT_ACCESS",
    "STUDENT_USER_AUTH",
    "student-login"
);

processStudentFeePayment();

runStudentPageSetUp();


?>