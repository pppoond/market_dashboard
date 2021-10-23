<?php

require_once '../classes/database.php';

class Post extends Database
{
    protected $tableName = 'posts';
    public function posts()
    {
        $sql = "SELECT * FROM {$this->tableName} ORDER BY post_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function add(
        $store_id,
        $message,
        $images
    ) {
        $sql = "INSERT INTO {$this->tableName} (store_id,message,images) VALUES(?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$store_id, $message, $images]);
        $lastInsertedId = $this->conn->lastInsertId();
        return $lastInsertedId;
    }
    public function update(
        $post_id,
        $store_id,
        $message,
        $images
    ) {
        $sql = "UPDATE {$this->tableName} SET store_id = :store_id, message = :message, images = :images WHERE post_id = :post_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':store_id', $store_id, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        $stmt->bindParam(':images', $images, PDO::PARAM_STR);
        $stmt->bindParam(':post_id', $post_id, PDO::PARAM_STR);
        $stmt->execute();
        return $post_id;
    }
    public function delete($post_id)
    {
        $sql = "DELETE FROM {$this->tableName} WHERE post_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$post_id]);
        return $post_id;
    }
    public function findById($post_id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE post_id = ?  ORDER BY post_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$post_id]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function findByIdStoreId($store_id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE store_id = ?  ORDER BY post_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$store_id]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
}
