<?php

require_once '../classes/database.php';

class Rider extends Database
{
    protected $tableName = 'rider';
    public function riders()
    {
        $sql = "SELECT * FROM rider";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function add($name, $category, $password)
    {
        $md5Password = md5($password);
        $sql = "INSERT INTO {$this->tableName} (name,category) VALUES(:name,:category)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->execute();
        $lastInsertedId = $this->conn->lastInsertId();
        return $lastInsertedId;
    }
    public function update($rider_id, $username, $password, $rider_phone, $rider_name, $sex, $profile_image)
    {
        $md5Password = md5($password);
        $sql = "UPDATE {$this->tableName} SET username= :username ,password= :password ,rider_phone = :rider_phone ,rider_name = :rider_name  ,sex = :sex ,profile_image = :profile_image WHERE rider_id = :rider_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $md5Password, PDO::PARAM_STR);
        $stmt->bindParam(':rider_phone', $rider_phone, PDO::PARAM_STR);
        $stmt->bindParam(':rider_name', $rider_name, PDO::PARAM_STR);
        $stmt->bindParam(':sex', $sex, PDO::PARAM_STR);
        $stmt->bindParam(':profile_image', $profile_image, PDO::PARAM_STR);
        $stmt->bindParam(':rider_id', $rider_id, PDO::PARAM_STR);
        $stmt->execute();
        return $rider_id;
    }
    public function updateCreditWallet($rider_id, $credit, $wallet)
    {
        $sql = "UPDATE rider SET credit = ? ,wallet = ? WHERE rider_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$credit, $wallet, $rider_id]);
        return $rider_id;
    }
    public function delete($rider_id)
    {
        $sql = "DELETE FROM rider WHERE rider_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$rider_id]);
    }
    public function findById($rider_id)
    {
        $sql = "SELECT * FROM rider WHERE rider_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$rider_id]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function findByUsername($username)
    {
        $sql = "SELECT * FROM rider WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function findByRiderStatus($rider_status)
    {
        $sql = "SELECT * FROM rider WHERE rider_status = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$rider_status]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function loginRider($username, $password)
    {
        $md5Password = md5($password);
        $sql = "SELECT * FROM rider WHERE username = ? AND password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username, $md5Password]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
}
