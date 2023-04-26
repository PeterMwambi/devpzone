<?php

/**
 * 
 * Gets all Ajax queries and executes them
 */

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("BAD REQUEST");
}

define("PATHNAME", TRUE);
require_once("../config/core.php");

$error = null;

$allowedFormIdentifiers = [
    "ADD_CART_AUTHENTICATOR" => "add-to-cart",
    "DELETE_CART_ITEM" => "delete-cart-item",
    "UPDATE_CART_QUANTITY" => "update-cart-quantity",
    "EMPTY_CART" => "destroy-cart",
    "CLIENT_REGISTRATION_FORM" => "client-registration-form",
    "CLIENT_LOGIN_FORM" => "client-login-form",
    "CHECKOUT_CART_AUTHENTICATION" => "checkout-authentication",
    "CHECKOUT_CART" => "checkout-form",
    "CANCEL_ORDER_REQUEST" => "cancel-order"
];


if (Input::grab("mandatory-security-field")) {
    $form = Functions::decrypt(Input::grab("mandatory-security-field"));
} else {
    $form = Functions::decrypt(Input::grab("action"));
}

if (Input::grab("mandatory-security-identifier")) {
    $identifier = Functions::decrypt(Input::grab("mandatory-security-identifier"));
} else {
    $identifier = Functions::decrypt(Input::grab("identifier"));
}

$quantity = Sanitize::__string(Input::grab("quantity"));
$message = array(
    "message" => null,
    "flag" => 0
);

if (!empty($form)) {
    $formIdentity = $allowedFormIdentifiers[$form];
}
///////////////////////////////////////////////////////////////////
// CART FORM
///////////////////////////////////////////////////////////////////
if (!empty($formIdentity) && $formIdentity === "add-to-cart") {
    if (empty($identifier)) {
        $error = "Invalid Identifier please refresh the page and try again";
        $message = array(
            "message" => $error,
            "flag" => 0,
        );
    } else {

        $cart = new Cart;

        if (!$cart->verifyProductId($identifier)) {
            $error = "Something seems to be wrong here. Please notify the administrator for further assistance";
            $message = array(
                "message" => $error,
                "flag" => 0,
            );
        } else {
            if ($cart->insert()) {
                $message = array(
                    "message" => "Item has been added to the cart",
                    "flag" => 1,
                    "action" => "redirect",
                    "destination" => "?request=cart"
                );
            }
        }
    }
}


if (!empty($formIdentity) && $formIdentity === "update-cart-quantity") {
    if (empty($identifier)) {
        $error = "Invalid Identifier please refresh the page and try again";
        $message = array(
            "message" => $error,
            "flag" => 0,
        );
    } else {

        $cart = new Cart;

        if (!$cart->update($identifier, (int)$quantity)) {
            $error = "Something seems to be wrong. Refresh the page and try again.";
            $message = array(
                "message" => $error,
                "flag" => 0,
            );
        } else {
            if (is_null($error)) {
                $message = array(
                    "message" => "Item has been updated",
                    "flag" => 1,
                    "action" => "redirect",
                    "destination" => "?request=cart"
                );
            }
        }
    }
}


if (!empty($formIdentity) && $formIdentity === "delete-cart-item") {
    if (empty($identifier)) {
        $error = "Invalid Identifier please refresh the page and try again";
        $message = array(
            "message" => $error,
            "flag" => 0,
        );
    } else {

        $cart = new Cart;

        if (!$cart->delete($identifier)) {
            $error = "Something seems to be wrong. Refresh the page and try again.";
            $message = array(
                "message" => $error,
                "flag" => 0,
            );
        } else {
            if (is_null($error)) {
                $message = array(
                    "message" => "Item has been deleted",
                    "flag" => 1,
                    "action" => "redirect",
                    "destination" => "?request=cart"
                );
            }
        }
    }
}


if (!empty($formIdentity) && $formIdentity === "destroy-cart") {

    $cart = new Cart;

    if (!$cart->destroy()) {
        $error = "Something seems to be wrong. Refresh the page and try again.";
        $message = array(
            "message" => $error,
            "flag" => 0,
        );
    } else {
        if (is_null($error)) {
            Session::generate("activeCheckout", false);
            $message = array(
                "message" => "Cart has been emptied successfully",
                "flag" => 1,
                "action" => "redirect",
                "destination" => "?request=cart"
            );
        }
    }
}



if (!empty($formIdentity) && $formIdentity === "client-registration-form") {
    $username = Sanitize::__string(Input::grab("username"));
    $firstname = Sanitize::__string(Input::grab("firstname"));
    $lastname = Sanitize::__string(Input::grab("lastname"));
    $email = Sanitize::__string(Input::grab("email"));
    $phoneNumber = Sanitize::__string(Input::grab("phoneNumber"));
    $password = Sanitize::__string(Input::grab("password"));
    $confirmPassword = Sanitize::__string(Input::grab("confirmPassword"));

    $postArray = array(
        "firstname" => $firstname,
        "lastname" => $lastname,
        "phone-number" => $phoneNumber,
        "user-email" => $email,
        "username" => $username,
        "password" => $password,
        "confirm-password" => $confirmPassword
    );

    $authenticator = new Authenticator($postArray, "client", "register");

    if (!$authenticator->processClient("register", null)) {
        $error = $authenticator->getMsg();
        $message = array(
            "message" => $error,
            "flag" => 0
        );
    } else {
        if (is_null($error)) {
            $message = array(
                "message" => "Client Registration successfull. <br>Redirecting you to your account.",
                "flag" => 1,
                "action" => "redirect",
                "destination" => "account/?request=home"
            );
        }
    }
}


if (!empty($formIdentity) && $formIdentity === "client-login-form") {
    $username = Sanitize::__string(Input::grab("username"));
    $password = Sanitize::__string(Input::grab("password"));

    $postArray = array(
        "username" => $username,
        "password" => $password,
    );
    $authenticator = new Authenticator($postArray, "client", "login");

    if (!$authenticator->processClient("login", null)) {
        $error = $authenticator->getMsg();
        $message = array(
            "message" => $error,
            "flag" => 0
        );
    } else {
        if (is_null($error)) {
            Session::generate("client-username", $username);
            $message = array(
                "message" => "Login attempt successfull. <br>Redirecting you to your account.",
                "flag" => 1,
                "action" => "redirect",
                "destination" => "account/?request=home"
            );
        }
    }
}


if (!empty($formIdentity) && $formIdentity === "checkout-authentication") {
    if (!Functions::decrypt(Session::getValue("CLIENT_PASSKEY_AUTHENTICATOR"))) {
        $message = array(
            "message" => "Please login to your account to continue. Redirecting you shortly",
            "flag" => 1,
            "action" => "redirect",
            "destination" => "?request=login"
        );
    } else {
        Session::generate("activeCheckout", true);
        $message = array(
            "message" => "Redirecting you to checkout form",
            "flag" => 1,
            "action" => "redirect",
            "destination" => "account/?request=orders"
        );
    }
}



if (!empty($formIdentity) && $formIdentity === "checkout-form") {

    if (Session::exists("cart") && count(Session::getValue("cart"))) {
        $firstname = Sanitize::__string(Input::grab("firstname"));
        $lastname = Sanitize::__string(Input::grab("lastname"));
        $phoneNumber = Sanitize::__string(Input::grab("phoneNumber"));
        $email = Sanitize::__string(Input::grab("email"));
        $residence = Sanitize::__string(Input::grab("residence"));
        $pickupStation = Sanitize::__string(Input::grab("pickup-station"));
        $nationalId = Sanitize::__string(Input::grab("national-id"));

        $postArray = array(
            "firstname" => $firstname,
            "lastname" => $lastname,
            "phone-number" => $phoneNumber,
            "customer-email" => $email,
            "residence" => $residence,
            "pickup-station" => $pickupStation,
            "national-id" => $nationalId,
        );

        $authenticator = new Authenticator($postArray, "checkout");


        if (!$authenticator->processCheckout()) {
            $error = $authenticator->getMsg();
            $message = array(
                "message" => $error,
                "flag" => 0
            );
        } else {
            if (is_null($error)) {
                Session::generate("activeCheckout", false);
                $message = array(
                    "message" => "Your order has been placed successfully.",
                    "flag" => 1,
                    "action" => "redirect",
                    "destination" => "account/?request=orders"
                );
            }
        }
    } else {
        $message = array(
            "message" => "You cannot checkout an empty cart. Please fill your cart to continue",
            "flag" => 0
        );
    }
}



if (!empty($formIdentity) && $formIdentity === "cancel-order") {
    if (!empty($identifier)) {
        $databaseHandler = new DatabaseHandler;
        $databaseHandler->runSQL("SELECT order_id FROM orders WHERE order_id = ? LIMIT 1", array($identifier), 1);
        $count = $databaseHandler->getCount();
        if ($count) {
            if ($databaseHandler->runSQL("DELETE orders, order_details, customers FROM orders 
            INNER JOIN order_details ON order_details.order_id = orders.order_id 
            INNER JOIN customers ON customers.customer_id = orders.customer_id
            WHERE orders.order_id = ?", array($identifier), null)) {
                $message = array(
                    "message" => "Order has been cancelled successfully",
                    "flag" => 1,
                    "action" => "redirect",
                    "destination" => "account/?request=orders"
                );
            } else {
                $message = array(
                    "message" => "Something seems to be a problem refresh the page and try again",
                    "flag" => 0,
                );
            }
        } else {
            $message = array(
                "message" => "Something unexpected happened. Please refresh the page and try again",
                "flag" => 0,
            );
        }
    }
}

echo json_encode($message);
