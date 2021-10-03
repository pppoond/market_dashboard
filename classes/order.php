<?php

require_once '../classes/database.php';

class Order extends Database
{
    protected $tableName = 'orders';
    public function orders()
    {
        $sql = "SELECT * FROM {$this->tableName}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }

    public function ordersByStore($store_id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE store_id = :store_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':store_id', $store_id, PDO::PARAM_STR);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }

    public function ordersByRider($rider_id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE rider_id = :rider_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':rider_id', $rider_id, PDO::PARAM_STR);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function ordersByCustomer($customer_id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE customer_id = :customer_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_STR);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function add($store_id, $category_id, $product_name, $product_detail)
    {
        $sql = "INSERT INTO {$this->tableName} (store_id,category_id, product_name, product_detail) VALUES(:store_id,:category_id, :product_name, :product_detail)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':store_id', $store_id, PDO::PARAM_STR);
        $stmt->bindParam(':category_id', $category_id, PDO::PARAM_STR);
        $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
        $stmt->bindParam(':product_detail', $product_detail, PDO::PARAM_STR);
        $stmt->execute();
        $lastInsertedId = $this->conn->lastInsertId();
        return $lastInsertedId;
    }
    public function update($product_id, $category_id, $product_name, $product_detail)
    {
        $sql = "UPDATE {$this->tableName} SET category_id= :category_id ,product_name= :product_name ,product_detail = :product_detail WHERE product_id = :product_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_STR);
        $stmt->bindParam(':category_id', $category_id, PDO::PARAM_STR);
        $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
        $stmt->bindParam(':product_detail', $product_detail, PDO::PARAM_STR);
        $stmt->execute();
        return $product_id;
    }
    public function updateStatus($product_id, $product_status)
    {
        $sql = "UPDATE {$this->tableName} SET status= :status WHERE product_id = :product_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_STR);
        $stmt->bindParam(':status', $product_status, PDO::PARAM_STR);
        $stmt->execute();
        return $product_id;
    }
    public function delete()
    {
    }
    public function findById($productId)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE order_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$productId]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function findByStoreId($storeId)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE store_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$storeId]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
}
