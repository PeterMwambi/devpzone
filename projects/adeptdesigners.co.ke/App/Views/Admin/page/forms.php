<?php
if (Session::exists("IDENTIFIER")) {
    Session::destroy("IDENTIFIER");
}
$identifier = Sanitize::__string(Input::grab("identifier"));
$table = Config::getTable($reference);
$databaseHandler = new DatabaseHandler;

if ($request === "update" || $reference === "administrators") {
    if (!empty($identifier)) {
        switch ($reference) {
            case "products":
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
                $count = $databaseHandler->getCount();
                $fieldIcon = $result->product_image;
                $dateAdded = $result->day_added . ", " . $result->date_added;
                $timeAdded = $result->time_added;
                $id = $result->product_id;
                $dateUpdated = !empty($result->date_updated) ? $result->date_updated : "Not yet Updated";
                $timeUpdated = !empty($result->time_updated) ? $result->time_updated : "Not yet Updated";
                $productDescription = (array)json_decode($result->product_description);
                $values = array(
                    "product name" => $result->product_name,
                    "category name" => $result->category_name,
                    "sub category name" => $result->sub_category_name,
                    "market price" => $result->market_price,
                    "discounted price" => $result->discounted_price,
                    "supplier" => $result->supplier_name,
                    "buying price" => $result->amount_paid,
                    "balance" => $result->balance,
                    "transaction id" => $result->transaction_id,
                    "payment method" => $result->payment_method,
                    "payment status" => $result->payment_status,
                    "product description" => $productDescription["product-description"],
                    "product features" => $productDescription["product-features"]
                );
                break;
            case "category":
                $databaseHandler->runSQL("SELECT * FROM category WHERE category_id = ? LIMIT 1", array($identifier), 1);
                $count = $databaseHandler->getCount();
                $result = $databaseHandler->getOutput();
                $fieldIcon = $result->category_icon;
                $dateAdded = $result->day_added . ", " . $result->date_added;
                $timeAdded = $result->time_added;
                $id = $result->category_id;
                $dateUpdated = !empty($result->date_updated) ? $result->date_updated : "Not yet Updated";
                $timeUpdated = !empty($result->time_updated) ? $result->time_updated : "Not yet Updated";
                $values = array(
                    "icon" => $result->category_icon,
                    "category name" => $result->category_name,
                    "gender" => $result->gender,
                    "description" => $result->category_description
                );
                break;
            case "sub-category":
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
                $dateAdded = $result->day_added . ", " . $result->date_added;
                $timeAdded = $result->time_added;
                $dateUpdated = !empty($result->date_updated) ? $result->date_updated : "Not yet Updated";
                $timeUpdated = !empty($result->time_updated) ? $result->time_updated : "Not yet Updated";
                $id = $result->sub_category_id;
                $values = array(
                    "sub category name" => $result->sub_category_name,
                    "category name" => $result->category_name,
                    "description" => $result->sub_category_description
                );
                break;
            case "profile":
                $reference = "administrator";
                $field = "username";
                $queryItems = array($field, "=", strtolower(Sanitize::__string(Session::getValue("username"))));
                break;
            case "employees":
                $reference = "employees";
                $field = "username";
                $queryItems = array($field, "=", strtolower(Sanitize::__string(Session::getValue("username"))));
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
                employees.residence,
                employees.city,
                employees.county,
                employees.salary,
                employees.date_added,
                employees.day_added,
                employees.time_added,
                employee_account.username,
                employee_account.profile_image,
                employee_account.bank_account_no,
                employee_account.bank,
                employee_account.salary_paid,
                employee_account.payment_method,
                employee_account.postal_address,
                employee_account.work_email,
                employee_account.status,
                employee_account.profile_image,
                employee_account.last_seen
                FROM employees INNER JOIN
                employee_account ON
                employee_account.employee_id = employees.employee_id
                WHERE employees.employee_id = ? LIMIT 1", array($identifier), 1);
                $result = $databaseHandler->getOutput();
                $count = $databaseHandler->getCount();
                $fieldIcon = $result->profile_image;
                $dateAdded = $result->day_added . ", " . $result->date_added;
                $timeAdded = $result->time_added;
                $dateUpdated = !empty($result->date_updated) ? $result->date_updated : "Not yet Updated";
                $timeUpdated = !empty($result->time_updated) ? $result->time_updated : "Not yet Updated";
                $id = $result->employee_id;
                $values = array(
                    "firstname" => $result->firstname,
                    "middlename" => $result->middlename,
                    "lastname" => $result->lastname,
                    "username" => $result->username,
                    "role" => $result->role,
                    "salary" => $result->salary,
                    "gender" => $result->gender,
                    "date of birth" => $result->date_of_birth,
                    "nationality" => $result->nationality,
                    "national id" => $result->national_id,
                    "marital status" => $result->marital_status,
                    "residence" => $result->residence,
                    "county" => $result->county,
                    "city" => $result->city,
                    "email" => $result->current_email,
                    "phone number" => $result->phone_number,
                    "bank account no" => $result->bank_account_no,
                    "bank" => $result->bank,
                    "salary paid" => $result->salary_paid,
                    "payment method" => $result->payment_method,
                    "postal address" => $result->postal_address
                );
                break;
            case "suppliers":
                $databaseHandler->runSQL("SELECT
                suppliers.supplier_id,
                suppliers.supplier_name,
                suppliers.date_added,
                suppliers.day_added,
                suppliers.time_added,
                suppliers.company,
                suppliers.profile_image,
                suppliers.phone_number,
                suppliers.suppliers_email,
                suppliers.website
                FROM suppliers 
                WHERE suppliers.supplier_id = ? LIMIT 1", array($identifier), 1);
                $result = $databaseHandler->getOutput();
                $count = $databaseHandler->getCount();
                $fieldIcon = $result->profile_image;
                $dateAdded = $result->day_added . ", " . $result->date_added;
                $timeAdded = $result->time_added;
                $dateUpdated = !empty($result->date_updated) ? $result->date_updated : "Not yet Updated";
                $timeUpdated = !empty($result->time_updated) ? $result->time_updated : "Not yet Updated";
                $id = $result->supplier_id;
                $values = array(
                    "supplier name" => $result->supplier_name,
                    "company" => $result->company,
                    "suppliers email" => $result->suppliers_email,
                    "phone number" => $result->phone_number,
                    "website" => $result->website
                );
                break;
            case "administrators":
                if ($request === "add") {
                    $databaseHandler->runSQL("SELECT
                employees.employee_id,
                employee_account.profile_image,
                employee_account.username
                FROM employees INNER JOIN 
                employee_account ON employee_account.employee_id = employees.employee_id 
                WHERE employees.employee_id = ? LIMIT 1", array($identifier), 1);
                    $result = $databaseHandler->getOutput();
                    $count = $databaseHandler->getCount();
                    $fieldIcon = $result->profile_image;
                    $values = array(
                        "username" => $result->username,
                        "employee id" => $result->employee_id
                    );
                } else {
                    if ($request === "update") {
                        $databaseHandler->runSQL("SELECT
                administrators.admin_id,
                administrators.profile_image,
                administrators.username,
                administrators.employee_id
                FROM administrators 
                WHERE administrators.admin_id = ? LIMIT 1", array($identifier), 1);
                        $result = $databaseHandler->getOutput();
                        $count = $databaseHandler->getCount();
                        $fieldIcon = $result->profile_image;
                        $values = array(
                            "username" => $result->username,
                            "employee id" => $result->employee_id
                        );
                    }
                }
                break;
            case 'orders':
                $databaseHandler->runSQL("SELECT
                users.username,
                orders.order_id,
                orders.customer_id,
                orders.date_added,
                orders.day_added,
                orders.time_added,
                order_details.order_details,
                order_details.pickup_station,
                order_details.payment_status,
                order_details.payment_method,
                order_details.amount_due,
                order_details.amount_paid,
                order_details.balance,
                order_details.date_paid,
                order_details.day_paid,
                order_details.time_paid,
                order_details.transaction_id,
                customers.customer_name,
                customers.national_id,
                customers.phone_number,
                customers.customer_email,
                customers.residence
                FROM orders
                INNER JOIN customers ON 
                customers.customer_id = orders.customer_id
                INNER JOIN order_details ON
                order_details.order_id = orders.order_id
                INNER JOIN users ON 
                users.user_id = orders.user_id
                WHERE orders.order_id = ? LIMIT 1", array($identifier), 1);
                $result = $databaseHandler->getOutput();
                $count = $databaseHandler->getCount();
                $id = $result->order_id;
                $dateAdded = $result->day_added . " " . $result->date_added;
                $timeAdded = $result->time_added;
                $icon = (isset($result->payment_status) && $result->payment_status === "pending") ? Config::getIcon("pending") : Config::getIcon("verified");
                $referrer = "Orders";
                $items = array(
                    "title" => array(
                        "Order Id:",
                        "Customer Id:",
                        "Customer Name:",
                        "Account Username:",
                        "National Id:",
                        "Phone Number:",
                        "Email:",
                        "Residence:",
                        "Pickup Station:",
                        "Payment Status:",
                        "Payment Method:",
                        "Date Added:",
                        "Time Added:",
                        "Date Paid:",
                        "Time Paid:"
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
                        "Payment Status:" => "<div class='d-flex'>" . $result->payment_status . "<div> <img src='" . $icon . "' class='img-fluid icon-sm ml-2'> </div> </div>",
                        "Payment Method:" => $result->payment_method,
                        "Date Added:" => $dateAdded,
                        "Time Added:" => $timeAdded,
                        "Date Paid:" => $result->day_paid . ", " . $result->date_paid,
                        "Time Paid:" => $result->time_paid,
                    )

                );
                $titles = $items["title"];
                $content = $items["content"];
                break;

            case 'customers':
                $databaseHandler->runSQL("SELECT
                users.username,
                orders.order_id,
                orders.customer_id,
                orders.date_added,
                orders.day_added,
                orders.time_added,
                order_details.order_details,
                order_details.pickup_station,
                order_details.payment_status,
                order_details.payment_method,
                order_details.amount_due,
                order_details.amount_paid,
                order_details.balance,
                order_details.date_paid,
                order_details.day_paid,
                order_details.time_paid,
                order_details.transaction_id,
                customers.customer_name,
                customers.national_id,
                customers.phone_number,
                customers.customer_email,
                customers.residence
                FROM orders
                INNER JOIN customers ON 
                customers.customer_id = orders.customer_id
                INNER JOIN order_details ON
                order_details.order_id = orders.order_id
                INNER JOIN users ON 
                users.user_id = orders.user_id
                WHERE customers.customer_id = ? LIMIT 1", array($identifier), 1);
                $result = $databaseHandler->getOutput();
                $count = $databaseHandler->getCount();
                $id = $result->order_id;
                $dateAdded = $result->day_added . " " . $result->date_added;
                $timeAdded = $result->time_added;
                $icon = (isset($result->payment_status) && $result->payment_status === "pending") ? Config::getIcon("pending") : Config::getIcon("verified");
                $referrer = "Orders";
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
                        "Pickup Station:",
                        "Payment Status:",
                        "Payment Method:",
                        "Date Added:",
                        "Time Added:",
                        "Date Paid:",
                        "Time Paid:"
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
                        "Payment Status:" => "<div class='d-flex'>" . $result->payment_status . "<div> <img src='" . $icon . "' class='img-fluid icon-sm ml-2'> </div> </div>",
                        "Payment Method:" => $result->payment_method,
                        "Date Added:" => $dateAdded,
                        "Time Added:" => $timeAdded,
                        "Date Paid:" => $result->day_paid . ", " . $result->date_paid,
                        "Time Paid:" => $result->time_paid,
                    )

                );
                $titles = $items["title"];
                $content = $items["content"];
                break;
        }
    }
    trigger_error("Invalid Identifier or Identifier not exist");
}

?>

<div class="mt-4 pt-5">
    <?php if ($request === "add") { ?>
        <div class="alert alert-warning alert-dismissible fade-show mt-n5 mb-0">
            <div class="d-flex justify-content-center">
                <span class="pt-5">Ensure that you fill all required fields to avoid conflicts when querying results</span>
            </div>
            <button type="button" class="close mt-5" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <div class="container-fluid">
        <?php require_once(Directories::getLocation("app/views/admin/includes/header.php")) ?>
        <?php if ($request === "update" && empty($identifier)) { ?>
            <h3 class="display-4 text-center text-danger mt-5 pt-3">No Records Were found</h3>
            <div class="d-flex justify-content-center">
                <a href="javascript:void(0) text-center">contact administrator</a>
            </div>
        <?php
            exit;
        } ?>
        <?php ?>
        <div class="row mb-5">
            <?php
            $forms = Config::getForm($reference, "orderInformation");
            if (!empty($forms)) {
                $title = $forms["title"][$request];
                $step = $forms["step"];
            ?>
                <div class="col-md-6">
                    <div class="card mt-lg-3 w-100 mt-3">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-center">
                                <div class="d-block">
                                    <div class="d-flex justify-content-center">
                                        <span>Step</span>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <h3 class="text-muted"><?php echo $step ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <h4 class="text-dark mt-3"><?php echo $title  ?></h4>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-center mt-3">
                                    <h3 class="text-center text-dark-orange">Items</h3>
                                </div>
                                <div class="row">
                                    <?php
                                    $orderDetails = json_decode($result->order_details);
                                    $totalItems = count($orderDetails);
                                    foreach ($orderDetails as $detail) {
                                        $databaseHandler->runSQL(
                                            "SELECT 
                                                            product_details.product_image, 
                                                            products.product_name,
                                                            product_details.discounted_price
                                                            FROM products
                                                            INNER JOIN product_details ON
                                                            product_details.product_id = products.product_id WHERE products.product_id = ? LIMIT 1",
                                            array($detail->id),
                                            1
                                        );
                                        $item = $databaseHandler->getOutput();
                                    ?>
                                        <div class="col-md-4 col-6">
                                            <div class="card shadow-sm card-uniform-height mt-3">
                                                <div>
                                                    <img src="<?php echo Directories::getLocation("uploads/products/" . $item->product_image) ?>" class="img-fluid icon-uniform-height">
                                                </div>
                                                <div class="card-body p-2 p-md-3">
                                                    <div class="position-absolute">
                                                        <h6 class="text-muted pb-3"><?php echo $detail->name; ?></h6>
                                                    </div>

                                                    <div class="d-flex justify-content-start mt-5">
                                                        Quantity: <?php echo $detail->quantity; ?>
                                                    </div>
                                                    <div class="d-flex justify-content-start">
                                                        <span class="text-nowrap text-dark-orange mt-md-3 mt-3">Price: <b><?php echo number_format($detail->total_price); ?> Ksh </b></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>
                                </div>
                                <hr>
                                <div class="row justify-content-md-end">
                                    <div class="col-4 col-md-3 mt-2 border-right">
                                        <div class="mr-3">
                                            <h6 class="text-muted text-nowrap">Total Items:</h6>
                                            <h6 class="text-dark-orange text-nowrap"><?php echo $totalItems ?></h6>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-3 mt-2 border-right">
                                        <div class="mr-3">
                                            <h6 class="text-muted text-nowrap">Total Price:</h6>
                                            <h6 class="text-dark-orange text-nowrap"><?php echo $result->amount_due ?> KSh</h6>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-3 mt-2 border-right">
                                        <div class="mr-3">
                                            <h6 class="text-muted text-nowrap">Total Paid:</h6>
                                            <h6 class="text-dark-orange text-nowrap"><?php echo $result->amount_paid ?> KSh</h6>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-3 mt-2 border-right">
                                        <div class="mr-3">
                                            <h6 class="text-muted">Balance:</h6>
                                            <h6 class="text-dark-orange text-nowrap"><?php echo $result->balance ?> KSh</h6>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <?php foreach ($titles as $title) { ?>
                                        <div class="col-md-4 col-6">
                                            <div class="mt-3">
                                                <span class="text-muted text-nowrap"><?php echo $title ?> </span>
                                            </div>
                                            <div class="">
                                                <span class="text-nowrap"><?php echo $content[$title]; ?></span>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php
            $forms = Config::getForm($reference, "firstCardItems");
            if (!empty($forms)) {
                $title = $forms["title"][$request];
                $step = $forms["step"];
            ?>
                <div class="col-md-6">
                    <div class="card mt-lg-3 w-100 mt-3">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-center">
                                <div class="d-block">
                                    <div class="d-flex justify-content-center">
                                        <span>Step</span>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <h3 class="text-muted"><?php echo $step ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <h4 class="text-dark mt-3"><?php echo $title  ?></h4>
                            </div>
                            <div class="mt-lg-3">
                                <?php require(Directories::getLocation("app/views/admin/includes/forms.php")) ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php
            $forms = Config::getForm($reference, "secondCardItems");
            if (!empty($forms)) {
                $title = $forms["title"][$request];
                $step = $forms["step"];

                if ($reference === "products") {
                    $reference = "purchases";
                }

            ?>
                <div class="col-md-6">
                    <div class="card mt-lg-3 w-100 mt-3 mt-lg-0">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-center">
                                <div class="d-block">
                                    <div class="d-flex justify-content-center">
                                        <span>Step</span>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <h3 class="text-muted"><?php echo $step ?></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <h4 class="text-dark mt-3"><?php echo $title  ?></h4>
                            </div>
                            <div class="mt-lg-3">
                                <?php require(Directories::getLocation("app/views/admin/includes/forms.php")) ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php
            if ($reference === "purchases") {
                $reference = "products";
            }
            $forms = Config::getForm($reference, "thirdCardItems");
            if (!empty($forms)) {
                $step = $forms["step"];
                $title = $forms["title"][$request];

            ?>
                <div class="col-md-6">
                    <div class="card mt-lg-3 w-100 mt-3 mt-lg-0">
                        <div class="card-body p-4">
                            <div class="d-block">
                                <div class="d-flex justify-content-center">
                                    <span>Step</span>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <h3 class="text-muted"><?php echo $step ?></h3>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <h4 class="text-dark mt-3"><?php echo $title  ?></h4>
                            </div>
                            <div class="mt-lg-3">
                                <?php require(Directories::getLocation("app/views/admin/includes/forms.php")) ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php
            $forms = Config::getForm($reference, "uploadForm");
            if (!empty($forms)) {
                $step = $forms["step"];
                $title = $forms["title"][$request];
            ?>
                <div class="col-md-6">
                    <div class="card mt-lg-3 mb-lg-1 w-100">
                        <div class="card-body p-4">
                            <div class="d-block">
                                <div class="d-flex justify-content-center">
                                    <span>Step</span>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <h3 class="text-muted"><?php echo $step ?></h3>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <h4 class="text-center mt-3"><?php echo $title; ?></h4>
                            </div>
                            <div class="mt-3">
                                <?php
                                if ($forms["fields"]["form"] === "upload-form") {
                                    require(Directories::getLocation("app/views/admin/includes/upload.php"));
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(window).bind('beforeunload', function() {
            return 'Are you sure you want to leave?';
        });
    })
</script>