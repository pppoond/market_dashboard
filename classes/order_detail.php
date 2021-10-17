<?php

require_once '../classes/database.php';

class OrderDetail extends Database
{
    protected $tableName = 'order_details';
    public function order_details()
    {
        $sql = "SELECT * FROM {$this->tableName} ORDER BY order_detail_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function add($order_id, $product_id, $quantity)
    {
        $sql = "INSERT INTO {$this->tableName} (order_id,product_id,quantity) VALUES(:order_id, :product_id, :quantity)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_STR);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_STR);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_STR);
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
    public function deleteByOrderId($order_id)
    {
        $sql = "DELETE FROM {$this->tableName} WHERE order_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$order_id]);
        return $order_id;
    }
    public function findById($order_detail_id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE order_detail_id = ?  ORDER BY order_detail_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$order_detail_id]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function findByOrderId($order_id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE order_id = ?  ORDER BY order_detail_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$order_id]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
}
