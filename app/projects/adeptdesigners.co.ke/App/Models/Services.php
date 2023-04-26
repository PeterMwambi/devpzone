<?php

class Services
{

    private $conn = null;

    private $results = null;

    private $count = 0;

    public function __construct()
    {
        $this->conn = new DatabaseHandler;
    }

    public function crownAdministrator(string $identifier)
    {
        if (!empty($identifier)) {
            $this->conn->setTable("employees");
            $this->conn->setQueryItems(array("employee_id", "=", $identifier));
            $this->conn->queryDb("select", 1);
            $count = $this->conn->getCount();
            if ($count) {
                $this->conn->setTable("employees");
                $this->conn->setQueryItems(array("employee_id", "=", $identifier));
                $this->conn->queryDb("select", 1);
            }
        }
        return false;
    }



    public function getUserOrderHistory(string $userId, $status)
    {
        if ($this->conn->runSQL(
            "SELECT orders.order_id,
                                orders.user_id,
                                orders.customer_id,
                                orders.date_added,
                                orders.day_added,
                                orders.time_added,
                                order_details.order_details,
                                order_details.pickup_station,
                                order_details.payment_status,
                                order_details.payment_method,
                                order_details.amount_due,
                                order_details.amount_paid,
                                order_details.balance,
                                order_details.date_paid,
                                order_details.day_paid,
                                order_details.time_paid,
                                order_details.transaction_id 
                                FROM orders INNER JOIN order_details
                                ON order_details.order_id = orders.order_id WHERE orders.user_id = ? AND payment_status = ?",
            array($userId, $status),
            0
        )) {
            $this->results = $this->conn->getOutput();
            $this->count = $this->conn->getCount();
            return true;
        }
        return false;
    }

    public function getUserOrder(string $orderId, $status)
    {
        if ($this->conn->runSQL(
            "SELECT orders.order_id,
                                orders.user_id,
                                orders.customer_id,
                                orders.date_added,
                                orders.day_added,
                                orders.time_added,
                                order_details.order_details,
                                order_details.pickup_station,
                                order_details.payment_status,
                                order_details.payment_method,
                                order_details.amount_due,
                                order_details.amount_paid,
                                order_details.balance,
                                order_details.date_paid,
                                order_details.day_paid,
                                order_details.time_paid,
                                order_details.transaction_id 
                                FROM orders INNER JOIN order_details
                                ON order_details.order_id = orders.order_id WHERE orders.order_id = ? AND payment_status = ? LIMIT 1",
            array($orderId, $status),
            1,
        )) {
            $this->results = $this->conn->getOutput();
            $this->count = $this->conn->getCount();
            return true;
        }
        return false;
    }

    public function getResults()
    {
        if (count($this->results)) {
            return $this->results;
        }
        return false;
    }

    public function getCount()
    {
        if ($this->count) {
            return $this->count;
        }
        return false;
    }
}
