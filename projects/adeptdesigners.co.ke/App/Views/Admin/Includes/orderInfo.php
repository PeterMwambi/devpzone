    <?php



    if ($reference === "users") {

        switch ($identity) {
            case 'pendingOrders':
                $id = $result->user_id;
                $status = "pending";
                break;
            case 'verifiedOrders':
                $id = $result->user_id;
                $status = "verified";
                break;
        }

        $services = new Services;
        $services->getUserOrderHistory($id, $status);
        $results = $services->getResults();
        $count = $services->getCount();
        $x = 1;
    } else {

        if ($reference === "orders" || $reference === "customers") {
            $id = $result->order_id;
            $status = "pending";
            $services = new Services;
            $services->getUserOrder($id, $status);
            $results = array($services->getResults());
            $count = $services->getCount();
            $x = 1;
        }
    }
    ?>




    <?php if (!$count) { ?>

        <div class="d-flex justify-content-center">
            <h4 class="text-center text-dark-orange">Client has no <?php echo $status ?> orders</h4>
        </div>


    <?php } else { ?>
        <div class="d-flex justify-content-end">
            <span>Total number of orders:&nbsp; </span><strong><?php echo $count ?></strong>
        </div>

        <?php
        foreach ($results as $result) {
            $verificationIcon = (isset($result->payment_status) && $result->payment_status === "pending") ? Config::getIcon("pending") : Config::getIcon("verified");
            $dateAdded = $result->day_added . " " . $result->date_added;
            $timeAdded = $result->time_added;
        ?>
            <hr>
            <div class="d-flex justify-content-start">
                <h6 class="text-center text-dark-orange"><?php echo $x . "."; ?></h6>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <h3 class="text-center text-dark-orange">Items</h3>
            </div>
            <div class="row">
                <?php
                $resultDetails = json_decode($result->order_details);
                $totalItems = count($resultDetails);
                foreach ($resultDetails as $detail) {
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
            <div class="row">
                <div class="col-6 col-md-3 mt-3 border-right">
                    <div class="mr-3">
                        <h6 class="text-muted text-nowrap">Order Id:</h6>
                        <h6 class="text-dark-orange text-nowrap"><?php echo $result->order_id ?></h6>
                    </div>
                </div>
                <div class="col-6 col-md-3 mt-3 border-right">
                    <div class="mr-3">
                        <h6 class="text-muted">Pickup Station:</h6>
                        <h6 class="text-dark-orange text-nowrap"><?php echo $result->pickup_station; ?></h6>
                    </div>
                </div>
                <div class="col-6 col-md-3 mt-3 border-right">
                    <div class="mr-3">
                        <h6 class="text-muted text-nowrap">Total Items:</h6>
                        <h6 class="text-dark-orange text-nowrap"><?php echo $totalItems ?></h6>
                    </div>
                </div>
                <div class="col-6 col-md-3 mt-3 border-right">
                    <div class="mr-3">
                        <h6 class="text-muted text-nowrap">Total Price:</h6>
                        <h6 class="text-dark-orange text-nowrap"><?php echo $result->amount_due ?> KSh</h6>
                    </div>
                </div>
                <div class="col-6 col-md-3 mt-3 border-right">
                    <div class="mr-3">
                        <h6 class="text-muted text-nowrap">Total Paid:</h6>
                        <h6 class="text-dark-orange text-nowrap"><?php echo $result->amount_paid ?> KSh</h6>
                    </div>
                </div>
                <div class="col-6 col-md-3 mt-3 border-right">
                    <div class="mr-3">
                        <h6 class="text-muted">Balance:</h6>
                        <h6 class="text-dark-orange text-nowrap"><?php echo $result->balance ?> KSh</h6>
                    </div>
                </div>
                <div class="col-6 col-md-3 mt-3 border-right">
                    <div>
                        <h6 class="text-muted">Payment Status:</h6>
                    </div>
                    <div class="d-flex">
                        <div class="mr-1">
                            <h6 class="text-dark-orange text-nowrap"> <?php echo $result->payment_status ?></h6>
                        </div>
                        <div>
                            <img src="<?php echo $verificationIcon ?>" class="img-fluid icon-sm">
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3 mt-3 border-right">
                    <div class="mr-3">
                        <h6 class="text-muted">Payment Method:</h6>
                        <h6 class="text-dark-orange text-nowrap"><?php echo $result->payment_method ?></h6>
                    </div>
                </div>

                <div class="col-6 col-md-3 mt-3 border-right">
                    <div class="mr-3">
                        <h6 class="text-muted">Transaction Code:</h6>
                        <h6 class="text-dark-orange text-nowrap"><?php echo $result->transaction_id ?></h6>
                    </div>
                </div>
                <div class="col-6 col-md-3 mt-3 border-right">
                    <div class="mr-3">
                        <h6 class="text-muted">Date Added:</h6>
                        <h6 class="text-dark-orange text-nowrap"><?php echo $dayAdded . " " . $dateAdded ?></h6>
                    </div>
                </div>
                <div class="col-6 col-md-3 mt-3 border-right">
                    <div class="mr-3">
                        <h6 class="text-muted">Time Added:</h6>
                        <h6 class="text-dark-orange text-nowrap"><?php echo $timeAdded ?></h6>
                    </div>
                </div>
                <div class="col-6 col-md-3 mt-3 border-right">
                    <div class="mr-3">
                        <h6 class="text-muted">Payment Date:</h6>
                        <h6 class="text-dark-orange text-nowrap"><?php echo (!empty($result->date_paid) && !empty($result->day_paid)) ? $result->day_paid . " " . $result->date_paid : "Pending" ?></h6>
                    </div>
                </div>
                <div class="col-6 col-md-3 mt-3 border-right">
                    <div class="mr-3">
                        <h6 class="text-muted">Time paid:</h6>
                        <h6 class="text-dark-orange text-nowrap"><?php echo (!empty($result->time_paid)) ? $result->time_paid : "Pending" ?></h6>
                    </div>
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-end">

                <?php if ($result->payment_status === "pending") { ?>
                    <a class="btn btn-dark mr-2 update" href="<?php echo Directories::getLocation("account/pages/") . "?request=update&reference=orders&identifier=" . $result->order_id ?>">
                        <img src="<?php echo Directories::getLocation("tools/assets/refresh.png") ?>" class="img-fluid icon-sm">
                        Confirm Order</a>
                <?php } ?>
                <a class="btn btn-danger mr-2 delete" name="<?php echo "orders" ?>" href="<?php echo $result->order_id ?>">
                    <img src="<?php echo Directories::getLocation("tools/assets/delete.png") ?>" class="img-fluid icon-sm mb-1">
                    Delete Order</a>
            </div>
        <?php $x++;
        } ?>

    <?php } ?>

    <?php
