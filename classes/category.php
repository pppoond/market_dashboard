<?php

require_once '../classes/database.php';

class Category extends Database
{
    protected $tableName = 'category';
    public function categorys()
    {
        $sql = "SELECT * FROM {$this->tableName} ORDER BY category_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function add(
        $category_name
    ) {
        $sql = "INSERT INTO {$this->tableName} (category_name) VALUES(?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$category_name]);
        $lastInsertedId = $this->conn->lastInsertId();
        return $lastInsertedId;
    }
    public function update($category_id, $username, $password, $category_name, $category_phone, $profile_image, $sex)
    {
        $md5Password = md5($password);
        $sql = "UPDATE category SET password= :password ,category_name= :category_name ,category_phone = :category_phone ,profile_image = :profile_image ,sex = :sex WHERE category_id = :category_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':password', $md5Password, PDO::PARAM_STR);
        $stmt->bindParam(':category_name', $category_name, PDO::PARAM_STR);
        $stmt->bindParam(':category_phone', $category_phone, PDO::PARAM_STR);
        $stmt->bindParam(':profile_image', $profile_image, PDO::PARAM_STR);
        $stmt->bindParam(':sex', $sex, PDO::PARAM_INT);
        $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
        $stmt->execute();
        return $category_id;
    }
    public function delete($category_id)
    {
        $sql = "DELETE FROM {$this->tableName} WHERE category_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$category_id]);
        return $category_id;
    }
    public function findById($category_id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE category_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$category_id]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function findByIdCateName($category_name)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE category_name = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$category_name]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
}
