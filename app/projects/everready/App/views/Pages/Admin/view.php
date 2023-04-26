<?php

//View 


$table = Sanitize::__string(Input::grab("query"));

$action = Sanitize::__string(Input::grab("action"));


if ($action !== "view") {
    //header("location:../../error/404")
}



function getQueryResults($table, $field = array(), $action, $fetch, $queryItems = array())
{
    $query = new DatabaseHandler;

    $query->setTable($table);

    if (count($field)) {
        $query->setField($field);
    }
    if (count($queryItems)) {
        $query->setQueryItems($queryItems);
    }

    $query->queryDb($action, $fetch);

    $results = $query->getOutput();

    return $results;
}




if (!empty($action)) {
    $results = getQueryResults($table, array("*"), "select", 0);
    $count = count($results);
}






?>


<div class="container text-dark">
    <div class="mt-md bg-translucent-white p-3">
        <div class="card w-100">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="d-flex justify-content-start">
                            <a class="text-muted mr-1" href="">Home</a> >
                            <a class="text-muted ml-1 mr-1" href="">Routes</a> >
                        </div>
                        <div class="d-flex justify-content start mt-2">
                            <div class="mr-1">
                                <img src="<?php echo Config::getIcon("routes") ?>" alt="" class="img-fluid icon-sm">
                            </div>
                            <div>
                                <h4 class="text-darkaliceblue">Routes</h4>
                            </div>
                        </div>
                        <div class="d-flex justify-content-start">
                            <div>
                                <span class="text-muted">Records Found: <?php echo $count ?></span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-start">
                            <div class="">
                                <p class="text-justify">Displays a list of all signed up routes.
                                    Routes are distances that separate places and are created from
                                    connecting different locations together i.e when clients order
                                    for a cab from a pick up point to their destination, a route is created
                                    and an entry made onto the routes table. This entry indicates a formed route.
                                    Routes can be manually configured. Information found in the routes table includes the
                                    following
                                </p>
                                <ol>
                                    <li>Route ID - Uniquely identifies a route </li>
                                    <li>Start Location - The location of the client. This may be a city or town </li>
                                    <li>Destination Location - The town or city that serves as the client's destination point </li>
                                    <li>Start Point - The pickup point where the client meets the driver </li>
                                    <li>Destination - The destination point where the driver drops the client </li>
                                    <li>Fare - The amount to be charged for the ride </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-primary" href="">Add route</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>


        <div class="row">
            <?php foreach ($results as $result) { ?>
                <?php
                switch ($table) {
                    case 'administrators':

                        $output = array(
                            "headings" => array("id", "username", "firstname", "lastname", "phoneNumber", "email", "password"),
                            "data" => array(
                                "id" => $result->admin_id,
                                "username" => $result->username,
                                "firstname" => $result->firstname,
                                "lastname" => $result->lastname,
                                "phoneNumber" => $result->phone_number,
                                "email" => $result->email,
                                "password" => $result->password
                            )
                        );
                        break;
                    case 'areas':
                        $locationNames = getQueryResults("locations", array("name"), "select", 0, array("location_id", "=", $result->location_id));
                        foreach ($locationNames as $locationName) {
                            $locationName = $locationName->name;
                        }
                        $output = array(
                            "headings" => array("id", "location", "name", "date Added", "day Added", "time Added"),
                            "data" => array(
                                "id" => $result->area_id,
                                "location" => $locationName,
                                "name" => $result->name,
                                "date Added" => $result->date_added,
                                "day Added" => $result->day_added,
                                "time Added" => $result->time_added
                            )
                        );

                        break;
                    case 'contracts':
                        $output = array(
                            "headings" => array("id", "driver Id", "vehicle Id", "user Id", "payment status", "date Added", "day Added", "time Added"),
                            "data" => array(
                                "id" => $result->contract_id,
                                "driver Id" => $result->driver_id,
                                "vehicle Id" => $result->vehicle_id,
                                "user Id" => $result->user_id,
                                "payment status" => $result->payment_status,
                                "date Added" => $result->date_added,
                                "day Added" => $result->day_added,
                                "time Added" => $result->time_added
                            )
                        );
                        break;
                    case 'drivers':
                        $output = array(
                            "headings" => array("id", "username", "firstname", "lastname", "phoneNumber", "email", "password"),
                            "data" => array(
                                "id" => $result->driver_id,
                                "username" => $result->username,
                                "firstname" => $result->firstname,
                                "lastname" => $result->lastname,
                                "phoneNumber" => $result->phone_number,
                                "email" => $result->email,
                                "password" => $result->password
                            )
                        );
                        break;
                    case 'locations':
                        $output = array(
                            "headings" => array("id", "name", "date Added", "day Added", "time Added"),
                            "data" => array(
                                "id" => $result->location_id,
                                "name" => $result->name,
                                "date Added" => $result->date_added,
                                "day Added" => $result->day_added,
                                "time Added" => $result->time_added
                            )
                        );
                        break;
                    case 'passengers':
                        $output = array(
                            "headings" => array("id", "client Id", "pickUp Point", "destination", "date Added", "day Added", "time Added"),
                            "data" => array(
                                "id" => $result->passenger_id,
                                "client Id" => $result->client_id,
                                "pickUp Point" => $result->pickup_point,
                                "destination" => $result->destination,
                                "amount" => $result->amount,
                                "date Added" => $result->date_added,
                                "day Added" => $result->day_added,
                                "time Added" => $result->time_added
                            )
                        );
                        break;
                    case 'payments':
                        $output = array(
                            "headings" => array("id", "user Id", "vehicle Id", "Driver Id", "pickUp Point", "destination", "payment Method", "amount", "payment Status",  "date Added", "day Added", "time Added"),
                            "data" => array(
                                "id" => $result->passenger_id,
                                "user Id" => $result->user_id,
                                "driver Id" => $result->driver_id,
                                "vehicle Id" => $result->vehicle_id,
                                "pickUp Point" => $result->pickup_point,
                                "destination" => $result->destination,
                                "payment Method" => $result->payment_method,
                                "amount" => $result->amount,
                                "payment Status" => $result->payment_status,
                                "date Added" => $result->date_added,
                                "day Added" => $result->day_added,
                                "time Added" => $result->time_added
                            )
                        );
                        break;
                    case 'routes':
                        $output = array(
                            "headings" => array("id", "start location", "destination location", "start point", "destination", "fare", "date Added", "day Added", "time Added"),
                            "data" => array(
                                "id" => $result->route_id,
                                "start location" => $result->start_location,
                                "destination location" => $result->destination_location,
                                "start point" => $result->start_point,
                                "destination" => $result->destination_point,
                                "fare" => $result->fare . "Ksh",
                                "date Added" => $result->date_added,
                                "day Added" => $result->day_added,
                                "time Added" => $result->time_added
                            )
                        );
                        break;
                    case 'clients':
                        $output = array(
                            "headings" => array("id", "username", "firstname", "lastname", "phoneNumber", "email", "password"),
                            "data" => array(
                                "id" => $result->client_id,
                                "username" => $result->username,
                                "firstname" => $result->firstname,
                                "lastname" => $result->lastname,
                                "phoneNumber" => $result->phone_number,
                                "email" => $result->email,
                                "password" => $result->password
                            )
                        );
                        break;
                    case 'vehicles':
                        $output = array(
                            "headings" => array("id", "driver Id", "Pictures", "number Plate", "make", "model", "date Added", "day Added", "time Added"),
                            "data" => array(
                                "id" => $result->vehicle_id,
                                "driver Id" => $result->driver_id,
                                "pictures" => $result->pictures,
                                "number Plate" => $result->number_plate,
                                "make" => $result->make,
                                "model" => $result->model,
                                "date Added" => $result->date_added,
                                "day Added" => $result->day_added,
                                "time Added" => $result->time_added
                            )
                        );
                        break;
                    default:
                        $output = array();
                        break;
                }

                if (count($output)) {
                    $headings = $output["headings"];
                    $data = $output["data"];
                    $id = $output["data"]["id"];
                }
                ?>
                <div class="col-md-3 col-12">
                    <div class="card mt-3 w-100 border-top-blue">
                        <div class="card-body">
                            <?php foreach ($headings as $heading) { ?>
                                <div class="d-flex overflow-auto text-nowrap mb-3 mt-3">
                                    <div>
                                        <b><?php echo ucwords($heading) . ":" ?></b>
                                    </div>
                                    <div>
                                        <span><?php echo $data[$heading] ?></span>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="d-flex justify-content-start">
                                <a class="btn-sm btn-danger mr-3 delete" href="<?php echo $id ?>">Delete</a>
                                <a class="btn-sm btn-primary view" href="<?php echo $id ?>">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>