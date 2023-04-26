<?php

$dbHandler = new DatabaseHandler;

$dbHandler->runSQL("SELECT * FROM drivers WHERE drivers.dr_username = ?", array(Session::getValue("driverUsername")), 1);


$result = $dbHandler->getOutput();

?>


<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-start ml-3">
            <div>
                <img src="<?php echo Config::getIcon("drivers") ?>" class="img-fluid icon-sm mt-1 mr-2">
            </div>
            <div>
                <h3 class="text-dark">Profile</h3>
            </div>
        </div>

        <div class="d-flex justify-content-start text-dark">
            <div class="col-12 col-md-8 mt-3">
                <div class="d-flex">
                    <div class="mr-3">
                        <p><strong>Driver Id:</strong> <?php echo $result->driver_id ?></p>
                    </div>
                    <div>
                        <p><strong>Vehicle Id:</strong> <?php echo $result->driver_id ?></p>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="mr-3">
                        <p><strong>Firstname:</strong> <?php echo $result->dr_firstname ?></p>
                    </div>
                    <div>
                        <p><strong>Lastname:</strong> <?php echo $result->dr_lastname ?></p>
                    </div>
                </div>
                <div class="d-flex">
                    <div>
                        <p><strong>Username:</strong> <?php echo $result->dr_username ?></p>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="mr-3">
                        <p><strong>Phone Number:</strong> <?php echo $result->dr_phone_number ?></p>
                    </div>
                    <div>
                        <p><strong>Email:</strong> <?php echo $result->dr_email ?></p>
                    </div>
                </div>
                <div class="d-flex">
                    <div>
                        <p><strong>Status:</strong> <?php echo ucfirst($result->status) ?></p>
                    </div>
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