<?php
use Models\Core\App\Utilities\Url;
use Views\Includes\Widgets\Classes\Navbar;


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
    $navbar->setNavBarPositioning("sticky-top");
    $navbar->setNavBrandClasses("ms-2 mt-2");
    $navbar->setNavBrandLink("home");
    $navbar->setNavBrandImageUrl(Url::getReference("resources/assets/icons/devpzonelogo2.0.png"));
    $navbar->setNavBrandImageClasses("devpzone__logo");
    $navbar->setNavItemClasses("mx-3");
}
/**
 * Default navbar setup
 * @param string $page
 * @return void
 */
function defaultNavbarSetup(Navbar $navbar, string $page)
{
    $navbar->setCurrentPage($page);
    $navbar->setNavItems([
        "Home",
        "About us",
        "Our services",
        "Pricing",
        "Sign in",
        "Create an account"
    ]);
    $navbar->setNavLinks([
        "Home" => "home",
        "About us" => "",
        "Our services" => "services",
        "Pricing" => "#",
        "Sign in" => "#",
        "Create an account" => "#",
        "Give us a call" => "tel:+254114958431"
    ]);
    $navbar->setDropDownItems([
        "Sign in" => [
            "Sign in as client",
            "Sign in as admin"
        ],
    ]);
    $navbar->setDropDownItemsId([
        "Sign in" => "sign-in",
        "Create an account" => "register",
    ]);
    $navbar->setDropDownItemLinks([
        "Sign in" => [
            "Sign in as client" => "client-login",
            "Sign in as admin" => "admin-login"
        ],
    ]);

    $navbar->setDropdownItemClasses([
        "Sign in" => "left-3 me-5",
    ]);
    $navbar->setSeparator(true);
    $navbar->setSeparatorClasses("me-3 d-none d-md-block");
    $navbar->setNavbarButtons([
        "Give us a call"
    ]);
    $navbar->setButtonColor([
        "Give us a call" => "dark text-light"
    ]);
    $navbar->setButtonClasses("me-3");
    $navbar->setButtonLinks([
        "Give us a call" => "tel:+254114958431"
    ]);

    $navbar->setNavItemIcons([
        "Give us a call" => Url::getReference("resources/assets/images/png/call.png"),
    ]);
    $navbar->setNavItemIconClasses([
        "Give us a call" => "me-2 small",
    ]);
    $navbar->setButtonContainerClasses("me-3");

    $navbar->setNavBarUlClasses("ms-auto mt-2 mt-lg-0");

    $navbar->runSetup();
}

function runTransparentNavbarSetup(string $page)
{
    $navbar = new Navbar;
    navbarSetUpDefaults($navbar);
    $navbar->setNavBarVariation("light");
    $navbar->setNavBarColor("transparent");
    $navbar->setNavBarPositioning("top");
    $navbar->setNavBarClasses("p-3 p-md-0");
    $navbar->setType("navbar-default");
    defaultNavbarSetup($navbar, $page);
}

function runDefaultNavbarSetup(string $page)
{
    $navbar = new Navbar;
    navbarSetUpDefaults($navbar);
    $navbar->setNavBarColor("light");
    $navbar->setType("navbar-default");
    defaultNavbarSetup($navbar, $page);
}