<?php

require_once '../classes/database.php';

class Product extends Database
{
    protected $tableName = 'products';
    public function products()
    {
        $sql = "SELECT * FROM {$this->tableName}";
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
    public function update()
    {
    }
    public function delete()
    {
    }
    public function findById($productId)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE product_id = ?";
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
