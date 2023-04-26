<?php
$databaseHandler = new DatabaseHandler;

switch ($reference) {
    case "products":
        $databaseHandler->runSQL("SELECT category.category_name,
                                        sub_category.sub_category_name,
                                        products.product_name,
                                        product_details.product_image,
                                        product_details.discounted_price,
                                        product_details.status,
                                        products.product_id
                         FROM products 
                        INNER JOIN product_details ON
                        product_details.product_id = products.product_id
                        INNER JOIN category ON
                        category.category_id = products.category_id
                        INNER JOIN sub_category ON
                        sub_category.sub_category_id = products.sub_category_id
                        ", array(), 0);
        $results = $databaseHandler->getOutput();
        $count = $databaseHandler->getCount();
        break;
    case "category":
        $databaseHandler->runSQL("SELECT * FROM category", array(), 0);
        $results = $databaseHandler->getOutput();
        $count = $databaseHandler->getCount();
        break;
    case "sub-category":
        $databaseHandler->runSQL("SELECT 
        sub_category.sub_category_name,
        sub_category.sub_category_icon,
        sub_category.sub_category_id,
        category.category_name,
        sub_category.date_added,
        sub_category.day_added,
        sub_category.time_added,
        sub_category.date_updated,
        sub_category.time_updated
         FROM sub_category INNER JOIN 
         category ON category.category_id = sub_category.category_id", array(), 0);
        $results = $databaseHandler->getOutput();
        $count = $databaseHandler->getCount();
        break;
    case "suppliers":
        $databaseHandler->runSQL("SELECT * FROM suppliers", array(), 0);
        $results = $databaseHandler->getOutput();
        $count = $databaseHandler->getCount();
        break;
    case "administrators":
        $databaseHandler->runSQL("SELECT administrators.admin_id,
         administrators.username, 
         administrators.profile_image,
         administrators.status,
         employees.firstname,
         employees.middlename,
         employees.lastname,
         employees.selected_name,
         employees.role, 
         administrators.last_seen
         FROM administrators
        INNER JOIN employees ON
        employees.employee_id = administrators.employee_id  
        ", array(), 0);
        $results = $databaseHandler->getOutput();
        $count = $databaseHandler->getCount();
        break;
    case "employees":
        $databaseHandler->runSQL("SELECT employees.firstname,
                                        employees.employee_id,
                                        employees.middlename,
                                        employees.lastname,
                                        employees.selected_name,
                                        employees.gender,
                                        employees.current_email,
                                        employees.phone_number,
                                        employee_account.profile_image,
                                        employee_account.date_activated,
                                        employee_account.last_seen                            
                                 FROM employees INNER JOIN employee_account ON
                                  employee_account.employee_id = employees.employee_id", array(), 0);
        $results = $databaseHandler->getOutput();
        $count = $databaseHandler->getCount();
        break;
    case 'orders':
        $databaseHandler->runSQL(
            "SELECT 
                    orders.user_id,
                    users.user_id,
                    orders.customer_id,
                    orders.order_id,
                    orders.date_added,
                    orders.day_added,
                    orders.time_added,
                    customers.customer_name,
                    order_details.payment_status,
                    order_details.payment_method,
                    order_details.amount_due,
                    order_details.amount_paid,
                    order_details.transaction_id
                FROM orders 
                INNER JOIN customers ON 
                customers.customer_id = orders.customer_id
                 INNER JOIN users ON 
                users.user_id = orders.user_id
                INNER JOIN order_details
                ON order_details.order_id = orders.order_id WHERE order_details.payment_status = ?",
            array("pending"),
            0,
        );
        $results = $databaseHandler->getOutput();
        $count = count($results);
        break;

    case 'users':
        $databaseHandler->runSQL(
            "SELECT 
                    users.user_id,
                    users.username,
                    users.firstname,
                    users.lastname,
                    users.user_email,
                    users.phone_number,
                    users.date_added,
                    users.day_added,
                    users.time_added
                FROM users",
            array(),
            0,
        );
        $results = $databaseHandler->getOutput();
        $count = $databaseHandler->getCount();
        break;

    case 'customers':
        $databaseHandler->runSQL(
            "SELECT 
                    orders.user_id,
                    orders.customer_id,
                    orders.order_id,
                    orders.date_added,
                    orders.day_added,
                    orders.time_added,
                    customers.customer_name,
                    customers.user_id,
                    customers.customer_id,
                    customers.customer_name,
                    customers.national_id,
                    customers.phone_number,
                    customers.customer_email,
                    customers.residence,
                    order_details.payment_status,
                    order_details.payment_method,
                    order_details.amount_due,
                    order_details.amount_paid,
                    order_details.transaction_id
                FROM orders 
                INNER JOIN customers ON 
                customers.customer_id = orders.customer_id
                 INNER JOIN users ON 
                users.user_id = orders.user_id
                INNER JOIN order_details
                ON order_details.order_id = orders.order_id WHERE order_details.payment_status = ?",
            array("pending"),
            0,
        );
        $results = $databaseHandler->getOutput();
        $count = $databaseHandler->getCount();
        break;
}
?>

<div class="container-fluid">
    <div class="mt-5 pt-4">
        <?php require_once(Directories::getLocation("app/views/admin/includes/header.php")); ?>
        <div class="row mb-5">

            <?php
            $x = 1;
            foreach ($results as $result) {
                switch ($reference) {
                    case "category":
                        $id = $result->category_id;
                        $name = $result->category_name;
                        $fieldIcon = $result->category_icon;
                        $icon = Directories::getLocation("uploads/category/" . $fieldIcon);
                        $items = array(
                            "columns" => array(
                                "Name",
                                "Gender",
                                "Date Added",
                                "Update status",
                            ),
                            "rows" => array(
                                "Name" => $result->category_name,
                                "Gender" => $result->gender,
                                "Date Added" => $result->date_added . " at " . $result->time_added,
                                "Update status" => !empty($result->date_updated) ? $result->date_updated . " at " . $result->time_updated : "Not yet Updated",
                            )
                        );
                        break;
                    case "sub-category":
                        $id = $result->sub_category_id;
                        $name = $result->sub_category_name;
                        $fieldIcon = $result->sub_category_icon;
                        $icon = Directories::getLocation("uploads/sub-category/" . $fieldIcon);
                        $databaseHandler->runSQL("SELECT category_name FROM category WHERE category_id = ? LIMIT 1", array($result->category_id), 1);
                        $category = $databaseHandler->getOutput();
                        $items = array(
                            "columns" => array(
                                "Name",
                                "Date Added",
                                "Category",
                                "Update status",
                            ),
                            "rows" => array(
                                "Name" => $result->sub_category_name,
                                "Category" => $result->category_name,
                                "Date Added" => $result->date_added . " at " . $result->time_added,
                                "Update status" => !empty($result->date_updated) ? $result->date_updated . " at " . $result->time_updated : "Not yet Updated",
                            )
                        );
                        break;
                    case "products":
                        $id = $result->product_id;
                        $name = $result->product_name;
                        $fieldIcon = $result->product_image;
                        $icon = Directories::getLocation("uploads/products/" . $fieldIcon);
                        $items = array(
                            "columns" => array(
                                "Name",
                                "Category",
                                "Sub Category",
                                "Price",
                                "Status"
                            ),
                            "rows" => array(
                                "Name" => $name,
                                "Category" => $result->category_name,
                                "Sub Category" => $result->sub_category_name,
                                "Price" => $result->discounted_price . " KSh",
                                "Status" => $result->status,
                                "Date Added" => $result->date_added . " at " . $result->time_added,
                            )
                        );
                        break;
                    case "orders":
                        $id = $result->order_id;
                        $name = $result->customer_name;
                        $icon = (isset(
                            $result->payment_status
                        ) && $result->payment_status === "pending") ? Config::getIcon("pending") : Config::getIcon("verified");

                        $items = array(
                            "columns" => array(
                                "Name",
                                "Order Id",
                                "Amount Due",
                                "Amount Paid",
                                "Payment Status",
                                "Date Added"
                            ),
                            "rows" => array(
                                "Name" => $name,
                                "Order Id" => $id,
                                "Amount Due" => $result->amount_due,
                                "Amount Paid" => $result->amount_paid,
                                "Payment Status" => "<div class='d-flex'>" . $result->payment_status . "<div> <img src='" . $icon . "' class='img-fluid icon-sm ml-2'> </div> </div>",
                                "Date Added" => $result->date_added . " at " . $result->time_added,
                            )
                        );
                        break;
                    case "suppliers":
                        $name = $result->supplier_name;
                        $id = $result->supplier_id;
                        $fieldIcon = $result->profile_image;
                        $icon = Directories::getLocation("uploads/suppliers/" . $fieldIcon);
                        $items = array(
                            "columns" => array(
                                "Name",
                                "Company",
                                "Phone Number",
                                "Email",
                                "Website",
                            ),
                            "rows" => array(
                                "Name" => $result->supplier_name,
                                "Company" => $result->company,
                                "Phone Number" => $result->phone_number,
                                "Email" => $result->suppliers_email,
                                "Website" => $result->website,
                            )
                        );
                        break;
                    case "administrators":
                        $selectedName = $result->selected_name;
                        $name = $result->firstname . " " . $result->$selectedName;
                        $id = $result->admin_id;
                        $fieldIcon = $result->profile_image;
                        $icon = Directories::getLocation("uploads/administrators/" . $fieldIcon);
                        $items = array(
                            "columns" => array(
                                "Fullname",
                                "Username",
                                "Role",
                                "Last Seen",
                                "Status",
                            ),
                            "rows" => array(
                                "Fullname" => $name,
                                "Username" => $result->username,
                                "Last Seen" => $result->last_seen,
                                "Status" => $result->status,
                                "Role" => $result->role
                            )
                        );
                        break;
                    case "employees":
                        $id = $result->employee_id;
                        $selectedName = $result->selected_name;
                        $name = $result->firstname . " " . $result->$selectedName;
                        $fieldIcon = $result->profile_image;
                        $icon = Directories::getLocation("uploads/employees/" . $fieldIcon);
                        $items = array(
                            "columns" => array(
                                "Name",
                                "Employee Id",
                                "Email",
                                "Phone Number",
                                "Last Seen",
                                "Account Activation",
                            ),
                            "rows" => array(
                                "Name" => $name,
                                "Employee Id" => $id,
                                "Phone Number" => $result->phone_number,
                                "Email" => $result->current_email,
                                "Last Seen" => $result->last_seen,
                                "Account Activation" => $result->date_activated,
                            )
                        );
                        break;

                    case "users":
                        $id = $result->user_id;
                        $name = $result->firstname . " " . $result->lastname;
                        $fieldIcon = $result->profile_image;
                        $icon = Directories::getLocation("uploads/users/" . $fieldIcon);
                        $items = array(
                            "columns" => array(
                                "Name",
                                "User Id",
                                "Email",
                                "Phone Number",
                                "Date Added"

                            ),
                            "rows" => array(
                                "Name" => $name,
                                "User Id" => $id,
                                "Phone Number" => $result->phone_number,
                                "Email" => $result->user_email,
                                "Date Added" => $result->date_added . " at " . $result->time_added,
                            )
                        );
                        break;

                    case "customers":
                        $id = $result->order_id;
                        $name = $result->customer_name;
                        $items = array(
                            "columns" => array(
                                "Name",
                                "Customer Id",
                                "National Id",
                                "Phone Number",
                                "Email",
                                "Residence",
                            ),
                            "rows" => array(
                                "Name" => $name,
                                "Customer Id" =>  $result->customer_id,
                                "National Id" => $result->national_id,
                                "Phone Number" => $result->phone_number,
                                "Email" => $result->customer_email,
                                "Residence" => $result->residence
                            )
                        );
                        break;
                }


                $loadedIcon = !empty($fieldIcon) ? $icon : Config::getIcon($reference);

            ?>
                <div class="col-md-4">
                    <div class="card shadow mt-3">
                        <div class="card-body">
                            <div class="mt-3 mb-2">
                                <h5><span class="text-muted"><?php echo $x . ". "; ?></span><?php echo $name ?></h5>
                            </div>
                            <div class="row">
                                <div class="col-3 col-md-3">
                                    <div class="d-flex justify-content-center mt-3">
                                        <img src="<?php echo $loadedIcon   ?>" class="img-fluid icon-md">
                                    </div>
                                    <?php if (empty($fieldIcon)) { ?>
                                        <div class="d-flex justify-content-center">
                                            <small>No image</small>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="col-9 col-md-9">
                                    <?php foreach ($items["columns"] as $item) { ?>
                                        <div class="mt-3 d-flex">
                                            <div>
                                                <span class="text-nowrap text-muted"><?php echo $item ?>:</span>
                                            </div>
                                            <div class="ml-1">
                                                <span class="text-nowrap"><?php echo (array_key_exists($item, $items["rows"])) ?  $items["rows"][$item] : "" ?></span>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    $links = array(
                                        "name" => array("View", "Update", "Delete"),
                                        "icon" => array(
                                            "View" => Config::getIcon("open-folder"),
                                            "Update" => Config::getIcon("update"),
                                            "Delete" => Config::getIcon("delete")
                                        ),
                                        "href" => array(
                                            "View" => "?request=item&reference=" . $reference . "&identifier=" . $id,
                                            "Update" => "?request=update&reference=" . $reference . "&identifier=" . $id,
                                            "Delete" => $id
                                        ),
                                        "button" => array(
                                            "View" => "btn btn-sm btn-outline-dark",
                                            "Update" => "btn btn-sm btn-outline-dark",
                                            "Delete" => "btn btn-sm btn-outline-danger delete"
                                        )
                                    );
                                    $linkNames = $links["name"];
                                    $button = $links["button"];
                                    $icons = $links["icon"];
                                    $href = $links["href"];
                                    ?>
                                    <div class="row mt-3">
                                        <?php foreach ($linkNames as $name) { ?>
                                            <div class="col-4">
                                                <div>
                                                    <a name="<?php echo $reference ?>" title="Click to delete <?php echo  $reference ?> information" class="<?php echo $button[$name] ?> action-btn view-hover" href="<?php

                                                                                                                                                                                                                        if (($reference === "customers" || $reference === "orders") && $name === "Update") {
                                                                                                                                                                                                                            echo "javascript:void(0)";
                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                            echo $href[$name];
                                                                                                                                                                                                                        }

                                                                                                                                                                                                                        ?>">
                                                        <div class="d-flex">
                                                            <div>
                                                                <img src="<?php echo $icons[$name]; ?>" class="img-fluid icon-xs mb-lg-1">
                                                            </div>
                                                            <div class="ml-1">
                                                                <?php echo $name ?>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php  } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php $x++;
            } ?>
        </div>
    </div>
</div>