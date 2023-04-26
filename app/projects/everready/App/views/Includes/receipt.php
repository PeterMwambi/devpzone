<?php

$dbHandler = new DatabaseHandler;
$dbHandler->runSQL(
    "SELECT * FROM receipts 
INNER JOIN passengers ON  
passengers.passenger_id = receipts.passenger_id
INNER JOIN contracts ON  
contracts.contract_id = receipts.contract_id
INNER JOIN drivers ON  
drivers.driver_id = receipts.driver_id
INNER JOIN payments ON  
payments.payment_id = receipts.payment_id
INNER JOIN clients ON  
clients.client_id = passengers.client_id WHERE clients.cl_username = ?",
    array(Session::getValue("clientUsername")),
    1
);

$result = $dbHandler->getOutput();


$clientName = $result->cl_firstname . " " . $result->cl_lastname;
$driverName = $result->dr_firstname . " " . $result->dr_lastname;
$driverPhoneNumber = $result->dr_phone_number;
$paymentMethod = $result->payment_method;
$paymentId = $result->payment_id;
$pickUpPoint = $result->pickup_point;
$destination = $result->destination;
$fare = $result->amount;
$paymentStatus = $result->payment_status;
$passengerId = $result->passenger_id;
$contractId = $result->contract_id;
$dateTime = $result->day_added . ", " . $result->date_added . " " . $result->time_added;

?>

<div class="container">
    <div class="d-flex justify-content-center">
        <div class="d-block">
            <div class="d-flex justify-content-center">
                <p class="text-center">Here goes your receipt<br> Generated on <?php echo date("l, d/m/Y"); ?> at <?php echo date("g:iA"); ?></p>
            </div>
            <div class="bg-receipt rounded p-3">
                <div class="d-flex justify-content-center">
                    <h3 class="text-center text-capitalize mb-3 mt-2">Everready</h3>
                </div>
                <p class="text-left"><strong>Passenger Name:</strong> <?php echo $clientName; ?></p>
                <p class="text-left"><strong>Driver Name:</strong> <?php echo $driverName; ?></p>
                <p class="text-left"><strong>Driver's Phone Number:</strong> <?php echo $driverPhoneNumber; ?></p>
                <p class="text-left"><strong>PickUp Point:</strong> <?php echo $pickUpPoint; ?></p>
                <p class="text-left"><strong>Destination:</strong> <?php echo $destination; ?></p>
                <p class="text-left"><strong>Fare:</strong> <?php echo $fare . " Ksh"; ?></p>
                <p class="text-left"><strong>Payment Status:</strong> <?php echo $paymentStatus; ?> <?php if ($paymentStatus === "verified") { ?> <img src="<?php echo Config::getIcon("verified") ?>" class="img-fluid mt-n1 icon-sm"> <?php } ?></p>
                <p class="text-left"><strong>Payment Method:</strong> <?php echo $paymentMethod; ?> </p>
                <p class="text-left"><strong>Passenger Id:</strong> <?php echo $passengerId; ?></p>
                <p class="text-left"><strong>Contract Id:</strong> <?php echo $contractId; ?></p>
                <p class="text-left"><strong>Payment Code:</strong> <?php echo $paymentId; ?></p>
                <p class="text-left"><strong>Date:</strong> <?php echo $dateTime; ?></p>
            </div>

            <div class="d-flex justify-content-center">
                <p class="text-center mt-2">Thank you for travelling with us.<br> Have a great day.</p>
            </div>
        </div>
    </div>
</div>