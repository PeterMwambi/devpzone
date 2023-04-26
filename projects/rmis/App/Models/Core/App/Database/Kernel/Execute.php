<?php

namespace Models\Core\App\Database\Kernel;

defined("ALLOW_DBEXECUTE_ACCESS") or Exit("Execute Warning: You are not allowed to access this script");

define("ALLOW_DBCONNECT_ACCESS", TRUE);

use Models\Core\App\Database\Kernel\Connect as ConnectSQL;
use Exception;
use PDO;

class Execute
{

    private $sql;

    private $params;

    private $fetch;

    private $conn;

    private $stmt;

    private $count = 0;
    private $_results = array();


    public function __construct()
    {
        $this->conn = ConnectSQL::Start()->GetLiveConnection();
    }


    protected function SetSQL(string $sql)
    {
        $this->sql = $sql;
    }

    protected function SetParams(array $params)
    {
        $this->params = $params;
    }

    protected function SetFetchMode(int $fetch)
    {
        $this->fetch = $fetch;
    }

    private function GetFetchMode()
    {
        if (isset($this->fetch)) {
            return $this->fetch;
        } else {
            throw new Exception("Warning: SQL Fetch mode has not been set");
        }
    }

    protected function GetSQL()
    {
        if (isset($this->sql)) {
            return $this->sql;
        } else {
            throw new Exception("Warning: SQL Statement is missing");
        }
    }

    protected function GetParams()
    {
        if (count($this->params)) {
            return $this->params;
        } else {
            throw new Exception("Warning: SQL parameters were not set");
        }
    }


    protected function BindStatement()
    {
        $this->sql = $this->GetSQL();
        $this->stmt = $this->conn->prepare($this->sql);
    }

    protected function BindStatementWithParams()
    {
        if (count($this->params)) {
            $this->sql = $this->GetSQL();
            $this->stmt = $this->conn->prepare($this->sql);
            $x = 1;
            $i = 0;
            foreach ($this->params as $param) {
                $this->stmt->bindParam($x, $this->params[$i]);
                $x++;
                $i++;
            }
        }
    }


    protected function ExecuteQuery()
    {
        if (isset($this->stmt)) {
            $this->stmt->execute();
        }
    }

    private function GetResults(string $options)
    {
        switch ($this->GetFetchMode()) {
            case 0:
                switch ($options) {
                    case "array":
                        return $this->stmt->fetch(PDO::FETCH_ASSOC);
                    case "object":
                        return $this->stmt->fetch(PDO::FETCH_OBJ);
                }
            case 1:
                switch ($options) {
                    case "array":
                        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
                    case "object":
                        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
                }
        }

    }

    public function WriteCount()
    {
        $this->count = $this->stmt->rowCount();
    }

    public function GetCount()
    {
        $this->WriteCount();
        return $this->count;
    }

    public function GetResultsAsArray()
    {
        $this->_results = $this->GetResults("array");
        if (!empty($this->_results)) {
            return $this->_results;
        } else {
            throw new Exception("Warning: No results were found");
        }
    }

    public function GetResultsAsObject()
    {
        $this->_results = $this->GetResults("object");
        if (!empty($this->_results)) {
            return $this->_results;
        } else {
            throw new Exception("Warning: No results were found");
        }
    }

}