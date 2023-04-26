<?php


$reference = Sanitize::__string(Input::grab("reference"));
$table = Config::getTable($reference);
$identifier = Sanitize::__string(Input::grab("identifier"));
$databaseHandler = new DatabaseHandler;
switch ($table) {
    case 'category':
        $field = "category_id";
        $databaseHandler->runSQL("SELECT * FROM category WHERE category_id = ? LIMIT 1", array($identifier), 1);
        $result = $databaseHandler->getOutput();
        $count = $databaseHandler->getCount();
        $path = "uploads/category/";
        $fieldIcon = $result->category_icon;
        $id = $result->category_id;
        $dateAdded = $result->day_added . ", " . $result->date_added;
        $timeAdded = $result->time_added;
        $dateUpdated = !empty($result->date_updated) ? $result->date_updated : "Not yet Updated";
        $timeUpdated = !empty($result->time_updated) ? $result->time_updated : "Not yet Updated";
        $back = Directories::getLocation("accounts/profile/") . "?request=view&reference=category";
        $referrer = "Categories";
        $items = array(
            "title" => array(
                "Name",
                "Gender",
                "Date Created",
                "Update Status",
                "Description"
            ),
            "content" => array(
                "Name" => $result->category_name,
                "Gender" => $result->gender,
                "Description" => $result->category_description,
                "Date Created" => $result->day_added . ", " . $result->date_added . " " . $result->time_added,
                "Update Status" => !empty($result->date_updated) && !empty($result->time_updated) ? $result->date_updated . " at " . $result->time_updated : "Not yet Updated",
            )

        );
        break;
    case 'sub_category':
        $field = "sub_category_id";
        $path = "uploads/sub-category/";
        $back = Directories::getLocation("accounts/profile/") . "?request=view&reference=sub-category";
        $databaseHandler->runSQL("SELECT
        category.category_name,
        sub_category.sub_category_id,
        sub_category.sub_category_icon,
        sub_category.sub_category_name,
        sub_category.sub_category_id,
        sub_category.sub_category_description,
        sub_category.date_added,
        sub_category.time_added,
        sub_category.day_added,
        sub_category.date_updated,
        sub_category.time_updated
        FROM sub_category INNER JOIN
        category ON
        category.category_id = sub_category.category_id
        WHERE sub_category_id = ? LIMIT 1", array($identifier), 1);
        $result = $databaseHandler->getOutput();
        $count = $databaseHandler->getCount();
        $fieldIcon = $result->sub_category_icon;
        $id = $result->sub_category_id;
        $dateAdded = $result->day_added . ", " . $result->date_added;
        $timeAdded = $result->time_added;
        $dateUpdated = !empty($result->date_updated) ? $result->date_updated : "Not yet Updated";
        $timeUpdated = !empty($result->time_updated) ? $result->time_updated : "Not yet Updated";
        $referrer = "Sub-Categories";
        $items = array(
            "title" => array(
                "Sub Category Name:",
                "Id:",
                "Category:",
                "Date Created:",
                "Update Status:",
                "Description:"
            ),
            "content" => array(
                "Sub Category Name:" => $result->sub_category_name,
                "Id:" => $result->sub_category_id,
                "Category:" => $result->category_name,
                "Description:" => $result->sub_category_description,
                "Date Created:" => $result->day_added . ", " . $result->date_added . " " . $result->time_added,
                "Update Status:" => !empty($result->date_updated) && !empty($result->time_updated) ? $result->date_updated . " at " . $result->time_updated : "Not yet Updated",
            )

        );
        break;
    case 'employees':
        $field = "employee_id";
        $path = "uploads/employees/";
        $back = Directories::getLocation("accounts/profile/") . "?request=view&reference=employees";
        $databaseHandler->runSQL("SELECT
        employees.employee_id,
        employees.firstname,
        employees.middlename,
        employees.lastname,
        employees.selected_name,
        employees.date_of_birth,
        employees.gender,
        employees.nationality,
        employees.national_id,
        employees.phone_number,
        employees.current_email,
        employees.marital_status,
        employees.role,
        employees.salary,
        employees.date_added,
        employees.day_added,
        employees.time_added,
        employee_account.username,
        employee_account.profile_image,
        employee_account.work_email,
        employee_account.status,
        employee_account.last_seen
        FROM employees INNER JOIN
        employee_account ON
         employee_account.employee_id = employees.employee_id
        WHERE employees.employee_id = ? LIMIT 1", array($identifier), 1);
        $result = $databaseHandler->getOutput();
        $count = $databaseHandler->getCount();
        $fieldIcon = $result->profile_image;
        $id = $result->employee_id;
        $dateAdded = $result->day_added . ", " . $result->date_added;
        $timeAdded = $result->time_added;
        $dateUpdated = !empty($result->date_updated) ? $result->date_updated : "Not yet Updated";
        $timeUpdated = !empty($result->time_updated) ? $result->time_updated : "Not yet Updated";
        $referrer = "Employees";
        $selectedName = $result->selected_name;
        $items = array(
            "title" => array(
                "Employee Name:",
                "Selected Name:",
                "Gender:",
                "Date of Birth",
                "Nationality:",
                "Marital Status:",
                "National ID Number:",
                "Mobile Phone Number",
                "Role:",
                "Salary:",
                "Employee Account Username:",
                "Last Logged in:",
                "Account Status:",
                "Personal Email:",
                "Work Email:"
            ),
            "content" => array(
                "Employee Name:" => $result->firstname . " " . $result->$selectedName,
                "Selected Name:" => $selectedName,
                "Gender:" =>  $result->gender,
                "Date of Birth" =>  $result->date_of_birth,
                "Marital Status:" => $result->marital_status,
                "Nationality:" => $result->nationality,
                "National ID Number:" => $result->national_id,
                "Mobile Phone Number" => $result->phone_number,
                "Personal Email:" => $result->current_email,
                "Work Email:" => $result->work_email,
                "Role:" => $result->role,
                "Salary:" => $result->salary,
                "Employee Account Username:" => $result->username,
                "Last Logged in:" => $result->last_seen,
                "Account Status:" => $result->status
            )

        );
        break;
    case 'products':
        $field = "product_id";
        $path = "uploads/products/";
        $back = Directories::getLocation("accounts/profile/") . "?request=view&reference=products";
        $databaseHandler->runSQL("SELECT
        products.product_id,
        products.product_name,
        products.date_updated,
        products.time_updated,
        suppliers.supplier_name,
        suppliers.company,
        purchases.date_added,
        purchases.day_added,
        purchases.time_added,
        purchases.amount_paid,
        purchases.balance,
        purchases.payment_method,
        purchases.transaction_id,
        purchases.payment_status,
        product_details.product_image,
        product_details.product_description,
        product_details.market_price,
        product_details.discounted_price,
        product_details.status,
        category.category_name,
        sub_category.sub_category_name
        FROM products 
        INNER JOIN
        product_details ON
        product_details.product_id = products.product_id
        INNER JOIN
        suppliers ON
        suppliers.supplier_id= products.supplier_id
        INNER JOIN
        purchases ON
        purchases.product_id = products.product_id
        INNER JOIN
        category ON
        category.category_id = products.category_id
        INNER JOIN
        sub_category ON
        sub_category.sub_category_id = products.sub_category_id
        WHERE products.product_id = ? LIMIT 1", array($identifier), 1);
        $result = $databaseHandler->getOutput();
        $dateAdded = $result->day_added . " " . $result->date_added . " , " . $result->time_added;
        $dateUpdated = !empty($result->date_updated) ? $result->date_updated : "Not yet Updated";
        $timeUpdated = !empty($result->time_updated) ? $result->time_updated : "Not yet Updated";
        $verificationIcon = (isset($result->payment_status) && $result->payment_status === "pending") ? Config::getIcon("pending") : Config::getIcon("verified");
        $count = $databaseHandler->getCount();
        $fieldIcon = $result->product_image;
        $id = $result->product_id;
        $dateAdded = $result->day_added . " " . $result->date_added;
        $timeAdded = $result->time_added;
        $dateUpdated = !empty($result->date_updated) ? $result->date_updated : "Not yet Updated";
        $timeUpdated = !empty($result->time_updated) ? $result->time_updated : "Not yet Updated";

        $referrer = "Products";
        $items = array(
            "title" => array(
                "Product Name:",
                "Product Category:",
                "Product Sub Category:",
                "Product Market Price:",
                "Product Selling Price:",
                "Puchase Price:",
                "Expected Profit:",
                "Purchase Date:",
                "Balance:",
                "Payment Method:",
                "Transaction Id:",
                "Payment Status:",
                "Supplier Name:",
                "Company:",
                "Product Status:",
                "Last Updated:"
            ),
            "content" => array(
                "Product Name:" => $result->product_name,
                "Product Category:" => $result->category_name,
                "Product Sub Category:" => $result->sub_category_name,
                "Product Market Price:" => $result->market_price . " KSh",
                "Product Selling Price:" => $result->discounted_price . " KSh",
                "Expected Profit:" => ($result->discounted_price - $result->amount_paid) . " KSh",
                "Product Status:" => $result->status,
                "Supplier Name:" => $result->supplier_name,
                "Company:" => $result->company,
                "Purchase Date:" => $result->day_added . ", " . $result->date_added . " " . $result->time_added,
                "Payment Method:" => $result->payment_method,
                "Puchase Price:" => $result->amount_paid . " KSh",
                "Transaction Id:" => $result->transaction_id,
                "Balance:" => $result->balance,
                "Payment Status:" => "<div class='d-flex'>" . $result->payment_status . "<div> <img src='" . $verificationIcon . "' class='img-fluid icon-sm ml-2'> </div> </div>",

                "Last Updated:" => !empty($result->date_updated) && !empty($result->time_updated) ? $result->date_updated . " at " . $result->time_updated : "Not yet Updated"
            )

        );
        break;

    case 'suppliers':
        $field = "supplier_id";
        $path = "uploads/suppliers/";
        $back = Directories::getLocation("accounts/profile/") . "?request=view&reference=suppliers";
        $databaseHandler->runSQL("SELECT
        suppliers.supplier_id,
        suppliers.supplier_name,
        suppliers.company,
        suppliers.date_added,
        suppliers.day_added,
        suppliers.time_added,
        suppliers.profile_image,
        suppliers.phone_number,
        suppliers.suppliers_email,
        suppliers.website
        FROM suppliers 
        WHERE suppliers.supplier_id = ? LIMIT 1", array($identifier), 1);
        $result = $databaseHandler->getOutput();
        $count = $databaseHandler->getCount();
        $fieldIcon = $result->profile_image;
        $id = $result->supplier_id;
        $dateAdded = $result->day_added . ", " . $result->date_added;
        $timeAdded = $result->time_added;
        $dateUpdated = !empty($result->date_updated) ? $result->date_updated : "Not yet Updated";
        $timeUpdated = !empty($result->time_updated) ? $result->time_updated : "Not yet Updated";

        $referrer = "Suppliers";
        $items = array(
            "title" => array(
                "Supplier Name:",
                "Company:",
                "Phone Number:",
                "Email:",
                "Website:",
            ),
            "content" => array(
                "Supplier Name:" => $result->supplier_name,
                "Company:" => $result->company,
                "Phone Number:" => $result->phone_number,
                "Email:" => $result->suppliers_email,
                "Website:" => $result->website,
            )

        );
        break;
    case 'administrators':
        $field = "admin_id";
        $path = "uploads/administrators/";
        $back = Directories::getLocation("accounts/profile/") . "?request=view&reference=administrators";
        $databaseHandler->runSQL("SELECT
       administrators.admin_id,
       administrators.profile_image,
       administrators.last_seen,
       administrators.last_updated,
       administrators.status,
       employees.firstname,
        employees.middlename,
        employees.lastname,
        employees.selected_name,
        employees.date_of_birth,
        employees.gender,
        employees.nationality,
        employees.national_id,
        employees.phone_number,
        employees.current_email,
        employees.marital_status,
        employees.role,
        employees.salary,
        administrators.date_added,
        administrators.day_added,
        administrators.time_added,
        administrators.username
        FROM administrators
        INNER JOIN employees ON 
        employees.employee_id = administrators.employee_id 
        WHERE administrators.admin_id = ? LIMIT 1", array($identifier), 1);
        $result = $databaseHandler->getOutput();
        $count = $databaseHandler->getCount();
        $fieldIcon = $result->profile_image;
        $id = $result->admin_id;
        $dateAdded = $result->day_added . " " . $result->date_added;
        $timeAdded = $result->time_added;
        $dateUpdated = !empty($result->date_updated) ? $result->date_updated : "Not yet Updated";
        $timeUpdated = !empty($result->time_updated) ? $result->time_updated : "Not yet Updated";

        $referrer = "Administrators";
        $selectedName = $result->selected_name;
        $items = array(
            "title" => array(
                "Administrators Fullname:",
                "Username:",
                "Gender:",
                "Date of Birth:",
                "Nationality:",
                "National ID:",
                "Marital Status:",
                "Phone Number:",
                "Email:",
                "Employee Role:",
                "Salary:",
                "Last Seen:",
                "Last Updated:",
                "Status:"
            ),
            "content" => array(
                "Administrators Fullname:" => $result->firstname . " " . $result->$selectedName,
                "Selected name:" => $selectedName,
                "Username:" => $result->username,
                "Gender:" => $result->gender,
                "Date of Birth:" => $result->date_of_birth,
                "Nationality:" => $result->nationality,
                "Marital Status:" => $result->marital_status,
                "National ID:" => $result->national_id,
                "Phone Number:" => $result->phone_number,
                "Email:" => $result->current_email,
                "Last Seen:" => $result->last_seen,
                "Last Updated:" => $result->last_updated,
                "Status:" => $result->status,
                "Employee Role:" => $result->role,
                "Salary:" => $result->salary
            )

        );
        break;

    case 'orders':
        $field = "order_id";
        $back = Directories::getLocation("accounts/profile/") . "?request=view&reference=orders";
        $databaseHandler->runSQL("SELECT
        users.username,
        orders.order_id,
        orders.user_id,
        orders.customer_id,
        customers.customer_name,
        customers.national_id,
        customers.phone_number,
        customers.customer_email,
        customers.residence
        FROM orders
        INNER JOIN customers ON 
        customers.customer_id = orders.customer_id
        INNER JOIN users ON 
        users.user_id = orders.user_id
        WHERE orders.order_id = ? LIMIT 1", array($identifier), 1);
        $result = $databaseHandler->getOutput();
        $count = $databaseHandler->getCount();
        $id = $result->order_id;
        $referrer = "Orders";
        $items = array(
            "title" => array(
                "Customer Name:",
                "User Id:",
                "Customer Id:",
                "Account Username:",
                "National Id:",
                "Phone Number:",
                "Email:",
                "Residence:",
            ),
            "content" => array(
                "Customer Id:" => $result->customer_id,
                "User Id:" => $result->user_id,
                "Customer Name:" => $result->customer_name,
                "Account Username:" => $result->username,
                "National Id:" => $result->national_id,
                "Phone Number:" => $result->phone_number,
                "Email:" => $result->customer_email,
                "Residence:" => $result->residence,
            )

        );
        break;

    case 'customers':
        $field = "customer_id";
        $back = Directories::getLocation("accounts/profile/") . "?request=view&reference=customers";
        $databaseHandler->runSQL("SELECT
        users.username,
        orders.order_id,
        orders.user_id,
        orders.customer_id,
        customers.customer_name,
        customers.national_id,
        customers.phone_number,
        customers.customer_email,
        customers.residence
        FROM orders
        INNER JOIN customers ON 
        customers.customer_id = orders.customer_id
        INNER JOIN users ON 
        users.user_id = orders.user_id
        WHERE orders.order_id = ? LIMIT 1", array($identifier), 1);
        $result = $databaseHandler->getOutput();
        $count = $databaseHandler->getCount();
        $id = $result->customer_id;
        $dateAdded = $result->day_added . " " . $result->date_added;
        $timeAdded = $result->time_added;
        $verificationIcon = (isset($result->payment_status) && $result->payment_status === "pending") ? Config::getIcon("pending") : Config::getIcon("verified");
        $referrer = "Customers";
        $items = array(
            "title" => array(
                "Customer Name:",
                "Customer Id:",
                "Order Id:",
                "Account Username:",
                "National Id:",
                "Phone Number:",
                "Email:",
                "Residence:",
            ),
            "content" => array(
                "Order Id:" => $result->order_id,
                "Customer Id:" => $result->customer_id,
                "Customer Name:" => $result->customer_name,
                "Account Username:" => $result->username,
                "National Id:" => $result->national_id,
                "Phone Number:" => $result->phone_number,
                "Email:" => $result->customer_email,
                "Residence:" => $result->residence,
                "Pickup Station:" => $result->pickup_station,
            )

        );
        break;

    case 'users':
        $field = "user_id";
        $back = Directories::getLocation("accounts/profile/") . "?request=view&reference=users";
        $databaseHandler->runSQL(
            "SELECT users.user_id,
                    users.username,
                    users.firstname,
                    users.lastname,
                    users.user_email,
                    users.phone_number,
                    users.date_added,
                    users.day_added,
                    users.time_added
                FROM users WHERE user_id = ? LIMIT 1",
            array($identifier),
            1,
        );
        $result = $databaseHandler->getOutput();
        $count = $databaseHandler->getCount();
        $id = $result->user_id;
        $dateAdded = $result->day_added . " " . $result->date_added;
        $timeAdded = $result->time_added;
        $name = $result->firstname . " " . $result->lastname;
        $referrer = "Users";
        $items = array(
            "title" => array(
                "Users Fullname:",
                "Username:",
                "Email:",
                "Phone Number:",
                "Date Added:",
                "Time Added:"
            ),
            "content" => array(
                "Users Fullname:" => $name,
                "Username:" => $result->username,
                "Email:" => $result->user_email,
                "Phone Number:" => $result->phone_number,
                "Date Added:" => $dateAdded,
                "Time Added:" => $timeAdded
            )

        );
        break;
}


$titles = $items["title"];
$content = $items["content"];
?>




<div class="container-fluid">
    <div class="mt-5 pt-4">
        <div class="card mt-3 mb-5">
            <div class="card-body mb-5">
                <div class="mt-4">
                    <?php require_once(Directories::getLocation("app/views/admin/includes/header.php")); ?>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-md-4">
                        <div class="d-flex justify-content-center">
                            <div class="mt-2">
                                <img src="<?php echo !empty($fieldIcon) ? Directories::getLocation($path . $fieldIcon) : Config::getIcon($reference) ?>" class="img-fluid icon-lg">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <span class="text-center"><?php echo empty($fieldIcon) ? "No image Uploaded" : null ?></span>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="row">
                            <?php foreach ($titles as $title) { ?>
                                <div class="col-md-4 col-6">
                                    <div class="mt-3">
                                        <span class="text-muted"><?php echo $title ?> </span>
                                    </div>
                                    <div class="">
                                        <span class="text-nowrap"><?php echo $content[$title]; ?></span>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <hr>
                        <?php
                        if ($reference === "users") {
                        ?>

                            <div class="container-fluid">
                                <div class="d-flex justify-content-center">
                                    <h3 class="text-dark-orange">Order Information</h3>
                                </div>
                                <div class="mt-3">

                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item col-6">
                                            <a class="nav-link active" data-toggle="tab" href="#pendingOrders">
                                                <h6 class="text-nowrap">Pending Orders</h6>
                                            </a>
                                        </li>
                                        <li class="nav-item col-6">
                                            <a class="nav-link" data-toggle="tab" href="#verifiedOrders">
                                                <h6 class="text-nowrap">Verified Orders</h6>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content">

                                <div id="pendingOrders" class="container tab-pane active"><br>
                                    <?php
                                    $identity = "pendingOrders";
                                    require(Directories::getLocation("app/views/admin/includes/orderInfo.php")); ?>
                                </div>


                                <div id="verifiedOrders" class="container tab-pane"><br>
                                    <?php
                                    $identity = "verifiedOrders";
                                    require(Directories::getLocation("app/views/admin/includes/orderInfo.php")); ?>
                                </div>

                            </div>
                            <hr>
                        <?php } else { ?>
                            <?php if ($reference === "orders" || $reference === "customers") { ?>

                                <div class="d-flex justify-content-center">
                                    <h3 class="text-dark-orange">Order Information</h3>
                                </div>

                                <?php require(Directories::getLocation("app/views/admin/includes/orderInfo.php")); ?>


                            <?php } else {
                            ?>
                                <div class="mt-3">
                                    <a class="btn btn-dark mr-2 update" href="<?php echo Directories::getLocation("account/pages/") . "?request=update&reference=" . $reference . "&identifier=" . $id ?>">
                                        <img src="<?php echo Directories::getLocation("tools/assets/refresh.png") ?>" class="img-fluid icon-sm">
                                        Update</a>
                                    <a class="btn btn-danger mr-2 delete" name="<?php echo $reference ?>" href="<?php echo $id ?>">
                                        <img src="<?php echo Directories::getLocation("tools/assets/delete.png") ?>" class="img-fluid icon-sm mb-1">
                                        Delete</a>
                                    <?php if ($reference === "employees") { ?>
                                        <a class="btn btn-dark make-administrator" name="<?php echo $reference ?>" href="<?php echo Directories::getLocation("account/pages/") . "?request=add&reference=administrators&identifier=" . $id ?>">
                                            <img src="<?php echo Config::getIcon("administrators") ?>" class="img-fluid icon-sm mb-1">
                                            Make Administrator</a>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        <div class="mt-2">
                            <a class="mr-4" href="<?php ?>">Help</a>
                            <a class="mr-4" href="<?php ?>">Terms and Conditions</a>
                            <a class="mr-4" href="<?php echo $back; ?>"><?php echo $referrer ?> &#x2192;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>