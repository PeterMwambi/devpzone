<?php

use Models\Core\App\Database\Queries\Read\Student;
use Models\Core\App\Database\Queries\Read\Tutor;
use Models\Core\App\Utilities\Session;
use Models\Core\App\Utilities\Url;
use Views\Includes\Components\Classes\Navbar;


/**
 * Navbar setup defaults
 * @param Navbar $navbar
 * @return void
 */
function navbarSetUpDefaults(Navbar $navbar)
{
    $navbar->setIsCollapsable(true);
    $navbar->setNavBarVariation("light");
    $navbar->setNavBarColor("light");
    $navbar->setNavBarClasses("p-3 p-md-0 shadow-sm");
    $navbar->setNavBarPositioning("fixed-top");
    $navbar->setNavBrandClasses("mx-2 mt-2");
    $navbar->setNavBrandLink("home");
    $navbar->setNavBrandImageUrl(Url::getReference("resources/assets/icons/tutorspoint.svg"));
    $navbar->setNavBrandImageClasses("tutors-point__logo");
    $navbar->setNavItemClasses("mx-3");
}
/**
 * Default navbar setup
 * @param string $page
 * @return void
 */
function runDefaultNavbarSetup(string $page)
{
    $navbar = new Navbar;
    $navbar->setCurrentPage($page);
    navbarSetUpDefaults($navbar);
    $navbar->setNavItems([
        "Home",
        "Courses",
        "Sign in",
        "Register"
    ]);
    $navbar->setNavLinks([
        "Home" => "home",
        "Courses" => "courses",
        "Sign in" => "#",
        "Register" => "#"
    ]);
    $navbar->setDropDownItems([
        "Sign in" => [
            "Sign in as student",
            "Sign in as trainer",
            "Sign in as admin"
        ],
        "Register" => [
            "Register as student",
            "Register as trainer",
        ]
    ]);
    $navbar->setDropDownItemsId([
        "Sign in" => "sign-in",
        "Register" => "register",
    ]);
    $navbar->setDropDownItemLinks([
        "Sign in" => [
            "Sign in as student" => "student-login",
            "Sign in as trainer" => "tutor-login",
            "Sign in as admin" => "admin-login"
        ],
        "Register" => [
            "Register as student" => "student-registration",
            "Register as trainer" => "tutor-registration",
        ]
    ]);

    $navbar->setDropdownItemClasses([
        "Sign in" => "left-3",
        "Register" => "left-3"
    ]);
    $navbar->setSeparator(false);

    $navbar->setNavBarUlClasses("ms-auto mt-2 mt-lg-0 mx-5");

    $navbar->runSetup();
}

/**
 * Student navbar set up
 * @param string $page
 * @return void
 */
function runStudentNavbarSetUp(string $page)
{
    Session::start();
    $navbar = new Navbar;
    $navbar->setCurrentPage($page);
    navbarSetUpDefaults($navbar);
    if (Session::exists("st_username")) {
        $profile = "Hi " . Student::run()->getFirstname(Session::get("st_username"));
        $navbar->setNavItems([
            "Home",
            "Courses",
            $profile
        ]);
        $navbar->setNavLinks([
            "Home" => "student-home",
            "Courses" => "courses",
            $profile => "#"
        ]);
        $navbar->setDropdownItems([
            $profile => [
                "My classes",
                "My courses",
                "Fee payment",
                "Log out"
            ]
        ]);
        $navbar->setDropdownItemClasses([
            $profile => "left-3"
        ]);
        $navbar->setDropdownItemsId([
            $profile => "profile"
        ]);
        $navbar->setDropDownItemLinks([
            $profile => [
                "My classes" => "student-classroom",
                "My courses" => "student-courses",
                "Fee payment" => "student-payments",
                "Log out" => "#"
            ]
        ]);
        $navbar->setDropdownItemLinkClasses([
            "Log out" => "logout"
        ]);
        $logout = Url::getReference("resources/assets/images/png/shutdown.png");
        $payments = Url::getReference("resources/assets/images/png/dollar.png");
        $courses = Url::getReference("resources/assets/images/png/resume.png");
        $classes = Url::getReference("resources/assets/images/png/workplace.png");
        $navbar->setNavItemIcons([
            "Log out" => $logout,
            "Fee payment" => $payments,
            "My courses" => $courses,
            "Courses" => $courses,
            "My classes" => $classes
        ]);
        $iconClasses = "me-1 mb-1 md-small";
        $navbar->setNavItemIconClasses([
            "Log out" => $iconClasses,
            "Fee payment" => $iconClasses,
            "Courses" => $iconClasses,
            "My courses" => $iconClasses,
            "My classes" => $iconClasses
        ]);
    }
    $navbar->setSeparator(false);

    $navbar->setNavBarUlClasses("ms-auto mt-2 mt-lg-0 mx-5");

    $navbar->runSetup();
}

/**
 * Tutor navbar setup
 * @param string $page
 * @return void
 */
function runTutorNavbarSetUp(string $page)
{
    $navbar = new Navbar;
    $navbar->setCurrentPage($page);
    navbarSetUpDefaults($navbar);
    if (Session::exists("t_username")) {
        $profile = "Hi " . Tutor::run()->getFirstname(Session::get("t_username"));
        $navbar->setNavItems([
            "Home",
            "My courses",
            "My classes",
            $profile
        ]);
        $navbar->setNavLinks([
            "Home" => "tutor-home",
            "My classes" => "#",
            "My courses" => "#",
            $profile => "#"
        ]);
        $navbar->setDropDownItems([
            "My classes" => [
                "View classes",
                "View students",
                "View payments"
            ],
            "My courses" => [
                "View courses",
                "Add course",
            ],
            $profile => [
                "Log out"
            ]
        ]);
        $navbar->setDropDownItemsId([
            $profile => "log-out",
            "My courses" => "courses",
            "My classes" => "classes",
        ]);
        $navbar->setDropDownItemLinks([
            $profile => [
                "Log out" => "#",
            ],
            "My classes" => [
                "View classes" => "tutor-classes",
                "View students" => "tutor-students",
                "View payments" => "tutor-student-payments"
            ],
            "My courses" => [
                "View courses" => "tutor-courses",
                "Add course" => "tutor-course-reception",
            ],
        ]);
        $navbar->setDropdownItemLinkClasses([
            "Log out" => "logout"
        ]);
        $logout = Url::getReference("resources/assets/images/png/shutdown.png");
        $open = Url::getReference("resources/assets/images/png/open-folder.png");
        $add = Url::getReference("resources/assets/images/png/add.png");
        $navbar->setNavItemIcons([
            "Log out" => $logout,
            "View classes" => $open,
            "View students" => $open,
            "View payments" => $open,
            "View courses" => $open,
            "Add course" => $add
        ]);
        $iconClasses = "me-1 mb-1 md-small";
        $navbar->setNavItemIconClasses([
            "Log out" => $iconClasses,
            "View classes" => $iconClasses,
            "View students" => $iconClasses,
            "View payments" => $iconClasses,
            "View courses" => $iconClasses,
            "Add course" => $iconClasses
        ]);
        $navbar->setDropdownItemClasses([
            "Home" => "left-3",
            "My classes" => "left-3",
            "My courses" => "left-1",
            $profile => "left-3"
        ]);
        $navbar->setSeparator(false);
        $navbar->setNavBarUlClasses("ms-auto mt-2 mt-lg-0 mx-5");
        $navbar->runSetup();
    }

}

/**
 * Admin navbar setup
 * @param string $page
 * @return void
 */
function runAdminNavbarSetUp(string $page)
{
    $navbar = new Navbar;
    $navbar->setCurrentPage($page);
    navbarSetUpDefaults($navbar);
    if (Session::exists("ad_username")) {
        $profile = "Hi " . Tutor::run()->getFirstname(Session::get("ad_username"));
        $navbar->setNavItems([
            "Home",
            "Students",
            "Tutors",
            "Administrators",
            "Classes",
            "Courses",
            "Payments",
            $profile
        ]);
        $navbar->setNavLinks([
            "Home" => "admin-home",
            "Students" => "#",
            "Tutors" => "#",
            "Administrators" => "#",
            "Classes" => "#",
            "Courses" => "#",
            "Payments" => "admin-payments",
            $profile => "#"
        ]);
        $navbar->setDropDownItemsId([
            $profile => "log-out",
            "Courses" => "courses",
            "Students" => "students",
            "Classes" => "classes",
            "Tutors" => "tutors",
            "Administrators" => "admin"
        ]);
        $navbar->setDropDownItems([
            "Tutors" => [
                "View tutors"
            ],
            "Students" => [
                "View students",
            ],
            "Administrators" => [
                "View admins",
                "Add admin",
            ],
            "Classes" => [
                "View classes"
            ],
            "Courses" => [
                "View categories",
                "Add category",
                "View courses",
                "Add courses"
            ],
            $profile => [
                "Log out"
            ]
        ]);

        $navbar->setDropDownItemLinks([
            $profile => [
                "Log out" => "#",
            ],
            "Tutors" => [
                "View tutors" => "admin-tutors"
            ],
            "Students" => [
                "View students" => "admin-students",
            ],
            "Administrators" => [
                "View admins" => "admin-administrators",
                "Add admin" => "admin-registration",
            ],
            "Classes" => [
                "View classes" => "admin-classes"
            ],
            "Courses" => [
                "View categories" => "admin-categories",
                "Add category" => "admin-course-category-registration",
                "View courses" => "admin-courses",
                "Add courses" => "admin-course-registration"
            ],
        ]);
        $navbar->setDropdownItemLinkClasses([
            "Log out" => "logout"
        ]);
        $logout = Url::getReference("resources/assets/images/png/shutdown.png");
        $open = Url::getReference("resources/assets/images/png/open-folder.png");
        $add = Url::getReference("resources/assets/images/png/add.png");
        $navbar->setNavItemIcons([
            "Log out" => $logout,
            "View tutors" => $open,
            "View students" => $open,
            "View classes" => $open,
            "View admins" => $open,
            "Add admin" => $add,
            "View categories" => $open,
            "Add category" => $add,
            "View courses" => $open,
            "Add courses" => $add
        ]);
        $iconClasses = "me-1 mb-1 md-small";
        $navbar->setNavItemIconClasses([
            "Log out" => $iconClasses,
            "View tutors" => $iconClasses,
            "View students" => $iconClasses,
            "View admins" => $iconClasses,
            "Add admin" => $iconClasses,
            "View classes" => $iconClasses,
            "View categories" => $iconClasses,
            "Add category" => $iconClasses,
            "View courses" => $iconClasses,
            "Add courses" => $iconClasses
        ]);
        $navbar->setDropdownItemClasses([
            $profile => "left-3",
            "Courses" => "left-3",
            "Students" => "left-3",
            "Classes" => "left-3",
            "Tutors" => "left-3",
            "Administrators" => "left-1"
        ]);
        $navbar->setNavBarUlClasses("ms-auto mt-2 mt-lg-0 mx-5");
        $navbar->setSeparator(false);
        $navbar->runSetup();
    }

}