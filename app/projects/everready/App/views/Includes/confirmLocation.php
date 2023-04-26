    <?php
    $dbHandler = new DatabaseHandler;

    $dbHandler->runSQL("SELECT location_id FROM areas WHERE name = ?", array(Session::getValue("pickup")), 1);

    $result = $dbHandler->getOutput();

    $locationId = $result->location_id;
    $dbHandler->runSQL("SELECT * FROM drivers 
    INNER JOIN vehicles ON vehicles.vehicle_id = drivers.vehicle_id
    INNER JOIN locations ON locations.location_id = drivers.location_id 
    WHERE drivers.location_id = ? 
    AND drivers.vehicle_id IS NOT NULL
    AND drivers.status = ?", array($locationId, "avilable"), 0);

    $results = $dbHandler->getOutput();


    ?>

    <div class="d-flex justify-content-center">
      <span>Choose your driver and vehicle</span>
    </div>

    <?php if (!empty($results)) { ?>
      <div class="row">

        <?php foreach ($results as $result) { ?>
          <div class="col-12 col-md-4 ">
            <div class="card mt-4">
              <div>
                <img src="<?php echo Directories::getLocation("uploads/vehicles/") . $result->pictures ?>" class="img-fluid icon-md">
              </div>
              <div class="card-body">
                <div>
                  <?php for ($x = 0; $x <= 3; $x++) { ?>
                    <img src="<?php echo Directories::getLocation("tools/assets/star.png") ?>" class="img-fluid icon-sm">
                  <?php } ?>
                  <img src="<?php echo Directories::getLocation("tools/assets/star2.png") ?>" class="img-fluid icon-m-sm">
                </div>
                <div>
                  <span class="text-dark"><strong>Driver Name:</strong> <?php echo $result->dr_firstname . " " . $result->dr_lastname;  ?></span>
                </div>
                <div>
                  <span class="text-dark"><strong>Phone Number:</strong> <?php echo $result->dr_phone_number;  ?></span>
                </div>
                <div>
                  <span class="text-dark"><strong>Route:</strong> <?php echo $result->name;  ?></span>
                </div>
                <div>
                  <span class="text-dark"><strong>Vehicle:</strong> <?php echo $result->make . ", " . $result->model;  ?></span>
                </div>
                <div>
                  <span class="text-dark"><strong>Number Plate:</strong> <?php echo $result->number_plate ?></span>
                </div>
                <div class="d-flex justify-content-start">
                  <a class="btn btn-primary mt-2 accept-btn" href="<?php echo $result->driver_id ?>">Select Driver</a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="d-flex justify-content-start">
        <a class="btn btn-danger mt-4 reject-btn" href="">Cancel My Request</a>
      </div>
    <?php } else { ?>
      <div class="d-flex justify-content-center">
        <h3 class="text-center">OOps!</h3>
        <div class="d-flex justify-content-center">
          <span class="">There are no drivers avilable in your area. Please Try Again Later</span>
        </div>
      </div>
    <?php } ?>