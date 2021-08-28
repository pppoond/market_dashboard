<?php

require_once '../classes/database.php';

class Store extends Database
{
    protected $tableName = 'store';
    public function stores()
    {
        $sql = "SELECT * FROM store";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function add($username, $password, $store_phone, $store_name)
    {
        $sql = "INSERT INTO {$this->tableName} (username, password, store_phone, store_name) VALUES(?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username, $password, $store_phone, $store_name]);
        $lastInsertedId = $this->conn->lastInsertId();
        return $lastInsertedId;
    }
    public function update($store_id, $username, $password, $store_name, $store_phone, $sex)
    {
        $sql = "UPDATE store SET username= ? ,password= ? ,store_name= ? ,store_phone = ? ,sex = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username, $password, $store_name, $store_phone, $sex]);
        return $store_id;
    }
    public function delete($store_id)
    {
        $sql = "DELETE FROM store WHERE store_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$store_id]);
    }
    public function findById($store_id)
    {
        $sql = "SELECT * FROM store WHERE store_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$store_id]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function loginstore($username, $password)
    {
        $sql = "SELECT * FROM store WHERE username = ? AND password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username, $password]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
}
