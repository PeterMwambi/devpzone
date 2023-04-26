<?php


class Services
{

    private $dbHandler;


    public function __construct()
    {
        $this->dbHandler = new DatabaseHandler;
        if (!Session::exists("pickup") && !Session::exists("destination")) {
            return false;
            throw new Exception("No Session has been set for the pickup point and destination point", 1);
        }
    }

    /**
     * @param null
     * @return void
     * 
     * Called when a client cancels a cab request
     * Sessions set for both the pickup point and destination point are destroyed
     */
    public function destroyRequest()
    {
        if (Session::exists("pickup") && Session::exists("destination")) {
            Session::destroy("pickup");
            Session::destroy("destination");
            Session::destroy("fare");
            Session::destroy("PROCEED_REQUEST");
            return true;
        }
        throw new Exception("No Session was set for the pickup point and destination point", 1);
    }


    public function orderCab($driverId)
    {
        if ($this->processCabOrder($driverId)) {
            return true;
        }
        return false;
    }
    private function processCabOrder($driverId)
    {
        if (Session::exists("PROCEED_REQUEST")) {
            $this->dbHandler->runSQL("SELECT client_id, cl_firstname, cl_lastname  FROM clients WHERE cl_username = ? LIMIT 1", array(Session::getValue("clientUsername")), 1);
            $result = $this->dbHandler->getOutput();
            $clientId = $result->client_id;
            $name = $result->firstname . " " . $result->lastname;
            $driverId = Sanitize::__string($driverId);
            $contractId = strtoupper(uniqid());
            $passengerId = strtoupper(uniqid());
            $ticketId = strtoupper(uniqid());
            $pickUpPoint = Session::getValue("pickup");
            $destination = Session::getValue("destination");
            $fare = Session::getValue("fare");
            $dateAdded = date("d/M/Y");
            $dayAdded = date("l");
            $timeAdded = date("g:iA");
            $paymentStatus = "pending";
            $requestStatus = "open";
            $dateTime = $dayAdded . " ," . $dateAdded . " " . $timeAdded;
            Session::generate("name", $name);
            Session::generate("contractId", $contractId);
            Session::generate("passengerId", $passengerId);
            Session::generate("dateTime", $dateTime);
            Session::generate("paymentStatus", $paymentStatus);
            $passengerArray = array(
                "passenger_id" => $passengerId,
                "client_id" => $clientId,
                "contract_id" => $contractId,
                "pickup_point" => $pickUpPoint,
                "destination" => $destination,
                "date_added" => $dateAdded,
                "day_added" => $dayAdded,
                "time_added" => $timeAdded
            );

            $contractArray = array(
                "contract_id" => $contractId,
                "passenger_id" => $passengerId,
                "request_status" => $requestStatus,
                "payment_status" => $paymentStatus,
                "amount" => $fare,
                "driver_id" => $driverId,
                "date_added" => $dateAdded,
                "day_added" => $dayAdded,
                "time_added" => $timeAdded
            );

            $ticketArray = array(
                "ticket_id" => $ticketId,
                "driver_id" => $driverId,
                "passenger_id" => $passengerId,
                "contract_id" => $contractId,
                "date_added" => $dateAdded,
                "day_added" => $dayAdded,
                "time_added" => $timeAdded
            );
            $this->dbHandler->setTable("passengers");
            $this->dbHandler->setQueryItems($passengerArray);
            $this->dbHandler->queryDb("insert");
            $this->dbHandler->setTable("contracts");
            $this->dbHandler->setQueryItems($contractArray);
            $this->dbHandler->queryDb("insert");
            $this->dbHandler->setTable("tickets");
            $this->dbHandler->setQueryItems($ticketArray);
            $this->dbHandler->queryDb("insert");
            Session::generate("REQUEST_STATUS", "open");
            return true;
        }
        return false;
    }



    public function cancelRequest()
    {
        if ($this->processCancelRequest()) {
            return true;
        }
        return false;
    }

    public function processCancelRequest()
    {
        if (Session::exists("passengerId")) {
            $this->dbHandler->runSQL("DELETE FROM passengers WHERE passenger_id = ?", array(Session::getValue("passengerId")), null);
            $this->dbHandler->runSQL("DELETE FROM contracts WHERE passenger_id = ?", array(Session::getValue("passengerId")), null);
            $this->dbHandler->runSQL("DELETE FROM tickets WHERE passenger_id = ?", array(Session::getValue("passengerId")), null);
            Session::destroy("REQUEST_STATUS");
            Session::destroy("PROCEED_REQUEST");
            return true;
        }
        return false;
    }

    public function checkDriverStatus(string $status = "")
    {

        switch ($status) {
            case 'hasVehicle':
                $this->dbHandler->runSQL("SELECT driver_id FROM vehicles WHERE driver_id = ? LIMIT 1", array(Session::getValue("driverId")), 1);
                $count = $this->dbHandler->getCount();
                if ($count > 0) {
                    return true;
                } else {
                    return false;
                }
                break;
        }
    }

    public function takeContract($contractId)
    {
        if (!empty($contractId)) {
            $this->dbHandler->runSQL("UPDATE contracts SET request_status = ? WHERE contract_id = ?", array("accepted", $contractId), null);
            $this->dbHandler->runSQL("UPDATE drivers SET status = ? WHERE driver_id = ?", array("not avilable", Session::getValue("driverId")), null);
            return true;
        }
        return false;
    }


    public function getPayment($paymentId, $transactionId = null)
    {
        if ($this->processGetPayment($paymentId, $transactionId)) {
            return true;
        }
        return false;
    }

    private function processGetPayment($paymentMethod, $transactionId = null)
    {
        if (!empty($paymentMethod)) {
            $this->dbHandler->runSQL("SELECT * FROM contracts 
            INNER JOIN drivers ON drivers.driver_id = contracts.driver_id
            INNER JOIN passengers ON passengers.passenger_id = contracts.passenger_id
            INNER JOIN clients ON clients.client_id = passengers.client_id 
            WHERE clients.cl_username = ? LIMIT 1", array(Session::getValue("clientUsername")), 1);
            $result = $this->dbHandler->getOutput();
            $paymentId = strtoupper(uniqid());
            $receiptId = strtoupper(uniqid());
            Session::generate("paymentId", $paymentId);
            $paymentMethod = sanitize::__string($paymentMethod);
            $fare = $result->amount;
            $contractId = $result->contract_id;
            $driverId = $result->driver_id;
            $passengerId = $result->passenger_id;
            $paymentStatus = "verified";
            $requestStatus = "complete";
            $dateAdded = date("d/m/Y");
            $dayAdded = date("l");
            $timeAdded = date("g:iA");
            $paymentArray = array(
                "payment_id" => $paymentId,
                "contract_id" => $contractId,
                "amount" => $fare,
                "payment_method" => $paymentMethod,
                "payment_status" => $paymentStatus,
                "date_added" => $dateAdded,
                "day_added" => $dayAdded,
                "time_added" => $timeAdded
            );
            $receiptArray = array(
                "receipt_id" => $receiptId,
                "driver_id" => $driverId,
                "passenger_id" => $passengerId,
                "contract_id" => $contractId,
                "payment_id" => $paymentId,
                "date_added" => $dateAdded,
                "day_added" => $dayAdded,
                "time_added" => $timeAdded
            );
            $this->dbHandler->setTable("payments");
            $this->dbHandler->setQueryItems($paymentArray);
            $this->dbHandler->queryDb("insert");
            $this->dbHandler->setTable("receipts");
            $this->dbHandler->setQueryItems($receiptArray);
            $this->dbHandler->queryDb("insert");
            $this->dbHandler->runSQL("UPDATE drivers SET drivers.status = ?  WHERE driver_id = ?", array("avilable", $driverId), null);
            $this->dbHandler->runSQL("UPDATE contracts SET payment_status = ?, request_status = ? WHERE contract_id = ?", array($paymentStatus, $requestStatus, $contractId), null);
            $this->dbHandler->runSQL("UPDATE passengers SET payment_id = ? WHERE passenger_id = ?", array($paymentId, $passengerId), null);
            return true;
        }
        return false;
    }
}
