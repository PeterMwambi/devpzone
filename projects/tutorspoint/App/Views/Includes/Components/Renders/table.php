<?php

use Models\Auth\Input;
use Models\Core\App\Database\Queries\Read\Admin;
use Models\Core\App\Database\Queries\Read\Client;
use Models\Core\App\Database\Queries\Read\Student;
use Models\Core\App\Database\Queries\Read\Tutor;
use Models\Core\App\Helpers\Formatter;
use Models\Core\App\Utilities\Session;
use Models\Core\App\Utilities\Url;
use Views\Includes\Components\Classes\Table;




/*
```````````````````````````````````````````````````````````````````````
DEFAULT PROPERTIES
```````````````````````````````````````````````````````````````````````
*/

/**
 * Table default properties
 * @param Table $table
 * @return void
 */
function setTableDefaultProperties(Table $table)
{
    $table->setType("default");
    $table->setTableColor("light");
    $table->setTableType("bordered");
}


/* 
```````````````````````````````````````````````````````````````````````
STUDENT TABLES
```````````````````````````````````````````````````````````````````````
*/
/**
 * Student view fee payment setup
 * @return void
 */
function runStudentViewFeePaymentSetup()
{
    Session::start();
    $table = new Table;
    $payments = Student::run()->getStudentPaymentHistory(Session::get("st_username"));
    if (!is_array($payments)) {
        echo '<div class="d-flex justify-content-center mt-md"><h4>Oops! no records were found</h4></div>';
        return;
    }
    $data = [];
    $keys = [
        "#",
        "Transaction code",
        "Amount",
        "Paid to",
        "Payment mode",
        "Payment status",
        "Balance",
        "Payment date"
    ];
    $x = 1;
    foreach ($payments as $payment) {
        $date = json_decode($payment["pmd_date"]);
        $payment["pmd_date"] = $date->day . ", " . $date->date . " " . $date->time;
        $payment["t_firstname"] = $payment["t_firstname"] . " " . $payment["t_lastname"];
        $generatedData = [
            $x,
            $payment["pmd_transaction_code"],
            $payment["pmd_amount"],
            $payment["t_firstname"],
            $payment["pmd_mode"],
            $payment["pmd_status"],
            $payment["pmd_balance"],
            $payment["pmd_date"]
        ];
        array_push($data, Formatter::run()->formatArray(array_values($generatedData), $keys));
        $x++;
    }
    setTableDefaultProperties($table);
    $table->setColumns($keys);
    $table->setData($data);
    $table->runSetup();
}

/**
 * Student view courses setup
 * @return void
 */
function runStudentViewCoursesSetup()
{
    $table = new Table;
    $courses = Student::run()->getSignedCourses();
    $data = [];
    $keys = [
        "#",
        "Course",
        "Instructor name",
        "Class sheduled on"
    ];
    $x = 1;
    if (!is_array($courses)) {
        echo '<div class="d-flex justify-content-center mt-md"><h4>Oops! no records were found</h4></div>';
        return;
    }
    foreach ($courses as $course) {
        $date = json_decode($course["cl_date_created"]);
        $course["cl_date_created"] = $date->day . ", " . $date->date . " " . $date->time;
        $course["t_firstname"] = $course["t_firstname"] . " " . $course["t_lastname"];
        $generatedData = [
            $x,
            $course["c_name"],
            $course["t_firstname"],
            $course["cl_date_created"]
        ];
        array_push($data, Formatter::run()->formatArray(array_values($generatedData), $keys));
        $x++;
    }
    setTableDefaultProperties($table);
    $table->setColumns($keys);
    $table->setData($data);
    $table->runSetup();
}

/*
```````````````````````````````````````````````````````````````````````
TUTOR TABLES
```````````````````````````````````````````````````````````````````````
*/

/**
 * Tutor view student payment setup
 * @return void
 */
function runTutorViewStudentPaymentSetup()
{
    Session::start();
    $table = new Table;
    $payments = Tutor::run()->getStudentPayments(Session::get("t_username"));
    if (!is_array($payments)) {
        echo '<div class="d-flex justify-content-center mt-md"><h4>Oops! no records were found</h4></div>';
        return;
    }
    $data = [];
    $keys = [
        "#",
        "Student name",
        "Student phone number",
        "Course",
        "Course Fee",
        "Amount paid",
        "Payment mode",
        "Payment status",
        "Transaction code",
        "Balance",
        "Payment date"
    ];
    $x = 1;
    foreach ($payments as $payment) {
        $date = json_decode($payment["pmd_date"]);
        $payment["pmd_date"] = $date->day . ", " . $date->date . " " . $date->time;
        $payment["st_firstname"] = $payment["st_firstname"] . " " . $payment["st_lastname"];
        $payment["st_phone_number"] = str_replace("+254", "0", $payment["st_phone_number"]);
        $generatedData = [
            $x,
            $payment["st_firstname"],
            $payment["st_phone_number"],
            $payment["c_name"],
            $payment["c_fee"],
            $payment["pmd_amount"],
            $payment["pmd_mode"],
            $payment["pmd_status"],
            $payment["pmd_transaction_code"],
            $payment["pmd_balance"],
            $payment["pmd_date"]
        ];
        array_push($data, Formatter::run()->formatArray(array_values($generatedData), $keys));
        $x++;
    }
    setTableDefaultProperties($table);
    $table->setColumns($keys);
    $table->setData($data);
    $table->runSetup();

}

/**
 * Tutor view courses setup
 * @return void
 */
function runTutorViewCoursesSetup()
{
    Session::start();
    $table = new Table;
    $courses = Tutor::run()->getTutorCourses(Session::get("t_username"));
    if (!is_array($courses)) {
        echo '<div class="d-flex justify-content-center mt-md"><h4>Oops! no records were found</h4></div>';
        return;
    }
    $data = [];
    $keys = [
        "#",
        "Course id",
        "Course",
        "Course category",
        "Registered on",
        "Action"
    ];
    $x = 1;
    foreach ($courses as $course) {
        $date = json_decode($course["cn_date_created"]);
        $course["cn_date_created"] = $date->day . ", " . $date->date . " " . $date->time;
        $actions = '
        <a class="btn btn-primary" href="?cid=' . $course["c_id"] . '">
            <img src="' . Url::getReference("resources/assets/images/png/open-folder.png") . '" class="img-fluid small mb-1">
            View
        </a>
        <a class="btn btn-danger ms-2" href="?cid=' . $course["c_id"] . '">
            <img src="' . Url::getReference("resources/assets/images/png/delete.png") . '" class="img-fluid small mb-1">
            Dismiss
        </a>';
        $course["c_id"] = '<a class="" href="?cid=' . $course["c_id"] . '">' . $course["c_id"] . '</a>';
        $generatedData = [
            $x,
            $course["c_id"],
            $course["c_name"],
            $course["ct_name"],
            $course["cn_date_created"],
            $actions
        ];
        array_push($data, Formatter::run()->formatArray(array_values($generatedData), $keys));
        $x++;
    }
    setTableDefaultProperties($table);
    $table->setColumns($keys);
    $table->setData($data);
    $table->runSetup();
}

/**
 * Tutor view course content setup
 * @return void
 */
function runTutorViewCourseContentSetup()
{
    if (!Input::get("cnid")) {
        die("Course content id has not been defined");
    }
    Session::start();
    $table = new Table;
    $courses = Tutor::run()->getCourseContent(Input::get("cnid"), Session::get("t_username"));
    if (!is_array($courses)) {
        echo '<div class="d-flex justify-content-center mt-md"><h4>Oops! no records were found</h4></div>';
        return;
    }
    $data = [];
    $keys = [
        "#",
        "Course",
        "Course topics",
        "Course description",
        "Course notes",
        "Created on"
    ];
    $x = 1;
    foreach ($courses as $course) {
        $date = json_decode($course["cn_date_created"]);
        $course["cn_date_created"] = $date->day . ", " . $date->date . " " . $date->time;
        $topics = json_decode($course["cn_topics"]);
        $course["cn_topics"] = $topics->topics;
        $generatedData = [
            $x,
            $course["c_name"],
            $course["cn_topics"],
            $course["cn_description"],
            $course["cn_notes"],
            $course["cn_date_created"]
        ];
        $x++;
        array_push($data, Formatter::run()->formatArray(array_values($generatedData), $keys));
        $table->setHasActionButtons(true);
        $table->setActionButtonContent([
            "Edit",
            "Delete"
        ]);
        $table->setActionButtonLinks([
            "Edit" => "#",
            "Delete" => "#",
        ]);
        $table->setActionButtonClasses([
            "Edit" => "btn btn-primary text-nowrap",
            "Delete" => "btn btn-danger text-nowrap",
        ]);
    }
    setTableDefaultProperties($table);
    $table->setColumns($keys);
    $table->setData($data);
    $table->runSetup();
}

/**
 * Tutor view students set up
 * @return void
 */
function runTutorViewStudentsSetup()
{
    Session::start();
    $table = new Table;
    $students = Tutor::run()->getStudents(Session::get("t_username"));
    if (!is_array($students)) {
        echo '<div class="d-flex justify-content-center mt-md"><h4>Oops! no records were found</h4></div>';
        return;
    }
    $data = [];
    $keys = [
        "#",
        "Student id",
        "Name",
        "Phone number",
        "Course",
        "Payment amount",
        "Payment mode",
        "Payment status",
        "Payment balance",
        "Payment date"
    ];
    $x = 1;
    foreach ($students as $student) {
        $date = json_decode($student["pmd_date"]);
        $student["pmd_date"] = $date->day . ", " . $date->date . " " . $date->time;
        $student["st_firstname"] = $student["st_firstname"] . " " . $student["st_lastname"];
        $student["st_phone_number"] = str_replace("+254", "0", $student["st_phone_number"]);
        $student["st_id"] = '<a class="" href="?stid=' . $student["st_id"] . '">' . $student["st_id"] . '</a>';
        $generatedData = [
            $x,
            $student["st_id"],
            $student["st_firstname"],
            $student["st_phone_number"],
            $student["c_name"],
            $student["pmd_amount"],
            $student["pmd_mode"],
            $student["pmd_status"],
            $student["pmd_balance"],
            $student["pmd_date"]
        ];
        array_push($data, Formatter::run()->formatArray(array_values($generatedData), $keys));
        $x++;
    }
    setTableDefaultProperties($table);
    $table->setColumns($keys);
    $table->setData($data);
    $table->runSetup();
}

/**
 * Tutor view classes setup
 * @return void
 */
function runTutorViewClassesSetup()
{
    $table = new Table;
    $classes = Tutor::run()->getClasses(Session::get("t_username"));
    if (!is_array($classes)) {
        echo '<div class="d-flex justify-content-center mt-md"><h4>Oops! no records were found</h4></div>';
        return;
    }
    $data = [];
    $keys = [
        "#",
        "Class id",
        "Course",
        "Number of sudents",
        "Started on",
        "Actions"
    ];
    $x = 1;
    foreach ($classes as $class) {
        $date = json_decode($class["cl_date_created"]);
        $class["cl_date_created"] = $date->day . ", " . $date->date . " " . $date->time;
        $class["cl_students"] = count(Formatter::formatToArray(json_decode($class["cl_students"])));
        $actions = '
        <a class="btn btn-primary" href="?clid=' . $class["cl_id"] . '">
            <img src="' . Url::getReference("resources/assets/images/png/open-folder.png") . '" class="img-fluid small mb-1">
            View
        </a>
        <a class="btn btn-danger ms-2" href="?clid=' . $class["cl_id"] . '">
            <img src="' . Url::getReference("resources/assets/images/png/delete.png") . '" class="img-fluid small mb-1">
            Dismiss
        </a>';
        $class["cl_id"] = '<a class="" href="?clid=' . $class["cl_id"] . '">' . $class["cl_id"] . '</a>';
        $generatedData = [
            $x,
            $class["cl_id"],
            $class["c_name"],
            $class["cl_students"],
            $class["cl_date_created"],
            $actions
        ];
        array_push($data, Formatter::run()->formatArray(array_values($generatedData), $keys));
        $x++;
    }
    setTableDefaultProperties($table);
    $table->setColumns($keys);
    $table->setData($data);
    $table->runSetup();
}

/*
```````````````````````````````````````````````````````````````````````
ADMIN TABLES
```````````````````````````````````````````````````````````````````````
*/


/**
 * Admin view student tutor payment setup
 * @return void
 */
function runAdminViewStudentTutorPaymentSetup()
{
    $table = new Table;
    $data = [];
    $payments = Admin::run()->getStudentTutorPayments();
    if (!is_array($payments)) {
        echo '<div class="d-flex justify-content-center mt-md"><h4>Oops! no records were found</h4></div>';
        return;
    }
    $keys = [
        "#",
        "Payment id",
        "Student name",
        "Tutor name",
        "Amount due",
        "Amount paid",
        "Balance",
        "Payment mode",
        "Payment status",
        "Transaction code",
        "Payment date",
    ];
    $x = 1;

    foreach ($payments as $payment) {
        $date = json_decode($payment["pmd_date"]);
        $payment["pm_id"] = '<a class="" href="?ctid=' . $payment["pm_id"] . '">' . $payment["pm_id"] . '</a>';
        $payment["pmd_date"] = $date->day . ", " . $date->date . " " . $date->time;
        $payment["st_firstname"] = $payment["st_firstname"] . " " . $payment["st_lastname"];
        $payment["t_firstname"] = $payment["t_firstname"] . " " . $payment["t_lastname"];
        $generatedData = [
            $x,
            $payment["pm_id"],
            $payment["st_firstname"],
            $payment["t_firstname"],
            $payment["c_fee"],
            $payment["pmd_amount"],
            $payment["pmd_balance"],
            $payment["pmd_mode"],
            $payment["pmd_status"],
            $payment["pmd_transaction_code"],
            $payment["pmd_date"],
        ];
        array_push($data, Formatter::run()->formatArray(array_values($generatedData), $keys));
        $x++;
    }
    setTableDefaultProperties($table);
    $table->setColumns($keys);
    $table->setData($data);
    $table->runSetup();
}


/**
 * Admin view student setup
 * @return void
 */
function runAdminViewStudentsSetup()
{
    $table = new Table;
    $students = Admin::run()->getStudents();
    if (!is_array($students)) {
        echo '<div class="d-flex justify-content-center mt-md"><h4>Oops! no records were found</h4></div>';
        return;
    }
    $data = [];
    $keys = [
        "#",
        "Student Id",
        "Name",
        "Gender",
        "Date of Birth",
        "Age",
        "Nationality",
        "National id",
        "Phone number",
        "Email",
        "Date created"
    ];
    $x = 1;
    foreach ($students as $student) {
        $date = json_decode($student["st_date_created"]);
        $student["st_date_created"] = $date->day . ", " . $date->date . " " . $date->time;
        $student["st_firstname"] = $student["st_firstname"] . " " . $student["st_lastname"];
        $student["st_phone_number"] = str_replace("+254", "0", $student["st_phone_number"]);
        $student["st_id"] = '<a class="" href="?ctid=' . $student["st_id"] . '">' . $student["st_id"] . '</a>';
        $generatedData = [
            $x,
            $student["st_id"],
            $student["st_firstname"],
            $student["st_gender"],
            $student["st_date_of_birth"],
            $student["st_age"],
            $student["st_nationality"],
            $student["st_national_id"],
            $student["st_phone_number"],
            $student["st_email"],
            $student["st_date_created"]
        ];
        array_push($data, Formatter::run()->formatArray(array_values($generatedData), $keys));
        $x++;
    }
    setTableDefaultProperties($table);
    $table->setColumns($keys);
    $table->setData($data);
    $table->runSetup();
}

/**
 * Admin view tutors setup
 * @return void
 */
function runAdminViewTutorsSetup()
{
    $table = new Table;
    $tutors = Admin::run()->getTutors();
    if (!is_array($tutors)) {
        echo '<div class="d-flex justify-content-center mt-md"><h4>Oops! no records were found</h4></div>';
        return;
    }
    $data = [];
    $keys = [
        "#",
        "Tutor Id",
        "Name",
        "Gender",
        "Date of Birth",
        "Age",
        "Nationality",
        "National id",
        "Phone number",
        "Email",
        "Date created"
    ];
    $x = 1;
    foreach ($tutors as $tutor) {
        $date = json_decode($tutor["t_date_created"]);
        $tutor["t_date_created"] = $date->day . ", " . $date->date . " " . $date->time;
        $tutor["t_firstname"] = $tutor["t_firstname"] . " " . $tutor["t_lastname"];
        $tutor["t_phone_number"] = str_replace("+254", "0", $tutor["t_phone_number"]);
        $tutor["t_id"] = '<a class="" href="?tid=' . $tutor["t_id"] . '">' . $tutor["t_id"] . '</a>';
        $generatedData = [
            $x,
            $tutor["t_id"],
            $tutor["t_firstname"],
            $tutor["t_gender"],
            $tutor["t_date_of_birth"],
            $tutor["t_age"],
            $tutor["t_nationality"],
            $tutor["t_national_id"],
            $tutor["t_phone_number"],
            $tutor["t_email"],
            $tutor["t_date_created"]
        ];
        array_push($data, Formatter::run()->formatArray(array_values($generatedData), $keys));
        $x++;
    }
    setTableDefaultProperties($table);
    $table->setColumns($keys);
    $table->setData($data);
    $table->runSetup();
}


/**
 * Admin view administrators setup
 * @return void
 */
function runAdminViewAdministratorsSetup()
{
    $table = new Table;
    $administrators = Admin::run()->getAdministrators();
    if (!is_array($administrators)) {
        echo '<div class="d-flex justify-content-center mt-md"><h4>Oops! no records were found</h4></div>';
        return;
    }
    $data = [];
    $keys = [
        "#",
        "Admin id",
        "Name",
        "Gender",
        "Date of Birth",
        "Age",
        "Nationality",
        "National id",
        "Phone number",
        "Email",
        "Date created"
    ];
    $x = 1;
    foreach ($administrators as $admin) {
        $date = json_decode($admin["ad_date_created"]);
        $admin["ad_date_created"] = $date->day . ", " . $date->date . " " . $date->time;
        $admin["ad_firstname"] = $admin["ad_firstname"] . " " . $admin["ad_lastname"];
        $admin["ad_phone_number"] = str_replace("+254", "0", $admin["ad_phone_number"]);
        $admin["ad_id"] = '<a class="" href="?adid=' . $admin["ad_id"] . '">' . $admin["ad_id"] . '</a>';
        $generatedData = [
            $x,
            $admin["ad_id"],
            $admin["ad_firstname"],
            $admin["ad_gender"],
            $admin["ad_date_of_birth"],
            $admin["ad_age"],
            $admin["ad_nationality"],
            $admin["ad_national_id"],
            $admin["ad_phone_number"],
            $admin["ad_email"],
            $admin["ad_date_created"]
        ];
        array_push($data, Formatter::run()->formatArray(array_values($generatedData), $keys));
        $x++;
    }
    setTableDefaultProperties($table);
    $table->setColumns($keys);
    $table->setData($data);
    $table->runSetup();
}


/**
 * Admin view classes setup
 * @return void
 */
function runAdminViewClassesSetup()
{
    $table = new Table;
    $classes = Admin::run()->getClassesFullInfo();
    if (!is_array($classes)) {
        echo '<div class="d-flex justify-content-center mt-md"><h4>Oops! no records were found</h4></div>';
        return;
    }
    $data = [];
    $keys = [
        "#",
        "Class id",
        "Course",
        "Tutor name",
        "Date created",
        "Number of students",
        "Actions"
    ];

    $x = 1;
    foreach ($classes as $class) {
        $date = json_decode($class["cl_date_created"]);
        $class["cl_date_created"] = $date->day . ", " . $date->date . " " . $date->time;
        $class["t_firstname"] = $class["t_firstname"] . " " . $class["t_lastname"];
        $class["cl_students"] = count(Formatter::formatToArray(json_decode($class["cl_students"])));
        $actions = '
        <a class="btn btn-primary" href="?clid=' . $class["cl_id"] . '">
            <img src="' . Url::getReference("resources/assets/images/png/open-folder.png") . '" class="img-fluid small mb-1">
            View
        </a>
        <a class="btn btn-danger ms-2" href="?clid=' . $class["cl_id"] . '">
            <img src="' . Url::getReference("resources/assets/images/png/delete.png") . '" class="img-fluid small mb-1">
            Delete
        </a>';
        $class["cl_id"] = '<a class="" href="?clid=' . $class["cl_id"] . '">' . $class["cl_id"] . '</a>';
        $generatedData = [
            $x,
            $class["cl_id"],
            $class["c_name"],
            $class["t_firstname"],
            $class["cl_date_created"],
            $class["cl_students"],
            $actions
        ];
        array_push($data, Formatter::run()->formatArray(array_values($generatedData), $keys));
        $x++;
    }
    setTableDefaultProperties($table);
    $table->setColumns($keys);
    $table->setData($data);
    $table->runSetup();
}


/**
 * Admin view courses setup
 * @return void
 */
function runAdminViewCoursesSetup()
{
    $table = new Table;
    $courses = Admin::run()->getCourses();
    if (!is_array($courses)) {
        echo '<div class="d-flex justify-content-center mt-md"><h4>Oops! no records were found</h4></div>';
        return;
    }
    $data = [];
    $keys = [
        "#",
        "Course Id",
        "Course name",
        "Category",
        "Date created",
        "Actions"
    ];
    $x = 1;
    foreach ($courses as $course) {
        $date = json_decode($course["c_date_created"]);
        $course["c_date_created"] = $date->day . ", " . $date->date . " " . $date->time;
        $actions = '
        <a class="btn btn-primary" href="?cid=' . $course["c_id"] . '">
            <img src="' . Url::getReference("resources/assets/images/png/open-folder.png") . '" class="img-fluid small mb-1">
            View
        </a>
        <a class="btn btn-danger ms-2" href="?clid=' . $course["c_id"] . '">
            <img src="' . Url::getReference("resources/assets/images/png/delete.png") . '" class="img-fluid small mb-1">
            Delete
        </a>';
        $course["c_id"] = '<a class="" href="?clid=' . $course["c_id"] . '">' . $course["c_id"] . '</a>';
        $generatedData = [
            $x,
            $course["c_id"],
            $course["c_name"],
            $course["ct_name"],
            $course["c_date_created"],
            $actions
        ];
        array_push($data, Formatter::run()->formatArray(array_values($generatedData), $keys));
        $x++;
    }
    setTableDefaultProperties($table);
    $table->setColumns($keys);
    $table->setData($data);
    $table->runSetup();
}


/**
 * Admin view course categories setup
 * @return void
 */
function runAdminViewCourseCategoriesSetup()
{
    $table = new Table();
    $categories = Admin::run()->getCourseCategories();
    if (!is_array($categories)) {
        echo '<div class="d-flex justify-content-center mt-md"><h4>Oops! no records were found</h4></div>';
        return;
    }
    $data = [];
    $keys = [
        "#",
        "Category id",
        "Category name",
        "Date created",
        "Actions"
    ];
    $x = 1;
    foreach ($categories as $category) {
        $date = json_decode($category["ct_date_created"]);
        $category["ct_date_created"] = $date->day . ", " . $date->date . " " . $date->time;
        $actions = '
        <a class="btn btn-primary" href="?ctid=' . $category["ct_id"] . '">
            <img src="' . Url::getReference("resources/assets/images/png/open-folder.png") . '" class="img-fluid small mb-1">
            View
        </a>
        <a class="btn btn-danger ms-2" href="?ctid=' . $category["ct_id"] . '">
            <img src="' . Url::getReference("resources/assets/images/png/delete.png") . '" class="img-fluid small mb-1">
            Delete
        </a>';
        $category["ct_id"] = '<a class="" href="?ctid=' . $category["ct_id"] . '">' . $category["ct_id"] . '</a>';
        $generatedData = [
            $x,
            $category["ct_id"],
            $category["ct_name"],
            $category["ct_date_created"],
            $actions
        ];
        array_push($data, Formatter::run()->formatArray(array_values($generatedData), $keys));
        $x++;
    }
    setTableDefaultProperties($table);
    $table->setColumns($keys);
    $table->setData($data);
    $table->runSetup();
}