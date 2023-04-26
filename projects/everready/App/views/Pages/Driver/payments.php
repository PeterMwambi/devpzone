<?php


$dbHandler = new DatabaseHandler;

$dbHandler->runSQL("SELECT * FROM payments 
INNER JOIN contracts ON
contracts.contract_id = payments.contract_id
INNER JOIN passengers ON
passengers.passenger_id = contracts.passenger_id
INNER JOIN clients ON
clients.client_id = passengers.client_id
INNER JOIN drivers ON
drivers.driver_id = contracts.driver_id WHERE drivers.dr_username = ?", array(Session::getValue("driverUsername")), 0);


$results = $dbHandler->getOutput();
?>

<div class="d-flex justify-content-center">
    <h3 class="text-center">Payment History</h3>
</div>
<?php if (!empty($results)) { ?>
    <div class="row mt-5">
        <?php foreach ($results as $result) { ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-dark">
                        <div>
                            <p><strong>Payment Id:</strong> <?php echo $result->payment_id ?></p>
                        </div>
                        <div>
                            <p><strong>Contract Id:</strong> <?php echo $result->contract_id ?></p>
                        </div>
                        <div>
                            <p><strong>Client Name:</strong> <?php echo $result->cl_firstname . " " . $result->cl_lastname ?></p>
                        </div>
                        <div>
                            <p><strong>Client Phone Number:</strong> <?php echo $result->cl_phone_number ?></p>
                        </div>
                        <div>
                            <p><strong>PickUp Point:</strong> <?php echo $result->pickup_point ?></p>
                        </div>
                        <div>
                            <p><strong>Destination:</strong> <?php echo $result->destination ?></p>
                        </div>
                        <div>
                            <p><strong>Payment Method:</strong> <?php echo $result->payment_method ?></p>
                        </div>
                        <div>
                            <p><strong>Amount Received:</strong> <?php echo $result->amount . " Ksh" ?> </p>
                        </div>
                        <div>
                            <p><strong>Payment Status:</strong> <?php echo $result->payment_status ?> <?php if ($result->payment_status === "verified") { ?> <img src="<?php echo Config::getIcon("verified") ?>" class="img-fluid icon-sm"> <?php } ?></p>
                        </div>
                        <div>
                            <p><strong>Date:</strong> <?php echo $result->day_added . ", " . $result->date_added . " " . $result->time_added ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } else { ?>
    <div class="d-flex justify-content-center">
        <p>Your Payment history is empty</p>
    </div>
<?php } ?>

<div class="d-flex justify-content-center">
    <div>
        <a class="btn btn-primary mt-3" href="?action=home">Go to Homepage</a>
    </div>
</div>