<?php

use Models\Auth\Input;
use Models\Core\App\Database\Queries\Read\Student;
use Models\Core\App\Utilities\Session;
use Views\Includes\Components\Classes\Page;


/*
```````````````````````````````````````````````````````````
PAGE DEFAULT PROPERTIES
```````````````````````````````````````````````````````````
*/

/**
 * Page setup defaults
 * @param Page $page
 * @return void
 */
function runPageSetupDefaults(Page $page)
{
    $page->setMeta("app/views/includes/meta/head.php");
    $page->setScripts("app/views/includes/meta/scripts.php");
}



/*
```````````````````````````````````````````````````````````
ADMIN PAGE SETUP
```````````````````````````````````````````````````````````
*/

/**
 * Admin page setup
 * @return void
 */

function runAdminPageSetup()
{
    $page = new Page;
    runPageSetupDefaults($page);
    $page->setSpecialRequests([
        "admin-login",
        "admin-registration",
        "admin-course-category-registration",
        "admin-course-registration"
    ]);
    $views = "app/views/includes/containers/admin/views.php";
    $forms = "app/views/includes/containers/admin/forms.php";
    $page->setPages([
        "admin-home" => $views,
        "admin-login" => $forms,
        "admin-registration" => $forms,
        "admin-course-category-registration" => $forms,
        "admin-course-registration" => $forms,
        "admin-payments" => $views,
        "admin-students" => $views,
        "admin-tutors" => $views,
        "admin-administrators" => $views,
        "admin-classes" => $views,
        "admin-courses" => $views,
        "admin-categories" => $views
    ]);
    $page->setAction("page");
    $page->runSetup();
}
/**
 * Admin views handler
 * @return void
 */
function runAdminViewsHandler()
{
    $page = new Page;
    $page->setPageHandlers([
        "admin-home" => "runAdminHomepageSectionSetup",
        "admin-payments" => "runAdminViewStudentTutorPaymentSectionSetup",
        "admin-students" => "runAdminViewStudentsSectionSetup",
        "admin-tutors" => "runAdminViewTutorsSectionSetup",
        "admin-administrators" => "runAdminViewAdministratorsSectionSetup",
        "admin-classes" => "runAdminViewClassesSectionSetup",
        "admin-courses" => "runAdminViewCoursesSectionSetup",
        "admin-categories" => "runAdminViewCourseCategoriesSectionSetup"
    ]);
    $page->setAction("handler");
    $page->runSetup();
}
/**
 * Admin form handler
 * @return void
 */
function runAdminFormHandler()
{
    $page = new Page;
    $page->setPageHandlers([
        "admin-registration" => "runAdminRegistrationFormSectionSetup",
        "admin-login" => "runAdminLoginFormSectionSetup",
        "admin-course-category-registration" => "runAdminCourseCategoryFormSectionSetup",
        "admin-course-registration" => "runAdminCourseRegistrationFormSectionSetup"
    ]);
    $page->setAction("handler");
    $page->runSetup();
}

/*
````````````````````````````````````````````````````````````
TUTOR PAGE SETUP
````````````````````````````````````````````````````````````
*/

/**
 * Tutor page setup
 * @return void
 */
function runTutorPageSetup()
{
    $page = new Page;
    runPageSetupDefaults($page);
    $page->setSpecialRequests([
        "tutor-registration",
        "tutor-login",
    ]);
    $views = "app/views/includes/containers/tutor/views.php";
    $forms = "app/views/includes/containers/tutor/forms.php";
    $page->setPages([
        "tutor-home" => $views,
        "tutor-login" => $forms,
        "tutor-registration" => $forms,
        "tutor-course-reception" => $forms,
        "tutor-courses" => $views,
        "tutor-course-content" => $views,
        "tutor-student-payments" => $views,
        "tutor-students" => $views,
        "tutor-classes" => $views
    ]);
    $page->setAction("page");
    $page->runSetup();
}


/**
 * Tutor form handler
 * @return void
 */
function runTutorFormHandler()
{
    $page = new Page;
    $page->setPageHandlers([
        "tutor-registration" => "runTutorRegistrationFormSectionSetup",
        "tutor-login" => "runTutorLoginFormSectionSetup",
        "tutor-course-reception" => "runTutorCourseReceptionFormSectionSetup",
    ]);
    $page->setAction("handler");
    $page->runSetup();
}

/**
 * Tutor views handler
 * @return void
 */
function runTutorViewsHandler()
{
    $page = new Page;
    $page->setPageHandlers([
        "tutor-home" => "runTutorHomepageSectionSetup",
        "tutor-courses" => "runTutorViewCoursesSectionSetup",
        "tutor-course-content" => "runTutorViewCourseContentSectionSetup",
        "tutor-student-payments" => "runTutorViewStudentPaymentSectionSetup",
        "tutor-students" => "runTutorViewStudentsSectionSetup",
        "tutor-classes" => "runTutorViewClassesSectionSetup"
    ]);
    $page->setAction("handler");
    $page->runSetup();
}


/*
````````````````````````````````````````````````````````````
STUDENT PAGE SETUP
````````````````````````````````````````````````````````````
*/
/**
 * Student page setup
 * @return void
 */
function runStudentPageSetup()
{
    $page = new Page;
    runPageSetupDefaults($page);
    $page->setSpecialRequests([
        "student-registration",
        "student-login"
    ]);
    $forms = "app/views/includes/containers/student/forms.php";
    $views = "app/views/includes/containers/student/views.php";
    $page->setPages([
        "home" => $views,
        "student-login" => $forms,
        "student-registration" => $forms,
        "student-home" => $views,
        "student-fee-payment" => $forms,
        "student-payments" => $views,
        "student-courses" => $views
    ]);
    $page->setAction("page");
    $page->runSetup();
}

/**
 * Student views handler
 * @return void
 */
function runStudentViewsHandler()
{
    $page = new Page;
    $page->setPageHandlers([
        "student-home" => "runStudentHomepageSectionSetup",
        "student-payments" => "runStudentViewFeePaymentSectionSetup",
        "student-courses" => "runStudentViewCoursesSectionSetup"
    ]);
    $page->setAction("handler");
    $page->runSetup();
}

/**
 * Student form handler
 * @return void
 */
function runStudentFormHandler()
{
    $page = new Page;
    $page->setPageHandlers([
        "student-registration" => "runStudentRegistrationFormSectionSetup",
        "student-login" => "runStudentLoginFormSectionSetup",
        "student-fee-payment" => "runStudentFeePaymentFormSectionSetup"
    ]);
    $page->setAction("handler");
    $page->runSetup();
}


/*
``````````````````````````````````````````````````````````
ON PAGE FUNCTIONS
`````````````````````````````````````````````````````````
*/

/**
 * process student fee payment
 * @return void
 */

function processStudentFeePayment()
{
    if (Input::get("cid") && Input::get("tid")) {
        Session::start();
        if (!session::exists("STUDENT_ACCOUNT_ACCESS")) {
            Session::set("prompt-login", true);
            header("location: student-login");
        } else {
            Session::set("cid", Input::get("cid"));
            Session::set("tid", Input::get("tid"));
            header("location: student-fee-payment");
        }
    }
}


/**
 * get student signed classes
 * @return array|bool
 */
function getStudentClasses()
{
    $student = new Student;
    if (is_array($student->getSignedClasses())) {
        if (count($student->getSignedClasses())) {
            return $student->getSignedClasses();
        } else {
            return false;
        }
    } else {
        return false;
    }

}

/**
 * Get class beginninig date
 * @param string $date
 * @return string
 */
function getItemDate(string $date)
{
    $date = json_decode($date);
    return $date->day . ", " . $date->date . " " . $date->time;
}

function getClassContent(string $clid)
{
    $student = new Student;
    if (is_array($student->getCourseContent($clid))) {
        return $student->getCourseContent($clid);
    } else {
        return false;
    }
}