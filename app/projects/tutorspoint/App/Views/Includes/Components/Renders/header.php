<?php

use Models\Core\App\Database\Queries\Read\Admin;
use Models\Core\App\Database\Queries\Read\Student;
use Models\Core\App\Database\Queries\Read\Tutor;
use Models\Core\App\Helpers\DateTime;
use Models\Core\App\Utilities\Session;
use Models\Core\App\Utilities\Url;
use Views\Includes\Components\Classes\Header;



function runAdminHomePageHeaderSetup()
{
    $header = new Header;
    $header->setHeading("Hi " . Admin::run()->getFirstname(Session::get("ad_username")) . ",");
    $header->setWelcomeText("Welcome to the administrators dashboard.");
    $header->setDate("Today is " . DateTime::date());
    $header->setLoginInfo("<span class='text-muted'>Last logged in:</span> " . Admin::run()->getLoginTime(Session::get("ad_username")));
    $header->setItemCountHeading("<span class='text-muted'>Total number of tables</span>");
    $header->setItemCount("12");
    $header->setType("profile-header");
    $header->runSetup();
}

function runTutorHomePageHeaderSetup()
{
    $header = new Header;
    $header->setHeading("Hi " . Tutor::run()->getFirstname(Session::get("t_username")) . ",");
    $header->setWelcomeText("Welcome to the tutors dashboard.");
    $header->setDate("Today is " . DateTime::date());
    $header->setLoginInfo("<span class='text-muted'>Last logged in:</span> " . Tutor::run()->getLoginTime(Session::get("t_username")));
    $header->setType("profile-header");
    $header->runSetup();
}

function runStudentHomePageHeaderSetup()
{
    $header = new Header;
    $header->setHeading("Hi " . Student::run()->getFirstname(Session::get("st_username")) . ",");
    $header->setWelcomeText("Welcome to the students dashboard.");
    $header->setDate("Today is " . DateTime::date());
    $header->setLoginInfo("<span class='text-muted'>Last logged in:</span> " . Student::run()->getLoginTime(Session::get("st_username")));
    $header->setType("profile-header");
    $header->runSetup();
}
function runStudentViewFeePaymentHeaderSetup()
{
    $header = new Header;
    $header->setHeadingIcon(Url::getReference("resources/assets/images/png/dollar.png"));
    $header->setHeading("My payments");
    $header->setItemCountHeading("My payments");
    if (is_array(Student::run()->getStudentPaymentHistory(Session::get("st_username")))) {
        $header->setItemCount(count(Student::run()->getStudentPaymentHistory(Session::get("st_username"))));
    }
    $header->setType("views-header");
    $header->runSetup();
}

function runStudentViewCoursesHeaderSetup()
{

    $header = new Header;
    $header->setHeadingIcon(Url::getReference("resources/assets/images/png/resume.png"));
    $header->setHeading("My courses");
    $header->setItemCountHeading("My courses");
    if (is_array(Student::run()->getSignedCourses())) {
        $header->setItemCount(count(Student::run()->getSignedCourses()));
    }
    $header->setType("views-header");
    $header->runSetup();

}

function runTutorViewCoursesHeaderSetup()
{
    $header = new Header;
    $header->setHeadingIcon(Url::getReference("resources/assets/images/png/resume.png"));
    $header->setHeading("Tutor courses");
    $header->setItemCountHeading("My courses");
    if (is_array(Tutor::run()->getTutorCourses(Session::get("t_username")))) {
        $header->setItemCount(count(Tutor::run()->getTutorCourses(Session::get("t_username"))));
    }
    $header->setType("views-header");
    $header->runSetup();
}

function runTutorViewStudentPaymentHeaderSetup()
{
    $header = new Header;
    $header->setHeadingIcon(Url::getReference("resources/assets/images/png/dollar.png"));
    $header->setHeading("Student payments");
    $header->setItemCountHeading("Total payments");
    if (is_array(Tutor::run()->getStudentPayments(Session::get("t_username")))) {
        $header->setItemCount(count(Tutor::run()->getStudentPayments(Session::get("t_username"))));
    }
    $header->setType("views-header");
    $header->runSetup();
}

function runTutorViewCourseContentHeaderSetup()
{
    $header = new Header;
    $header->setHeadingIcon(Url::getReference("resources/assets/images/png/resume.png"));
    $header->setHeading("Tutor course content");
    $header->setItemCountHeading("My courses");
    if (is_array(Tutor::run()->getTutorCourses(Session::get("t_username")))) {
        $header->setItemCount(count(Tutor::run()->getTutorCourses(Session::get("t_username"))));
    }
    $header->setType("views-header");
    $header->runSetup();
}

function runAdminViewStudentTutorPaymentHeaderSetup()
{
    $header = new Header;
    $header->setHeadingIcon(Url::getReference("resources/assets/images/png/dollar.png"));
    $header->setHeading("Payments");
    $header->setItemCountHeading("Total payments");
    if (is_array(Admin::run()->getStudentTutorPayments())) {
        $header->setItemCount(count(Admin::run()->getStudentTutorPayments()));
    }
    $header->setType("views-header");
    $header->runSetup();
}

function runTutorViewStudentsHeaderSetup()
{
    $header = new Header;
    $header->setHeadingIcon(Url::getReference("resources/assets/images/png/kyc.png"));
    $header->setHeading("My students");
    $header->setItemCountHeading("Total students");
    if (is_array(Tutor::run()->getStudents(Session::get("t_username")))) {
        $header->setItemCount(count(Tutor::run()->getStudents(Session::get("t_username"))));
    }
    $header->setType("views-header");
    $header->runSetup();
}

function runTutorViewClassesHeaderSetup()
{
    $header = new Header;
    $header->setHeadingIcon(Url::getReference("resources/assets/images/png/workplace.png"));
    $header->setHeading("My classes");
    $header->setItemCountHeading("Total classes");
    if (is_array(Tutor::run()->getClasses(Session::get("t_username")))) {
        $header->setItemCount(count(Tutor::run()->getClasses(Session::get("t_username"))));
    }
    $header->setType("views-header");
    $header->runSetup();
}

function runAdminViewStudentsHeaderSetup()
{
    $header = new Header;
    $header->setHeadingIcon(Url::getReference("resources/assets/images/png/kyc.png"));
    $header->setHeading("Students");
    $header->setItemCountHeading("Total number of students");
    if (is_array(Admin::run()->getStudents())) {
        $header->setItemCount(count(Admin::run()->getStudents()));
    }
    $header->setType("views-header");
    $header->runSetup();
}

function runAdminViewTutorsHeaderSetup()
{
    $header = new Header;
    $header->setHeadingIcon(Url::getReference("resources/assets/images/png/office.png"));
    $header->setHeading("Tutors");
    $header->setItemCountHeading("Total number of tutors");
    if (is_array(Admin::run()->getTutors())) {
        $header->setItemCount(count(Admin::run()->getTutors()));
    }
    $header->setType("views-header");
    $header->runSetup();
}

function runAdminViewAdministratorsHeaderSetup()
{
    $header = new Header;
    $header->setHeadingIcon(Url::getReference("resources/assets/images/png/software-engineer.png"));
    $header->setHeading("Administrators");
    $header->setItemCountHeading("Total number of administrators");
    if (is_array(Admin::run()->getAdministrators())) {
        $header->setItemCount(count(Admin::run()->getAdministrators()));
    }
    $header->setType("views-header");
    $header->runSetup();
}


function runAdminViewClassesHeaderSetup()
{
    $header = new Header;
    $header->setHeadingIcon(Url::getReference("resources/assets/images/png/workplace.png"));
    $header->setHeading("Classes");
    $header->setItemCountHeading("Total number of classes");
    if (is_array(Admin::run()->getClassesFullInfo())) {
        $header->setItemCount(count(Admin::run()->getClassesFullInfo()));
    }
    $header->setType("views-header");
    $header->runSetup();
}

function runAdminViewCoursesHeaderSetup()
{
    $header = new Header;
    $header->setHeadingIcon(Url::getReference("resources/assets/images/png/workplace.png"));
    $header->setHeading("Courses");
    $header->setItemCountHeading("Total number of courses");
    if (is_array(Admin::run()->getCourses())) {
        $header->setItemCount(count(Admin::run()->getCourses()));
    }
    $header->setType("views-header");
    $header->runSetup();
}

function runAdminViewCourseCategoriesHeaderSetup()
{
    $header = new Header;
    $header->setHeadingIcon(Url::getReference("resources/assets/images/png/workplace.png"));
    $header->setHeading("Course categories");
    $header->setItemCountHeading("Total number of course categories");
    if (is_array(Admin::run()->getCourseCategories())) {
        $header->setItemCount(count(Admin::run()->getCourseCategories()));
    }
    $header->setType("views-header");
    $header->runSetup();
}