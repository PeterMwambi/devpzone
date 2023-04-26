<?php

use Models\Auth\Hashing;
use Models\Core\App\Database\Queries\Read\Admin;
use Models\Core\App\Database\Queries\Read\Tutor;
use Models\Core\App\Helpers\Formatter;
use Models\Core\App\Utilities\Url;
use Views\Includes\Components\Forms\Form;
use Views\Includes\Components\Forms\FormDescription;
use Views\Includes\Components\Classes\Header as FormHeader;



/*
````````````````````````````````````````````````````````
DEFAULT PROPERTIES
```````````````````````````````````````````````````````
*/


/**
 * Form description setup defaults
 * @param FormDescription $formDescription
 * @return void
 */
function formDescriptionSetupDefaults(FormDescription $formDescription)
{
    $formDescription->setJustifyHeading("center");
    $formDescription->setHeadingColor("primary");
    $formDescription->setJustifyDescription("center");
    $formDescription->setDescriptionColor("dark");
    $formDescription->setDescriptionColumns("col-md-6 col-9");
    $formDescription->setJustifyDescriptionImage("center");
    $formDescription->setDescriptionSizing("my-3");
    $formDescription->setDescriptionTextJustify("center");
    $formDescription->setDescriptionImageUrlClasses("img-fluid");
    $formDescription->runSetup();
}


/**
 * form header set up default properties
 * @param FormHeader $formHeader
 * @return void
 */
function formHeaderSetupDefaults(FormHeader $formHeader)
{
    $formHeader->setHelpTextClasses("tutorspoint__help-text");
    $formHeader->setHeadingClasses("tutorspoint__form-heading");
    $formHeader->setHelpTextSizing("mb-3");
    $formHeader->setHeadingSizing("mt-3");
    $formHeader->setJustifyHeading("center");
    $formHeader->setJustifyHelpText("center");
    $formHeader->setType("form-header");
    $formHeader->runSetup();
}


/* 
```````````````````````````````````````````````````````
TUTORS FORMS SET UP
``````````````````````````````````````````````````````
*/

/*
``````````````````````````````````````````````````````
TUTOR REGISTRATION FORM
`````````````````````````````````````````````````````
*/

/**
 * Tutor registration form description setup
 * @return void
 */
function runTutorRegistrationFormDescriptionSetup()
{
    $formDescription = new FormDescription;
    $formDescription->setHeading("Tutor registration form");
    $formDescription->setDescription("Please ensure that you fill all the required
        fields to
        create a tutor's account");
    $formDescription->setDescriptionImageUrl(Url::getReference("resources/assets/images/png/office.png"));
    formDescriptionSetupDefaults($formDescription);
}

/**
 * Tutor registration form header set up
 * @return void
 */
function runTutorRegistrationFormHeaderSetUp()
{
    $formHeader = new FormHeader;
    $formHeader->setHeading("Step 1: Personal Information");
    $formHeader->setHelpText("Required fields are marked by *");
    formHeaderSetupDefaults($formHeader);
}
/**
 * Tutor registration form set up step 1
 * @return void
 */
function runTutorRegistrationFormSetupStep1()
{
    $form = new Form;
    $form->setFields([
        "firstname",
        "lastname",
        "gender",
        "date-of-birth",
        "age",
        "nationality",
        "national-id",
        "phone-number",
        "email",
        "form-identifier",
        "submit",
        "additional-buttons"
    ]);
    $form->setRows(1);
    $form->setCols([
        "firstname" => "col-12 col-md-6 my-2",
        "lastname" => "col-12 col-md-6 my-2",
        "gender" => "col-12 col-md-6 my-2",
        "date-of-birth" => "col-12 col-md-6 my-2",
        "age" => "col-12 col-md-6 my-2",
        "nationality" => "col-12 col-md-6 my-2",
        "national-id" => "col-12 col-md-6 my-2",
        "phone-number" => "col-12 col-md-6 my-2",
        "email" => "col-12 col-md-12 my-2",
        "form-identifier" => "col-12",
        "submit" => "col-12 col-md-12",
        "additional-buttons" => "col-12 col-md-12"
    ]);
    $form->setContent([
        "firstname" => array(
            "label" => [
                "for" => "firstname",
                "value" => "<h6><strong>Firstname: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "text",
                "name" => "firstname",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "lastname" => array(
            "label" => [
                "for" => "lastname",
                "value" => "<h6><strong>Lastname: * </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "text",
                "name" => "lastname",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "gender" => array(
            "label" => [
                "for" => "gender",
                "value" => "<h6><strong>Gender: *</strong></h6>",
                "class" => "my-2"
            ],
            "select" => [
                "name" => "gender",
                "options" => ["Male", "Female"],
                "class" => "form-select"
            ]
        ),
        "date-of-birth" => array(
            "label" => [
                "for" => "date-of-birth",
                "value" => "<h6><strong>Date of birth* </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "date",
                "name" => "date-of-birth",
                "class" => "form-control",
                "value" => "",
            ]
        ),
        "age" => array(
            "label" => [
                "for" => "age",
                "value" => "<h6><strong>Age: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "number",
                "name" => "age",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "nationality" => array(
            "label" => [
                "for" => "nationality",
                "value" => "<h6><strong>Nationality: *</strong></h6>",
                "class" => "my-2"
            ],
            "select" => [
                "name" => "nationality",
                "options" => ["Kenyan"],
                "class" => "form-select"
            ]
        ),
        "national-id" => array(
            "label" => [
                "for" => "national-id",
                "value" => "<h6><strong>National id: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "number",
                "name" => "national-id",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "phone-number" => array(
            "label" => [
                "for" => "phone-number",
                "value" => "<h6><strong>Phone Number: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "number",
                "name" => "phone-number",
                "class" => "form-control",
                "value" => "",
                "has-group" => true,
                "group-details" => array("prefix" => "+254")
            ]
        ),
        "email" => array(
            "label" => [
                "for" => "email",
                "value" => "<h6><strong>Email: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "email",
                "name" => "email",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "form-identifier" => array(
            "input" => [
                "type" => "hidden",
                "name" => "form-identifier",
                "class" => "",
                "value" => Hashing::encrypt("TUTOR_REGISTRATION_FORM_STEP_1")
            ]
        ),
        "submit" => array(
            "button" => [
                "color" => "primary",
                "type" => "submit",
                "has-spinner" => true,
                "value" => "Go to step 2"
            ]
        ),
        "additional-buttons" => array(
            "additional-buttons" => [
                "color" => "secondary",
                "purpose" => "action-btn",
                "size" => "w-100 mt-3",
                "link" => "tutor-login",
                "innerHtml" => "I already have an account"
            ]
        ),

    ]);
    $form->runSetup([
        "method" => "POST",
        "action" => "",
        "id" => "tutor-registration-form-step-1",
        "class" => ""
    ]);
}
/**
 * Tutor registration form setup step 2
 * @return void
 */
function runTutorRegistrationFormSetupStep2()
{
    $form = new Form;
    $form->setFields([
        "username",
        "password",
        "confirm-password",
        "show-password",
        "form-identifier",
        "submit"
    ]);
    $form->setRows(1);
    $form->setCols([
        "username" => "col-12 my-2",
        "password" => "col-12 my-2",
        "confirm-password" => "col-12 my-2",
        "show-password" => "col-12 my-2",
        "form-identifier" => "col-12",
        "submit" => "col-12 col-md-12 my-2"
    ]);
    $form->setContent([
        "username" => array(
            "label" => [
                "for" => "username",
                "value" => "<h6><strong>Username: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "text",
                "name" => "username",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "password" => array(
            "label" => [
                "for" => "password",
                "value" => "<h6><strong>Password: * </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "password",
                "name" => "password",
                "class" => "form-control password-visibility-toggle",
                "value" => ""
            ]
        ),
        "confirm-password" => array(
            "label" => [
                "for" => "password",
                "value" => "<h6><strong>Confirm Password: * </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "password",
                "name" => "confirm-password",
                "class" => "form-control password-visibility-toggle",
                "value" => ""
            ]
        ),

        "show-password" => array(
            "input" => [
                "type" => "checkbox",
                "name" => "show-password",
                "class" => "form-check-input password-switch",
                "value" => ""
            ],
            "label" => [
                "for" => "show password",
                "value" => "<h6>Show Password</h6>",
                "class" => "form-check-label mx-2"
            ],
        ),
        "form-identifier" => array(
            "input" => [
                "type" => "hidden",
                "name" => "form-identifier",
                "class" => "",
                "value" => Hashing::encrypt("TUTOR_REGISTRATION_FORM_STEP_2")
            ]
        ),
        "submit" => array(
            "button" => [
                "color" => "primary",
                "type" => "submit",
                "has-spinner" => true,
                "value" => "Complete Registration &raquo;"
            ]
        )
    ]);
    $form->runSetup([
        "method" => "POST",
        "action" => "",
        "id" => "tutor-registration-form-step-2",
        "class" => "d-none"
    ]);
}

/*
``````````````````````````````````````````````````````````````
TUTOR LOGIN FORM
`````````````````````````````````````````````````````````````
*/
/**
 * Tutor login form description set up
 * @return void
 */
function runTutorLoginFormDescriptionSetup()
{
    $formDescription = new FormDescription;
    $formDescription->setHeading("Tutor login form");
    $formDescription->setDescription("Please ensure that you enter the correct username and password for you to access your account");
    $formDescription->setDescriptionImageUrl(Url::getReference("resources/assets/images/png/office.png"));
    formDescriptionSetupDefaults($formDescription);
}
/**
 * Tutor login form header set up
 * @return void
 */
function runTutorLoginFormHeaderSetUp()
{
    $formHeader = new FormHeader;
    $formHeader->setHeading("Account Information");
    $formHeader->setHelpText("Required fields are marked by *");
    formHeaderSetupDefaults($formHeader);
}

/**
 * Tutor login form setup
 * @return void
 */
function runTutorLoginFormSetup()
{
    $form = new Form;
    $form->setFields([
        "username",
        "password",
        "show-password",
        "form-identifier",
        "submit"
    ]);

    $form->setRows(1);
    $form->setCols([
        "username" => "col-md-12 my-2",
        "password" => "col-md-12 my-2",
        "show-password" => "col-md-12 my-2",
        "form-identifier" => "col-md-12",
        "submit" => "col-md-12 my-2"
    ]);
    $form->setContent([
        "username" => array(
            "label" => [
                "for" => "username",
                "value" => "<h6><strong>Username: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "text",
                "name" => "username",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "password" => array(
            "label" => [
                "for" => "password",
                "value" => "<h6><strong>Password: * </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "password",
                "name" => "password",
                "class" => "form-control password-visibility-toggle",
                "value" => ""
            ]
        ),
        "show-password" => array(
            "input" => [
                "type" => "checkbox",
                "name" => "show-password",
                "class" => "form-check-input password-switch",
                "value" => ""
            ],
            "label" => [
                "for" => "show password",
                "value" => "<h6>Show Password</h6>",
                "class" => "form-check-label mx-2"
            ],
        ),
        "form-identifier" => array(
            "input" => [
                "type" => "hidden",
                "name" => "form-identifier",
                "class" => "",
                "value" => Hashing::encrypt("TUTOR_LOGIN_FORM")
            ]
        ),
        "submit" => array(
            "button" => [
                "color" => "primary",
                "type" => "submit",
                "has-spinner" => true,
                "value" => "Go to my account &raquo;"
            ]
        )
    ]);
    $form->runSetup([
        "method" => "POST",
        "action" => "",
        "id" => "tutor-login-form",
        "class" => ""
    ]);
}

function runTutorCourseReceptionFormDescriptionSetup()
{
    $formDescription = new FormDescription;
    $formDescription->setHeading("Course reception form");
    $formDescription->setDescription("Please ensure that you fill all the required fields to register your course content");
    $formDescription->setDescriptionImageUrl(Url::getReference("resources/assets/images/png/resume.png"));
    formDescriptionSetupDefaults($formDescription);
}

function runTutorCourseReceptionFormHeaderSetup()
{
    $formHeader = new FormHeader;
    $formHeader->setHeading("Course Information");
    $formHeader->setHelpText("Required fields are marked by *");
    formHeaderSetupDefaults($formHeader);
}


function runTutorCourseReceptionFormSetup()
{
    $form = new Form;

    $coursesArray = [];

    foreach (Admin::run()->getCourses() as $course) {
        array_push($coursesArray, $course["c_name"]);
    }

    $form->setFields([
        "course",
        "course-topics",
        "course-description",
        "course-notes",
        "form-identifier",
        "submit"
    ]);

    $form->setRows(1);
    $form->setCols([
        "course" => "col-12 col-md-12",
        "course-topics" => "col-12 col-md-12",
        "course-description" => "col-12 col-md-12",
        "course-notes" => "col-12 col-md-12",
        "form-identifier" => "col-md-12",
        "submit" => "col-md-12 my-2"
    ]);
    $form->setContent([
        "course" => array(
            "label" => [
                "for" => "courses",
                "value" => "<h6><strong>Course name: *</strong></h6>",
                "class" => "my-2",
            ],
            "select" => [
                "name" => "course",
                "options" => $coursesArray,
                "class" => "form-select"
            ]
        ),
        "course-topics" => [
            "label" => [
                "for" => "course-topics",
                "value" => "<h6><strong>Course topics: *</strong></h6>",
                "class" => "my-2"
            ],
            "textarea" => [
                "name" => "topics",
                "class" => "form-control",
                "style" => "height:120px;"
            ]
        ],
        "course-description" => [
            "label" => [
                "for" => "course-description",
                "value" => "<h6><strong>Course description: *</strong></h6>",
                "class" => "my-2"
            ],
            "textarea" => [
                "name" => "description",
                "class" => "form-control",
                "style" => "height:120px;"
            ]
        ],
        "course-notes" => [
            "label" => [
                "for" => "notes",
                "value" => "<h6><strong>Upload course notes *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "file",
                "name" => "notes",
                "id" => "notes",
                "class" => "form-control"
            ]
        ],
        "form-identifier" => array(
            "input" => [
                "type" => "hidden",
                "name" => "form-identifier",
                "class" => "",
                "value" => Hashing::encrypt("COURSE_RECEPTION_FORM")
            ]
        ),
        "submit" => array(
            "button" => [
                "color" => "primary",
                "type" => "submit",
                "has-spinner" => true,
                "value" => "Register course content"
            ]
        )
    ]);
    $form->runSetup([
        "method" => "POST",
        "action" => "",
        "id" => "course-reception-form",
        "class" => "",
        "enctype" => "multipart/form-data"
    ]);
}



/*
```````````````````````````````````````````````````````````````
STUDENTS FORM SETUP
`````````````````````````````````````````````````````````````````
*/
/*
``````````````````````````````````````````````````````````````````
STUDENT REGISTRATION FORMS
``````````````````````````````````````````````````````````````````
*/
/**
 * Student registration form description setup
 * @return void
 */
function runStudentRegistrationFormDescriptionSetup()
{
    $formDescription = new FormDescription;
    $formDescription->setHeading("Student registration form");
    $formDescription->setDescription("Please ensure that you fill all the required
        fields to
        create a students account");
    $formDescription->setDescriptionImageUrl(Url::getReference("resources/assets/images/png/kyc.png"));
    formDescriptionSetupDefaults($formDescription);
}
/**
 * Student description form header setup
 * @return void
 */
function runStudentRegistrationFormHeaderSetup()
{
    $formHeader = new FormHeader;
    $formHeader->setHeading("Step 1: Personal Information");
    $formHeader->setHelpText("Required fields are marked by *");
    formHeaderSetupDefaults($formHeader);
}

/**
 * Student registration form set up step 1
 * @return void
 */
function runStudentRegistrationFormSetupStep1()
{
    $form = new Form;
    $form->setFields([
        "firstname",
        "lastname",
        "gender",
        "date-of-birth",
        "age",
        "nationality",
        "national-id",
        "phone-number",
        "email",
        "form-identifier",
        "submit",
        "additional-buttons"
    ]);
    $form->setRows(1);
    $form->setCols([
        "firstname" => "col-12 col-md-6 my-2",
        "lastname" => "col-12 col-md-6 my-2",
        "gender" => "col-12 col-md-6 my-2",
        "date-of-birth" => "col-12 col-md-6 my-2",
        "age" => "col-12 col-md-6 my-2",
        "nationality" => "col-12 col-md-6 my-2",
        "national-id" => "col-12 col-md-6 my-2",
        "phone-number" => "col-12 col-md-6 my-2",
        "email" => "col-12 col-md-12 my-2",
        "form-identifier" => "col-12",
        "submit" => "col-12 col-md-12",
        "additional-buttons" => "col-12 col-md-12"
    ]);
    $form->setContent([
        "firstname" => array(
            "label" => [
                "for" => "firstname",
                "value" => "<h6><strong>Firstname: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "text",
                "name" => "firstname",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "lastname" => array(
            "label" => [
                "for" => "lastname",
                "value" => "<h6><strong>Lastname: * </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "text",
                "name" => "lastname",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "gender" => array(
            "label" => [
                "for" => "gender",
                "value" => "<h6><strong>Gender: *</strong></h6>",
                "class" => "my-2"
            ],
            "select" => [
                "name" => "gender",
                "options" => ["Male", "Female"],
                "class" => "form-select"
            ]
        ),
        "date-of-birth" => array(
            "label" => [
                "for" => "date-of-birth",
                "value" => "<h6><strong>Date of birth* </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "date",
                "name" => "date-of-birth",
                "class" => "form-control",
                "value" => "",
            ]
        ),
        "age" => array(
            "label" => [
                "for" => "age",
                "value" => "<h6><strong>Age: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "number",
                "name" => "age",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "nationality" => array(
            "label" => [
                "for" => "nationality",
                "value" => "<h6><strong>Nationality: *</strong></h6>",
                "class" => "my-2"
            ],
            "select" => [
                "name" => "nationality",
                "options" => ["Kenyan"],
                "class" => "form-select"
            ]
        ),
        "national-id" => array(
            "label" => [
                "for" => "national-id",
                "value" => "<h6><strong>National id: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "number",
                "name" => "national-id",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "phone-number" => array(
            "label" => [
                "for" => "phone-number",
                "value" => "<h6><strong>Phone Number: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "number",
                "name" => "phone-number",
                "class" => "form-control",
                "value" => "",
                "has-group" => true,
                "group-details" => array("prefix" => "+254")
            ]
        ),
        "email" => array(
            "label" => [
                "for" => "email",
                "value" => "<h6><strong>Email: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "email",
                "name" => "email",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "form-identifier" => array(
            "input" => [
                "type" => "hidden",
                "name" => "form-identifier",
                "class" => "",
                "value" => Hashing::encrypt("STUDENT_REGISTRATION_FORM_STEP_1")
            ]
        ),
        "submit" => array(
            "button" => [
                "color" => "primary",
                "type" => "submit",
                "has-spinner" => true,
                "value" => "Go to step 2"
            ]
        ),
        "additional-buttons" => array(
            "additional-buttons" => [
                "color" => "secondary",
                "purpose" => "action-btn",
                "size" => "w-100 mt-3",
                "link" => "student-login",
                "innerHtml" => "I already have an account"
            ]
        ),

    ]);
    $form->runSetup([
        "method" => "POST",
        "action" => "",
        "id" => "student-registration-form-step-1",
        "class" => ""
    ]);
}

/**
 * Student registration form setup step 2
 * @return void
 */
function runStudentRegistrationFormSetupStep2()
{
    $form = new Form;
    $form->setFields([
        "username",
        "password",
        "confirm-password",
        "show-password",
        "form-identifier",
        "submit"
    ]);
    $form->setRows(1);
    $form->setCols([
        "username" => "col-12 my-2",
        "password" => "col-12 my-2",
        "confirm-password" => "col-12 my-2",
        "show-password" => "col-12 my-2",
        "form-identifier" => "col-12",
        "submit" => "col-12 col-md-12 my-2"
    ]);
    $form->setContent([
        "username" => array(
            "label" => [
                "for" => "username",
                "value" => "<h6><strong>Username: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "text",
                "name" => "username",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "password" => array(
            "label" => [
                "for" => "password",
                "value" => "<h6><strong>Password: * </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "password",
                "name" => "password",
                "class" => "form-control password-visibility-toggle",
                "value" => ""
            ]
        ),
        "confirm-password" => array(
            "label" => [
                "for" => "password",
                "value" => "<h6><strong>Confirm Password: * </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "password",
                "name" => "confirm-password",
                "class" => "form-control password-visibility-toggle",
                "value" => ""
            ]
        ),

        "show-password" => array(
            "input" => [
                "type" => "checkbox",
                "name" => "show-password",
                "class" => "form-check-input password-switch",
                "value" => ""
            ],
            "label" => [
                "for" => "show password",
                "value" => "<h6>Show Password</h6>",
                "class" => "form-check-label mx-2"
            ],
        ),
        "form-identifier" => array(
            "input" => [
                "type" => "hidden",
                "name" => "form-identifier",
                "class" => "",
                "value" => Hashing::encrypt("STUDENT_REGISTRATION_FORM_STEP_2")
            ]
        ),
        "submit" => array(
            "button" => [
                "color" => "primary",
                "type" => "submit",
                "has-spinner" => true,
                "value" => "Complete Registration &raquo;"
            ]
        )
    ]);
    $form->runSetup([
        "method" => "POST",
        "action" => "",
        "id" => "student-registration-form-step-2",
        "class" => "d-none"
    ]);
}
/*
``````````````````````````````````````````````````````````````````
STUDENT LOGIN FORMS
``````````````````````````````````````````````````````````````````
*/
/**
 * Student login form description setup
 * @return void
 */
function runStudentLoginFormDescriptionSetup()
{
    $formDescription = new FormDescription;
    $formDescription->setHeading("Student login form");
    $formDescription->setDescription("Please ensure that you enter the correct username and password for you to access your account");
    $formDescription->setDescriptionImageUrl(Url::getReference("resources/assets/images/png/kyc.png"));
    formDescriptionSetupDefaults($formDescription);
}

/**
 * Student login form header setup
 * @return void
 */
function runStudentLoginFormHeaderSetup()
{
    $formHeader = new FormHeader;
    $formHeader->setHeading("Account Information");
    $formHeader->setHelpText("Required fields are marked by *");
    formHeaderSetupDefaults($formHeader);
}

/**
 * Student login form setup
 * @return void
 */
function runStudentLoginFormSetup()
{
    $form = new Form;
    $form->setFields([
        "username",
        "password",
        "show-password",
        "form-identifier",
        "submit"
    ]);

    $form->setRows(1);
    $form->setCols([
        "username" => "col-md-12 my-2",
        "password" => "col-md-12 my-2",
        "show-password" => "col-md-12 my-2",
        "form-identifier" => "col-md-12",
        "submit" => "col-md-12 my-2"
    ]);
    $form->setContent([
        "username" => array(
            "label" => [
                "for" => "username",
                "value" => "<h6><strong>Username: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "text",
                "name" => "username",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "password" => array(
            "label" => [
                "for" => "password",
                "value" => "<h6><strong>Password: * </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "password",
                "name" => "password",
                "class" => "form-control password-visibility-toggle",
                "value" => ""
            ]
        ),
        "show-password" => array(
            "input" => [
                "type" => "checkbox",
                "name" => "show-password",
                "class" => "form-check-input password-switch",
                "value" => ""
            ],
            "label" => [
                "for" => "show password",
                "value" => "<h6>Show Password</h6>",
                "class" => "form-check-label mx-2"
            ],
        ),
        "form-identifier" => array(
            "input" => [
                "type" => "hidden",
                "name" => "form-identifier",
                "class" => "",
                "value" => Hashing::encrypt("STUDENT_LOGIN_FORM")
            ]
        ),
        "submit" => array(
            "button" => [
                "color" => "primary",
                "type" => "submit",
                "has-spinner" => true,
                "value" => "Go to my account &raquo;"
            ]
        )
    ]);
    $form->runSetup([
        "method" => "POST",
        "action" => "",
        "id" => "student-login-form",
        "class" => ""
    ]);
}

/**
 * Student fee payment form description setup
 * @return void
 */
function runStudentFeePaymentFormDescriptionSetup()
{
    $formDescription = new FormDescription;
    $formDescription->setHeading("Student Fee payment");
    $formDescription->setDescription("Please ensure that you fill the required fields to process your fee payment");
    $formDescription->setDescriptionImageUrl(Url::getReference("resources/assets/images/png/kyc.png"));
    formDescriptionSetupDefaults($formDescription);
}


/**
 * Student fee payment form header setup
 * @return void
 */
function runStudentFeePaymentFormHeaderSetup()
{

    $formHeader = new FormHeader;
    $formHeader->setHeading("Payment Information");
    $formHeader->setHelpText("Required fields are marked by *");
    formHeaderSetupDefaults($formHeader);
}

/**
 * Student fee payment form setup
 * @return void
 */
function runStudentFeePaymentFormSetup()
{
    $form = new Form;
    $form->setFields([
        "amount",
        "mode",
        "transaction-code",
        "form-identifier",
        "submit"
    ]);

    $form->setRows(1);
    $form->setCols([
        "amount" => "col-md-12 my-2",
        "mode" => "col-md-12 my-2",
        "transaction-code" => "col-md-12 my-2",
        "form-identifier" => "col-md-12",
        "submit" => "col-md-12 my-2"
    ]);
    $form->setContent([
        "amount" => array(
            "label" => [
                "for" => "payment-amount",
                "value" => "<h6><strong>Payment amount: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "number",
                "name" => "amount",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "mode" => array(
            "label" => [
                "for" => "payment-mode",
                "value" => "<h6><strong>Payment mode: * </strong></h6>",
                "class" => "my-2"
            ],
            "select" => [
                "name" => "mode",
                "options" => ["Mpesa"],
                "class" => "form-select"
            ]
        ),
        "transaction-code" => array(
            "label" => [
                "for" => "transaction-code",
                "value" => "<h6><strong>Transaction code: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "text",
                "name" => "transaction-code",
                "class" => "form-control",
                "value" => ""
            ],
        ),
        "form-identifier" => array(
            "input" => [
                "type" => "hidden",
                "name" => "form-identifier",
                "class" => "",
                "value" => Hashing::encrypt("FEE_PAYMENT_FORM")
            ]
        ),
        "submit" => array(
            "button" => [
                "color" => "primary",
                "type" => "submit",
                "has-spinner" => true,
                "value" => "Complete payment"
            ]
        )
    ]);
    $form->runSetup([
        "method" => "POST",
        "action" => "",
        "id" => "fee-payment-form",
        "class" => ""
    ]);

}


/*
``````````````````````````````````````````````````````````````````
STUDENT FEE PAYMENT FORM
``````````````````````````````````````````````````````````````````
*/



/*
```````````````````````````````````````````````````````````````
ADMINISTRATORS FORM SETUP
`````````````````````````````````````````````````````````````````
*/
/*
``````````````````````````````````````````````````````````````````
ADMIN REGISTRATION FORMS
``````````````````````````````````````````````````````````````````
*/
/**
 * Admin registration form description setup
 * @return void
 */
function runAdminRegistrationFormDescriptionSetup()
{
    $formDescription = new FormDescription;
    $formDescription->setHeading("Admin registration form");
    $formDescription->setDescription("Please ensure that you fill all the required
        fields to
        sign up a new administrator");
    $formDescription->setDescriptionImageUrl(Url::getReference("resources/assets/images/png/software-engineer.png"));
    formDescriptionSetupDefaults($formDescription);
}
/**
 * Admin description form header setup
 * @return void
 */
function runAdminRegistrationFormHeaderSetup()
{
    $formHeader = new FormHeader;
    $formHeader->setHeading("Step 1: Personal Information");
    $formHeader->setHelpText("Required fields are marked by *");
    formHeaderSetupDefaults($formHeader);
}

/**
 * Admin registration form set up step 1
 * @return void
 */
function runAdminRegistrationFormSetupStep1()
{
    $form = new Form;
    $form->setFields([
        "firstname",
        "lastname",
        "gender",
        "date-of-birth",
        "age",
        "nationality",
        "national-id",
        "phone-number",
        "email",
        "form-identifier",
        "submit",
        "additional-buttons"
    ]);
    $form->setRows(1);
    $form->setCols([
        "firstname" => "col-12 col-md-6 my-2",
        "lastname" => "col-12 col-md-6 my-2",
        "gender" => "col-12 col-md-6 my-2",
        "date-of-birth" => "col-12 col-md-6 my-2",
        "age" => "col-12 col-md-6 my-2",
        "nationality" => "col-12 col-md-6 my-2",
        "national-id" => "col-12 col-md-6 my-2",
        "phone-number" => "col-12 col-md-6 my-2",
        "email" => "col-12 col-md-12 my-2",
        "form-identifier" => "col-12",
        "submit" => "col-12 col-md-12",
        "additional-buttons" => "col-12 col-md-12"
    ]);
    $form->setContent([
        "firstname" => array(
            "label" => [
                "for" => "firstname",
                "value" => "<h6><strong>Firstname: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "text",
                "name" => "firstname",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "lastname" => array(
            "label" => [
                "for" => "lastname",
                "value" => "<h6><strong>Lastname: * </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "text",
                "name" => "lastname",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "gender" => array(
            "label" => [
                "for" => "gender",
                "value" => "<h6><strong>Gender: *</strong></h6>",
                "class" => "my-2"
            ],
            "select" => [
                "name" => "gender",
                "options" => ["Male", "Female"],
                "class" => "form-select"
            ]
        ),
        "date-of-birth" => array(
            "label" => [
                "for" => "date-of-birth",
                "value" => "<h6><strong>Date of birth* </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "date",
                "name" => "date-of-birth",
                "class" => "form-control",
                "value" => "",
            ]
        ),
        "age" => array(
            "label" => [
                "for" => "age",
                "value" => "<h6><strong>Age: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "number",
                "name" => "age",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "nationality" => array(
            "label" => [
                "for" => "nationality",
                "value" => "<h6><strong>Nationality: *</strong></h6>",
                "class" => "my-2"
            ],
            "select" => [
                "name" => "nationality",
                "options" => ["Kenyan"],
                "class" => "form-select"
            ]
        ),
        "national-id" => array(
            "label" => [
                "for" => "national-id",
                "value" => "<h6><strong>National id: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "number",
                "name" => "national-id",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "phone-number" => array(
            "label" => [
                "for" => "phone-number",
                "value" => "<h6><strong>Phone Number: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "number",
                "name" => "phone-number",
                "class" => "form-control",
                "value" => "",
                "has-group" => true,
                "group-details" => array("prefix" => "+254")
            ]
        ),
        "email" => array(
            "label" => [
                "for" => "email",
                "value" => "<h6><strong>Email: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "email",
                "name" => "email",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "form-identifier" => array(
            "input" => [
                "type" => "hidden",
                "name" => "form-identifier",
                "class" => "",
                "value" => Hashing::encrypt("ADMIN_REGISTRATION_FORM_STEP_1")
            ]
        ),
        "submit" => array(
            "button" => [
                "color" => "primary",
                "type" => "submit",
                "has-spinner" => true,
                "value" => "Go to step 2"
            ]
        ),
        "additional-buttons" => array(
            "additional-buttons" => [
                "color" => "secondary",
                "purpose" => "action-btn",
                "size" => "w-100 mt-3",
                "link" => "student-login",
                "innerHtml" => "I already have an account"
            ]
        ),

    ]);
    $form->runSetup([
        "method" => "POST",
        "action" => "",
        "id" => "admin-registration-form-step-1",
        "class" => ""
    ]);
}

/**
 * Admin registration form setup step 2
 * @return void
 */
function runAdminRegistrationFormSetupStep2()
{
    $form = new Form;
    $form->setFields([
        "username",
        "password",
        "confirm-password",
        "show-password",
        "form-identifier",
        "submit"
    ]);
    $form->setRows(1);
    $form->setCols([
        "username" => "col-12 my-2",
        "password" => "col-12 my-2",
        "confirm-password" => "col-12 my-2",
        "show-password" => "col-12 my-2",
        "form-identifier" => "col-12",
        "submit" => "col-12 col-md-12 my-2"
    ]);
    $form->setContent([
        "username" => array(
            "label" => [
                "for" => "username",
                "value" => "<h6><strong>Username: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "text",
                "name" => "username",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "password" => array(
            "label" => [
                "for" => "password",
                "value" => "<h6><strong>Password: * </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "password",
                "name" => "password",
                "class" => "form-control password-visibility-toggle",
                "value" => ""
            ]
        ),
        "confirm-password" => array(
            "label" => [
                "for" => "password",
                "value" => "<h6><strong>Confirm Password: * </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "password",
                "name" => "confirm-password",
                "class" => "form-control password-visibility-toggle",
                "value" => ""
            ]
        ),

        "show-password" => array(
            "input" => [
                "type" => "checkbox",
                "name" => "show-password",
                "class" => "form-check-input password-switch",
                "value" => ""
            ],
            "label" => [
                "for" => "show password",
                "value" => "<h6>Show Password</h6>",
                "class" => "form-check-label mx-2"
            ],
        ),
        "form-identifier" => array(
            "input" => [
                "type" => "hidden",
                "name" => "form-identifier",
                "class" => "",
                "value" => Hashing::encrypt("ADMIN_REGISTRATION_FORM_STEP_2")
            ]
        ),
        "submit" => array(
            "button" => [
                "color" => "primary",
                "type" => "submit",
                "has-spinner" => true,
                "value" => "Complete Registration &raquo;"
            ]
        )
    ]);
    $form->runSetup([
        "method" => "POST",
        "action" => "",
        "id" => "admin-registration-form-step-2",
        "class" => "d-none"
    ]);
}
/*
``````````````````````````````````````````````````````````````````
ADMIN LOGIN FORMS
``````````````````````````````````````````````````````````````````
*/
/**
 * Admin login form description setup
 * @return void
 */
function runAdminLoginFormDescriptionSetup()
{
    $formDescription = new FormDescription;
    $formDescription->setHeading("Admin login form");
    $formDescription->setDescription("Please ensure that you enter the correct username and password for you to access your account");
    $formDescription->setDescriptionImageUrl(Url::getReference("resources/assets/images/png/software-engineer.png"));
    formDescriptionSetupDefaults($formDescription);
}

/**
 * Admin login form header setup
 * @return void
 */
function runAdminLoginFormHeaderSetup()
{
    $formHeader = new FormHeader;
    $formHeader->setHeading("Account Information");
    $formHeader->setHelpText("Required fields are marked by *");
    formHeaderSetupDefaults($formHeader);
}

/**
 * Admin login form setup
 * @return void
 */
function runAdminLoginFormSetup()
{
    $form = new Form;
    $form->setFields([
        "username",
        "password",
        "show-password",
        "form-identifier",
        "submit"
    ]);

    $form->setRows(1);
    $form->setCols([
        "username" => "col-md-12 my-2",
        "password" => "col-md-12 my-2",
        "show-password" => "col-md-12 my-2",
        "form-identifier" => "col-md-12",
        "submit" => "col-md-12 my-2"
    ]);
    $form->setContent([
        "username" => array(
            "label" => [
                "for" => "username",
                "value" => "<h6><strong>Username: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "text",
                "name" => "username",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "password" => array(
            "label" => [
                "for" => "password",
                "value" => "<h6><strong>Password: * </strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "password",
                "name" => "password",
                "class" => "form-control password-visibility-toggle",
                "value" => ""
            ]
        ),
        "show-password" => array(
            "input" => [
                "type" => "checkbox",
                "name" => "show-password",
                "class" => "form-check-input password-switch",
                "value" => ""
            ],
            "label" => [
                "for" => "show password",
                "value" => "<h6>Show Password</h6>",
                "class" => "form-check-label mx-2"
            ],
        ),
        "form-identifier" => array(
            "input" => [
                "type" => "hidden",
                "name" => "form-identifier",
                "class" => "",
                "value" => Hashing::encrypt("ADMIN_LOGIN_FORM")
            ]
        ),
        "submit" => array(
            "button" => [
                "color" => "primary",
                "type" => "submit",
                "has-spinner" => true,
                "value" => "Go to my account &raquo;"
            ]
        )
    ]);
    $form->runSetup([
        "method" => "POST",
        "action" => "",
        "id" => "admin-login-form",
        "class" => ""
    ]);
}

/*
``````````````````````````````````````````````````````````````````````
ADMIN ADD COURSE CATEGORY
``````````````````````````````````````````````````````````````````````
*/

/**
 * Course category form description setup 
 * @return void
 */
function runAdminCourseCategoryFormDescriptionSetup()
{
    $formDescription = new FormDescription;
    $formDescription->setHeading("Course category form");
    $formDescription->setDescription("Please ensure that you fill the required fields to register a new course category");
    $formDescription->setDescriptionImageUrl(Url::getReference("resources/assets/images/png/app.png"));
    formDescriptionSetupDefaults($formDescription);
}

/**
 * Admin run course category form header setup
 * @return void
 */
function runAdminCourseCategoryFormHeaderSetup()
{
    $formHeader = new FormHeader;
    $formHeader->setHeading("Category Information");
    $formHeader->setHelpText("Required fields are marked by *");
    formHeaderSetupDefaults($formHeader);
}


/**
 * Admin Course category form setup
 * @return void
 */
function runAdminCourseCategoryFormSetup()
{

    $form = new Form;
    $form->setFields([
        "category-name",
        "category-description",
        "form-identifier",
        "submit"
    ]);

    $form->setRows(1);
    $form->setCols([
        "category-name" => "col-md-12 my-2",
        "category-description" => "col-md-12 my-2",
        "form-identifier" => "col-md-12",
        "submit" => "col-md-12 my-2"
    ]);
    $form->setContent([
        "category-name" => array(
            "label" => [
                "for" => "category-name",
                "value" => "<h6><strong>Category name: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "text",
                "name" => "name",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "category-description" => array(
            "label" => [
                "for" => "category-description",
                "value" => "<h6><strong>Category description: * </strong></h6>",
                "class" => "my-2"
            ],
            "textarea" => [
                "name" => "description",
                "class" => "form-control",
                "value" => "",
                "style" => "height:120px;",
            ]
        ),
        "form-identifier" => array(
            "input" => [
                "type" => "hidden",
                "name" => "form-identifier",
                "class" => "",
                "value" => Hashing::encrypt("COURSE_CATEGORY_FORM")
            ]
        ),
        "submit" => array(
            "button" => [
                "color" => "primary",
                "type" => "submit",
                "has-spinner" => true,
                "value" => "Register Category"
            ]
        )
    ]);
    $form->runSetup([
        "method" => "POST",
        "action" => "",
        "id" => "course-category-form",
        "class" => ""
    ]);
}


/*
```````````````````````````````````````````````````````````````
ADMIN ADD COURSE
```````````````````````````````````````````````````````````````
*/

/**
 * Course category form description setup 
 * @return void
 */
function runAdminCourseRegistrationFormDescriptionSetup()
{
    $formDescription = new FormDescription;
    $formDescription->setHeading("Course registration form");
    $formDescription->setDescription("Please ensure that you fill the required fields to register a new course category");
    $formDescription->setDescriptionImageUrl(Url::getReference("resources/assets/images/png/resume.png"));
    formDescriptionSetupDefaults($formDescription);
}

/**
 * Admin run course category form header setup
 * @return void
 */
function runAdminCourseRegistrationFormHeaderSetup()
{
    $formHeader = new FormHeader;
    $formHeader->setHeading("Course Information");
    $formHeader->setHelpText("Required fields are marked by *");
    formHeaderSetupDefaults($formHeader);
}

/**
 * Admin course registration setup
 * @return void
 */
function runAdminCourseRegistrationFormSetup()
{

    $courseCategories = Admin::run()->getCourseCategories();
    $categoryArray = [];

    foreach ($courseCategories as $category) {
        array_push($categoryArray, $category["ct_name"]);
    }
    $form = new Form;
    $form->setFields([
        "course-name",
        "category-name",
        "course-fee",
        "course-description",
        "form-identifier",
        "submit"
    ]);

    $form->setRows(1);
    $form->setCols([
        "course-name" => "col-md-12 my-2",
        "category-name" => "col-md-12 my-2",
        "course-fee" => "col-md-12 my-2",
        "course-description" => "col-md-12 my-2",
        "form-identifier" => "col-md-12",
        "submit" => "col-md-12 my-2"
    ]);
    $form->setContent([
        "course-name" => array(
            "label" => [
                "for" => "course-name",
                "value" => "<h6><strong>Course name: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "text",
                "name" => "name",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "category-name" => array(
            "label" => [
                "for" => "category-name",
                "value" => "<h6><strong>Category name: *</strong></h6>",
                "class" => "my-2"
            ],
            "select" => [
                "name" => "category",
                "options" => $categoryArray,
                "class" => "form-select",
            ]
        ),
        "course-fee" => array(
            "label" => [
                "for" => "course-fee",
                "value" => "<h6><strong>Course fee: *</strong></h6>",
                "class" => "my-2"
            ],
            "input" => [
                "type" => "number",
                "name" => "fee",
                "class" => "form-control",
                "value" => ""
            ]
        ),
        "course-description" => array(
            "label" => [
                "for" => "course-description",
                "value" => "<h6><strong>Course description: * </strong></h6>",
                "class" => "my-2"
            ],
            "textarea" => [
                "name" => "description",
                "class" => "form-control",
                "value" => "",
                "style" => "height:120px;",
            ]
        ),
        "form-identifier" => array(
            "input" => [
                "type" => "hidden",
                "name" => "form-identifier",
                "class" => "",
                "value" => Hashing::encrypt("COURSE_REGISTRATION_FORM")
            ]
        ),
        "submit" => array(
            "button" => [
                "color" => "primary",
                "type" => "submit",
                "has-spinner" => true,
                "value" => "Register Course"
            ]
        )
    ]);
    $form->runSetup([
        "method" => "POST",
        "action" => "",
        "id" => "course-registration-form",
        "class" => ""
    ]);
}