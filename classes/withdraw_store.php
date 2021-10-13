<?php

require_once '../classes/database.php';

class WithdrawStore extends Database
{
    protected $tableName = 'withdraw_store';
    public function withdraw_stores()
    {
        $sql = "SELECT * FROM withdraw_store";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function add($store_id, $total, $bank_name, $no_bank_account, $pay_status)
    {

        $sql = "INSERT INTO {$this->tableName} (store_id, total, bank_name, no_bank_account,pay_status) VALUES(?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$store_id, $total, $bank_name, $no_bank_account, $pay_status]);
        $lastInsertedId = $this->conn->lastInsertId();
        return $lastInsertedId;
    }
    public function update($withdraw_store_id, $username, $withdraw_store_phone, $withdraw_store_name, $profile_image)
    {

        $sql = "UPDATE {$this->tableName} SET username= :username ,withdraw_store_phone = :withdraw_store_phone ,withdraw_store_name = :withdraw_store_name ,profile_image = :profile_image WHERE withdraw_store_id = :withdraw_store_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':withdraw_store_phone', $withdraw_store_phone, PDO::PARAM_STR);
        $stmt->bindParam(':withdraw_store_name', $withdraw_store_name, PDO::PARAM_STR);
        $stmt->bindParam(':profile_image', $profile_image, PDO::PARAM_STR);
        $stmt->bindParam(':withdraw_store_id', $withdraw_store_id, PDO::PARAM_STR);

        $stmt->execute();
        return $withdraw_store_id;
    }
    public function updatePayStatus($wd_store_id, $pay_status)
    {

        $sql = "UPDATE {$this->tableName} SET pay_status = :pay_status WHERE wd_store_id = :wd_store_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':pay_status', $pay_status, PDO::PARAM_STR);
        $stmt->bindParam(':wd_store_id', $wd_store_id, PDO::PARAM_STR);
        $stmt->execute();
        return $wd_store_id;
    }
    public function delete($wd_store_id)
    {
        $sql = "DELETE FROM {$this->tableName} WHERE wd_store_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$wd_store_id]);
    }
    public function findById($wd_store_id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE wd_store_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$wd_store_id]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function findByStoreId($store_id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE store_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$store_id]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
}
