<?php
// namespace App\Models\Authenticator;
/**
 * @author Peter Mwambi
 * @content Common Gateway Interface Authenticator
 * @date Mon May 24 2021 01:10:58 GMT+0300 (East Africa Time)
 * @updated Sat Jan 15 2022 22:02:51 GMT+0300 (East Africa Time)
 * 
 * Receives and Processes form requests 
 */

class Authenticator extends Validator
{

    private $fare = null;

    private $messages = array();


    public function __construct(array $data, $form)
    {
        parent::__construct($data, $form);
    }

    /**
     * Output Error Message to GUI
     * @param null
     * @return string
     * 
     * Returns validation error messages from the parent
     * validator class
     * 
     */
    public function getMsg()
    {
        if (!$this->confirmRequest()) {
            if (count($this->messages)) {
                foreach ($this->messages as $message) {
                    return $message;
                }
            }
        }
        return '';
    }


    private function loadMessage($message)
    {
        array_push($this->messages, $message);
    }


    public function confirmRequest()
    {
        $error = $this->processErrorMsg();
        if (!empty($error)) {
            array_push($this->messages, $error);
        }
        if (empty($this->messages)) {
            return true;
        }
        return false;
    }


    public function clientLogin()
    {
        if ($this->processClientLogin()) {
            return true;
        }
        return false;
    }

    private function processClientLogin()
    {
        if ($this->confirmRequest()) {
            $username = Sanitize::__string($this->data["username"]);
            Session::generate("clientUsername", $username);
            $password = Sanitize::__string($this->data["password"]);
            $privateKey = $username . $password;
            Session::generate("AUTHENTICATED_CLIENT", Functions::encrypt($privateKey));
            return true;
        }
        return false;
    }

    public function clientSignUp()
    {
        if ($this->processClientSignUp()) {
            return true;
        }
        return false;
    }

    private function processClientSignUp()
    {
        if ($this->confirmRequest()) {
            $clientId = strtoupper(uniqid());
            $username = Sanitize::__string($this->data["username"]);
            Session::generate("clientUsername", $username);
            $firstname = Sanitize::__string($this->data["firstname"]);
            $lastname = Sanitize::__string($this->data["lastname"]);
            $email = Sanitize::__string($this->data["email"]);
            $phoneNumber = Sanitize::__string($this->data["phone-number"]);
            $password = Sanitize::__string($this->data["password"]);
            $password = password_hash($password, PASSWORD_DEFAULT);
            $clientArray = array(
                "client_id" => $clientId,
                "cl_username" => $username,
                "cl_firstname" => $firstname,
                "cl_lastname" => $lastname,
                "cl_email" => $email,
                "cl_phone_number" => $phoneNumber,
                "cl_password" => $password
            );
            $this->conn->setTable("clients");
            $this->conn->setQueryItems($clientArray);
            $this->conn->queryDb("insert");

            return true;
        }

        return false;
    }




    public function adminLogin()
    {
        if ($this->processAdminLogin()) {
            return true;
        }
        return false;
    }

    private function processAdminLogin()
    {
        if ($this->confirmRequest()) {
            $username = Sanitize::__string($this->data["username"]);
            Session::generate("adminUsername", $username);
            $password = Sanitize::__string($this->data["password"]);
            $privateKey = $username . $password;
            Session::generate("AUTHENTICATED_ADMINISTRATOR", Functions::encrypt($privateKey));
            return true;
        }
        return false;
    }


    public function adminSignUp()
    {
        if ($this->processAdminSignUp()) {
            return true;
        }
        return false;
    }

    private function processAdminSignUp()
    {
        if ($this->confirmRequest()) {
            $adminId = strtoupper(uniqid());
            $username = Sanitize::__string($this->data["username"]);
            Session::generate("adminUsername", $username);
            $firstname = Sanitize::__string($this->data["firstname"]);
            $lastname = Sanitize::__string($this->data["lastname"]);
            $email = Sanitize::__string($this->data["email"]);
            $phoneNumber = Sanitize::__string($this->data["phone-number"]);
            $password = Sanitize::__string($this->data["password"]);
            $password = password_hash($password, PASSWORD_DEFAULT);
            $adminArray = array(
                "admin_id" => $adminId,
                "adm_username" => $username,
                "adm_firstname" => $firstname,
                "adm_lastname" => $lastname,
                "adm_email" => $email,
                "adm_phone_number" => $phoneNumber,
                "adm_password" => $password
            );
            $this->conn->setTable("administrators");
            $this->conn->setQueryItems($adminArray);
            $this->conn->queryDb("insert");
            return true;
        }
        return false;
    }






    public function driverLogin()
    {
        if ($this->processDriverLogin()) {
            return true;
        }
        return false;
    }

    private function processDriverLogin()
    {
        if ($this->confirmRequest()) {
            $username = Sanitize::__string($this->data["username"]);
            Session::generate("driverUsername", $username);
            $this->conn->runSQL("SELECT driver_id FROM  drivers WHERE dr_username = ? LIMIT 1", array($username), 1);
            $result = $this->conn->getOutput();
            Session::generate("driverId", $result->driver_id);
            $password = Sanitize::__string($this->data["password"]);
            $privateKey = $username . $password;
            Session::generate("AUTHENTICATED_DRIVER", Functions::encrypt($privateKey));
            return true;
        }
        return false;
    }

    public function driverSignUp()
    {
        if ($this->processDriverSignUp()) {
            return true;
        }
        return false;
    }
    private function processDriverSignUp()
    {
        if ($this->confirmRequest()) {
            $driverId = strtoupper(uniqid());
            $username = Sanitize::__string($this->data["username"]);
            Session::generate("driverUsername", $username);
            Session::generate("driverId", $driverId);
            $firstname = Sanitize::__string($this->data["firstname"]);
            $lastname = Sanitize::__string($this->data["lastname"]);
            $email = Sanitize::__string($this->data["email"]);
            $location = Sanitize::__string($this->data["location"]);
            $phoneNumber = Sanitize::__string($this->data["phone-number"]);
            $password = Sanitize::__string($this->data["password"]);
            $password = password_hash($password, PASSWORD_DEFAULT);
            $privateKey = $username . $password;
            Session::generate("AUTHENTICATED_DRIVER", Functions::encrypt($privateKey));
            $this->conn->runSQL("SELECT location_id FROM locations WHERE name = ? LIMIT 1", array($location), 1);
            $result = $this->conn->getOutput();
            $locationId = $result->location_id;
            $driverArray = array(
                "driver_id" => $driverId,
                "location_id" => $locationId,
                "dr_username" => $username,
                "dr_firstname" => $firstname,
                "dr_lastname" => $lastname,
                "dr_email" => $email,
                "dr_phone_number" => $phoneNumber,
                "dr_password" => $password,
                "status" => "avilable"
            );
            $this->conn->setTable("drivers");
            $this->conn->setQueryItems($driverArray);
            $this->conn->queryDb("insert");
            return true;
        }
        return false;
    }


    public function registerLocation()
    {
        if ($this->processRegisterLocation()) {
            return true;
        }
        return false;
    }
    private function processRegisterLocation()
    {
        if ($this->confirmRequest()) {
            $locationId = strtoupper(uniqid());
            $locationName = Sanitize::__string($this->data["name"]);
            $date_added = date("d/M/Y");
            $day_added = date("l");
            $time_added = date("g:iA");
            $clientArray = array(
                "location_id" => $locationId,
                "name" => $locationName,
                "date_added" => $date_added,
                "day_added" => $day_added,
                "time_added" => $time_added
            );
            $this->conn->setTable("locations");
            $this->conn->setQueryItems($clientArray);
            $this->conn->queryDb("insert");

            return true;
        }
        return false;
    }


    public function registerVehicle()
    {
        if ($this->processRegisterVehicle()) {
            return true;
        }
        return false;
    }

    private function processVehicleUpload()
    {
        $file = new File;
        $file->write("fileToUpload", Directories::getLocation("uploads/vehicles/"));
        $table = "vehicles";
        $field = "pictures";
        $queryFields = array("vehicle_id" => Session::getValue("vehicleId"));
        if (!$file->addToDB($table, $field, $queryFields)) {
            $error = $file->getMsg();
            $this->loadMessage($error);
            $this->confirmRequest() === false;
            return false;
        } else {
            if ($file->upload()) {
                return true;
            }
            return false;
        }
    }


    private function processRegisterVehicle()
    {
        if ($this->confirmRequest()) {
            $vehicleId = strtoupper(uniqid());
            Session::generate("vehicleId", $vehicleId);
            $model = Sanitize::__string($this->data["model"]);
            $make = Sanitize::__string($this->data["make"]);
            $numberPlate = Sanitize::__string($this->data["number-plate"]);
            $date_added = date("d/M/Y");
            $day_added = date("l");
            $time_added = date("g:iA");
            $vehicleArray = array(
                "vehicle_id" => $vehicleId,
                "driver_id" => Session::getValue("driverId"),
                "model" => $model,
                "make" => $make,
                "number_plate" => strtoupper($numberPlate),
                "date_added" => $date_added,
                "day_added" => $day_added,
                "time_added" => $time_added
            );
            $this->conn->setTable("vehicles");
            $this->conn->setQueryItems($vehicleArray);
            $this->conn->queryDb("insert");
            if ($this->processVehicleUpload()) {
                $this->conn->runSQL("UPDATE drivers SET vehicle_id = ? WHERE driver_id = ?", array($vehicleId, Session::getValue("driverId")), null);
                return true;
            } else {
                $this->conn->runSQL("DELETE FROM VEHICLES WHERE vehicle_id = ?", array(Session::getValue("vehicleId")), null);
                return false;
            }
        }
        return false;
    }

    public function registerRoute()
    {
        if ($this->processRegisterRoute()) {
            return true;
        }
        return false;
    }


    private function processRegisterRoute()
    {
        if ($this->confirmRequest()) {
            $routeId = strtoupper(uniqid());
            $startingLocation = Sanitize::__string($this->data["start-location"]);
            $destinationLocation = Sanitize::__string($this->data["destination-location"]);
            $startingPoint = Sanitize::__string($this->data["pickup-point"]);
            $destinationPoint = Sanitize::__string($this->data["destination-point"]);
            $fare = Sanitize::__string($this->data["fare"]);
            $date_added = date("d/M/Y");
            $day_added = date("l");
            $time_added = date("g:iA");
            $routeArray = array(
                "route_id" => $routeId,
                "start_location" => $startingLocation,
                "destination_location" => $destinationLocation,
                "start_point" => $startingPoint,
                "fare" => $fare,
                "destination_point" => $destinationPoint,
                "date_added" => $date_added,
                "day_added" => $day_added,
                "time_added" => $time_added
            );
            $this->conn->setTable("routes");
            $this->conn->setQueryItems($routeArray);
            $this->conn->queryDb("insert");
            return true;
        }
        return false;
    }



    public function registerArea()
    {
        if ($this->processRegisterArea()) {
            return true;
        }
        return false;
    }


    private function processRegisterArea()
    {
        if ($this->confirmRequest()) {
            $areaId = strtoupper(uniqid());
            $areaName = Sanitize::__string($this->data["name"]);
            $location = Sanitize::__string($this->data["location"]);
            $date_added = date("d/M/Y");
            $day_added = date("l");
            $time_added = date("g:iA");
            $this->conn->setTable("locations");
            $this->conn->setField(array("location_id"));
            $this->conn->setQueryItems(array("name", "=", $location));
            $this->conn->queryDb("select", 1);
            $result = $this->conn->getOutput();
            $locationId = $result->location_id;
            $routeArray = array(
                "area_id" => $areaId,
                "name" => $areaName,
                "location_id" => $locationId,
                "date_added" => $date_added,
                "day_added" => $day_added,
                "time_added" => $time_added
            );
            $this->conn->setTable("areas");
            $this->conn->setQueryItems($routeArray);
            $this->conn->queryDb("insert");
            return true;
        }
        return false;
    }




    public function calculateFare()
    {
        if ($this->processTransportFare()) {
            return $this;
        }
        return false;
    }


    private function processTransportFare()
    {
        if ($this->confirmRequest()) {
            $pickup = Sanitize::__string($this->data["pickup"]);
            $destination = Sanitize::__string($this->data["destination"]);
            if (!empty($pickup) && !empty($destination)) {
                Session::generate("PROCEED_REQUEST", true);
                Session::generate("pickup", $pickup);
                Session::generate("destination", $destination);
                $this->fare = rand(50, 200);
                Session::generate("fare", $this->fare);
            }
        }
        return $this;
    }

    public function getFare()
    {
        if (!empty($this->fare)) {
            return $this->fare;
        }
        return false;
    }
}
