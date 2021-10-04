<?php

class Database {
    private $dbServer = 'localhost';
    private $dbUser = 'root';
    private $dbPassword = 'root';
    private $dbName = 'taladsod';
    protected $conn;

    public function __construct()
    {
        try {
            $dsn = "mysql:host={$this->dbServer}; dbname={$this->dbName}; charset=utf8";
            $option = array(PDO::ATTR_PERSISTENT);
            $this->conn = new PDO($dsn,$this->dbUser,$this->dbPassword,$option);
        } catch(PDOException $e) {
            echo "Connection Error : " . $e->getMessage();
        }
    }
}
