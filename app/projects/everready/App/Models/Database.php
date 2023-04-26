<?php

defined("PATHNAME") or exit(header("location:../../errors/"));

/**
 * @author Peter Mwambi
 * @date Fri Sep 18 2020 18:03:29 GMT+0300 (East Africa Time)
 * @updated on Wed Apr 28 2021 01:22:15 GMT+0300 (East Africa Time)
 * @content Database connection class
 * 
 * ****Stored Procedures
 */

class Database
{


    private $conn = null;

    /**
     * @var null $instance
     * 
     * Creates a new database instance
     */
    private static $instance = null;

    /**
     * @var null $stmt
     * 
     * The query to be executed by the result set
     */
    private $stmt = null;

    /**
     * @var bool $errors
     * 
     * Returns errors if there are any with database queries 
     */

    private $errors = false;

    /**
     * @var null $results
     * 
     * Returns results from the database
     */
    private $results = null;

    /**
     * @var int $count
     * 
     * Returns the count of database results
     */

    private $count = 0;

    /**
     * @param null
     * @return string
     * 
     * Private Database construct to limit the number 
     * of database connections. Returns the database connection string 
     */

    private function __construct()
    {
        try {
            $this->conn = new PDO(
                "mysql:host=" . Config::getConstant("host") .
                    ";dbname=" . Config::getConstant("name"),
                Config::getConstant("username"),
                Config::getConstant("password"),
                Config::getConstant("options")
            );
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param null
     * @return mixed
     * 
     * Returns the database instance as a singleton object
     */

    protected static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Database;
        }
        return self::$instance;
    }

    /**
     * @param string $sql The SQL string
     * @param array $params The parameters to be executed in the SQL stmt
     * @param int $fetch Flow control. Sets the fetch mode i.e. 1. fetch(), 0.fetchAll, null return no results. 
     * @return object the current object
     * 
     * 
     * Binds parameters to their values and exequtes the SQL stmt
     * Returning the results and their count
     */


    protected function runQuery($sql, $params = array(), $fetch = 0)
    {
        if ($sql !== null) {
            if (!$this->executeQuery($sql, $params, $fetch)->error()) {
                return $this;
            }
            return false;
        }
        return false;
    }


    private function executeQuery($sql, $params = array(), $fetch = 0)
    {
        $this->errors = false;
        $this->stmt = $this->conn->prepare($sql);
        if (count($params)) {
            $x = 1;
            $i = 0;
            foreach ($params  as $param) {
                $this->stmt->bindParam($x, $params[$i]);
                $x++;
                $i++;
            }
        }
        if ($this->stmt->execute()) {
            $this->count = $this->stmt->rowCount();
            if ($fetch === 0) {
                $this->results = $this->stmt->fetchAll();
            }
            if ($fetch === 1) {
                $this->results = $this->stmt->fetch();
            }
            if (is_null($fetch)) {
                $this->count = 0;
                $this->results = null;
            }
        } else {
            $this->errors = true;
        }
        return $this;
    }

    /**
     * @param string $action ---- action to be performed aganist DB
     * @param string $table ----  table affected by the SQL action
     * @param array $where -----  field and value effected by the SQL action
     * @param string $fetch -----  the fetch mode
     * @param array $join_clause ---- The SQL join clause
     * @param array  $db_conditional_query_factory ---- conditional statement
     * @return bool | $this
     * 
     * 
     * Generates and executes an SQL statement
     * Break database queries into multiple queries
     * Manipulate the count of where
     * E.g 
     * if (count === 7){
     *          array("username", "=", "peter", "AND", "lastname", "=", "mwambi")
     * }
     * if(count === 5){
     *          array("username", "=", "peter", "LIMIT", "2");
     * }
     * if(count === 3){
     *          array("username", "=", "peter");                   
     * }
     * array("date", "LIKE", "%date%")
     * if(count === 6){
     *          array("INNER JOIN", "orders", "ON", "customer.customer_id", "=", "orders.customer_id")
     * }
     * if(count === 6){
     *          array("INNER JOIN", "orders", "ON", "customer.customer_id", "=", "orders.customer_id", "where", "user_id" "=" Session::getvalue("user_id"))
     * }
     * if (count === 8) {
     *        array("INNER JOIN", "orders", "ON", "customer.customer_id", "=", "orders.customer_id", "ORDER BY" )
     * }   
     * if (count === 9) {
     *          array("INNER JOIN", "orders", "ON", "customer.customer_id", "=", "orders.customer_id", "customerName", "=", "peter" )
     * }
     */



    protected function action(string $action, string $table, $fetch,  $where = array())
    {
        $operators = array("=", "<", ">", "<=", ">=", "LIKE");
        $values = array();
        $count = count($where);
        switch ($count) {
            case 0:
                $sql = "{$action} FROM {$table} ";
                break;
            case 2:
                $condition = $where[0];
                $number = $where[1];
                $sql = "{$action} FROM {$table} {$condition} " . (int)$number;
                break;
            case 3:
                $field = $where[0];
                $operator = $where[1];
                $value = $where[2];
                if (!in_array($operator, $operators)) {
                    return false;
                }
                array_push($values, $value);
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
                break;
            case 5:
                $field = $where[0];
                $operator = $where[1];
                $value = $where[2];
                $condition = $where[3];
                $number = $where[4];
                if (!in_array($operator, $operators)) {
                    return false;
                }
                array_push($values, $value);
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ? {$condition} {$number}";
                break;
            case 6:
                $join_clause = $where[0];
                $table_1 = $where[1];
                $position = $where[2];
                $relationship_1 = $where[3];
                $operator = $where[4];
                $relationship_2 = $where[5];
                if (!in_array($operator, $operators)) {
                    return false;
                }
                $sql = "{$action} FROM {$table} {$join_clause} {$table_1} {$position} {$relationship_1} {$operator} {$relationship_2}";
                break;
            case 7:
                $first_field = $where[0];
                $first_operator = $where[1];
                $first_value = $where[2];
                $conditional_operator = $where[3];
                $second_field = $where[4];
                $second_operator = $where[5];
                $second_value = $where[6];
                if (!in_array($operators, $first_operator) && !in_array($operators, $second_operator)) {
                    return false;
                }
                array_push($values, $first_value, $second_value);
                $sql = "{$action} FROM {$table} WHERE {$first_field} {$first_operator} {$first_value} {$conditional_operator}
                        {$second_field} {$second_operator} ?";
                break;
            case 9:
                $join_clause = $where[0];
                $table_1 = $where[1];
                $position = $where[2];
                $relationship_1 = $where[3];
                $operator = $where[4];
                $relationship_2 = $where[5];
                $field = $where[6];
                $operator = $where[7];
                $value = $where[8];
                if (!in_array($operator, $operators)) {
                    return false;
                }
                array_push($values, $value);
                $sql = "{$action} FROM {$table} {$join_clause} {$table_1} {$position} {$relationship_1} {$operator} {$relationship_2} WHERE {$field} {$operator} ?";
                break;
        }
        if ($sql !== null) {
            if (count($values) > 0) {
                if (!$this->executeQuery($sql, $values, $fetch)->error()) {
                    return $this;
                }
            } else {
                if (!$this->executeQuery($sql, array(), $fetch)->error()) {
                    return $this;
                }
            }
        }
        return false;
    }
    /**
     * @param string $table
     * @param string $where
     * @param int $fetch
     * @param array $where
     * @param array $join_clause
     * @param array $db_conditional_query_factory_builder
     * 
     * Returns a set of results from a select query
     */


    protected function generateSelectQuery(
        $action_fields = array(),
        $table,
        $fetch = 0,
        $where = array()
    ) {
        if (count($action_fields)) {
            $action_field_value = '';
            $x = 1;
            foreach ($action_fields as $action_field) {
                $action_field_value .= $action_field;
                if ($x < count($action_fields)) {
                    $action_field_value .= ', ';
                }
                $x++;
            }
            if (count($where)) {
                return $this->action("SELECT {$action_field_value}", $table, $fetch, $where);
            } else {
                return $this->action("SELECT {$action_field_value}", $table, $fetch);
            }
            return false;
        }
    }

    /**
     * @param string $table
     * @param array $where
     * 
     * Deletes an item from the database 
     */

    protected function generateDeleteQuery($table, $where)
    {
        if (count($where) === 3) {
            return $this->action("DELETE", $table, null, $where);
        }
        return $this->action("DELETE", $table, null);
    }

    /**
     * @param string $table table affected by the SQL stmt
     * @param array $fields fields affected and values to be inserted to DB
     * 
     * Inserts an item to the database
     */

    protected function generateInsertQuery($table, $fields = array())
    {
        if (count($fields)) {
            $keys = array_keys($fields);
            $values = '';
            $x = 1;
            foreach ($fields as $field) {
                $values .= '?';
                if ($x < count($fields)) {
                    $values .= ',';
                }
                $x++;
            }
            $sql = "INSERT into {$table} (`" . implode('`, `', $keys) . "`) VALUES({$values})";
            if (!$this->executeQuery($sql, array_values($fields), null)->error()) {
                return $this;
            }
        }
        return false;
    }

    /**
     * @param string $table table affected by the SQL stmt
     * @param array $fields fields affected and values to be updated to DB
     * @param array $update_fields field and value
     * 
     * Updates a single record stored in the database
     */
    protected function generateUpdateQuery($table, $fields = array(), $update_identifier = array())
    {
        if (count($fields)) {
            $set = "";
            $x = 1;
            foreach ($fields as $field => $value) {
                $set .= "{$field} = ?";
                if ($x < count($fields)) {
                    $set .= ", ";
                }
                $x++;
            }
            if (count($update_identifier)) {
                $where = "";
                foreach ($update_identifier as $update_field => $update_value) {
                    $where .= "{$update_field} = ?";
                }
                $sql = "UPDATE {$table} SET {$set} WHERE {$where}";
                array_push($fields, $update_value);
                if (!$this->executeQuery($sql, array_values($fields), null)->error()) {
                    return true;
                }
            }
            return false;
        }
        return false;
    }

    /**
     * @param null
     * 
     * Returns errors made by the SQL queries
     */
    protected function error()
    {
        return $this->errors;
    }

    /**
     * @param null
     * 
     * Returns the count of elements in the DB
     */
    protected function getUserCount()
    {
        return $this->count;
    }

    /**
     * @param null
     * 
     * Returns the results of the Database
     */
    protected function getOutput()
    {
        return $this->results;
    }
}
