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
    public function update($rider_id, $username, $password, $rider_name, $rider_phone, $sex)
    {
        $sql = "UPDATE rider SET username= ? ,password= ? ,rider_name= ? ,rider_phone = ? ,sex = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username, $password, $rider_name, $rider_phone, $sex]);
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
    public function loginRider($username, $password)
    {
        $sql = "SELECT * FROM rider WHERE username = ? AND password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username, $password]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
}
