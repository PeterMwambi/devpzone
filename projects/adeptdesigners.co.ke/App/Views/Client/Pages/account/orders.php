<?php

$databaseHandler = new DatabaseHandler;

$databaseHandler->runSQL("SELECT user_id, firstname FROM users WHERE username = ? LIMIT 1", array(Session::getValue("client-username")), 1);


$userId = $databaseHandler->getOutput()->user_id;
$firstname = $databaseHandler->getOutput()->firstname;

?>

<div class="body-overlay">
    <div class="container">
        <div class="d-flex justify-content-center mt-5">
            <h3 class="text-center mt-5 text-dark-orange">My Orders</h3>
        </div>

        <div class="mt-3">

            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item col-6">
                    <a class="nav-link active" data-toggle="tab" href="#pendingOrders">
                        <h6 class="text-nowrap">Pending Orders</h6>
                    </a>
                </li>
                <li class="nav-item col-6">
                    <a class="nav-link" data-toggle="tab" href="#menu1">
                        <h6 class="text-nowrap">Complete Orders</h6>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container-fluid p-0">
        <!-- Tab panes -->
        <div class="tab-content">
            <div id="pendingOrders" class="container tab-pane active"><br>
                <?php
                $databaseHandler->runSQL(
                    "SELECT 
                    orders.customer_id,
                    orders.order_id,
                    orders.date_added,
                    orders.day_added,
                    orders.time_added,
                    customers.customer_name,
                    customers.national_id,
                    customers.phone_number,
                    customers.customer_email,
                    customers.residence,
                    order_details.order_details,
                    order_details.pickup_station,
                    order_details.payment_status,
                    order_details.payment_method,
                    order_details.amount_due,
                    order_details.amount_paid,
                    order_details.balance,
                    order_details.transaction_id
                FROM customers 
                INNER JOIN orders ON 
                orders.user_id = customers.user_id
                INNER JOIN order_details
                ON order_details.order_id = orders.order_id
                WHERE customers.user_id = ? AND order_details.payment_status = ?",
                    array(
                        Sanitize::__string($userId),
                        "pending"
                    ),
                    0,
                    PDO::FETCH_UNIQUE
                );
                if (!$databaseHandler->getCount()) { ?>
                    <div class="d-flex justify-content-center mt-3">
                        <h3 class="text-center text-dark-orange">Oops!</h3>
                    </div>
                    <div class="d-flex justify-content-center">
                        <h6 class="text-center col-md-6">Hi, <?php echo $firstname ?> you have no pending orders.
                            Make your first order today and receive a 50% off discount
                            on all items that you select</h6>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a class="btn link-hover btn-outline-warning d-flex mt-3" href="../?request=products">
                            <div>
                                <span class="text-dark">Start Shopping</span>
                            </div>
                            <div>
                                <img class="img-fluid icon-sm" src="<?php echo Config::getIcon("shopping-cart") ?>">
                            </div>
                        </a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <p class="text-center col-12 mt-3 mb-4">Receive great discounts on fashion items while enjoying the best of fashion variety<br />
                            Adept Designers cares for you</p>
                    </div>
                <?php } else {
                    $results = $databaseHandler->getOutput();
                    $count = count($results);
                ?>
                    <div class="d-flex justify-content-end mb-2">
                        <span>You have <?php echo $count; ?> pending <?php if ($count === 1) {
                                                                            echo "order";
                                                                        } else {
                                                                            echo "orders";
                                                                        } ?></span>
                    </div>

                    <div class="d-flex justify-content-end mb-3">
                        <div>
                            <a class="ml-1" href="<?php echo "../?request=products" ?>">Continue Shopping</a>
                        </div>
                        <div class="ml-2">
                            <img src="<?php echo Config::getIcon("shopping-cart") ?>" class="img-fluid icon-sm-uniform">
                        </div>
                    </div>

                    <div class="row">
                        <?php foreach ($results as $result) { ?>
                            <div class="col-12">
                                <div class="card mb-5">
                                    <div class="card-body p-2 p-md-3">
                                        <div class="d-flex justify-content-center">
                                            <h5 class="text-center text-dark-orange mt-2 mb-3">My Items</h5>
                                        </div>
                                        <div class="row">
                                            <?php
                                            $orderDetails = json_decode($result->order_details);
                                            $icon = (isset($result->payment_status) && $result->payment_status === "verified") ? Config::getIcon("verified") : Config::getIcon("pending");

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
                                                <div class="col-md-3 col-6">
                                                    <a href="<?php echo "../?request=viewItem&identifier=" . $detail->id ?>">
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
                                                    </a>
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
                                        <div class="d-flex justify-content-md-center">
                                            <h5 class="text-md-center text-dark-orange mt-2 mb-3">Order Details</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-flex justify-content-lg-end">
                                                    <span class="text-muted text-nowrap">Date Added: </span>&nbsp;<span class="text-nowrap"><?php echo $result->day_added . ", " . $result->date_added . " at " . $result->time_added  ?></span>
                                                </div>
                                                <div class="mt-2 mt-lg-n4">
                                                    <span class="text-muted">Order Id:</span> <?php echo $result->order_id ?>
                                                </div>
                                                <div class="mt-2">
                                                    <span class="text-muted">Name:</span> <?php echo $result->customer_name ?>
                                                </div>
                                                <div class="mt-2">
                                                    <span class="text-muted">National Id Number:</span> <?php echo $result->national_id ?>
                                                </div>
                                                <div class="mt-2">
                                                    <span class="text-muted">Phone Number:</span> <?php echo $result->phone_number ?>
                                                </div>
                                                <div class="mt-2">
                                                    <span class="text-muted">Email:</span> <?php echo $result->customer_email ?>
                                                </div>
                                                <div class="mt-2">
                                                    <span class="text-muted">Residence:</span> <?php echo $result->residence ?>
                                                </div>
                                                <div class="mt-2">
                                                    <span class="text-muted">Pickup Station:</span> <?php echo $result->pickup_station ?>
                                                </div>
                                                <div class="mt-2 d-flex">
                                                    <div>
                                                        <span class="text-muted">Payment Status:</span>
                                                    </div>
                                                    <div class="ml-1 mr-1">
                                                        <?php echo $result->payment_status ?>
                                                    </div>
                                                    <div>
                                                        <img src="<?php echo $icon ?>" class="img-fluid icon-sm">
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="d-flex justify-md-content-end">
                                                    <div class="mt-2">
                                                        <a class="btn btn-warning d-flex" href="">
                                                            <div class="mr-1">
                                                                <img src="<?php echo Config::getIcon("payment") ?>" class="img-fluid icon-sm mb-2">
                                                            </div>
                                                            <div>
                                                                <span class="text-nowrap">Cash Order</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="mt-2 mt-md-2">
                                                        <input type="hidden" class="mandatory-security-field" value="<?php echo Functions::encrypt("CANCEL_ORDER_REQUEST") ?>">
                                                        <a class="btn btn-dark d-flex ml-2 cancel-order" href="<?php echo Functions::encrypt($result->order_id) ?>">
                                                            <div class="mr-1">
                                                                <img src="<?php echo Config::getIcon("cancel") ?>" class="img-fluid icon-sm mb-1">
                                                            </div>
                                                            <div>
                                                                <span class="text-nowrap">Cancel Order</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <div id="menu1" class="container tab-pane fade"><br>
                <?php
                $databaseHandler->runSQL("SELECT * FROM customers INNER JOIN orders ON 
                        orders.user_id = customers.user_id
                        INNER JOIN order_details
                        ON order_details.order_id = orders.order_id
                        WHERE customers.user_id = ? AND payment_status = ?", array(Sanitize::__string($userId), "complete"), 0);
                if (!$databaseHandler->getCount()) { ?>
                    <div class="d-flex justify-content-center mt-3">
                        <h3 class="text-center text-dark-orange">Oops!</h3>
                    </div>
                    <div class="d-flex justify-content-center">
                        <h6 class="text-center col-md-6">Hi, <?php echo $firstname ?> you have not made any complete orders. Shop now to receive great discounts, vouchers and coupons</h6>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a class="btn link-hover btn-outline-warning d-flex mt-3" href="../?request=products">
                            <div>
                                <span class="text-dark">Start Shopping</span>
                            </div>
                            <div>
                                <img class="img-fluid icon-sm" src="<?php echo Config::getIcon("shopping-cart") ?>">
                            </div>
                        </a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <p class="text-center col-12 mt-3 mb-4">Receive great discounts on fashion items while enjoying the best of fashion variety<br />
                            Adept Designers cares for you</p>
                    </div>
                <?php } else {
                    $results = $databaseHandler->getOutput();
                ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>