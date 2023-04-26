<?php

$result = new DatabaseHandler;
$result->setTable("administrators");
$result->setField(array("username", "last_seen", "date_added", "day_added", "time_added"));
$result->setQueryItems(array("username", "=", Session::getValue("username")));
$result->queryDb("select", 1);
$result = $result->getOutput();


$footer_items = array(
    "QuickMenu" => array(
        "title" => array(
            "products", "categories", "sub-categories",
            "customers", "orders", "suppliers", "finance", "subscriptions",
            "messages", "comments", "blogs", "notifications", "employees",
            "users", "administrators", "profile"
        ),
        "html" => array(
            "products" => array("Add Products", "Update Product", "Delete Product", "View Products"),
            "categories" => array("Add Category", "Update Category", "Delete Category", "View Category"),
            "sub-categories" => array("Add Sub-Category", "Update Sub-Category", "Delete Sub-Category", "View Sub-Categories"),
            "customers" => array("Add Customer", "Update Customer", "Delete Customer", "View Customers"),
            "orders" => array("Place Order", "Update Order", "Delete Order", "View Orders"),
            "suppliers" => array("Add Supplier", "Update Supplier", "Delete Supplier", "View Suppliers"),
            "finance" => array("View Wallet", "View Transactions", "Update Transaction", "Delete Transaction"),
            "messages" => array("Inbox", "SentBox", "OutBox", "Drafts"),
            "subscriptions" => array("View Subscription", "Delete Subscription", "Change User Preference"),
            "comments" => array("View Comment", "Delete Comment"),
            "blogs" => array("View Blogs", "Delete Blog", "Drafts"),
            "notifications" => array("View Notifications", "Delete Notification"),
            "employees" => array("View Employees", "Update Employee", "Delete Employee", "View Employees"),
            "users" => array("View Users", "Update Users", "Delete Users", "Add User"),
            "administrators" => array("Add Administrator", "Update Administrator", "Delete Administrator", "View Administrators"),
            "profile" => array(
                "Username: " . $result->username, "Last seen: " . $result->last_seen,
                "Account created on: " . $result->day_added . ",  " . $result->date_added . " at " . $result->time_added
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

    ),
    "SocialMedia" => array(
        "title" => array("facebook", "twitter", "instagram", "linkedin", "youtube"),
        "icons" => array(
            "facebook" => Directories::getLocation("tools/assets/facebook.png"),
            "twitter" => Directories::getLocation("tools/assets/twitter.png"),
            "instagram" => Directories::getLocation("tools/assets/instagram.png"),
            "linkedin" => Directories::getLocation("tools/assets/linkedin.png"),
            "youtube" => Directories::getLocation("tools/assets/youtube.png"),
        ),
        "html" => array(
            "facebook" => "theeAdeptDesigner",
            "twitter" => "@theeAdeptDesigner",
            "instagram" => "@theeAdeptDesigner",
            "linkedin" => "theeAdeptDesigner",
            "youtube" => "theeAdeptDesigner"
        )
    )

)



?>

<footer class="position-absolute w-100">
    <div class="container-fluid p-0 no gutters">
        <div class="jumbotron mb-0 bg-footer  w-100 h-25">
            <div class="row">
                <?php foreach ($footer_items["QuickMenu"]["title"] as $title) { ?>
                    <div class="col-sm-6 col-4 col-md-2">
                        <div class="mt-3 mr-3">
                            <p class="text-left text-nowrap"><?php echo ucfirst($title) ?></p>
                            <?php foreach ($footer_items["QuickMenu"]["html"][$title] as $linkTitle) {  ?>
                                <div>
                                    <a class="text-muted link-hover font-sm-md text-nowrap" href="#"><?php echo $linkTitle; ?></a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <hr>
            <div class="d-flex justify-content-center">
                <div class="col-md-3">
                    <div class="d-flex justify-content-center">
                        <div>
                            <img src="<?php echo Directories::getLocation("tools/assets/icon.png") ?>" class="img-fluid icon">
                        </div>
                        <div>
                            <img src="<?php echo Directories::getLocation("tools/assets/title.png")  ?>" class="img-fluid title">
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <?php foreach ($footer_items["SocialMedia"]["title"] as $title) { ?>
                            <div class="mt-3 d-flex ml-3">
                                <a href="">
                                    <img src="<?php echo $footer_items["SocialMedia"]["icons"][$title] ?>" class="img-fluid icon-sm">
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-lg-4">
                <div class="font-sm-md">Help</div>
                <div class="font-sm-md ml-3">Settings</div>
                <div class="font-sm-md ml-3">Terms And Conditions</div>
            </div>
            <div class="d-flex justify-content-center font-sm-md mt-lg-2">
                &copy; <?php echo date("Y") ?>
            </div>
        </div>

    </div>


    </div>
</footer>