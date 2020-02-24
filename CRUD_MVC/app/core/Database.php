<?php

class Database {

    private $dbh;
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db = 'mydb';
    private $stmt;
    private $error;

    public function __construct() {

        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db;
        $options = array (
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Create a new PDO instanace
        try {
            $this->dbh = new PDO ($dsn, $this->user, $this->pass, $options);
        }		// Catch any errors
        catch ( PDOException $e ) {

            $this->error = $e->getMessage();
        }

    }

    // prepare query
    public function query($query)
    {
       $this->stmt = $this->dbh->prepare($query);
        return $query;
    }

    // Bind values
    public function bindVal($param, $value, $type = null) {
        if (is_null ($type)) {
        switch (true) {
            case is_int ($value) :
                $type = PDO::PARAM_INT;
                break;
            case is_bool ($value) :
                $type = PDO::PARAM_BOOL;
                break;
            case is_null ($value) :
                $type = PDO::PARAM_NULL;
                break;
            default :
                $type = PDO::PARAM_STR;
            }
        }
      $this->stmt->bindValue($param, $value, $type);
    }

    // Execute the prepared statement
    public function execute() {
       $this->stmt->execute();
    }

    //set result all
    public function allResult() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //set single result
    public function singleResult() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    //check rows count
    public function rowCount() {
        return $this->stmt->rowCount();
    }

    // Returns the last inserted ID
    public function lastInsertId(){
        return $this->dbh->lastInsertId();
    }
}