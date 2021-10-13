<?php

class Database {
    private $dbServer = '202.28.34.205';
    private $dbUser = '61011211041';
    private $dbPassword = '610112110411234';
    private $dbName = '61011211041';
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
