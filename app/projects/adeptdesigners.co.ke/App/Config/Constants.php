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
    "name" => "adeptdesigners.co.ke",
    "options" => [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
));
/////////////////////////////////////////////////////////
/**
 * FORMS
 */
/////////////////////////////////////////////////////////
define("FORMS", array(
    "category" => array(
        "firstCardItems" => array(
            "title" => array(
                "add" => "Enter Category Information",
                "update" => "Current Category Information",
            ),
            "alert" => "categoryFormAlert",
            "id" => "categoryForm",
            "mandatorySecurityField" => "PRODUCT_CATEGORY_FORM",
            "fields" => array("category name", "gender", "description", "submit"),
            "attributes" => array(
                "category name" => array(
                    "type" => "text",
                    "class" => array("form-control"),
                ),
                "gender" => array(
                    "type" => "select",
                    "class" => array("form-control")
                ),
                "description" => array(
                    "type" => "textarea",
                    "class" => array("form-control")
                ),
                "submit" => array(
                    "type" => "submit",
                    "class" => array("btn-lg btn-dark w-100")
                )
            ),
            "step" => 1
        ),
        "uploadForm" => array(
            "title" => array(
                "add" => "Choose a Category Icon",
                "update" => "Change Category Icon"
            ),
            "fields" => array("form" => "upload-form"),
            "step" => 2
        ),
    ),
    "sub-category" => array(
        "firstCardItems" => array(
            "title" => array(
                "add" => "Enter Sub Category Information",
                "update" => "Current Sub Category Information",
            ),
            "alert" => "subCategoryFormAlert",
            "id" => "subCategoryForm",
            "mandatorySecurityField" => "PRODUCT_SUB_CATEGORY_FORM",
            "fields" => array("sub category name", "category name", "description", "submit"),
            "attributes" => array(
                "sub category name" => array(
                    "type" => "text",
                    "class" => array("form-control"),
                ),
                "category name" => array(
                    "type" => "select",
                    "class" => array("form-control")
                ),
                "description" => array(
                    "type" => "textarea",
                    "class" => array("form-control")
                ),
                "submit" => array(
                    "type" => "submit",
                    "class" => array("btn-lg btn-dark w-100")
                )
            ),
            "step" => 1
        ),
        "uploadForm" => array(
            "title" => array(
                "add" => "Choose a Sub Category Icon",
                "update" => "Change Sub Category Icon",
            ),
            "fields" => array("form" => "upload-form"),
            "step" => 2
        ),
    ),
    "products" => array(
        "firstCardItems" => array(
            "title" => array(
                "add" => "Enter Product Information",
                "update" => "Current Product Information",
            ),
            "alert" => "productFormAlert",
            "id" => "productForm",
            "mandatorySecurityField" => "PRODUCT_FORM",
            "mandatorySecurityCardIdentifier" => "productsFirstCard",
            "fields" => array("product name", "category name", "sub category name", "market price", "discounted price", "submit"),
            "attributes" => array(
                "product name" => array(
                    "type" => "text",
                    "class" => array("form-control"),
                ),
                "category name" => array(
                    "type" => "select",
                    "class" => array("form-control"),
                ),
                "sub category name" => array(
                    "type" => "select",
                    "class" => array("form-control"),
                ),
                "market price" => array(
                    "type" => "text",
                    "class" => array("form-control")
                ),
                "discounted price" => array(
                    "type" => "text",
                    "class" => array("form-control")
                ),
                "submit" => array(
                    "type" => "submit",
                    "class" => array("btn-lg btn-dark w-100")
                )
            ),
            "step" => 1
        ),
        "secondCardItems" => array(
            "title" => array(
                "add" => "Enter Purchasing Information",
                "update" => "Current Purchase Information",
            ),
            "alert" => "purchasesFormAlert",
            "id" => "purchasesForm",
            "mandatorySecurityField" => "PURCHASES_FORM",
            "fields" => array("supplier", "buying price", "balance", "payment method",  "transaction id", "payment status", "submit"),
            "attributes" => array(
                "supplier" => array(
                    "type" => "select",
                    "class" => array("form-control"),
                ),
                "buying price" => array(
                    "type" => "text",
                    "class" => array("form-control"),
                ),
                "payment method" => array(
                    "type" => "select",
                    "class" => array("form-control"),
                ),
                "transaction id" => array(
                    "type" => "text",
                    "class" => array("form-control")
                ),
                "balance" => array(
                    "type" => "text",
                    "class" => array("form-control")
                ),
                "payment status" => array(
                    "type" => "select",
                    "class" => array("form-control")
                ),
                "submit" => array(
                    "type" => "submit",
                    "class" => array("btn-lg btn-dark w-100")
                )
            ),
            "step" => 2
        ),
        "thirdCardItems" => array(
            "title" => array(
                "add" => "Enter Product Description",
                "update" => "Current Product Description",
            ),
            "alert" => "productDescriptionFormAlert",
            "id" => "productDescriptionForm",
            "mandatorySecurityField" => "PRODUCT_FORM",
            "mandatorySecurityCardIdentifier" => "productsThirdCard",
            "fields" => array("product description", "product features", "submit"),
            "attributes" => array(
                "product description" => array(
                    "type" => "textarea",
                    "class" => array("form-control"),
                ),
                "product features" => array(
                    "type" => "textarea",
                    "class" => array("form-control"),
                ),
                "submit" => array(
                    "type" => "submit",
                    "class" => array("btn-lg btn-dark w-100")
                )
            ),
            "step" => 3
        ),
        "uploadForm" => array(
            "title" => array(
                "add" => "Choose a product Image",
                "update" => "Current Product Image",
            ),
            "fields" => array("form" => "upload-form"),
            "step" => 4
        ),
    ),
    "employees" => array(
        "uploadForm" => array(
            "title" => array(
                "add" => "Choose a Profile Image",
                "update" => "Change Profile Image",
            ),
            "fields" => array("form" => "upload-form"),
            "step" => 4
        ),
        "firstCardItems" => array(
            "title" => array(
                "add" => "Enter Bio Information",
                "update" => "Current Bio Information",
            ),
            "step" => 1,
            "alert" => "employeeBioInformationFormAlert",
            "id" => "employeeBioInformationForm",
            "mandatorySecurityField" => "EMPLOYEES_FORM",
            "mandatorySecurityCardIdentifier" => "employeesFirstCard",
            "fields" => array("firstname", "middlename", "lastname", "username", "role", "salary", "password", "confirm password", "submit"),
            "attributes" => array(
                "firstname" => array(
                    "type" => "text",
                    "class" => array("form-control"),
                ),
                "middlename" => array(
                    "type" => "text",
                    "class" => array("form-control"),
                ),
                "lastname" => array(
                    "type" => "text",
                    "class" => array("form-control"),
                ),
                "username" => array(
                    "type" => "text",
                    "class" => array("form-control"),
                ),
                "role" => array(
                    "type" => "text",
                    "class" => array("form-control"),
                ),
                "salary" => array(
                    "type" => "text",
                    "class" => array("form-control"),
                ),
                "password" => array(
                    "type" => "password",
                    "class" => array("form-control"),
                ),
                "confirm password" => array(
                    "type" => "password",
                    "class" => array("form-control"),
                ),
                "show password" => array(
                    "type" => "checkbox",
                    "class" => array("password-visibility")
                ),
                "submit" => array(
                    "type" => "submit",
                    "class" => array("btn-lg btn-dark w-100")
                )
            ),
        ),
        "secondCardItems" => array(
            "title" => array(
                "add" => "Enter Identification Information",
                "update" => "Current Identification Information",
            ),
            "step" => 2,
            "alert" => "employeeIdentificationFormAlert",
            "id" => "employeeIdentificationForm",
            "mandatorySecurityField" => "EMPLOYEES_FORM",
            "mandatorySecurityCardIdentifier" => "employeesSecondCard",
            "fields" => array("gender", "date of birth", "nationality", "national id", "marital status", "residence",  "county", "city", "submit"),
            "attributes" => array(
                "gender" => array(
                    "type" => "select",
                    "class" => array("form-control")
                ),
                "date of birth" => array(
                    "type" => "date",
                    "class" => array("form-control")
                ),
                "nationality" => array(
                    "type" => "text",
                    "class" => array("form-control"),
                ),
                "national id" => array(
                    "type" => "text",
                    "class" => array("form-control"),
                ),
                "marital status" => array(
                    "type" => "select",
                    "class" => array("form-control"),
                ),
                "residence" => array(
                    "type" => "text",
                    "class" => array("form-control")
                ),
                "county" => array(
                    "type" => "text",
                    "class" => array("form-control")
                ),
                "city" => array(
                    "type" => "text",
                    "class" => array("form-control")
                ),
                "submit" => array(
                    "type" => "submit",
                    "class" => array("btn-lg btn-dark w-100")
                )
            ),
        ),
        "thirdCardItems" => array(
            "title" => array(
                "add" => "Enter Account Information",
                "update" => "Current Account Information",
            ),
            "step" => 3,
            "alert" => "employeeAccountInformationFormAlert",
            "id" => "employeeAccountInformationForm",
            "mandatorySecurityCardIdentifier" => "employeesThirdCard",
            "mandatorySecurityField" => "EMPLOYEES_FORM",
            "fields" => array("email", "phone number", "bank account no", "bank", "salary paid", "payment method", "postal address", "submit"),
            "attributes" => array(
                "email" => array(
                    "type" => "email",
                    "class" => array("form-control"),
                ),
                "phone number" => array(
                    "type" => "text",
                    "class" => array("form-control"),
                ),
                "payment method" => array(
                    "type" => "select",
                    "class" => array("form-control"),
                ),
                "bank account no" => array(
                    "type" => "text",
                    "class" => array("form-control"),
                ),
                "bank" => array(
                    "type" => "text",
                    "class" => array("form-control"),
                ),
                "salary paid" => array(
                    "type" => "text",
                    "class" => array("form-control"),
                ),
                "postal address" => array(
                    "type" => "text",
                    "class" => array("form-control"),
                ),
                "submit" => array(
                    "type" => "submit",
                    "class" => array("btn-lg btn-dark w-100")
                )
            ),
        ),
    ),
    "suppliers" => array(
        "uploadForm" => array(
            "title" => array(
                "add" => "Choose Suppliers Profile Image",
                "update" => "Change Suppliers Profile Image",
            ),
            "fields" => array("form" => "upload-form"),
            "step" => 2
        ),
        "firstCardItems" => array(
            "title" => array(
                "add" => "Add Supplier Information",
                "update" => "Current Suppliers Informtion",
            ),
            "step" => 1,
            "alert" => "suppliersFormAlert",
            "id" => "suppliersForm",
            "mandatorySecurityField" => "SUPPLIERS_FORM",
            "fields" => array("supplier name", "company", "suppliers email", "phone number", "website", "submit"),
            "attributes" => array(
                "supplier name" => array(
                    "type" => "text",
                    "class" => array("form-control"),
                ),
                "company" => array(
                    "type" => "text",
                    "class" => array("form-control")
                ),
                "suppliers email" => array(
                    "type" => "email",
                    "class" => array("form-control")
                ),
                "phone number" => array(
                    "type" => "text",
                    "class" => array("form-control")
                ),
                "website" => array(
                    "type" => "text",
                    "class" => array("form-control")
                ),
                "submit" => array(
                    "type" => "submit",
                    "class" => array("btn-lg btn-dark w-100")
                )
            ),
        ),
    ),
    "administrators" => array(
        "uploadForm" => array(
            "title" => array(
                "add" => "Add Profile Image",
                "update" => "Change Profile Image",
            ),
            "fields" => array("form" => "upload-form"),
            "step" => 2
        ),
        "firstCardItems" => array(
            "title" => array(
                "add" => "Administrators Account Information",
                "update" => "Change Account Information",
            ),
            "alert" => "administratorsFormAlert",
            "step" => 1,
            "id" => "administratorsForm",
            "mandatorySecurityField" => "ADMINISTRATORS_FORM",
            "fields" => array("username", "employee id", "password", "confirm password", "show password", "submit"),
            "attributes" => array(
                "username" => array(
                    "type" => "text",
                    "class" => array("form-control"),
                ),
                "employee id" => array(
                    "type" => "text",
                    "class" => array("form-control"),
                ),
                "password" => array(
                    "type" => "password",
                    "class" => array("form-control", "password"),
                ),
                "confirm password" => array(
                    "type" => "password",
                    "class" => array("form-control", "password"),
                ),
                "show password" => array(
                    "type" => "checkbox",
                    "class" => array("password-visibility")
                ),
                "submit" => array(
                    "type" => "submit",
                    "class" => array("btn-lg btn-dark w-100")
                )
            ),
        ),
    ),

    "orders" => array(
        "orderInformation" => array(
            "title" => array(
                "update" => "Order Details",
            ),
            "step" => 1
        ),
        "firstCardItems" => array(
            "title" => array(
                "update" => "Confirm Customer Payment",
            ),
            "step" => 2,
            "alert" => "ordersFormAlert",
            "id" => "ordersForm",
            "mandatorySecurityField" => "ORDERS_FORM",
            "fields" => array("payment amount", "payment method", "transaction id", "payment status", "balance", "submit"),
            "attributes" => array(

                "payment amount" => array(
                    "type" => "text",
                    "class" => array("form-control")
                ),
                "payment method" => array(
                    "type" => "select",
                    "class" => array("form-control")
                ),
                "payment status" => array(
                    "type" => "select",
                    "class" => array("form-control")
                ),
                "balance" => array(
                    "type" => "text",
                    "class" => array("form-control")
                ),
                "transaction id" => array(
                    "type" => "text",
                    "class" => array("form-control")
                ),
                "submit" => array(
                    "type" => "submit",
                    "class" => array("btn-lg btn-dark w-100")
                )
            ),
        ),
    ),

    "customers" => array(
        "orderInformation" => array(
            "title" => array(
                "update" => "Order Details",
            ),
            "step" => 1
        ),
        "firstCardItems" => array(
            "title" => array(
                "update" => "Confirm Customer Payment",
            ),
            "step" => 2,
            "alert" => "ordersFormAlert",
            "id" => "ordersForm",
            "mandatorySecurityField" => "ORDERS_FORM",
            "fields" => array("payment amount", "payment method", "transaction id", "payment status", "balance", "submit"),
            "attributes" => array(
                "payment amount" => array(
                    "type" => "text",
                    "class" => array("form-control")
                ),
                "payment method" => array(
                    "type" => "select",
                    "class" => array("form-control")
                ),
                "payment status" => array(
                    "type" => "select",
                    "class" => array("form-control")
                ),
                "balance" => array(
                    "type" => "text",
                    "class" => array("form-control")
                ),
                "transaction id" => array(
                    "type" => "text",
                    "class" => array("form-control")
                ),
                "submit" => array(
                    "type" => "submit",
                    "class" => array("btn-lg btn-dark w-100")
                )
            ),
        ),
    ),
));


/////////////////////////////////////////////////////////
/**
 * BANNERS
 */
/////////////////////////////////////////////////////////

define("BANNER", array(
    "heading" => "Get Started",
    "actions" => array(
        "Add a New Product",
        "Add a New Category",
        "Add a New Sub-Category",
        "Add a New Supplier",
        "Add Users",
        "Add Employee",
        "Add Administrator",
        "Go to Products",
        "Go to Categories",
        "Go to Sub-Categories",
        "Go to Suppliers",
        "Delete Customer",
        "Delete Order",
        "View Users",
        "View Employees",
        "View Administrators",
        "View Customers",
        "View Orders"
    ),
    "links" => array(
        "Go to Products" => Directories::getLocation("pages/admin/profile/") . "?request=view&reference=products",
        "Add a New Supplier" => Directories::getLocation("pages/admin/profile/") . "?request=add&reference=suppliers",
        "Go to Categories" => Directories::getLocation("pages/admin/profile/") . "?request=view&reference=category",
        "Go to Sub-Categories" => Directories::getLocation("pages/admin/profile/") . "?request=view&reference=sub-category",
        "Add a New Product" => Directories::getLocation("pages/admin/profile/") . "?request=add&reference=products",
        "Add a New Category" => Directories::getLocation("pages/admin/profile/") . "?request=add&reference=category",
        "Add a New Sub-Category" => Directories::getLocation("pages/admin/profile/") . "?request=add&reference=sub-category",
        "Go to Suppliers" => Directories::getLocation("pages/admin/profile/") . "?request=view&reference=suppliers",
        "Go to Categories" => Directories::getLocation("pages/admin/profile/") . "?request=view&reference=category",
        "Delete Order" => Directories::getLocation("pages/admin/profile/") . "?request=view&reference=sub-category",
        "Add a New Product" => Directories::getLocation("pages/admin/profile/") . "?request=add&reference=product",
        "View Customers" => Directories::getLocation("pages/admin/profile/") . "?request=view&reference=customers",
        "Delete Customer" => Directories::getLocation("pages/admin/profile/") . "?request=add&reference=sub-category",
        "Go to Suppliers" => Directories::getLocation("pages/admin/profile/") . "?request=view&reference=suppliers",
        "Go to Categories" => Directories::getLocation("pages/admin/profile/") . "?request=view&reference=category",
        "Delete Order" => Directories::getLocation("pages/admin/profile/") . "?request=view&reference=sub-category",
        "Add a New Product" => Directories::getLocation("pages/admin/profile/") . "?request=add&reference=products",
        "Delete Customer" => Directories::getLocation("pages/admin/profile/") . "?request=add&reference=sub-category",
        "Add Users" => Directories::getLocation("pages/admin/profile/") . "?request=add&reference=users",
        "View Users" => Directories::getLocation("pages/admin/profile/") . "?request=view&reference=users",
        "Add Employee" => Directories::getLocation("pages/admin/profile/") . "?request=add&reference=employees",
        "View Employees" => Directories::getLocation("pages/admin/profile/") . "?request=view&reference=employees",
        "Add Administrator" => Directories::getLocation("pages/admin/profile/") . "?request=add&reference=administators",
        "View Administrators" => Directories::getLocation("pages/admin/profile/") . "?request=view&reference=administrators",
        "View Orders" => Directories::getLocation("pages/admin/profile/") . "?request=view&reference=orders"
    )
));

//////////////////////////////////////////////////////////
/**
 * DATABASE TABLES
 */
//////////////////////////////////////////////////////////
define("TABLES", array(
    "administrators" => "administrators",
    "users" => "users",
    "category" => "category",
    "comments" => "comments",
    "customers" => "customers",
    "employee-account" => "employee_account",
    "employees" => "employees",
    "messages" => "messages",
    "order-info" => "order_details",
    "orders" => "orders",
    "product-info" => "product_details",
    "products" => "products",
    "purchases" => "purchases",
    "replies" => "replies",
    "sales" => "sales",
    "sub-category" => "sub_category",
    "subscriptions" => "subscriptions",
    "supplier-info" => "supplier_activity",
    "suppliers" => "suppliers",
));



define("ICONS", array(
    "products" =>
    Directories::getLocation("tools/assets/clothes-hanger.png"),
    "comments" =>
    Directories::getLocation("tools/assets/chat-box.png"),
    "messages" =>
    Directories::getLocation("tools/assets/messages.png"),
    "subscriptions" =>
    Directories::getLocation("tools/assets/subscription.png"),
    "orders" =>
    Directories::getLocation("tools/assets/order.png"),
    "customers" =>
    Directories::getLocation("tools/assets/customer.png"),
    "transactions" =>
    Directories::getLocation("tools/assets/budget.png"),
    "category" =>
    Directories::getLocation("tools/assets/category.png"),
    "sub-category" =>
    Directories::getLocation("tools/assets/options.png"),
    "suppliers" =>
    Directories::getLocation("tools/assets/delivery-courier.png"),
    "administrators" =>
    Directories::getLocation("tools/assets/software-engineer.png"),
    "profile" =>
    Directories::getLocation("tools/assets/man.png"),
    "gender" =>
    Directories::getLocation("tools/assets/gender-symbols.png"),
    "users" =>
    Directories::getLocation("tools/assets/user.png"),
    "employees" =>
    Directories::getLocation("tools/assets/employee.png"),
    "notifications" =>
    Directories::getLocation("tools/assets/notification.png"),
    "blogs" =>
    Directories::getLocation("tools/assets/blog.png"),
    "delete" =>
    Directories::getLocation("tools/assets/delete.png"),
    "open-folder" =>
    Directories::getLocation("tools/assets/open-folder.png"),
    "update" =>
    Directories::getLocation("tools/assets/refresh.png"),
    "not-set" =>
    Directories::getLocation("tools/assets/man2.png"),
    "sign out" =>
    Directories::getLocation("tools/assets/switch.png"),
    "update profile" =>
    Directories::getLocation("tools/assets/profile.png"),
    "view activity" =>
    Directories::getLocation("tools/assets/activity.png"),
    "add" =>
    Directories::getLocation("tools/assets/plus-sign.png"),
    "login" =>
    Directories::getLocation("tools/assets/log-in.png"),
    "facebook" =>
    Directories::getLocation("tools/assets/facebook.png"),
    "twitter" =>
    Directories::getLocation("tools/assets/twitter.png"),
    "instagram" =>
    Directories::getLocation("tools/assets/instagram.png"),
    "linkedin" =>
    Directories::getLocation("tools/assets/linkedin.png"),
    "youtube" =>
    Directories::getLocation("tools/assets/youtube.png"),
    "delete" =>
    Directories::getLocation("tools/assets/delete.png"),
    "shopping-cart" =>
    Directories::getLocation("tools/assets/shopping-cart.png"),
    "register" =>
    Directories::getLocation("tools/assets/edit.png"),
    "login" =>
    Directories::getLocation("tools/assets/login.png"),
    "cancel" =>
    Directories::getLocation("tools/assets/cancel.png"),
    "man" =>
    Directories::getLocation("tools/assets/man3.png"),
    "woman" =>
    Directories::getLocation("tools/assets/beauty.png"),
    "pending" =>
    Directories::getLocation("tools/assets/pending.png"),
    "verified" =>
    Directories::getLocation("tools/assets/accept.png"),
    "payment" =>
    Directories::getLocation("tools/assets/payment-method.png")

));
