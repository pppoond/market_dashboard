<?php

require_once '../classes/database.php';

class Customer extends Database
{
    protected $tableName = 'customers';
    public function add($name, $category)
    {
        $sql = "INSERT INTO {$this->tableName} (name,category) VALUES(:name,:category)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name',$name,PDO::PARAM_STR);
        $stmt->bindParam(':category',$category,PDO::PARAM_STR);
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
    public function findById()
    {
    }
}
