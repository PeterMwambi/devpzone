<?php
use Models\Core\App\Utilities\Url;
use Views\Includes\Widgets\Classes\Alert;

function runFormAlertSetup()
{
    $alert = new Alert;
    $alert->setDisplay("d-none");
    $alert->setName("staff-registration");
    $alert->setColor("danger");
    $alert->setType("form-alert");
    $alert->setFailIcon(Url::GetReference("resources/assets/images/png/warning.png"));
    $alert->setSuccessIcon(Url::GetReference("resources/assets/images/png/correct.png"));
    $alert->setHeading("Oops! We run into an error");
    $alert->setText("* Your Firstname is required");
    $alert->setFootNote("Please correct the field then try again");
    $alert->runSetup();
}


function runCompleteSetupAlert()
{
    $alert = new Alert;
    $alert->setDisplay("d-none");
    $alert->setId("complete-setup");
    $alert->setType("complete-setup-alert");
    $alert->setSuccessIcon(Url::GetReference("resources/assets/images/png/correct.png"));
    $alert->setHeading("Congratulations");
    $alert->setTextCols("col-md-9");
    $alert->setText("Your account has been created successfully. You are now a member of
                the
                team");
    $alert->setFootNote("You will be redirected to your profile shortly. Enjoy");
    $alert->runSetup();
}

function runServiceBookingAlertSetUp()
{
    $alert = new Alert();
    $alert->setDisplay("d-block");
    $alert->setType("info-alert");
    $alert->setColor("info");
    $alert->setText("Please sign into your account to proceed on with booking");
    $alert->setJustify("center");
    $alert->runSetup();
}

function runDiscountAlertSetUp()
{
    $alert = new Alert();
    $alert->setDisplay("d-block");
    $alert->setType("info-alert");
    $alert->setColor("info");
    $alert->setText("Discount has been set for use successfully");
    $alert->setJustify("center");
    $alert->runSetup();
}