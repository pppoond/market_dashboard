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
    public function add($product_id, $pro_img_addr)
    {
        $sql = "INSERT INTO {$this->tableName} (product_id,pro_img_addr) VALUES(:product_id,:pro_img_addr)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_STR);
        $stmt->bindParam(':pro_img_addr', $pro_img_addr, PDO::PARAM_STR);
        $stmt->execute();
        $lastInsertedId = $this->conn->lastInsertId();
        return $lastInsertedId;
    }
    public function update($pro_img_id, $pro_img_addr)
    {
        $sql = "UPDATE {$this->tableName} SET pro_img_addr = ? WHERE pro_img_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$pro_img_id, $pro_img_addr]);
        return $pro_img_id;
    }
    public function delete($pro_img_id)
    {
        $sql = "DELETE FROM {$this->tableName} WHERE pro_img_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$pro_img_id]);
        return $pro_img_id;
    }
    public function deleteByProductId($product_id)
    {
        $sql = "DELETE FROM {$this->tableName} WHERE product_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$product_id]);
    }
    public function findById($pro_img_id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE pro_img_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$pro_img_id]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
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
