<?php

$dbHandler = new DatabaseHandler;

$dbHandler->runSQL("SELECT * FROM contracts
    INNER JOIN passengers ON passengers.passenger_id = contracts.passenger_id
    INNER JOIN clients ON clients.client_id = passengers.client_id
    INNER JOIN drivers ON drivers.driver_id = contracts.driver_id 
    WHERE drivers.driver_id = ?", array(Session::getValue("driverId")), 0);

$results = $dbHandler->getOutput();

?>

<?php if (empty($results)) { ?>
    <div class="d-flex justify-content-center">
        <h4 class="text-center">You have no pending cab requests</h4>
    </div>
    <div class="d-flex justify-content-center">
        <span>We will inform you incase you receive any new contracts.</span>
    </div>
    <div class="d-flex justify-content-center mt-3">
        <a class="btn btn-primary" href="?action=home">Go to Homepage</a>
    </div>
<?php } else { ?>
    <div class="row mt-4">
        <?php foreach ($results as $result) { ?>
            <div class="col-md-4 col-12 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <span class="text-dark"><strong>Name:</strong> <?php echo $result->firstname . " " . $result->lastname ?></span>
                        </div>
                        <div>
                            <span class="text-dark"><strong>Client Phone Number:</strong> <?php echo $result->phone_number ?></span>
                        </div>
                        <div>
                            <span class="text-dark"><strong>Pickup Point:</strong> <?php echo $result->pickup_point ?></span>
                        </div>
                        <div>
                            <span class="text-dark"><strong>Destination:</strong> <?php echo $result->destination ?></span>
                        </div>
                        <div>
                            <span class="text-dark"><strong>Fare:</strong> <?php echo $result->amount ?> Ksh <img src="<?php echo Config::getIcon("money") ?>" class="img-fluid icon-sm"></span>
                        </div>
                        <div>
                            <span class="text-dark"><strong>Contract Id:</strong> <?php echo $result->contract_id ?></span>
                        </div>
                        <div>
                            <span class="text-dark"><strong>Passenger Id:</strong> <?php echo $result->passenger_id ?></span>
                        </div>
                        <div>
                            <span class="text-dark"><strong>Date:</strong> <?php echo $result->day_added . ", " . $result->date_added . ", " . $result->time_added ?></span>
                        </div>

                        <div>
                            <?php
                            $dbHandler->runSQL("SELECT request_status FROM contracts WHERE contract_id = ? LIMIT 1", array($result->contract_id), 1);
                            $output = $dbHandler->getOutput();
                            ?>
                            <?php if ($output->request_status === "open") { ?>
                                <a class="btn btn-primary mt-2 acceptContract" href="<?php echo $result->contract_id ?>">Take Contract</a>
                            <?php } else { ?>
                                <?php if ($output->request_status === "accepted") { ?>
                                    <div class="d-flex justify-content-center">
                                        <h5 class="text-center text-dark mt-3">Request Approved</h5>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>