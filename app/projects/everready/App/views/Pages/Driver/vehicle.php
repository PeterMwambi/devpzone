<?php

$dbHandler = new DatabaseHandler;

$dbHandler->runSQL("SELECT * FROM vehicles WHERE driver_id = ?", array(Session::getValue("driverId")), 1);

$result = $dbHandler->getOutput();

?>


<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-start">
            <div>
                <img src="<?php echo Config::getIcon("vehicles") ?>" class="img-fluid icon-sm">
            </div>
            <h3 class="text-dark">My Ride</h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo Directories::getLocation("uploads/vehicles/") . $result->pictures ?>" class="img-fluid icon-md">
            </div>
            <div class="col-md-6 text-dark">
                <div>
                    <p><strong>Car Make:</strong> <?php echo $result->make ?></p>
                </div>
                <div>
                    <p><strong>Car Model:</strong> <?php echo $result->model ?></p>
                </div>
                <div>
                    <p><strong> Number Plate:</strong> <?php echo $result->number_plate ?></p>
                </div>
                <div>
                    <p><strong> Date Registered:</strong> <?php echo $result->day_added . ", " . $result->date_added . " at " . $result->time_added ?></p>
                </div>
                <div class="d-flex">
                    <div>
                        <a class="btn btn-primary" href="?action=home">Go to Homepage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>