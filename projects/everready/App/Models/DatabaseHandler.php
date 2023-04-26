<?php

/**
 * @author Peter Mwambi
 * @content Page Display Content
 */

class DatabaseHandler extends Database
{
    private $table = null;

    private $action = null;

    private $field = array();

    private $table_id = null;

    private $conn = null;

    private $query_items = array();

    private $identifier = array();

    private $count = null;

    private $results;


    public function __construct()
    {
        $this->conn = Database::getInstance();
    }


    public function runSQL($sql, $params = array(), $fetch)
    {
        if (false !== $this->conn->runQuery($sql, $params, $fetch)) {
            $this->results = $this->conn->getOutput();
            $this->count = $this->conn->getUserCount();
            return true;
        }
        return false;
    }

    public function setTable(string $table)
    {
        !empty($table) ? $this->table = Sanitize::__string($table) : null;
    }

    public function getTable()
    {
        if (!empty($this->table)) {
            return $this->table;
        }
        return "";
    }
    public function setField(array $field)
    {
        !empty($field) ? $this->field = $field : null;
    }

    public function getField()
    {
        if (!empty($this->field)) {
            return $this->field;
        }
        return "";
    }

    public function setTableId(string $table_id)
    {
        isset($table_id) ? $this->table_id = Sanitize::__string($table_id) : null;
    }

    public function getTableId()
    {
        if (!empty($this->table_id)) {
            return $this->table_id;
        }
        return "";
    }

    public function setQueryItems(array $query_items)
    {
        !empty($query_items) ? $this->query_items = $query_items : array();
    }

    public function getQueryItems()
    {
        if (!empty($this->query_items)) {
            return $this->query_items;
        }
        return array();
    }

    public function setQueryIdentifier(array $identifier)
    {
        !empty($identifier) ? $this->identifier = $identifier : array();
    }
    public function getQueryIdentifier()
    {
        if (!empty($this->identifier)) {
            return $this->identifier;
        }
        return array();
    }

    public function queryDb(string $action, int $fetchMode = null)
    {
        $this->action = $action;
        $table = $this->getTable();
        $field = $this->getField();
        $items = $this->getQueryItems();
        $identifier = $this->getQueryIdentifier();
        switch ($this->action) {
            case 'select':
                if (count($items)) {
                    $this->conn->generateSelectQuery($field, $table, $fetchMode, $items);
                } else {
                    $this->conn->generateSelectQuery($field, $table, $fetchMode);
                }
                $this->results = $this->conn->getOutput();
                $this->count = $this->conn->getUserCount();
                break;
            case 'insert':
                if (count($items)) {
                    $this->conn->generateInsertQuery($table, $items);
                }
                break;
            case 'update':
                if (count($items) && count($identifier)) {
                    $this->conn->generateUpdateQuery($table, $items, $identifier);
                }
                break;
            case 'delete':
                if (count($items)) {
                    $this->conn->generateDeleteQuery($table, $items);
                } else {
                    $this->conn->generateDeleteQuery($table);
                }
                break;
            default:
                return false;
                break;
        }
        return $this;
    }

    public function getCount()
    {
        if (!empty($this->count)) {
            return $this->count;
        }
        return 0;
    }

    public function getOutput()
    {
        if (count((array) $this->results)) {
            return $this->results;
        }
        return false;
    }
}
