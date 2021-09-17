<?php

require_once '../classes/database.php';

class ProductImage extends Database
{
    protected $tableName = 'product_images';
    public function product_images()
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
    public function findById($product_imagesId)
    {
    }
    public function findByProductId($product_id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE product_id = :product_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_STR);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
}
