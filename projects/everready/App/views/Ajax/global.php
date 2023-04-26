<?php

define("PATHNAME", true);
require_once("../../Config/Core.php");


$allowedIdentifiers = array(
    "DRIVER_REGISTRATION_FORM" => "driver-registration-form",
    "CLIENT_REGISTRATION_FORM" => "client-registration-form",
    "VEHICLE_REGISTRATION_FORM" => "vehicle-registration-form",
    "ADMINISTRATORS_REGISTRATION_FORM" => "administrators-registration-form",
    "DRIVER_LOGIN_FORM" => "driver-login-form",
    "CLIENT_LOGIN_FORM" => "client-login-form",
    "ADMNISTRATORS_LOGIN_FORM" => "administrators-login-form",
    "LOCATION_REGISTRATION_FORM" => "location-registration-form",
    "ROUTE_REGISTRATION_FORM" => "route-registration-form",
    "AREA_REGISTRATION_FORM" => "area-registration-form",
    "LOCATION_FORM" => "location-form"
);

$allowedActions = array(
    "rejectRequest",
    "acceptRequest"
);
$identifier = Functions::decrypt(Input::grab("mandatory-form-identifier"));
$form = $allowedIdentifiers[$identifier];

$action = Sanitize::__string(Input::grab("action"));
$error = null;
$message = array(
    "message" => null,
    "flag" => 0
);

if ($form === 'client-login-form') {
    $username = Sanitize::__string(Input::grab("username"));
    $password = Sanitize::__string(Input::grab("password"));
    $postArray = array("username" => $username, "password" => $password);
    $authenticator = new Authenticator($postArray, "client-login-form");
    if (!$authenticator->clientLogin()) {
        $error = $authenticator->getMsg();
        $message = array(
            "message" => $error,
            "flag" => 0
        );
    } else {
        if (is_null($error)) {
            $message = array(
                "message" => "Redirecting you shortly...",
                "flag" => 1,
                "action" => "redirect",
                "destination" => "../../accounts/client/"
            );
        }
    }
}


if ($form === 'client-registration-form') {
    $username = Sanitize::__string(Input::grab("username"));
    $firstname = Sanitize::__string(Input::grab("firstname"));
    $lastname = Sanitize::__string(Input::grab("lastname"));
    $email = Sanitize::__string(Input::grab("email"));
    $phoneNumber = Sanitize::__string(Input::grab("phoneNumber"));
    $password = Sanitize::__string(Input::grab("password"));
    $postArray = array(
        "username" => $username,
        "firstname" => $firstname,
        "lastname" => $lastname,
        "email" => $email,
        "phone-number" => $phoneNumber,
        "password" => $password,
    );

    $authenticator = new Authenticator($postArray, "client-register-form");

    if (!$authenticator->clientSignUp()) {
        $error = $authenticator->getMsg();
        $message = array(
            "message" => $error,
            "flag" => 0
        );
    } else {
        if (is_null($error)) {
            $message = array(
                "message" => "Account has been created successfully",
                "flag" => 1,
                "action" => "redirect",
                "destination" => "../../accounts/client/"
            );
        }
    }
}




if ($form === 'driver-login-form') {
    $username = Sanitize::__string(Input::grab("username"));
    $password = Sanitize::__string(Input::grab("password"));
    $postArray = array("username" => $username, "password" => $password);
    $authenticator = new Authenticator($postArray, "driver-login-form");
    if (!$authenticator->driverLogin()) {
        $error = $authenticator->getMsg();
        $message = array(
            "message" => $error,
            "flag" => 0
        );
    } else {
        if (is_null($error)) {
            $message = array(
                "message" => "Redirecting you shortly...",
                "flag" => 1,
                "action" => "redirect",
                "destination" => "../../accounts/driver/?action=home"
            );
        }
    }
}

if ($form === 'driver-registration-form') {
    $username = Sanitize::__string(Input::grab("username"));
    $firstname = Sanitize::__string(Input::grab("firstname"));
    $lastname = Sanitize::__string(Input::grab("lastname"));
    $email = Sanitize::__string(Input::grab("email"));
    $location = Sanitize::__string(Input::grab("location"));
    $phoneNumber = Sanitize::__string(Input::grab("phoneNumber"));
    $password = Sanitize::__string(Input::grab("password"));
    $postArray = array(
        "username" => $username,
        "firstname" => $firstname,
        "lastname" => $lastname,
        "email" => $email,
        "location" => $location,
        "phone-number" => $phoneNumber,
        "password" => $password,
    );

    $authenticator = new Authenticator($postArray, "driver-register-form");

    if (!$authenticator->driverSignUp()) {
        $error = $authenticator->getMsg();
        $message = array(
            "message" => $error,
            "flag" => 0
        );
    } else {
        if (is_null($error)) {
            $message = array(
                "message" => "Account has been created successfully",
                "flag" => 1,
                "action" => "redirect",
                "destination" => "../../accounts/driver/?action=home"
            );
        }
    }
}

if ($form === 'vehicle-registration-form') {
    $vehiclePicture = Sanitize::__string(Input::grab("fileToUpload"));
    $model = Sanitize::__string(Input::grab("model"));
    $make = Sanitize::__string(Input::grab("make"));
    $numberPlate = Sanitize::__string(Input::grab("number-plate"));
    $postArray = array(
        "model" => $model,
        "make" => $make,
        "number-plate" => $numberPlate
    );

    $authenticator = new Authenticator($postArray, "vehicle-register-form");

    $dbHandler = new DatabaseHandler;
    $dbHandler->runSQL("SELECT driver_id FROM vehicles WHERE driver_id = ? LIMIT 1", array(Session::getValue("driverId")), 1);
    $count = $dbHandler->getCount();

    if ($count > 0) {
        $error = "You have already registered your vehicle";
        $message = array(
            "message" => $error,
            "flag" => 0
        );
    } else {
        if (empty($vehiclePicture)) {
            $error = "Please upload a picture of your vehicle to proceed";
            $message = array(
                "message" => $error,
                "flag" => 0
            );
        } else {
            if (!$authenticator->registerVehicle()) {
                $error = $authenticator->getMsg();
                $message = array(
                    "message" => $error,
                    "flag" => 0
                );
            } else {
                if (is_null($error)) {
                    $message = array(
                        "message" => "Vehicle has been registered successfully...",
                        "flag" => 1,
                        "action" => "stayOnPage",
                    );
                }
            }
        }
    }
}




if ($form === 'administrators-login-form') {
    $username = Sanitize::__string(Input::grab("username"));
    $password = Sanitize::__string(Input::grab("password"));
    $postArray = array("username" => $username, "password" => $password);
    $authenticator = new Authenticator($postArray, "administrators-login-form");
    if (!$authenticator->adminLogin()) {
        $error = $authenticator->getMsg();
        $message = array(
            "message" => $error,
            "flag" => 0
        );
    } else {
        if (is_null($error)) {
            $message = array(
                "message" => "Redirecting you shortly...",
                "flag" => 1,
                "action" => "redirect",
                "destination" => "../../accounts/admin/"
            );
        }
    }
}


if ($form === 'administrators-registration-form') {
    $username = Sanitize::__string(Input::grab("username"));
    $firstname = Sanitize::__string(Input::grab("firstname"));
    $lastname = Sanitize::__string(Input::grab("lastname"));
    $email = Sanitize::__string(Input::grab("email"));
    $phoneNumber = Sanitize::__string(Input::grab("phoneNumber"));
    $password = Sanitize::__string(Input::grab("password"));
    $postArray = array(
        "username" => $username,
        "firstname" => $firstname,
        "lastname" => $lastname,
        "email" => $email,
        "phone-number" => $phoneNumber,
        "password" => $password,
    );

    $authenticator = new Authenticator($postArray, "administrators-register-form");

    if (!$authenticator->adminSignUp()) {
        $error = $authenticator->getMsg();
        $message = array(
            "message" => $error,
            "flag" => 0
        );
    } else {
        if (is_null($error)) {
            $message = array(
                "message" => "Account has been created successfully",
                "flag" => 1,
                "action" => "redirect",
                "destination" => "../../accounts/admin/?action=home"
            );
        }
    }
}

if ($form === 'location-registration-form') {
    $location = Sanitize::__string(Input::grab("location"));
    $postArray = array(
        "name" => $location,
    );
    $authenticator = new Authenticator($postArray, "location-register-form");
    if (!$authenticator->registerLocation()) {
        $error = $authenticator->getMsg();
        $message = array(
            "message" => $error,
            "flag" => 0
        );
    } else {
        if (is_null($error)) {
            $message = array(
                "message" => "Location has been registered successfully",
                "flag" => 1,
                "action" => "redirect",
                "destination" => "../../accounts/admin/?action=view&query=locations"
            );
        }
    }
}



if ($form === 'route-registration-form') {
    $startingLocation = Sanitize::__string(Input::grab("start-location"));
    $destinationLocation = Sanitize::__string(Input::grab("destination-location"));
    $startingPoint = Sanitize::__string(Input::grab("pickup-point"));
    $destinationPoint = Sanitize::__string(Input::grab("destination-point"));
    $fare = Sanitize::__string(Input::grab("fare"));
    $postArray = array(
        "start-location" => $startingLocation,
        "destination-location" => $destinationLocation,
        "pickup-point" => $startingPoint,
        "destination-point" => $destinationPoint,
        "fare" => $fare
    );
    $authenticator = new Authenticator($postArray, "route-register-form");
    if (!$authenticator->registerRoute()) {
        $error = $authenticator->getMsg();
        $message = array(
            "message" => $error,
            "flag" => 0
        );
    } else {
        if (is_null($error)) {
            $message = array(
                "message" => "Route has been added successfully",
                "flag" => 1,
                "action" => "redirect",
                "destination" => "../../accounts/admin/?action=view&query=locations"
            );
        }
    }
}


if ($form === 'area-registration-form') {
    $areaName = Sanitize::__string(Input::grab("area-name"));
    $location = Sanitize::__string(Input::grab("location"));
    $postArray = array(
        "name" => $areaName,
        "location" => $location,
    );
    $authenticator = new Authenticator($postArray, "area-register-form");
    if (!$authenticator->registerArea()) {
        $error = $authenticator->getMsg();
        $message = array(
            "message" => $error,
            "flag" => 0
        );
    } else {
        if (is_null($error)) {
            $message = array(
                "message" => "Area has been registered successfully",
                "flag" => 1,
                "action" => "redirect",
                "destination" => "../../accounts/admin/?action=view&query=areas"
            );
        }
    }
}


if ($form === "location-form") {
    $count = 0;
    $pickupPoint = Sanitize::__string(Input::grab("pickup-point"));
    $destination = Sanitize::__string(Input::grab("destination"));
    $dbHandler = new DatabaseHandler;
    $dbHandler->runSQL("SELECT passengers.client_id FROM passengers 
    INNER JOIN clients ON 
    clients.client_id = passengers.client_id
    WHERE clients.cl_username = ? LIMIT 1", array(Session::getValue("clientUsername")), 1);
    $count = $dbHandler->getCount();
    if ($count !==  0) {
        $error = "You have a pending cab request <a class='btn-sm btn-info' href='?request=viewReceipt'>Click Here</a> to view your request";
        $message = array(
            "message" => $error,
            "flag" => 0
        );
    } else {
        if ($pickupPoint === $destination) {
            $error = "Location and destination cannot be at the same place please try again";
            $message = array(
                "message" => $error,
                "flag" => 0
            );
        } else {
            $postArray =  array("pickup" => $pickupPoint, "destination" => $destination);
            $authenticator = new Authenticator($postArray, "location-form");
            $error = $authenticator->getMsg();
            if (!$authenticator->calculateFare()) {
                $message = array(
                    "message" => $error,
                    "flag" => 0
                );
            } else {
                if (empty($error)) {
                    $message = array(
                        "message" => "Please wait...",
                        "flag" => 1,
                        "action" => "redirect",
                        "destination" => ""
                    );
                }
            }
        }
    }
}



if ($action === "rejectRequest") {
    $services = new Services;
    if ($services->destroyRequest()) {
        $message = array(
            "message" => "Request arboted successfully...",
            "flag" => 1,
            "action" => "redirect",
            "destination" => ""
        );
    }
}

if ($action === "acceptRequest") {
    $driverId = Sanitize::__string(Input::grab("driverId"));
    $services = new Services;
    if ($services->orderCab($driverId)) {
        $message = array(
            "message" => "Request processed successfully. Please Wait...",
            "flag" => 1,
            "action" => "redirect",
            "destination" => ""
        );
    }
}

if ($action === "cancelRequest") {
    $services = new Services;
    if ($services->cancelRequest()) {
        $message = array(
            "message" => "Request cancelled successfully...",
            "flag" => 1,
            "action" => "redirect",
            "destination" => ""
        );
    }
}

if ($action === "acceptContract") {
    $dbHandler = new DatabaseHandler;
    $dbHandler->runSQL("SELECT status FROM drivers WHERE driver_id = ? LIMIT 1", array(Session::getValue("driverId")), 1);
    $contractId = Sanitize::__string(Input::grab("contractId"));
    $services = new Services;
    if ($services->takeContract($contractId)) {
        $message = array(
            "message" => "Contract has been approved...",
            "flag" => 1,
            "action" => "redirect",
            "destination" => ""
        );
    }
}

if ($action === "completePayment") {
    $paymentMethod = Sanitize::__string(Input::grab("paymentMethod"));
    if (!empty($paymentMethod)) {
        $services = new Services;
        if ($services->getPayment($paymentMethod)) {
            $message = array(
                "message" => "Your Payment has been approved.<br> Your payment code is <strong>" . Session::getValue("paymentId") . "</strong> 
                <br> Generating your receipt please wait..",
                "flag" => 1,
                "action" => "redirect",
                "destination" => "../../accounts/client/?request=viewReceipt"
            );
        } else {
            $message = array(
                "message" => "Payment status has not been approved",
                "flag" => 0
            );
        }
    } else {
        $message = array(
            "message" => "Please select a payment method",
            "flag" => 0
        );
    }
}

echo json_encode($message);
