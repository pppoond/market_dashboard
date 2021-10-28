<?php

require_once '../classes/database.php';

class Customer extends Database
{
    protected $tableName = 'customer';
    public function customers()
    {
        $sql = "SELECT * FROM {$this->tableName} ORDER BY customer_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function add(
        $username,
        $password,
        $customerName,
        $customerPhone
    ) {
        $md5Password = md5($password);
        $sql = "INSERT INTO {$this->tableName} (username,password,customer_name,customer_phone) VALUES(?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username, $md5Password, $customerName, $customerPhone]);
        $lastInsertedId = $this->conn->lastInsertId();
        return $lastInsertedId;
    }
    public function update($customer_id, $username, $password, $customer_name, $customer_phone, $profile_image, $sex)
    {
        $md5Password = md5($password);
        $sql = "UPDATE customer SET password= :password ,customer_name= :customer_name ,customer_phone = :customer_phone ,profile_image = :profile_image ,sex = :sex WHERE customer_id = :customer_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':password', $md5Password, PDO::PARAM_STR);
        $stmt->bindParam(':customer_name', $customer_name, PDO::PARAM_STR);
        $stmt->bindParam(':customer_phone', $customer_phone, PDO::PARAM_STR);
        $stmt->bindParam(':profile_image', $profile_image, PDO::PARAM_STR);
        $stmt->bindParam(':sex', $sex, PDO::PARAM_INT);
        $stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);
        $stmt->execute();
        return $customer_id;
    }
    public function delete($customer_id)
    {
        $sql = "DELETE FROM customer WHERE customer_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$customer_id]);
        return $customer_id;
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
    public function findByUsername($username)
    {
        $sql = "SELECT * FROM customer WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function loginCustomer($username, $password)
    {
        $md5Password = md5($password);
        $sql = "SELECT * FROM customer WHERE username = ? AND password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username, $md5Password]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
}
