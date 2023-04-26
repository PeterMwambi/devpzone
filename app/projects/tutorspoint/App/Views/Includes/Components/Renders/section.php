<?php

use Models\Core\App\Utilities\Session;
use Views\Includes\Components\Classes\Section;


/*
```````````````````````````````````````````````````````````````````````
SECTION DEFAULTS
```````````````````````````````````````````````````````````````````````
*/
/**
 * Section setup defaults
 * @param Section $section
 * @return void
 */
function sectionSetupDefaults(Section $section)
{
    $section->setSectionClasses("container-fluid mt-lg");
    $section->setHasRows(true);
    $section->setType("default");
    $section->runSetup();
}

/**
 * Views section setup defaults
 * @param Section $section
 * @return void
 */
function viewsSectionSetupDefaults(Section $section)
{
    $section->setRows(["views-header", "views-body"]);
    $section->setCols([
        "views-header" => "col-md-12 col-12",
        "views-body" => "col-md-12 col-12"
    ]);
}


/**
 * Registration form section setup defaults
 * @param Section $section
 * @return void
 */
function registrationFormSectionSetupDefaults(Section $section)
{
    $section->setRowSizing("mt-3");
    $section->setRows(["form-description", "form-body"]);
    $section->setCols([
        "form-description" => "col-md-6 my-5",
        "form-body" => "col-md-5 my-5"
    ]);
}

/**
 * Login form section setup defaults
 * @param Section $section
 * @return void
 */
function loginFormSectionSetupDefaults(Section $section)
{
    $section->setRowSizing("mt-3");
    $section->setRows(["form-description", "form-body"]);
    $section->setCols([
        "form-description" => "col-md-7 my-5",
        "form-body" => "col-md-4 my-5"
    ]);
}


/*
`````````````````````````````````````````````````````````````````
TUTOR SECTION SETUP
````````````````````````````````````````````````````````````````
*/
/**
 * Tutor homepage setup
 * @return void
 */
function runTutorHomepageSectionSetup()
{
    $section = new Section;
    $section->setRows(["views-header", "views-body"]);
    $section->setCols([
        "views-header" => "row",
        "views-body" => "row"
    ]);
    $section->setContent([
        "views-header" => [
            "runTutorHomepageHeaderSetup"
        ],
        "views-body" => [
            "runTutorHomepageSetup"
        ]
    ]);
    $section->setSectionClasses("container-fluid mt-md");
    $section->setHasRows(true);
    $section->setType("default");
    $section->runSetup();
}

/**
 * Tutor registration form section setup
 * @return void
 */
function runTutorRegistrationFormSectionSetup()
{
    $section = new Section;
    registrationFormSectionSetupDefaults($section);
    $section->setContent([
        "form-description" => [
            "runTutorRegistrationFormDescriptionSetup"
        ],
        "form-body" => [
            "runProgressBarSetup",
            "runTutorRegistrationFormCardSetup"
        ]
    ]);
    sectionSetupDefaults($section);
}

/**
 * Tutor login form section setup
 * @return void
 */
function runTutorLoginFormSectionSetup()
{
    $section = new Section;
    loginFormSectionSetupDefaults($section);
    $section->setContent([
        "form-description" => [
            "runTutorLoginFormDescriptionSetup"
        ],
        "form-body" => [
            "runTutorLoginFormCardSetup"
        ]
    ]);
    sectionSetupDefaults($section);
}

/**
 * Tutor course reception form section setup
 * @return void
 */
function runTutorCourseReceptionFormSectionSetup()
{
    $section = new Section;
    registrationFormSectionSetupDefaults($section);
    $section->setContent([
        "form-description" => [
            "runTutorCourseReceptionFormDescriptionSetup"
        ],
        "form-body" => [
            "runTutorCourseReceptionFormCardSetup"
        ]
    ]);
    sectionSetupDefaults($section);
}

/**
 * Tutor view courses section setup
 * @return void
 */
function runTutorViewCoursesSectionSetup()
{
    $section = new Section;
    $section->setRows(["views-header", "views-body"]);
    $section->setCols([
        "views-header" => "row",
        "views-body" => "col-md-12 col-12"
    ]);
    $section->setContent([
        "views-header" => [
            "runTutorViewCoursesHeaderSetup"
        ],
        "views-body" => [
            "runTutorViewCoursesSetup"
        ]
    ]);
    $section->setSectionClasses("container-fluid mt-md");
    $section->setHasRows(true);
    $section->setType("default");
    $section->runSetup();
}


function runTutorViewCourseContentSectionSetup()
{
    $section = new Section;
    $section->setRows(["views-header", "views-body"]);
    $section->setCols([
        "views-header" => "row",
        "views-body" => "col-md-12 col-12"
    ]);
    $section->setContent([
        "views-header" => [
            "runTutorViewCourseContentHeaderSetup"
        ],
        "views-body" => [
            "runTutorViewCourseContentSetup"
        ]
    ]);
    $section->setSectionClasses("container-fluid mt-md");
    $section->setHasRows(true);
    $section->setType("default");
    $section->runSetup();
}

function runTutorViewStudentPaymentSectionSetup()
{
    $section = new Section;
    $section->setRows(["views-header", "views-body"]);
    $section->setCols([
        "views-header" => "row",
        "views-body" => "col-md-12 col-12"
    ]);
    $section->setContent([
        "views-header" => [
            "runTutorViewStudentPaymentHeaderSetup"
        ],
        "views-body" => [
            "runTutorViewStudentPaymentSetup"
        ]
    ]);
    $section->setSectionClasses("container-fluid mt-md");
    $section->setHasRows(true);
    $section->setType("default");
    $section->runSetup();
}

function runAdminViewStudentTutorPaymentSectionSetup()
{
    $section = new Section;
    $section->setRows(["views-header", "views-body"]);
    $section->setCols([
        "views-header" => "row",
        "views-body" => "col-md-12 col-12"
    ]);
    $section->setContent([
        "views-header" => [
            "runAdminViewStudentTutorPaymentHeaderSetup"
        ],
        "views-body" => [
            "runAdminViewStudentTutorPaymentSetup"
        ]
    ]);
    $section->setSectionClasses("container-fluid mt-md");
    $section->setHasRows(true);
    $section->setType("default");
    $section->runSetup();
}

function runTutorViewStudentsSectionSetup()
{
    $section = new Section;
    $section->setRows(["views-header", "views-body"]);
    $section->setCols([
        "views-header" => "row",
        "views-body" => "col-md-12 col-12"
    ]);
    $section->setContent([
        "views-header" => [
            "runtutorViewStudentsHeaderSetup"
        ],
        "views-body" => [
            "runTutorViewStudentsSetup"
        ]
    ]);
    $section->setSectionClasses("container-fluid mt-md");
    $section->setHasRows(true);
    $section->setType("default");
    $section->runSetup();
}

function runTutorViewClassesSectionSetup()
{
    $section = new Section;
    $section->setRows(["views-header", "views-body"]);
    $section->setCols([
        "views-header" => "row",
        "views-body" => "col-md-12 col-12"
    ]);
    $section->setContent([
        "views-header" => [
            "runtutorViewClassesHeaderSetup"
        ],
        "views-body" => [
            "runTutorViewClassesSetup"
        ]
    ]);
    $section->setSectionClasses("container-fluid mt-md");
    $section->setHasRows(true);
    $section->setType("default");
    $section->runSetup();
}

/*
`````````````````````````````````````````````````````````````````````
STUDENT SECTION SETUP
`````````````````````````````````````````````````````````````````````
*/

function runStudentHomepageSectionSetup()
{
    $section = new Section;
    $section->setRows(["views-header", "views-body"]);
    $section->setCols([
        "views-header" => "row",
        "views-body" => "row"
    ]);
    $section->setContent([
        "views-header" => [
            "runStudentHomepageHeaderSetup"
        ],
        "views-body" => [
            "runStudentHomepageSetup"
        ]
    ]);
    $section->setSectionClasses("container-fluid mt-md");
    $section->setHasRows(true);
    $section->setType("default");
    $section->runSetup();
}

/**
 * Student registration form section setup
 * @return void
 */
function runStudentRegistrationFormSectionSetup()
{
    $section = new Section;
    registrationFormSectionSetupDefaults($section);
    $section->setContent([
        "form-description" => [
            "runStudentRegistrationFormDescriptionSetup"
        ],
        "form-body" => [
            "runProgressBarSetup",
            "runstudentRegistrationFormCardSetup"
        ]
    ]);
    sectionSetupDefaults($section);
}

/**
 * Student login form section setup
 * @return void
 */
function runStudentLoginFormSectionSetup()
{
    $section = new Section;
    loginFormSectionSetupDefaults($section);
    $alert = "";
    if (Session::exists("prompt-login")) {
        $alert = "runCourseEnrollmentAlertSetUp";
        Session::destroy("prompt-login");
    }
    $section->setContent([
        "form-description" => [
            "runStudentLoginFormDescriptionSetup"
        ],
        "form-body" => [
            $alert,
            "runStudentLoginFormCardSetup"
        ]
    ]);
    sectionSetupDefaults($section);
}

function runStudentFeePaymentFormSectionSetup()
{
    $section = new Section;
    registrationFormSectionSetupDefaults($section);
    $alert = "";
    if (Session::exists("cid")) {
        $alert = "runCourseFeePaymentBriefAlert";
    }
    $section->setContent([
        "form-description" => [
            "runStudentFeePaymentFormDescriptionSetup"
        ],
        "form-body" => [
            $alert,
            "runStudentFeePaymentFormCardSetup"
        ]
    ]);
    sectionSetupDefaults($section);
}


function runStudentViewFeePaymentSectionSetup()
{
    $section = new Section;
    $section->setRows(["views-header", "views-body"]);
    $section->setCols([
        "views-header" => "row",
        "views-body" => "col-md-12 col-12"
    ]);
    $section->setContent([
        "views-header" => [
            "runStudentViewFeePaymentHeaderSetup"
        ],
        "views-body" => [
            "runStudentViewFeePaymentSetup"
        ]
    ]);
    $section->setSectionClasses("container-fluid mt-md");
    $section->setHasRows(true);
    $section->setType("default");
    $section->runSetup();
}

/**
 * Student view courses section setup
 * @return void
 */
function runStudentViewCoursesSectionSetup()
{
    $section = new Section;
    $section->setRows(["views-header", "views-body"]);
    $section->setCols([
        "views-header" => "row",
        "views-body" => "col-md-12 col-12"
    ]);
    $section->setContent([
        "views-header" => [
            "runStudentViewCoursesHeaderSetup"
        ],
        "views-body" => [
            "runStudentViewCoursesSetup"
        ]
    ]);
    $section->setSectionClasses("container-fluid mt-md");
    $section->setHasRows(true);
    $section->setType("default");
    $section->runSetup();
}

/*
`````````````````````````````````````````````````````````````````````
ADMIN SECTION SETUP
`````````````````````````````````````````````````````````````````````
*/

/**
 * Student registration form section setup
 * @return void
 */
function runAdminRegistrationFormSectionSetup()
{
    $section = new Section;
    registrationFormSectionSetupDefaults($section);
    $section->setContent([
        "form-description" => [
            "runAdminRegistrationFormDescriptionSetup"
        ],
        "form-body" => [
            "runProgressBarSetup",
            "runAdminRegistrationFormCardSetup"
        ]
    ]);
    sectionSetupDefaults($section);
}

/**
 * Admin login form section setup
 * @return void
 */
function runAdminLoginFormSectionSetup()
{
    $section = new Section;
    loginFormSectionSetupDefaults($section);
    $section->setContent([
        "form-description" => [
            "runAdminLoginFormDescriptionSetup"
        ],
        "form-body" => [
            "runAdminLoginFormCardSetup"
        ]
    ]);
    sectionSetupDefaults($section);
}

/**
 * Admin course category form section setup
 * @return void
 */
function runAdminCourseCategoryFormSectionSetup()
{
    $section = new Section;
    registrationFormSectionSetupDefaults($section);
    $section->setContent([
        "form-description" => [
            "runAdminCourseCategoryFormDescriptionSetup"
        ],
        "form-body" => [
            "runAdminCourseCategoryFormCardSetup"
        ]
    ]);
    sectionSetupDefaults($section);
}

/**
 * Admin course registration form section setup
 * @return void
 */
function runAdminCourseRegistrationFormSectionSetup()
{
    $section = new Section;
    registrationFormSectionSetupDefaults($section);
    $section->setContent([
        "form-description" => [
            "runAdminCourseRegistrationFormDescriptionSetup"
        ],
        "form-body" => [
            "runAdminCourseRegistrationFormCardSetup"
        ]
    ]);
    sectionSetupDefaults($section);
}
/**
 * Admin homepage setup
 * @return void
 */
function runAdminHomepageSectionSetup()
{
    $section = new Section;
    $section->setRows(["views-header", "views-body"]);
    $section->setCols([
        "views-header" => "row",
        "views-body" => "row"
    ]);
    $section->setContent([
        "views-header" => [
            "runAdminHomepageHeaderSetup"
        ],
        "views-body" => [
            "runAdminHomepageSetup"
        ]
    ]);
    $section->setSectionClasses("container-fluid mt-md");
    $section->setHasRows(true);
    $section->setType("default");
    $section->runSetup();
}

/**
 * Summary of runAdminViewStudentsSectionSetup
 * @return void
 */
function runAdminViewStudentsSectionSetup()
{
    $section = new Section;
    $section->setRows(["views-header", "views-body"]);
    $section->setCols([
        "views-header" => "row",
        "views-body" => "col-md-12 col-12"
    ]);
    $section->setContent([
        "views-header" => [
            "runAdminViewStudentsHeaderSetup"
        ],
        "views-body" => [
            "runAdminViewStudentsSetup"
        ]
    ]);
    $section->setSectionClasses("container-fluid mt-md");
    $section->setHasRows(true);
    $section->setType("default");
    $section->runSetup();
}

function runAdminViewTutorsSectionSetup()
{
    $section = new Section;
    $section->setRows(["views-header", "views-body"]);
    $section->setCols([
        "views-header" => "row",
        "views-body" => "col-md-12 col-12"
    ]);
    $section->setContent([
        "views-header" => [
            "runAdminViewTutorsHeaderSetup"
        ],
        "views-body" => [
            "runAdminViewTutorsSetup"
        ]
    ]);
    $section->setSectionClasses("container-fluid mt-md");
    $section->setHasRows(true);
    $section->setType("default");
    $section->runSetup();
}

function runAdminViewAdministratorsSectionSetup()
{
    $section = new Section;
    $section->setRows(["views-header", "views-body"]);
    $section->setCols([
        "views-header" => "row",
        "views-body" => "col-md-12 col-12"
    ]);
    $section->setContent([
        "views-header" => [
            "runAdminViewAdministratorsHeaderSetup"
        ],
        "views-body" => [
            "runAdminViewAdministratorsSetup"
        ]
    ]);
    $section->setSectionClasses("container-fluid mt-md");
    $section->setHasRows(true);
    $section->setType("default");
    $section->runSetup();
}

function runAdminViewClassesSectionSetup()
{
    $section = new Section;
    $section->setRows(["views-header", "views-body"]);
    $section->setCols([
        "views-header" => "row",
        "views-body" => "col-md-12 col-12"
    ]);
    $section->setContent([
        "views-header" => [
            "runAdminViewClassesHeaderSetup"
        ],
        "views-body" => [
            "runAdminViewClassesSetup"
        ]
    ]);
    $section->setSectionClasses("container-fluid mt-md");
    $section->setHasRows(true);
    $section->setType("default");
    $section->runSetup();
}

function runAdminViewCoursesSectionSetup()
{
    $section = new Section;
    $section->setRows(["views-header", "views-body"]);
    $section->setCols([
        "views-header" => "row",
        "views-body" => "col-md-12 col-12"
    ]);
    $section->setContent([
        "views-header" => [
            "runAdminViewCoursesHeaderSetup"
        ],
        "views-body" => [
            "runAdminViewCoursesSetup"
        ]
    ]);
    $section->setSectionClasses("container-fluid mt-md");
    $section->setHasRows(true);
    $section->setType("default");
    $section->runSetup();
}

function runAdminViewCourseCategoriesSectionSetup()
{
    $section = new Section;
    $section->setRows(["views-header", "views-body"]);
    $section->setCols([
        "views-header" => "row",
        "views-body" => "col-md-12 col-12"
    ]);
    $section->setContent([
        "views-header" => [
            "runAdminViewCourseCategoriesHeaderSetup"
        ],
        "views-body" => [
            "runAdminViewCourseCategoriesSetup"
        ]
    ]);
    $section->setSectionClasses("container-fluid mt-md");
    $section->setHasRows(true);
    $section->setType("default");
    $section->runSetup();
}