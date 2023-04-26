<?php

use Models\Auth\Input;
use Models\Core\App\Utilities\Session;
use Models\Core\App\Utilities\Url;
use Views\Includes\Components\Classes\Page;


require_once(Url::getPath("app/views/includes/components/renders/renders.php"));

Session::start();

Page::runAuth(
    [
        "tutor-home",
        "course-reception",
        "tutor-courses",
        "tutor-course-content",
        "tutor-student-payments",
        "tutor-students",
        "tutor-classes"
    ],
    "TUTOR_ACCOUNT_ACCESS",
    "TUTOR_USER_AUTH",
    "tutor-login"
);


runTutorPageSetUp();


?>