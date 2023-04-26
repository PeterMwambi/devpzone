<?php
defined("PATHNAME") or exit(header("location:../../errors/"));

/**
 * DATABASE CONSTANTS
 * 
 * sets the db username. Default is root
 */
define("DBCONSTANTS", array(
    "host" => "127.0.0.1",
    "username" => "root",
    "password" => "",
    "name" => "everready",
    "options" => [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
));

define("FORMS",  array(
    "register-client" => array(
        "name" => array("username", "firstname", "lastname", "phoneNumber", "email", "password", "mandatory-form-identifier", "submit"),
        "text" => array("username", "firstname", "lastname", "phoneNumber"),
        "password" => array("password"),
        "email" => array("email"),
        "submit" => array("submit")
    ),
    "register-administrator" => array(
        "name" => array("username", "firstname", "lastname", "phoneNumber", "email", "password", "mandatory-form-identifier", "submit"),
        "text" => array("username", "firstname", "lastname", "phoneNumber"),
        "password" => array("password"),
        "email" => array("email"),
        "submit" => array("submit")
    ),
    "login" => array(
        "name" => array("username", "password", "mandatory-form-identifier", "submit"),
        "text" => array("username"),
        "password" => array("password"),
        "submit" => array("submit")
    ),
    "register-driver" => array(
        "name" => array("username", "firstname", "lastname", "phoneNumber", "email", "mandatory-form-identifier", "location", "password", "submit"),
        "text" => array("username", "firstname", "lastname", 'phoneNumber'),
        "email" => array("email"),
        "select" => array("location"),
        "password" => array("password"),
        "submit" => array("submit")
    ),
    "register-vehicle" => array(
        "name" => array("fileToUpload", "make", "model",  "number-plate", "mandatory-form-identifier", "submit"),
        "text" => array("model", "make", "number-plate"),
        "submit" => array("submit"),
        "file" => array("fileToUpload")
    ),
    "register-location" => array(
        "name" => array("location", "mandatory-form-identifier", "submit"),
        "text" => array("location"),
        "submit" => array("submit")
    ),
    "register-route" => array(
        "name" => array("start-location", "destination-location", "pickup-point", "destination-point", "mandatory-form-identifier", "fare", "submit"),
        "text" => array("start-location", "destination-location", "pickup-point", "destination-point", "fare", "location"),
        "submit" => array("submit")
    ),
    "register-area" => array(
        "name" => array("area-name", "location", "mandatory-form-identifier", "submit"),
        "text" => array("area-name"),
        "select" => array("location"),
        "submit" => array("submit")
    )
));


define("ICONS", array(
    "routes" => Directories::getLocation("tools/assets/gps.png"),
    "clients" => Directories::getLocation("tools/assets/team.png"),
    "administrators" => Directories::getLocation("tools/assets/software-engineer.png"),
    "locations" => Directories::getLocation("tools/assets/map.png"),
    "places" => Directories::getLocation("tools/assets/location.png"),
    "drivers" => Directories::getLocation("tools/assets/driver.png"),
    "vehicles" => Directories::getLocation("tools/assets/automobile.png"),
    "contracts" => Directories::getLocation("tools/assets/agreement.png"),
    "payments" => Directories::getLocation("tools/assets/credit-card.png"),
    "passengers" => Directories::getLocation("tools/assets/passenger.png"),
    "add" => Directories::getLocation("tools/assets/add.png"),
    "view" => Directories::getLocation("tools/assets/view.png"),
    "delete" => Directories::getLocation("tools/assets/delete.png"),
    "money" => Directories::getLocation("tools/assets/money.png"),
    "success" => Directories::getLocation("tools/assets/check.png"),
    "uploadIcon" => Directories::getLocation("tools/assets/male-user.png"),
    "verified" => Directories::getLocation("tools/assets/verified.png"),
));





define("LINKS", array(

    "ADMINISTRATOR" => array(
        "name" => array("routes", "clients", "administrators", "locations", "places", "drivers", "vehicles", "contracts", "payments", "passengers"),
        "icons" => array(
            "routes" => Directories::getLocation("tools/assets/gps.png"),
            "clients" => Directories::getLocation("tools/assets/team.png"),
            "administrators" => Directories::getLocation("tools/assets/software-engineer.png"),
            "locations" => Directories::getLocation("tools/assets/map.png"),
            "places" => Directories::getLocation("tools/assets/location.png"),
            "drivers" => Directories::getLocation("tools/assets/driver.png"),
            "vehicles" => Directories::getLocation("tools/assets/automobile.png"),
            "contracts" => Directories::getLocation("tools/assets/agreement.png"),
            "payments" => Directories::getLocation("tools/assets/credit-card.png"),
            "passengers" => Directories::getLocation("tools/assets/passenger.png"),
            "add" => Directories::getLocation("tools/assets/add.png"),
            "view" => Directories::getLocation("tools/assets/view.png"),
            "delete" => Directories::getLocation("tools/assets/delete.png"),
            "star" => Directories::getLocation("tools/assets/star.png"),
            "star2" => Directories::getLocation("tools/assets/star2.png"),
            "balance" => Directories::getLocation("tools/assets/saving.png"),
        ),
        "nameGroup" => array(
            "routes" => array(
                "Add Routes",
                "View Routes",
                "Delete Routes",
            ),
            "clients" => array(
                "Add Client",
                "View Clients",
                "Delete Client",
            ),
            "administrators" => array(
                "Add Administrator",
                "View Administrators",
                "Delete Administrators",
            ),
            "locations" => array(
                "Add Locations",
                "View Locations",
                "Delete Locations",
            ),
            "drivers" => array(
                "Add Driver",
                "View Drivers",
                "Delete Driver"
            ),
            "vehicles" => array(
                "Add Vehicle",
                "View Vehicles",
                "Delete Vehicle",
            ),
            "contracts" => array(
                "View Contracts",
                "Delete Contract",
            ),
            "payments" => array(
                "View Payment History",
                "Delete Payment Entry",
            ),
            "places" => array(
                "Add Place",
                "View Places",
                "Delete Place"
            ),
            "passengers" => array(
                "View Passangers",
                "Delete Passenger"
            )
        ),
        "actionGroups" => array(
            "add" => array("Add Routes", "Add Client", "Add Administrator", "Add Locations", "Add Place", "Add Driver", "Add Vehicle"),
            "view" => array("View Routes", "View Places", "View Clients", "View Administrators", "View Locations", "View Passangers", "View Drivers", "View Vehicles", "View Contracts", "View Payment History"),
            "delete" => array("Delete Routes", "Delete Client", "Delete Administrators", "Delete Locations", "Delete Driver", "Delete Vehicle", "Delete Payment Entry", "Delete Contract", "Delete Place", "Delete Passenger")
        ),

        "href" => array(
            "Add Routes" => Directories::getLocation("accounts/admin/") . "?action=register&query=routes",
            "View Routes" => Directories::getLocation("accounts/admin/") . "?action=view&query=routes",
            "Delete Routes" => Directories::getLocation("accounts/admin/") . "?action=delete&query=routes",
            "Add Client" => Directories::getLocation("accounts/admin/") . "?action=register&query=clients",
            "View Clients" => Directories::getLocation("accounts/admin/") . "?action=view&query=clients",
            "Delete Client" => Directories::getLocation("accounts/admin/") . "?action=delete&query=clients",
            "Add Administrator" => Directories::getLocation("accounts/admin/") . "?action=register&query=administrators",
            "View Administrators" => Directories::getLocation("accounts/admin/") . "?action=view&query=administrators",
            "Delete Administrators" => Directories::getLocation("accounts/admin/") . "?action=delete&query=administrators",
            "Add Locations" => Directories::getLocation("accounts/admin/") . "?action=register&query=locations",
            "View Locations" => Directories::getLocation("accounts/admin/") . "?action=view&query=locations",
            "Delete Locations" => Directories::getLocation("accounts/admin/") . "?action=delete&query=locations",
            "Add Driver" => Directories::getLocation("accounts/admin/") . "?action=register&query=drivers",
            "View Drivers" => Directories::getLocation("accounts/admin/") . "?action=view&query=drivers",
            "Delete Driver" =>  Directories::getLocation("accounts/admin/") . "?action=delete&query=drivers",
            "Add Vehicle" => Directories::getLocation("accounts/admin/") . "?action=register&query=vehicles",
            "View Vehicles" => Directories::getLocation("accounts/admin/") . "?action=view&query=vehicles",
            "Delete Vehicle" => Directories::getLocation("accounts/admin/") . "?action=delete&query=vehicles",
            "View Contracts" => Directories::getLocation("accounts/admin/") . "?action=view&query=contracts",
            "Delete Contract" => Directories::getLocation("accounts/admin/") . "?action=delete&query=contracts",
            "View Payment History" => Directories::getLocation("accounts/admin/") . "?action=view&query=payments",
            "Delete Payment Entry" => Directories::getLocation("accounts/admin/") . "?action=delete&query=payments",
            "Add Place" => Directories::getLocation("accounts/admin/") . "?action=register&query=areas",
            "View Places" => Directories::getLocation("accounts/admin/") . "?action=view&query=areas",
            "Delete Place" => Directories::getLocation("accounts/admin/") . "?action=delete&query=areas",
            "View Passangers" => Directories::getLocation("accounts/admin/") . "?action=view&query=passengers",
            "Delete Passenger" => Directories::getLocation("accounts/admin/") . "?action=delete&query=passengers"
        )
    ),
    "DRIVER" => array(
        "name" => array("profile", "balance", "vehicles", "contracts",  "payments"),
        "icons" => array(
            "profile" => Directories::getLocation("tools/assets/user.png"),
            "contracts" => Directories::getLocation("tools/assets/agreement.png"),
            "vehicles" => Directories::getLocation("tools/assets/automobile.png"),
            "payments" => Directories::getLocation("tools/assets/money.png"),
            "balance" => Directories::getLocation("tools/assets/money-bag.png"),
        ),
        "nameGroup" => array(
            "profile" => array(
                "View Profile"
            ),
            "contracts" => array(
                "View Contracts",
            ),
            "vehicles" => array(
                "My Vehicle",
            ),
            "payments" => array(
                "View Payments",
            ),
            "balance" => array(
                "My Wallet",
            ),
        ),
        "href" => array(
            "View Profile" => Directories::getLocation("accounts/driver/") . "?action=profile",
            "View Contracts" => Directories::getLocation("accounts/driver/") . "?action=contracts",
            "My Vehicle" => Directories::getLocation("accounts/driver/") . "?action=vehicle",
            "View Payments" => Directories::getLocation("accounts/driver/") . "?action=payments",
            "My Wallet" => Directories::getLocation("accounts/driver/") . "?action=balance",
        )
    )

));
