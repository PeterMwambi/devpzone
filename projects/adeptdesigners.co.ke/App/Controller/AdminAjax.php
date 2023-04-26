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

$allowedFormIdentifiers = array(
    "ADMIN_COMMENT_FORM" => "comment-form",
    "ADMIN_SIGNIN_FORM" => "admin-login-form",
    "ADMIN_SIGNUP_FORM" => "add-administrator-form",
    "ADMIN_UPLOAD_FORM" => "upload-form",
    "PRODUCT_FORM" => "product-form",
    "PRODUCT_SUB_CATEGORY_FORM" => "sub-category-form",
    "PRODUCT_CATEGORY_FORM" => "category-form",
    "ADMIN_LOGIN_FORM" => "admin-login-form",
    "ADMINISTRATORS_FORM" => "administrators-form",
    "SUPPLIERS_FORM" => "suppliers-form",
    "EMPLOYEES_FORM" => "employees-form",
    "PURCHASES_FORM" => "purchases-form",
    "ORDERS_FORM" => "orders-form"
);
$form = Functions::decrypt(Input::grab("mandatory-security-field"));
$card = Functions::decrypt(Input::grab("mandatory-security-card"));
$action = Functions::decrypt(Input::grab("mandatory-security-action"));
$identifier = Functions::decrypt(Input::grab("mandatory-security-identifier"));
$formRefrence = Functions::decrypt(Input::grab("mandatory-security-reference"));
$sessionIdentifier = Session::exists("IDENTIFIER") ? Session::getValue("IDENTIFIER") : null;
$request = Sanitize::__string(Input::grab("action"));
$table = Sanitize::__string(Input::grab("table"));
$field = Sanitize::__string(Input::grab("field"));
$rowIdentifier = Sanitize::__string(Input::grab("id"));
$message = array(
    "message" => null,
    "flag" => 0
);
if (!empty($form)) {
    $formIdentity = $allowedFormIdentifiers[$form];
}
if (!empty($sessionIdentifier))
    $uploadIdentifier = $sessionIdentifier;
else {
    if (!empty($identifier)) {
        $uploadIdentifier = $identifier;
    } else {
        $uploadIdentifier = null;
    }
}

///////////////////////////////////////////////////////////////////////////
//UPLOAD FORM
//////////////////////////////////////////////////////////////////////////
switch ($formRefrence) {
    case 'sub-category':
        $fileSaveLocation  = "uploads/sub-category/";
        $queryFields = array("sub_category_id" => $uploadIdentifier);
        $formName = "sub-category";
        $table = "sub_category";
        $field = "sub_category_icon";
        $table_id =  "sub_category_id";
        break;
    case 'category':
        $fileSaveLocation  = "uploads/category/";
        $queryFields = array("category_id" => $uploadIdentifier);
        $formName = "category";
        $table = "category";
        $field = "category_icon";
        $table_id =  "category_id";
        break;
    case 'products':
        $fileSaveLocation  = "uploads/products/";
        $queryFields = array("product_id" => $uploadIdentifier);
        $formName = "product";
        $table = "product_details";
        $field = "product_image";
        $table_id =  "product_id";
        break;
    case 'suppliers':
        $fileSaveLocation  = "uploads/suppliers/";
        $queryFields = array("supplier_id" => $uploadIdentifier);
        $formName = "suppliers";
        $table = "suppliers";
        $field = "profile_image";
        $table_id =  "supplier_id";
        break;
    case 'employees':
        $fileSaveLocation  = "uploads/employees/";
        $queryFields = array("employee_id" => $uploadIdentifier);
        $formName = "employees";
        $table = "employee_account";
        $field = "profile_image";
        $table_id =  "employee_id";
        break;
    case 'administrators':
        $fileSaveLocation  = "uploads/administrators/";
        $queryFields = array("admin_id" => $uploadIdentifier);
        $formName = "administrators";
        $table = "administrators";
        $field = "profile_image";
        $table_id =  "admin_id";
        break;
}
if (!empty($formIdentity) && $formIdentity === "upload-form") {
    if (empty($uploadIdentifier)) {
        $error = "You have an error somewhere. Start of first by filling other steps";
        $message = array(
            "message" => $error,
            "flag" => 0
        );
    } else {
        $error = null;
        $file = new File();
        $file->write("upload-image", Directories::getLocation($fileSaveLocation));
        if (!$file->addToDB($table, $field, $queryFields)) {
            $error = $file->getMsg();
            $message = array(
                "message" => $error,
                "flag" => 0
            );
        } else {
            if (is_null($error)) {
                if ($file->upload()) {
                    if (Session::exists("IDENTIFIER")) {
                        Session::destroy("IDENTIFIER");
                    }
                    $message = array(
                        "message" => ucfirst($formName) . " image uploaded successfully",
                        "flag" => 1,
                        "action" => "redirect",
                        "destination" => ""
                    );
                } else {
                    $message = array(
                        "message" => "There was a problem uploading your  {$formName}  image please try again later",
                        "flag" => 0
                    );
                }
            }
            if (Session::exists("IDENTIFIER")) {
                Session::destroy("IDENTIFIER");
            }
        }
    }
}



////////////////////////////////////////////////////////////////////////////////
//CATEGORY
///////////////////////////////////////////////////////////////////////////////
if (!empty($formIdentity) && $formIdentity === "category-form") {
    $categoryName = Sanitize::__string(Input::grab("category-name"));
    $gender = Sanitize::__string(Input::grab("gender"));
    $description = Sanitize::__string(Input::grab("description"));
    $error = null;
    $postArray = array(
        "category-name" => $categoryName,
        "gender" => $gender,
        "category-description" => $description
    );
    switch ($action) {
        case "add":
            $authenticator = new Authenticator($postArray, "category", "add");
            if (!$authenticator->processCategory($action, null)) {
                $error = $authenticator->getMsg();
                $message = array(
                    "message" => $error,
                    "flag" => 0
                );
            } else {
                if (is_null($error)) {
                    $message = array(
                        "message" => "Category has successfully been added to the database",
                        "flag" => 1,
                        "action" => "redirect",
                        "destination" => ""
                    );
                }
            }
            break;
        case "update":
            if (empty($identifier)) {
                $error = "Missing Identifier";
                $message = array(
                    "message" => $error,
                    "flag" => 0,
                );
            } else {
                $authenticator = new Authenticator($postArray, "category", "update", $identifier);
                if (!$authenticator->processCategory($action, $identifier)) {
                    $error = $authenticator->getMsg();
                    $message = array(
                        "message" => $error,
                        "flag" => 0
                    );
                } else {
                    if (is_null($error)) {
                        $message = array(
                            "message" => "Information has successfully been updated",
                            "flag" => 1,
                        );
                    }
                    break;
                }
            }
    }
}
///////////////////////////////////////////////////////////////////////////////////////
//ADD SUB CATEGORY
///////////////////////////////////////////////////////////////////////////////////////
if (!empty($formIdentity) && $formIdentity === "sub-category-form") {
    $subCategoryName = Sanitize::__string(Input::grab("sub-category-name"));
    $description = Sanitize::__string(Input::grab("description"));
    $categoryName = Sanitize::__string(Input::grab("category-name"));
    $result = null;
    $error = null;

    $databaseHandler = new DatabaseHandler;

    $databaseHandler->runSQL("SELECT category_name FROM category WHERE category_name = ? LIMIT 1", array($categoryName), 1);

    $result = $databaseHandler->getOutput();

    if (empty($result)) {
        $error = "Invalid category name";
        $message = array(
            "message" => $error,
            "flag" => 0
        );
    }

    $postArray = array(
        "sub-category-name" => $subCategoryName,
        "sub-category-description" => $description,
        "category-name" => $categoryName
    );


    switch ($action) {
        case 'add':
            $authenticator = new Authenticator($postArray, "sub-category", "add");
            if (!$authenticator->processSubCategory("add", null)) {
                $error = $authenticator->getMsg();
                $message = array(
                    "message" => $error,
                    "flag" => 0
                );
            } else {
                if (is_null($error)) {
                    $message = array(
                        "message" => "Sub-Category has successfully been added to the database",
                        "flag" => 1,
                        "action" => "redirect",
                        "destination" => ""
                    );
                }
            }
            break;
        case 'update':
            if (empty($identifier)) {
                $error = "Missing Identifier";
                $message = array(
                    "message" => $error,
                    "flag" => 0,
                );
            } else {
                $authenticator = new Authenticator($postArray, "sub-category", "update", $identifier);
                if (!$authenticator->processSubCategory($action, $identifier)) {
                    $error = $authenticator->getMsg();
                    $message = array(
                        "message" => $error,
                        "flag" => 0
                    );
                } else {
                    if (is_null($error)) {
                        $message = array(
                            "message" => "Information has successfully been updated",
                            "flag" => 1,
                        );
                    }
                    break;
                }
            }
    }
}
///////////////////////////////////////////////////////////////////////////
//DELETE REQUESTS
//////////////////////////////////////////////////////////////////////////
if ($request === "delete") {
    $table = Sanitize::__string(Input::grab("table"));
    $id = Sanitize::__string(Input::grab("id"));
    $databaseHandler = new DatabaseHandler;
    switch ($table) {
        case 'suppliers':
            $field = "supplier_id";
            $databaseHandler->runSQL("DELETE from suppliers WHERE supplier_id = ?", array($id), 0);
            break;
        case 'products':
            $field = "product_id";
            $databaseHandler->runSQL("DELETE from products WHERE product_id = ?", array($id), 0);
            $databaseHandler->runSQL("DELETE from product_details WHERE product_id = ?", array($id), 0);
            $databaseHandler->runSQL("DELETE from supplier_activity WHERE product_id = ?", array($id), 0);
            $databaseHandler->runSQL("DELETE from purchases WHERE product_id = ?", array($id), 0);
            break;
        case 'category':
            $field = "category_id";
            $databaseHandler->runSQL("DELETE FROM category WHERE category_id = ?", array($id), null);
            $databaseHandler->runSQL("DELETE FROM sub_category WHERE category_id = ?", array($id), null);
            $databaseHandler->runSQL("DELETE FROM products WHERE category_id = ?", array($id), null);
            break;
        case 'sub-category':
            $field = "sub_category_id";
            $databaseHandler->runSQL("DELETE FROM sub_category  WHERE sub_category_id = ?", array($id), null);
            $databaseHandler->runSQL("DELETE FROM products  WHERE sub_category_id = ?", array($id), null);
            break;
        case 'emoloyees':
            $field = "employee_id";
            break;
        case 'administrators':
            $field = "admin_id";
            $databaseHandler->runSQL("DELETE FROM administrators WHERE admin_id = ?", array($id), null);
            break;

        case 'orders':
            $field = "order_id";
            $databaseHandler->runSQL("DELETE orders, order_details, customers FROM orders 
            INNER JOIN order_details ON order_details.order_id = orders.order_id 
            INNER JOIN customers ON customers.customer_id = orders.customer_id
            WHERE orders.order_id = ?", array($id), null);
            break;
        case 'customers':
            $field = "customer_id";
            $databaseHandler->runSQL("DELETE orders, order_details, customers FROM orders 
            INNER JOIN order_details ON order_details.order_id = orders.order_id 
            INNER JOIN customers ON customers.customer_id = orders.customer_id
            WHERE customers.customer_id = ?", array($id), null);
            break;
    }
    $message = array(
        "message" => "Record Deleted Successfully...",
        "flag" => 1
    );
}
/////////////////////////////////////////////////////////////////
//LOGIN FORM
/////////////////////////////////////////////////////////////////////
if (isset($formIdentity) && $formIdentity === "admin-login-form") {
    $username = Sanitize::__string(Input::grab("username"));
    $password = Sanitize::__string(Input::grab("password"));
    $postArray = array("username" => $username, "password" => $password);
    $authenticator = new Authenticator($postArray, "admin-login-form");
    if (!$authenticator->administratorsLogin()) {
        $error = $authenticator->getMsg();
        $message =  array(
            "message" => $error,
            "flag" => 0
        );
    } else {
        if (is_null($error)) {
            $message = array(
                "flag" => 1,
                "message" => "You will be redirected shortly...",
                "action" => "redirect",
                "destination" => "../profile/?request=home"
            );
        }
    }
}
if (Input::grab("cid") && Input::grab("table") && Input::grab("field")) {
    $cid = Sanitize::__string(Input::grab("cid"));
    $databaseHandler = new DatabaseHandler;
    $databaseHandler->setTable("messages");
    $databaseHandler->setField(array("message_id"));
    $databaseHandler->setQueryItems(array("message_id", "=", $cid));
    $databaseHandler->queryDb("delete");
    $message = array(
        "flag" => 1,
        "message" => "Message has been deleted successfully. Please wait while we 
            synchronize changes for you..."
    );
}

///////////////////////////////////////////////////////////////////
//ADD PRODUCT
///////////////////////////////////////////////////////////////////
if (!empty($formIdentity) && $formIdentity === "product-form") {
    $productName = Sanitize::__string(Input::grab("product-name"));
    $category = Sanitize::__string(Input::grab("category-name"));
    $subCategory = Sanitize::__string(Input::grab("sub-category-name"));
    $initialPrice = Sanitize::__string(Input::grab("market-price"));
    $discountedPrice = Sanitize::__string(Input::grab("discounted-price"));
    $productDescription = Sanitize::__string(Input::grab("product-description"));
    $productKeyFeatures = Sanitize::__string(Input::grab("product-features"));
    $error = null;
    if (!empty($card)) {
        switch ($card) {
            case 'productsFirstCard':
                $postArray = array(
                    "product-name" => $productName,
                    "category-name" => $category,
                    "sub-category-name" => $subCategory,
                    "market-price" => $initialPrice,
                    "discounted-price" => $discountedPrice,
                );
                break;
            case 'productsThirdCard':
                $postArray = array(
                    "product-description" => $productDescription,
                    "product-features" => $productKeyFeatures,
                );
                break;
        }
    }

    switch ($action) {
        case 'add':
            $authenticator = new Authenticator($postArray, "products", "add");
            if (!$authenticator->processProduct($action, $card, null)) {
                $error = $authenticator->getMsg();
                $message = array(
                    "message" => $error,
                    "flag" => 0
                );
            } else {
                if (is_null($error)) {
                    switch ($card) {
                        case 'productsFirstCard':
                            $message = array(
                                "message" => "Product has successfully been added to the database",
                                "flag" => 1,
                            );
                            break;
                        case 'productsThirdCard':
                            $message = array(
                                "message" => "Product Description has successfully been added to the database",
                                "flag" => 1,
                            );
                            break;
                    }
                }
            }
            break;
        case 'update':
            if (empty($identifier)) {
                $error = "Invalid Identifier";
                $message = array("message" => $error, "flag" => 0);
            } else {
                $authenticator = new Authenticator($postArray, "products", "update", $identifier);
                if (!$authenticator->processProduct($action, $card, $identifier)) {
                    $error = $authenticator->getMsg();
                    $message = array(
                        "message" => $error,
                        "flag" => 0
                    );
                } else {
                    if (is_null($error)) {
                        $message = array(
                            "message" => "Product has successfully been updated",
                            "flag" => 1,
                        );
                    }
                }
            }
            break;
    }
}
/////////////////////////////////////////////////////////////////////
//PURCHASES FORM
////////////////////////////////////////////////////////////////////
if ($formIdentity === "purchases-form") {
    $supplier = Sanitize::__string(Input::grab("supplier"));
    $buyingPrice = Sanitize::__string(Input::grab("buying-price"));
    $paymentMethod = Sanitize::__string(Input::grab("payment-method"));
    $transactionId = Sanitize::__string(Input::grab("transaction-id"));
    $paymentStatus = Sanitize::__string(Input::grab("payment-status"));
    $balance = Sanitize::__string(Input::grab("balance"));
    if ($paymentMethod === "Mpesa" && empty($transactionId)) {
        $error = "Please provide a valid Mpesa transaction code";
        $message = array(
            "message" => $error,
            "flag" => 0
        );
    } else {
        $postArray = array(
            "supplier-name" => $supplier,
            "buying-price" => $buyingPrice,
            "payment-method" => $paymentMethod,
            "transaction-id" => $transactionId,
            "payment-status" => $paymentStatus,
            "balance" => $balance
        );
        switch ($action) {
            case 'add':
                $authenticator = new Authenticator($postArray, "purchases", "add");
                if (!$authenticator->processPurchases("add", null)) {
                    $error = $authenticator->getMsg();
                    $message = array(
                        "message" => $error,
                        "flag" => 0
                    );
                } else {
                    if (is_null($error)) {
                        $message = array(
                            "message" => "Record has successfully been added to the purchases table",
                            "flag" => 1,
                        );
                    }
                }
                break;
            case 'update':
                if (empty($identifier)) {
                    $error = "Invalid Identifier";
                    $message = array("message" => $error, "flag" => 0);
                } else {
                    $authenticator = new Authenticator($postArray, "purchases", "update", $identifier);
                    if (!$authenticator->processPurchases($action, $identifier)) {
                        $error = $authenticator->getMsg();
                        $message = array(
                            "message" => $error,
                            "flag" => 0
                        );
                    } else {
                        if (is_null($error)) {
                            $message = array(
                                "message" => "Record has successfully been updated",
                                "flag" => 1,
                            );
                        }
                    }
                }
                break;
        }
    }
}




///////////////////////////////////////////////////////////////////////////////
//ADD ADMINISTRATOR
///////////////////////////////////////////////////////////////////////////////
if (!empty($formIdentity) && $formIdentity === "administrators-form") {
    $username = Sanitize::__string(Input::grab("username"));
    $employeeId = Sanitize::__string(Input::grab("employee-id"));
    $password = Sanitize::__string(Input::grab("password"));
    $confirm_password = Sanitize::__string(Input::grab("confirm-password"));
    $postArray = array(
        "username" => $username,
        "employee-id" => $employeeId,
        "password" => $password,
        "confirm-password" => $confirm_password
    );
    $authenticator = new Authenticator($postArray, "administrators");
    switch ($action) {
        case 'add':
            if (!$authenticator->processAdministrator("add", null)) {
                $error = $authenticator->getMsg();
                $message = array(
                    "message" => $error,
                    "flag" => 0
                );
            } else {
                if (is_null($error)) {
                    Session::generate("ADMIN_NAME", $username);
                    $message = array(
                        "message" => "Administrator info has been added successfully. You will be redirected 
                to the views page to preview the information shortly",
                        "flag" => 1
                    );
                }
            }
            break;
    }
}


///////////////////////////////////////////////////////////////////
//SUPPLIERS FORM
//////////////////////////////////////////////////////////////////
if (!empty($formIdentity) && $formIdentity === "suppliers-form") {
    $error = null;
    $supplierName = Sanitize::__string(Input::grab("supplier-name"));
    $company = Sanitize::__string(Input::grab("company"));
    $phoneNumber = Sanitize::__string(Input::grab("phone-number"));
    $email = Sanitize::__string(Input::grab("suppliers-email"));
    $website = Sanitize::__string(Input::grab("website"));

    $postArray = array(
        "supplier-name" => $supplierName, "company" => $company, "phone-number" => $phoneNumber,
        "suppliers-email" => $email, "website" => $website
    );

    switch ($action) {
        case 'add':
            $authenticator = new Authenticator($postArray, "suppliers", "add");

            if (!$authenticator->processSuppliers("add", null)) {
                $error = $authenticator->getMsg();
                $message = array(
                    "message" => $error,
                    "flag" => 0
                );
            } else {
                if (is_null($error)) {
                    $message = array(
                        "message" => "Supplier has been added to the database successfully",
                        "flag" => 1,
                    );
                }
            }
            break;
        case 'update':
            if (empty($identifier)) {
                $error = "Invalid Identifier";
                $message = array("message" => $error, "flag" => 0);
            } else {
                $authenticator = new Authenticator($postArray, "suppliers", "update", $identifier);

                if (!$authenticator->processSuppliers("update", $identifier)) {
                    $error = $authenticator->getMsg();
                    $message = array(
                        "message" => $error,
                        "flag" => 0
                    );
                } else {
                    if (is_null($error)) {
                        $message = array(
                            "message" => "Supplier has been updated successfully",
                            "flag" => 1,
                        );
                    }
                }
            }
            break;
    }
}

/////////////////////////////////////////////////////////////////////////
//EMPLOYEE FORM
/////////////////////////////////////////////////////////////////////
if (!empty($formIdentity) && $formIdentity === "employees-form") {
    $firstname = Sanitize::__string(Input::grab("firstname"));
    $middlename = Sanitize::__string(Input::grab("middlename"));
    $lastname = Sanitize::__string(Input::grab("lastname"));
    $dob = Sanitize::__string(Input::grab("date-of-birth"));
    $username = Sanitize::__string(Input::grab("username"));
    $date_object = date_create($dob);
    $dob = date_format($date_object, "d/m/Y");
    $gender = Sanitize::__string(Input::grab("gender"));
    $currentEmail = Sanitize::__string(Input::grab("email"));
    $phoneNumber = Sanitize::__string(Input::grab("phone-number"));
    $nationality = Sanitize::__string(Input::grab("nationality"));
    $nationalID = Sanitize::__string(Input::grab("national-id"));
    $maritalStatus = Sanitize::__string(Input::grab("marital-status"));
    $postalAddress = Sanitize::__string(Input::grab("postal-address"));
    $residence = Sanitize::__string(Input::grab("residence"));
    $county = Sanitize::__string(Input::grab("county"));
    $city = Sanitize::__string(Input::grab("city"));
    $role = Sanitize::__string(Input::grab("role"));
    $salary = Sanitize::__string(Input::grab("salary"));
    $password = Sanitize::__string(Input::grab("password"));
    $confirmPassword = Sanitize::__string(Input::grab("password"));
    $bankAccountNo = Sanitize::__string(Input::grab("bank-account-no"));
    $bank = Sanitize::__string(Input::grab("bank"));
    $salaryPaid = Sanitize::__string(Input::grab("salary-paid"));
    $paymentMethod = Sanitize::__string(Input::grab("payment-method"));

    if (!empty($card)) {
        switch ($card) {
            case 'employeesFirstCard':
                if (empty($middlename) && empty($lastname)) {
                    $error = "Please fill in the employees middlename or lastname";
                    $message = array(
                        "message" => $error,
                        "flag" => 0
                    );
                }
                if (!empty($middlename)) {
                    $selectedName =  "middlename";
                    $name = $middlename;
                }
                if (!empty($lastname)) {
                    $selectedName = "lastname";
                    $name = $lastname;
                };
                $postArray = array(
                    "firstname" => $firstname,
                    "middlename" => $middlename,
                    "lastname" => $lastname,
                    "username" => $username,
                    "role" => $role,
                    "salary" => $salary,
                    "password" => $password,
                    "confirm-password" => $confirmPassword
                );
                break;
            case 'employeesSecondCard':
                $postArray = array(
                    "gender" => $gender,
                    "dob" => $dob,
                    "nationality" => $nationality,
                    "national-id" => $nationalID,
                    "marital-status" => $maritalStatus,
                    "residence" => $residence,
                    "county" => $county,
                    "city" => $city
                );
                break;
            case 'employeesThirdCard':
                $postArray = array(
                    "current-email" => $currentEmail,
                    "phone-number" => $phoneNumber,
                    "postal-address" => $postalAddress,
                    "bank-account-no" => $bankAccountNo,
                    "bank" => $bank,
                    "salary-paid" => $salaryPaid,
                    "payment-method" => $paymentMethod,
                );
        }
    }
    switch ($action) {
        case 'add':
            $authenticator = new Authenticator($postArray, "employees", "add");
            if (!$authenticator->processEmployee("add", $card)) {
                $error = $authenticator->getMsg();
                $message = array(
                    "message" => $error,
                    "flag" => 0
                );
            } else {
                if (is_null($error)) {
                    $message = array(
                        "message" => "Employee has been added to the database successfully",
                        "flag" => 1,
                    );
                }
            }
            break;
        case 'update':
            if (empty($identifier)) {
                $error = "Invalid Identifier";
                $message = array("message" => $error, "flag" => 0);
            } else {
                $authenticator = new Authenticator($postArray, "employees", "update", $identifier);
                if (!$authenticator->processEmployee("update", $card, $identifier)) {
                    $error = $authenticator->getMsg();
                    $message = array(
                        "message" => $error,
                        "flag" => 0
                    );
                } else {
                    if (is_null($error)) {
                        $message = array(
                            "message" => "Employee information has been updated successfully",
                            "flag" => 1,
                        );
                    }
                }
            }
            break;
    }
}



if (!empty($formIdentity) && $formIdentity === "orders-form") {
    $paymentAmount = Sanitize::__string(Input::grab("payment-amount"));
    $paymentMethod = Sanitize::__string(Input::grab("payment-method"));
    $paymentStatus = Sanitize::__string(Input::grab("payment-status"));
    $transactionId = Sanitize::__string(Input::grab("transaction-id"));
    $balance = Sanitize::__string(Input::grab("balance"));
    $reference = Sanitize::__string(Functions::decrypt(Input::grab("mandatory-security-reference")));
    $postArray = array(
        "payment-amount" => $paymentAmount,
        "payment-method" => $paymentMethod,
        "payment-status" => $paymentStatus,
        "transaction-id" => $transactionId,
        "balance" => $balance
    );

    $authenticator = new Authenticator($postArray, "orders");
    if (!$authenticator->processOrderPayment($reference, $identifier)) {
        $error = $authenticator->getMsg();
        $message = array(
            "message" => $error,
            "flag" => 0
        );
    } else {
        if (is_null($error)) {
            $message = array(
                "message" => "Payment has been verified successfully",
                "flag" => 1
            );
        }
    }
}


echo json_encode($message);
