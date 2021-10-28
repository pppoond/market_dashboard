<?php

require_once '../classes/database.php';

class Rider extends Database
{
    protected $tableName = 'rider';
    public function riders()
    {
        $sql = "SELECT * FROM {$this->tableName} ORDER BY rider_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function add($email, $username, $password, $rider_phone, $rider_name)
    {
        $md5Password = md5($password);
        $sql = "INSERT INTO {$this->tableName} (email,username,password,rider_phone,rider_name) VALUES(?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email, $username, $md5Password, $rider_phone, $rider_name]);
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
        $sql = "UPDATE {$this->tableName} SET credit = ? ,wallet = ? WHERE rider_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$credit, $wallet, $rider_id]);
        return $rider_id;
    }
    public function updateWallet($rider_id, $wallet)
    {
        $sql = "UPDATE {$this->tableName} SET wallet = ? WHERE rider_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$wallet, $rider_id]);
        return $rider_id;
    }
    public function updateCredit($rider_id, $credit)
    {
        $sql = "UPDATE {$this->tableName} SET credit = ? WHERE rider_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$credit, $rider_id]);
        return $rider_id;
    }
    public function updateStatus($rider_id, $rider_status)
    {
        $sql = "UPDATE {$this->tableName} SET rider_status = ? WHERE rider_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$rider_status, $rider_id]);
        return $rider_id;
    }
    public function updateLatLng($rider_id, $lat, $lng)
    {
        $sql = "UPDATE {$this->tableName} SET lat = ?,lng = ? WHERE rider_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$lat, $lng, $rider_id]);
        return $rider_id;
    }
    public function delete($rider_id)
    {
        $sql = "DELETE FROM {$this->tableName} WHERE rider_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$rider_id]);
    }
    public function findById($rider_id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE rider_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$rider_id]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function findByUsername($username)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function findByRiderStatus($rider_status)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE rider_status = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$rider_status]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function loginRider($username, $password)
    {
        $md5Password = md5($password);
        $sql = "SELECT * FROM {$this->tableName} WHERE username = ? AND password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username, $md5Password]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
}
