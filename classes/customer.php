<?php

require_once '../classes/database.php';

class Customer extends Database
{
    protected $tableName = 'customer';
    public function customers()
    {
        $sql = "SELECT * FROM customer";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function add($name, $category)
    {
        $sql = "INSERT INTO {$this->tableName} (name,category) VALUES(:name,:category)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->execute();
        $lastInsertedId = $this->conn->lastInsertId();
        return $lastInsertedId;
    }
    public function update($customer_id, $username, $password, $customer_name, $customer_phone, $sex)
    {
        $sql = "UPDATE customer SET username= ? ,password= ? ,customer_name= ? ,customer_phone = ? ,sex = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username, $password, $customer_name, $customer_phone, $sex]);
        return $customer_id;
    }
    public function delete($customer_id)
    {
        $sql = "DELETE FROM customer WHERE customer_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$customer_id]);
    }
    public function findById($customer_id)
    {
        $sql = "SELECT * FROM customer WHERE customer_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$customer_id]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
}
