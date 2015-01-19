<?php

class DB {

    private static $_instance = null;
    public $_pdo,
            $_query,
            $_error = false,
            $_results,
            $_first,
            $_count = 0;

    private function __construct() {
        try {
            $this->_pdo = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $this->_pdo->exec('set names utf8');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    public function query($sql, $params = array(), $searchParams = array(), $searchTermsCount = null) {
        $this->_error = false;
        $prepare = $this->_query = $this->_pdo->prepare($sql);

        if (isset($prepare)) {

            $x = 1;
            if (count($params)) {
                foreach ($params as $param) {
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }

            if (!empty($searchParams) && !empty($searchTermsCount)) {
                $z = 1;
                for ($x = 0; $x < $searchTermsCount; $x++) {
                    for ($y = 0; $y < count($searchParams); $y++) {
                        var_dump($z);
                        $this->_query->bindValue($z++, $searchParams[$y]);
                    }
                }
            }

            if ($this->_query->execute()) {
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            } else {
                $this->_error = true;
            }
        }
        return $this;
    }

    public function action($action, $table, $where = array(), $options = null, $searchQuery = null, $searchTerms = null) {
        if (empty($searchQuery)) {
            if (count($where) === 3) {
                $operators = array('=', '>', '<', ' >=', '<=');

                if (isset($where)) {
                    $field = $where[0];
                    $operator = $where[1];
                    $value = $where[2];
                    $bindValue = '?';
                }

                if (in_array($operator, $operators)) {
                    if (isset($options)) {
                        $sql = "{$action} FROM {$table} WHERE {$field} {$operator} {$bindValue} {$options}";
                    } else {
                        $sql = "{$action} FROM {$table} WHERE {$field} {$operator} {$bindValue}";
                    }

                    if (!$this->query($sql, array($value))->error()) {
                        return $this;
                    }
                }
            } elseif (!isset($where)) {

                $sql = trim("{$action} FROM {$table} {$options}");

                if (!$this->query($sql)->error()) {
                    return $this;
                }
            }
            return false;
        }
        if (isset($searchQuery)) {
            $search = $this->search($searchTerms, $searchQuery);
            $sql = "{$action} FROM {$table} WHERE {$search}";

            if (!$this->query($sql)->error()) {
                return $this;
            }
        }
        return false;
    }

    public function get($select = array(), $table, $where = array(), $options = null, $searchQuery = null) {
        return $this->action('SELECT ' . implode($select, ', '), $table, $where, $options, $searchQuery, $select);
    }

    public function delete($table, $where = array()) {
        return $this->action('DELETE', $table, $where);
    }

    public function search($searchTerms = array(), $query = array()) {
        foreach ($searchTerms as $term) {
            foreach ($query as $word) {
                $sql .= "{$term} LIKE ? OR ";
            }
        }
        return trim($sql, "OR ");
    }

    public function insert($table, $fields = array()) {
        $keys = array_keys($fields);
        $values = '';
        $x = 1;

        foreach ($fields as $field) {
            $values .= '?';
            if ($x < count($fields)) {
                $values .= ', ';
            }
            $x++;
        }

        $sql = "INSERT INTO {$table} (`" . implode('`,`', $keys) . "`) VALUES ({$values})";

        if (!$this->query($sql, $fields)->error()) {
            return true;
        }
        return false;
    }

    public function update($table, $id, $fields = array()) {
        $set = '';
        $x = 1;

        foreach ($fields as $name => $value) {
            $set .= "{$name} = ?";
            if ($x < count($fields)) {
                $set .= ', ';
            }
            $x++;
        }

        $sql = "UPDATE {$table} SET {$set} WHERE ID = {$id}";

        if (!$this->query($sql, $fields)->error()) {
            return true;
        }
        return false;
    }

    public function results() {
        return $this->_results;
    }

    public function first() {
        $this->_first = $this->results();
        return $this->_first[0];
    }

    public function error() {
        return $this->_error;
    }

    public function count() {
        return $this->_count;
    }

}

// public function action($action, $table, $where = array(), $options = array(), $searchQuery = null, $searchTerms = null) {
//        $value = array();
//        $searchParams = array();
//        $sql = "{$action} FROM {$table}";
//
//        if (!empty($where)) {
//            $sql .= " WHERE ";
//            foreach ($where as $statement) {
//                if (count($statement) === 3) {
//                    $operators = array('=', '>', '<', ' >=', '<=');
//
//                    if (isset($statement)) {
//                        $field = $statement[0];
//                        $operator = $statement[1];
//                        $value[] = $statement[2];
//                        $bindValue = '?';
//                    }
//
//                    if (in_array($operator, $operators)) {
//                        $sql .= "{$field} {$operator} {$bindValue}";
//                        $sql .= " AND ";
//                    }
//                }
//            }
//            $sql = rtrim($sql, " AND ");
//        }
//        if (isset($searchQuery)) {
//            $query = explode(' ', $searchQuery);
//            $search = $this->search($searchTerms, $query);
//            $operator = (!empty($where) ? " AND" : " WHERE");
//            $sql .= "{$operator} {$search}";
//            foreach ($query as $word) {
//                $searchParams[] = "%" . $word . "%";
//            }
//        }
//        if (!empty($options)) {
//            foreach ($options as $optionKey => $optionValue) {
//                $sql .= " {$optionKey} {$optionValue}";
//            }
//        }
//
//        if (!$this->query($sql, $value, $searchParams, count($searchTerms))->error()) {
//            return $this;
//        }
//        return false;
//    }