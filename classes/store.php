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
    public function add($email, $username, $password, $store_phone, $store_name)
    {
        $md5Password = md5($password);

        $sql = "INSERT INTO {$this->tableName} (email,username, password, store_phone, store_name) VALUES(?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email, $username, $md5Password, $store_phone, $store_name]);
        $lastInsertedId = $this->conn->lastInsertId();
        return $lastInsertedId;
    }
    public function update($store_id, $username, $store_phone, $store_name, $profile_image)
    {

        $sql = "UPDATE {$this->tableName} SET username= :username ,store_phone = :store_phone ,store_name = :store_name ,profile_image = :profile_image WHERE store_id = :store_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':store_phone', $store_phone, PDO::PARAM_STR);
        $stmt->bindParam(':store_name', $store_name, PDO::PARAM_STR);
        $stmt->bindParam(':profile_image', $profile_image, PDO::PARAM_STR);
        $stmt->bindParam(':store_id', $store_id, PDO::PARAM_STR);

        $stmt->execute();
        return $store_id;
    }
    public function updatePassword($store_id, $password)
    {
        $md5Password = md5($password);
        $sql = "UPDATE {$this->tableName} SET password = :password WHERE store_id = :store_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':password', $md5Password, PDO::PARAM_STR);
        $stmt->bindParam(':store_id', $store_id, PDO::PARAM_STR);
        $stmt->execute();
        return $store_id;
    }
    public function updateStatus($store_id, $store_status)
    {
        $sql = "UPDATE {$this->tableName} SET status = :status WHERE store_id = :store_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':status', $store_status, PDO::PARAM_STR);
        $stmt->bindParam(':store_id', $store_id, PDO::PARAM_STR);
        $stmt->execute();
        return $store_id;
    }
    public function updateWallet($store_id, $wallet)
    {
        $sql = "UPDATE {$this->tableName} SET wallet = :wallet WHERE store_id = :store_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':wallet', $wallet, PDO::PARAM_STR);
        $stmt->bindParam(':store_id', $store_id, PDO::PARAM_STR);
        $stmt->execute();
        return $store_id;
    }
    public function updateLatLng($store_id, $lat, $lng)
    {
        $sql = "UPDATE {$this->tableName} SET lat = :lat, lng = :lng WHERE store_id = :store_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':lat', $lat, PDO::PARAM_STR);
        $stmt->bindParam(':lng', $lng, PDO::PARAM_STR);
        $stmt->bindParam(':store_id', $store_id, PDO::PARAM_STR);
        $stmt->execute();
        return $store_id;
    }
    public function delete($store_id)
    {
        $sql = "DELETE FROM {$this->tableName} WHERE store_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$store_id]);
    }
    public function findById($store_id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE store_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$store_id]);
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
    public function loginstore($username, $password)
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
