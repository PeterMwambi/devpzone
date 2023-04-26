<?php
$count = 0;
$dbHandler = new DatabaseHandler;


$dbHandler->runSQL(
    "SELECT * FROM tickets 
INNER JOIN passengers ON  
passengers.passenger_id = tickets.passenger_id
INNER JOIN contracts ON  
contracts.contract_id = tickets.contract_id
INNER JOIN drivers ON  
drivers.driver_id = tickets.driver_id
INNER JOIN vehicles ON  
vehicles.vehicle_id = drivers.vehicle_id
INNER JOIN clients ON  
clients.client_id = passengers.client_id WHERE clients.cl_username = ?",
    array(Session::getValue("clientUsername")),
    1
);

$result = $dbHandler->getOutput();

$clientName = $result->cl_firstname . " " . $result->cl_lastname;
$driverName = $result->dr_firstname . " " . $result->dr_lastname;
$driverPhoneNumber = $result->dr_phone_number;
$vehicleInfo = $result->make . ", " . $result->model;
$vehiclePlateNumber = $result->number_plate;
$pickUpPoint = $result->pickup_point;
$destination = $result->destination;
$fare = $result->amount;
$paymentStatus = $result->payment_status;
$passengerId = $result->passenger_id;
$contractId = $result->contract_id;
$dateTime = $result->day_added . ", " . $result->date_added . " " . $result->time_added;

?>
<div class="container">
    <?php if (!empty($result) && $paymentStatus === "pending") { ?>

        <div class="d-flex justify-content-center">
            <div class="d-block">
                <div class="">
                    <div class="d-flex justify-content-center">
                        <div>
                            <img src="<?php echo Config::getIcon("success") ?>" class="img-fluid icon-sm mr-2 mt-1">
                        </div>
                        <div>
                            <h3 class="text-center text-success">Congratulations</h3>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="d-block">
                            <div class="d-flex justify-content-center">
                                <div class="col-12">
                                    <p class="text-center">Your request has been sent successfully. Here is your ticket</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-3">

                                <div class="bg-receipt rounded p-3">
                                    <div class="d-flex justify-content-center">
                                        <h3 class="text-center text-capitalize mb-3 mt-2">Everready</h3>
                                    </div>
                                    <p class="text-left"><strong>Passenger Name:</strong> <?php echo $clientName; ?></p>
                                    <p class="text-left"><strong>Driver Name:</strong> <?php echo $driverName; ?></p>
                                    <p class="text-left"><strong>Driver's Phone Number:</strong> <?php echo $driverPhoneNumber; ?></p>
                                    <p class="text-left"><strong>Vehicle:</strong> <?php echo $vehicleInfo; ?></p>
                                    <p class="text-left"><strong>Number Plate:</strong> <?php echo $vehiclePlateNumber; ?></p>
                                    <p class="text-left"><strong>PickUp Point:</strong> <?php echo $pickUpPoint; ?></p>
                                    <p class="text-left"><strong>Destination:</strong> <?php echo $destination; ?></p>
                                    <p class="text-left"><strong>Fare:</strong> <?php echo $fare . " Ksh"; ?> <img src="<?php echo Config::getIcon("money") ?>" class="img-fluid icon-sm"></p>
                                    <p class="text-left"><strong>Payment Status:</strong> <?php echo $paymentStatus; ?></p>
                                    <p class="text-left"><strong>Passenger Id:</strong> <?php echo $passengerId; ?></p>
                                    <p class="text-left"><strong>Contract Id:</strong> <?php echo $contractId; ?></p>
                                    <p class="text-left"><strong>Date:</strong> <?php echo $dateTime; ?></p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="col-md-8 col-12 mt-3">
                                    <p class="text-center">Your driver will call you shortly... Have a safe journey</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-danger cancelRequest" href="">Cancel This Request</a>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <div class="d-block">
                                    <div class="d-flex justify-content-center">
                                        <strong>Have you arrived at your destination ?</strong>
                                    </div>
                                    <div class="d-flex justify-content-center mt-2">
                                        <a class="btn-sm btn-primary" href="?request=paymentOptions">Click Here </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="d-flex justify-content-center">
            <h3 class="text-center mt-3">You have not yet made any cab requests</h3>
        </div>
        <div class="d-flex justify-content-center">
            <a class="btn btn-light mt-3 d-flex" href="<?php echo Directories::getLocation("accounts/client/") ?>">
                <div class="mr-2"> <img src="<?php echo Config::getIcon("add") ?>" class="img-fluid icon-sm"></div>
                <div> Add Request</div>
            </a>
        </div>
    <?php } ?>
</div>