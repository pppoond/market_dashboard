<?php

require_once '../classes/database.php';

class Admin extends Database
{
    protected $tableName = 'admin';
    public function admins()
    {
        $sql = "SELECT * FROM {$this->tableName}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function add(
        $username,
        $password,
        $adminName,
        $adminPhone
    ) {
        $md5Password = md5($password);
        $sql = "INSERT INTO {$this->tableName} (username,password,admin_name,admin_phone) VALUES(?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username, $md5Password, $adminName, $adminPhone]);
        $lastInsertedId = $this->conn->lastInsertId();
        return $lastInsertedId;
    }
    public function update($admin_id, $username, $password, $admin_name, $admin_phone, $profile_image, $sex)
    {
        $md5Password = md5($password);
        $sql = "UPDATE admin SET password= :password ,admin_name= :admin_name ,admin_phone = :admin_phone ,profile_image = :profile_image ,sex = :sex WHERE admin_id = :admin_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':password', $md5Password, PDO::PARAM_STR);
        $stmt->bindParam(':admin_name', $admin_name, PDO::PARAM_STR);
        $stmt->bindParam(':admin_phone', $admin_phone, PDO::PARAM_STR);
        $stmt->bindParam(':profile_image', $profile_image, PDO::PARAM_STR);
        $stmt->bindParam(':sex', $sex, PDO::PARAM_INT);
        $stmt->bindParam(':admin_id', $admin_id, PDO::PARAM_INT);
        $stmt->execute();
        return $admin_id;
    }
    public function delete($admin_id)
    {
        $sql = "DELETE FROM admin WHERE admin_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$admin_id]);
        return $admin_id;
    }
    public function findById($admin_id)
    {
        $sql = "SELECT * FROM admin WHERE admin_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$admin_id]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function findByUsername($username)
    {
        $sql = "SELECT * FROM admin WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function loginadmin($username, $password)
    {
        $md5Password = md5($password);
        $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username, $md5Password]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
}
