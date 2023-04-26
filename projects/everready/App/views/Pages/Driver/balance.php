<?php

$dbHandler = new DatabaseHandler;

$dbHandler->runSQL("SELECT payments.amount FROM payments 
INNER JOIN contracts ON contracts.contract_id = payments.contract_id
INNER JOIN drivers ON drivers.driver_id = contracts.driver_id
WHERE drivers.driver_id = ?", array(Session::getValue("driverId")), 1);

$result = (array) $dbHandler->getOutput();

$result = array_sum($result);


?>

<div class="d-flex justify-content-center">
    <h3>My Wallet</h3>
</div>

<div class="d-flex justify-content-center mt-3">
    <div>
        <img src="<?php echo Config::getIcon("money") ?>" class="img-fluid icon-sm mr-2">
    </div>
    <h5><?php echo !empty($result) ? $result : 0
        ?> KSh</h5>
</div>

<div class="d-flex justify-content-center">
    <div>
        <a class="btn btn-primary mt-3" href="?action=home">Go to Homepage</a>
    </div>
</div>