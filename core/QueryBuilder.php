<?php
trait QueryBuilder {
    public $tableName = '';
    public $where = '';
    public $operator = '';
    public $selectField = '*';
    //
    function table($tableName) {
        $this->tableName = $tableName;
        return $this;
    }
    //
    function where($field, $compare, $value) {
        if (empty($this->where)) {
            $this->operator = ' WHERE '; 
        }
        else {
            $this->operator = ' AND ';
        }

        $this->where .= "$this->operator $field $compare '$value'";
        return $this;
    }
    //
    public function orWhere($field, $compare, $value) {
        if (empty($this->where)) {
            $this->operator = ' WHERE '; 
        }
        else {
            $this->operator = ' OR ';
        }

        $this->where .= "$this->operator $field $compare '$value'";
        return $this;
    }
    //
    public function whereLike($field, $value) {
        if (empty($this->where)) {
            $this->operator = ' WHERE '; 
        }
        else {
            $this->operator = ' AND ';
        }

        $this->where .= "$this->operator $field LIKE '$value'";
        return $this;
    }
    //
    function select($field='*') {
        $this->selectField = $field;
        return $this;
    }
    //
    function get() {
        $sqlQuery = "SELECT $this->selectField FROM $this->tableName $this->where";
        $query = $this->query($sqlQuery);

        // Reset field
        $this->tableName = '';
        $this->where = '';
        $this->operator = '';
        $this->selectField = '*';

        if (!empty($query)) {
            return $query->fetchAll(pdo::FETCH_ASSOC);
        }
        return false;
    }
    //
    function first () {
        $sqlQuery = "SELECT $this->selectField FROM $this->tableName $this->where";
        $query = $this->query($sqlQuery);
        
        // Reset field
        $this->tableName = '';
        $this->where = '';
        $this->operator = '';
        $this->selectField = '*';

        if (!empty($query)) {
            return $query->fetch(pdo::FETCH_ASSOC);
        }
        return false;
    }
    

}