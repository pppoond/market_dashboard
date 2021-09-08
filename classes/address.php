<?php

require_once '../classes/database.php';

class Address extends Database
{
    protected $tableName = 'addresses';
    public function addresss()
    {
        $sql = "SELECT * FROM {$this->tableName}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function addAddress($post_customer_id, $post_address, $post_lat, $post_lng, $post_addr_status)
    {
        // $customer_id = $customer_id;
        // $address = $address;
        // $lat = $lat;
        // $lng = $lng;
        // $addr_status = $addr_status;
        // $sql = "INSERT INTO {$this->tableName} (customer_id ,address, lat, lng, addr_status) VALUES(':customer_id' ,':address' ,':lat' ,':lng' ,':addr_status')";
        // $sql = "INSERT INTO addresses(customer_id, address, lat, lng, addr_status) VALUES ('5', 'Sdjlaskdj', '78.4684654645', '98.34654213213', '0')";
        $sql = "INSERT INTO addresses(customer_id, address, lat, lng, addr_status) VALUES ('{$post_customer_id}', '{$post_address}', '{$post_lat}', '{$post_lng}', '{$post_addr_status}')";
        $stmt = $this->conn->prepare($sql);
        // $stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_STR);
        // $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        // $stmt->bindParam(':lat', $lat, PDO::PARAM_STR);
        // $stmt->bindParam(':lng', $lng, PDO::PARAM_STR);
        // $stmt->bindParam(':addr_status', $addr_status, PDO::PARAM_STR);
        // $stmt->execute([$customer_id, $address, $lat, $lng, $addr_status]);
        $stmt->execute();
        $lastInsertedId = $this->conn->lastInsertId();
        return $lastInsertedId;
    }
    public function update($address_id, $username, $password, $address_name, $address_phone, $profile_image, $sex)
    {
        $md5Password = md5($password);
        $sql = "UPDATE {$this->tableName} SET password= :password ,address_name= :address_name ,address_phone = :address_phone ,profile_image = :profile_image ,sex = :sex WHERE address_id = :address_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':password', $md5Password, PDO::PARAM_STR);
        $stmt->bindParam(':address_name', $address_name, PDO::PARAM_STR);
        $stmt->bindParam(':address_phone', $address_phone, PDO::PARAM_STR);
        $stmt->bindParam(':profile_image', $profile_image, PDO::PARAM_STR);
        $stmt->bindParam(':sex', $sex, PDO::PARAM_INT);
        $stmt->bindParam(':address_id', $address_id, PDO::PARAM_INT);
        $stmt->execute();
        return $address_id;
    }
    public function delete($address_id)
    {
        $sql = "DELETE FROM {$this->tableName} WHERE address_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$address_id]);
    }
    public function findById($address_id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE address_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$address_id]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function findByCustomerId($customer_id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE customer_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$customer_id]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
}
