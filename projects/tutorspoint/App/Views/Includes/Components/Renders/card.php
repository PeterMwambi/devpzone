<?php

use Models\Core\App\Database\Queries\Read\Admin;
use Models\Core\App\Database\Queries\Read\Student;
use Models\Core\App\Database\Queries\Read\Tutor;
use Models\Core\App\Utilities\Session;
use Models\Core\App\Utilities\Url;
use Views\Includes\Components\Classes\Card;


/**
 * Form card setup defaults
 * @param Card $card
 * @return void
 */
function formSetupDefaults(Card $card)
{
    $card->setCardSizing("my-5");
    $card->setCardBodySizing("p-4");
    $card->setType("default");
    $card->runSetup();
}

/**
 * Tutor Registration form card setup
 * @return void
 */
function runTutorRegistrationFormCardSetup()
{
    $card = new Card();
    $card->setCardBodyContent(["runTutorRegistrationFormHeaderSetUp", "runSpinnerSetUp", "runFormAlertSetup"]);
    $card->setHasDiv(true);
    $card->setDivClasses("mt-3");
    $card->setDivContent(["runCompleteSetupAlert", "runTutorRegistrationFormSetupStep2", "runTutorRegistrationFormSetupStep1"]);
    formSetupDefaults($card);
}

/**
 * Tutor login form card setup
 * @return void
 */
function runTutorLoginFormCardSetup()
{
    $card = new Card();
    $card->setCardBodyContent(["runTutorLoginFormHeaderSetUp", "runSpinnerSetUp", "runFormAlertSetup"]);
    $card->setHasDiv(true);
    $card->setDivClasses("mt-3");
    $card->setDivContent(["runCompleteSetupAlert", "runTutorLoginFormSetup"]);
    formSetupDefaults($card);
}

/**
 * Student registration form card setup
 * @return void
 */
function runStudentRegistrationFormCardSetup()
{
    $card = new Card();
    $card->setCardBodyContent(["runStudentRegistrationFormHeaderSetUp", "runSpinnerSetUp", "runFormAlertSetup"]);
    $card->setHasDiv(true);
    $card->setDivClasses("mt-3");
    $card->setDivContent(["runCompleteSetupAlert", "runStudentRegistrationFormSetupStep2", "runStudentRegistrationFormSetupStep1"]);
    formSetupDefaults($card);
}

/**
 * Student login form card setup
 * @return void
 */
function runStudentLoginFormCardSetup()
{
    $card = new Card();
    $card->setCardBodyContent(["runStudentLoginFormHeaderSetUp", "runSpinnerSetUp", "runFormAlertSetup"]);
    $card->setHasDiv(true);
    $card->setDivClasses("mt-3");
    $card->setDivContent(["runCompleteSetupAlert", "runStudentLoginFormSetup"]);
    formSetupDefaults($card);
}

/**
 * Student fee payment form card setup
 * @return void
 */
function runStudentFeePaymentFormCardSetup()
{
    $card = new Card();
    $card->setCardBodyContent(["runStudentFeePaymentFormHeaderSetUp", "runSpinnerSetUp", "runFormAlertSetup"]);
    $card->setHasDiv(true);
    $card->setDivClasses("mt-3");
    $card->setDivContent(["runCompleteSetupAlert", "runStudentFeePaymentFormSetup"]);
    formSetupDefaults($card);
}
/**
 * Admin registration form card setup
 * @return void
 */
function runAdminRegistrationFormCardSetup()
{
    $card = new Card();
    $card->setCardBodyContent(["runAdminRegistrationFormHeaderSetUp", "runSpinnerSetUp", "runFormAlertSetup"]);
    $card->setHasDiv(true);
    $card->setDivClasses("mt-3");
    $card->setDivContent(["runCompleteSetupAlert", "runAdminRegistrationFormSetupStep2", "runAdminRegistrationFormSetupStep1"]);
    formSetupDefaults($card);
}
/**
 * Admin login form card setup
 * @return void
 */
function runAdminLoginFormCardSetup()
{
    $card = new Card();
    $card->setCardBodyContent(["runAdminLoginFormHeaderSetUp", "runSpinnerSetUp", "runFormAlertSetup"]);
    $card->setHasDiv(true);
    $card->setDivClasses("mt-3");
    $card->setDivContent(["runCompleteSetupAlert", "runAdminLoginFormSetup"]);
    formSetupDefaults($card);
}
/**
 * Admin Course category setup
 * @return void
 */
function runAdminCourseCategoryFormCardSetup()
{
    $card = new Card();
    $card->setCardBodyContent(["runAdminCourseCategoryFormHeaderSetUp", "runSpinnerSetUp", "runFormAlertSetup"]);
    $card->setHasDiv(true);
    $card->setDivClasses("mt-3");
    $card->setDivContent(["runCompleteSetupAlert", "runAdminCourseCategoryFormSetup"]);
    formSetupDefaults($card);
}
/**
 * Admin Course registration setup
 * @return void
 */
function runAdminCourseRegistrationFormCardSetup()
{
    $card = new Card();
    $card->setCardBodyContent(["runAdminCourseRegistrationFormHeaderSetUp", "runSpinnerSetUp", "runFormAlertSetup"]);
    $card->setHasDiv(true);
    $card->setDivClasses("mt-3");
    $card->setDivContent(["runCompleteSetupAlert", "runAdminCourseRegistrationFormSetup"]);
    formSetupDefaults($card);
}
/**
 * Tutor course reception form
 * @return void
 */
function runTutorCourseReceptionFormCardSetup()
{
    $card = new Card();
    $card->setCardBodyContent(["runTutorCourseReceptionFormHeaderSetUp", "runSpinnerSetUp", "runFormAlertSetup"]);
    $card->setHasDiv(true);
    $card->setDivClasses("mt-3");
    $card->setDivContent(["runCompleteSetupAlert", "runTutorCourseReceptionFormSetup"]);
    formSetupDefaults($card);
}
/**
 * Admin homepage setup
 * @return void
 */
function runAdminHomepageSetup()
{
    $card = new Card;
    $card->setProfileCardItems([
        "Students",
        "Tutors",
        "Administrators",
        "Classes",
        "Courses",
        "Course categories",
        "Payments",
    ]);
    $student = Url::getReference("resources/assets/images/png/kyc.png");
    $tutor = Url::getReference("resources/assets/images/png/office.png");
    $admin = Url::getReference("resources/assets/images/png/software-engineer.png");
    $courses = Url::getReference("resources/assets/images/png/resume.png");
    $category = Url::getReference("resources/assets/images/png/app.png");
    $payment = Url::getReference("resources/assets/images/png/dollar.png");
    $classes = Url::getReference("resources/assets/images/png/workplace.png");
    $open = Url::getReference("resources/assets/images/png/open-folder.png");
    $add = Url::getReference("resources/assets/images/png/add.png");
    $card->setProfileCardIcons([
        "Students" => $student,
        "Tutors" => $tutor,
        "Administrators" => $admin,
        "Classes" => $classes,
        "Courses" => $courses,
        "Course categories" => $category,
        "Payments" => $payment,
        "View students" => $open,
        "View tutors" => $open,
        "View admins" => $open,
        "Add admin" => $add,
        "View classes" => $open,
        "View courses" => $open,
        "View categories" => $open,
        "Add category" => $add,
        "Add course" => $add,
        "View payments" => $open,
    ]);
    $card->setProfileCardParagraphs([
        "Students" => "Consist of students with user accounts",
        "Tutors" => "Consist of trainers with user accounts",
        "Administrators" => "Consist of administrators with admin accounts",
        "Classes" => "Consist of registered classes",
        "Courses" => "Consist of registered courses",
        "Course categories" => "Consist of all course categories",
        "Payments" => "Consist of all payments",
    ]);
    $card->setProfileCardButtons([
        "Students" => [
            "View students"
        ],
        "Tutors" => [
            "View tutors"
        ],
        "Administrators" => [
            "View admins",
            "Add admin"
        ],
        "Classes" => [
            "View classes"
        ],
        "Courses" => [
            "View courses",
            "Add course"
        ],
        "Course categories" => [
            "View categories",
            "Add category"
        ],
        "Payments" => [
            "View payments"
        ]
    ]);


    $card->setProfileCardButtonProperties([
        "View students" => "btn btn-primary",
        "View tutors" => "btn btn-primary",
        "View admins" => "btn btn-primary me-2",
        "Add admin" => "btn btn-secondary me-2",
        "View classes" => "btn btn-primary",
        "View courses" => "btn btn-primary me-2",
        "View categories" => "btn btn-primary me-2",
        "Add category" => "btn btn-secondary me-2",
        "Add course" => "btn btn-secondary me-2",
        "View payments" => "btn btn-primary me-2",
    ]);
    $card->setProfileCardButtonLinks([
        "View students" => "admin-students",
        "View tutors" => "admin-tutors",
        "View admins" => "admin-administrators",
        "Add admin" => "admin-registration",
        "View classes" => "admin-classes",
        "View courses" => "admin-courses",
        "Add course" => "admin-course-registration",
        "View payments" => "admin-payments",
        "View categories" => "admin-categories",
        "Add category" => "admin-course-category-registration"
    ]);
    $card->setItemCountHeading([
        "Students" => "Total number of students",
        "Tutors" => "Total number of tutors",
        "Administrators" => "Total number of administrators",
        "Classes" => "Total number of classes",
        "Courses" => "Total number of courses",
        "Course categories" => "Total number of categories",
        "Payments" => "Total number of payments",
    ]);
    $admin = new Admin;
    $card->setItemCount([
        "Students" => is_array($admin->getStudents()) ? count($admin->getStudents()) : 0,
        "Tutors" => is_array($admin->getTutors()) ? count($admin->getTutors()) : 0,
        "Administrators" => is_array($admin->getAdministrators()) ? count($admin->getAdministrators()) : 0,
        "Classes" => is_array($admin->getClasses()) ? count($admin->getClasses()) : 0,
        "Courses" => is_array($admin->getCourses()) ? count($admin->getCourses()) : 0,
        "Course categories" => is_array($admin->getCourseCategories()) ? count($admin->getCourseCategories()) : 0,
        "Payments" => is_array($admin->getStudentTutorPayments()) ? count($admin->getStudentTutorPayments()) : 0,
    ]);
    $card->setType("profile-card");
    $card->runSetup();
}

/**
 * Admin homepage setup
 * @return void
 */
function runTutorHomepageSetup()
{
    $card = new Card;
    $card->setProfileCardItems([
        "Courses",
        "Classes",
        "Students",
        "Payments",
    ]);
    $student = Url::getReference("resources/assets/images/png/kyc.png");
    $courses = Url::getReference("resources/assets/images/png/resume.png");
    $payment = Url::getReference("resources/assets/images/png/dollar.png");
    $classes = Url::getReference("resources/assets/images/png/workplace.png");
    $open = Url::getReference("resources/assets/images/png/open-folder.png");
    $add = Url::getReference("resources/assets/images/png/add.png");
    $card->setProfileCardIcons([
        "Students" => $student,
        "Classes" => $classes,
        "Courses" => $courses,
        "Payments" => $payment,
        "View students" => $open,
        "View classes" => $open,
        "View courses" => $open,
        "View categories" => $open,
        "View payments" => $open,
        "Register course" => $add
    ]);
    $card->setProfileCardParagraphs([
        "Students" => "Consist of all students enrolled in the courses that you teach",
        "Classes" => "Consist of all classes that you handle",
        "Courses" => "Consist of all courses that you teach",
        "Payments" => "Consist of all payments made to you by students",
    ]);
    $card->setProfileCardButtons([
        "Students" => [
            "View students"
        ],
        "Classes" => [
            "View classes"
        ],
        "Courses" => [
            "View courses",
            "Register course"
        ],
        "Payments" => [
            "View payments"
        ]
    ]);


    $card->setProfileCardButtonProperties([
        "View students" => "btn btn-primary",
        "View classes" => "btn btn-primary",
        "View courses" => "btn btn-primary me-2",
        "View payments" => "btn btn-primary me-2",
        "Register course" => "btn btn-secondary me-2",
    ]);
    $card->setProfileCardButtonLinks([
        "View students" => "tutor-students",
        "View classes" => "tutor-classes",
        "View courses" => "tutor-courses",
        "View payments" => "tutor-student-payments",
        "Register course" => "tutor-course-reception"
    ]);
    $card->setItemCountHeading([
        "Students" => "Total number of students",
        "Classes" => "Total number of classes",
        "Courses" => "Total number of courses",
        "Payments" => "Total number of payments",
    ]);
    $card->setItemCount([
        "Students" => is_array(Tutor::run()->getStudents(Session::get("t_username"))) ? count(Tutor::run()->getStudents(Session::get("t_username"))) : 0,
        "Classes" => is_array(Tutor::run()->getClasses(Session::get("t_username"))) ? count(Tutor::run()->getClasses(Session::get("t_username"))) : 0,
        "Courses" => is_array(Tutor::run()->getTutorCourses(Session::get("t_username"))) ? count(Tutor::run()->getTutorCourses(Session::get("t_username"))) : 0,
        "Payments" => is_array(Tutor::run()->getStudentPayments(Session::get("t_username"))) ? count(Tutor::run()->getStudentPayments(Session::get("t_username"))) : 0,
    ]);
    $card->setType("profile-card");
    $card->runSetup();
}

/**
 * Student homepage setup
 * @return void
 */
function runStudentHomepageSetup()
{
    $card = new Card;
    $card->setProfileCardItems([
        "Courses",
        "Classes",
        "Payments",
    ]);
    $courses = Url::getReference("resources/assets/images/png/resume.png");
    $payment = Url::getReference("resources/assets/images/png/dollar.png");
    $classes = Url::getReference("resources/assets/images/png/workplace.png");
    $open = Url::getReference("resources/assets/images/png/open-folder.png");
    $card->setProfileCardIcons([
        "Classes" => $classes,
        "Courses" => $courses,
        "Payments" => $payment,
        "My classes" => $open,
        "My courses" => $open,
        "My payments" => $open,
    ]);
    $card->setProfileCardParagraphs([
        "Classes" => "Consist of all classes that you have joined",
        "Courses" => "Consist of all courses that you are pursuing",
        "Payments" => "Consist of all payments you have made",
    ]);
    $card->setProfileCardButtons([
        "Classes" => [
            "My classes"
        ],
        "Courses" => [
            "My courses",
        ],
        "Payments" => [
            "My payments"
        ]
    ]);


    $card->setProfileCardButtonProperties([
        "My classes" => "btn btn-primary",
        "My courses" => "btn btn-primary me-2",
        "My payments" => "btn btn-primary me-2",
    ]);
    $card->setProfileCardButtonLinks([
        "My classes" => "student-classroom",
        "My courses" => "student-courses",
        "My payments" => "student-payments",
    ]);
    $card->setItemCountHeading([
        "Classes" => "Total number of classes",
        "Courses" => "Total number of courses",
        "Payments" => "Total number of payments",
    ]);
    $card->setItemCount([
        "Classes" => is_array(Student::run()->getSignedClasses()) ? count(Student::run()->getSignedClasses()) : 0,
        "Courses" => is_array(Student::run()->getSignedCourses()) ? count(Student::run()->getSignedCourses()) : 0,
        "Payments" => is_array(Student::run()->getStudentPaymentHistory(Session::get("st_username"))) ? count(Student::run()->getStudentPaymentHistory(Session::get("st_username"))) : 0,
    ]);
    $card->setType("profile-card");
    $card->runSetup();
}