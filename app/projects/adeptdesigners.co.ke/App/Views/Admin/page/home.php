<?php


//Add - color dark
//Update - color info 
$card_body = array(
    "title" => array(
        "products",
        "categories",
        "sub-categories",
        "orders",
        "suppliers",
        "customers",
        "finance",
        "subscriptions",
        "comments",
        "messages",
        "blogs",
        "notifications",
        "users",
        "employees",
        "administrators",
        "my profile",
    ),
    "actions" => array(
        "products" => array(
            "View all products",
            "Add a new product",
            "Delete an existing product",
            "update an existing product"
        ),
        "categories" => array(
            "Add a new product category", "View all product categories",
            "delete an existing product category",
            "update product category information"
        ),
        "sub-categories" => array(
            "View all product sub-categories",
            "Delete an existing product sub-category",
            "Add a new product sub-category",
            "update product sub-category information"
        ),
        "orders" => array(
            "View all orders",
            "delete an existing order",
            "update an existing order"
        ),
        "finance" => array(
            "View Wallet",
            "View Transactions",
            "Update Transaction Entry",
            "Delete Transaction"
        ),
        "customers" => array(
            "View all customers",
            "delete existing customer record",
            "update customer record"
        ),
        "subscriptions" => array(
            "View subscribed members",
            "delete subscribed member"
        ),
        "suppliers" => array(
            "View all suppliers",
            "Add new supplier",
            "delete supplier"
        ),
        "comments" => array(
            "delete a comment",
            "View all posted comments"
        ),
        "messages" => array(
            "View Messages",
            "delete Messages",
            "reply to a Message"
        ),
        "administrators" => array(
            "Add an Administrator",
            "delete an Administrator",
            "update Administrator info"
        ),
        "my profile" => array(
            "View your profile",
            "update your profile",
            "delete your profile"
        ),
        "employees" => array(
            "Add Employee",
            "Update employee profile",
            "Delete employee Profile"
        ),
        "users" => array(
            "View User",
            "Update User Information",
            "Delete User",
            "Add User"
        ),
        "notifications" => array(
            "View Notifications",
            "Delete Notification",
        ),
        "blogs" => array(
            "New Blog",
            "Delete Blog"
        )
    ),
    "icons" => array(
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
        "finance" =>
        Directories::getLocation("tools/assets/budget.png"),
        "categories" =>
        Directories::getLocation("tools/assets/category.png"),
        "sub-categories" =>
        Directories::getLocation("tools/assets/options.png"),
        "suppliers" =>
        Directories::getLocation("tools/assets/delivery-courier.png"),
        "administrators" =>
        Directories::getLocation("tools/assets/software-engineer.png"),
        "my profile" =>
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
        Directories::getLocation("tools/assets/blog.png")
    )

);

$card_footer = array(
    "buttons" => array(
        /**
         * PRODUCTS
         * 
         * Buttons 
         * View Products - Redirects to #products index page - contains all products in the products table, 
         *                  update product form  
         */

        "products" => array("Go to Products"),

        /**
         * CATEGORIES
         * 
         * Buttons 
         * View Category - Redirects to #category index page - contains all product categories in the categories table, 
         *                  update product category form  
         */

        "categories" => array("Go to Categories"),

        /**
         * SUB-CATEGORIES
         * 
         * Buttons 
         * View Sub-Category - Redirects to #sub-category index page - contains all product sub-categories in the sub-categories table, 
         *                  update product sub-category category form  
         * Delete Sub-Category - Redirects to #sub-category index page - contains delete buttons, 
         * Add Sub-Category - Redirects to #sub-category index page - contains add category form
         */

        "sub-categories" => array("Go to Sub-Categories"),

        /**
         * ORDERS
         * 
         * Buttons 
         * View Orders - Redirects to #orders index page - contains all customer orders in the orders table  
         * Delete Orders - Redirects to #orders index page - contains delete buttons, 
         */

        "orders" => array("Go to Orders"),

        /**
         * CUSTOMERS
         * 
         * Buttons 
         * View Customers - Redirects to #customers index page - contains all customers in the customers table,
         *                   update product category form  
         * Delete Customers - Redirects to #customers index page - contains delete buttons, 
         */

        "customers" => array("Go to Customers"),

        /**
         * SUBSCRIPTIONS
         * 
         * Buttons 
         * View Subscriptions - Redirects to #subsriptions index page - contains all subscriptions in the subscriptions table
         * Delete Subscription - Redirects to #subscriptions index page - contains delete buttons, 
         */

        "subscriptions" => array("Go to Subscriptions"),

        /**
         * SUPPLIERS
         * 
         * Buttons 
         * View Supplier - Redirects to #suppliers index page - contains all suppliers in the suppliers table,
         *                 update supplier form
         * Delete Supplier - Redirects to #suppliers index page - contains delete buttons
         * Add Supplier - Redirects to #suppliers index page - contains add supplier form 
         */
        "suppliers" => array("Go to Suppliers"),

        /**
         * COMMENTS
         * 
         * Buttons 
         * View Comment - Redirects to #comments index page - contains all comments in the comments table,
         * Delete Supplier - Redirects to #comments index page - contains delete buttons
         */
        "comments" => array("Go to Comments"),

        /**
         * MESSAGES
         * 
         * Buttons 
         * View Messages - Redirects to #messages index page - contains all messages in the messages table,
         * Delete Messages - Redirects to #messages index page - contains delete buttons
         */

        "messages" => array("Go to Messages"),

        /**
         * Administrators
         * 
         * Buttons 
         * View Administrator - Redirects to #administrators index page - contains all admininstrators in the administrators table,
         *                 update admininstrators info form
         * Delete Administrator - Redirects to #admininstrators index page - contains delete buttons
         * Add Admininstrator - Redirects to #admininstrators index page - contains add supplier form 
         */
        "administrators" => array("Go to Administrators"),


        "my profile" => array("Go to My Profile"),

        "users" => array("Go to Users"),

        "employees" => array("Go to employees"),

        "notifications" => array("Go to notifications"),

        "blogs" => array("Go to Blogs"),

        "finance" => array("Go to Finance"),

        "users" => array("Go to Users"),

    ),
    "locations" => array(
        "Go to Products" =>
        Directories::getLocation("accounts/profile/") . "?request=view&reference=products",

        "Go to Categories" =>
        Directories::getLocation("accounts/profile/") . "?request=view&reference=category",

        "Go to Sub-Categories" =>
        Directories::getLocation("accounts/profile/") . "?request=view&reference=sub-category",

        "Go to Orders" =>
        Directories::getLocation("accounts/profile/") . "?request=view&reference=orders",

        "Go to Customers" =>
        Directories::getLocation("accounts/profile/") . "?request=view&reference=customers",

        "Go to Subscriptions" =>
        Directories::getLocation("accounts/profile/") . "?request=view&reference=subscriptions",

        "Go to Comments" =>
        Directories::getLocation("accounts/profile/") . "?request=view&reference=comments",

        "Go to Messages" =>
        Directories::getLocation("accounts/profile/") . "?request=view&reference=messages",

        "Go to Administrators" =>
        Directories::getLocation("accounts/profile/") . "?request=view&reference=administrators",

        "Go to Suppliers" =>
        Directories::getLocation("accounts/profile/") . "?request=view&reference=suppliers",

        "Go to My Profile" =>
        Directories::getLocation("account/profile/") . "?request=update&reference=profile",

        "Go to employees" =>
        Directories::getLocation("account/profile/") . "?request=view&reference=employees",

        "Go to notifications" =>
        Directories::getLocation("account/profile/") . "?request=view&reference=notifications",

        "Go to finance" =>
        Directories::getLocation("account/profile/") . "?request=view&reference=sales",

        "Go to Users" =>
        Directories::getLocation("account/profile/") . "?request=view&reference=users"


    )

);
$x = 0;

$DatabaseHandler = new DatabaseHandler;
$DatabaseHandler->setTable("administrators");
$DatabaseHandler->setField(array("*"));
$DatabaseHandler->setQueryItems(array("username", "=", strtolower(Session::getValue(("username")))));
$DatabaseHandler->queryDb("select", 1);
$result = $DatabaseHandler->getOutput();
?>

<div class="container-fluid">
    <?php require(Directories::getLocation("app/views/admin/includes/banner.php")); ?>
    <div class="row mb-5">
        <?php

        foreach ($card_body["title"] as $title) {
        ?>
            <div class="col-md-3 col-12 mt-5">
                <div class="card w-100 shadow">
                    <div class="card-header admin-background">
                        <div class="d-flex justify-content-center">
                            <div>
                                <img src="<?php echo $card_body["icons"][$title];  ?>" class="img-fluid icon">
                            </div>
                            <h2 class="admin-heading ml-lg-2"><?php echo ucfirst($card_body["title"][$x]); ?></h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-block">
                            <h4 class="text-muted text-center ml-md-3">Actions</h4>
                            <div class="d-flex justify-content-center">
                                <div>
                                    <?php foreach ($card_body["actions"][$title] as $action) { ?>
                                        <p class="text-dark text-center"><?php echo $action; ?> </p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="mt-lg-3">
                                <?php foreach ($card_footer["buttons"][$title] as $button) { ?>
                                    <a name="button" class="btn btn-dark admin-hover" href="<?php echo $card_footer["locations"][$button];
                                                                                            ?>" value="<?php echo $button; ?>"><?php echo ucwords($button); ?> &raquo;</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $x++; ?>
        <?php } ?>
    </div>
</div>