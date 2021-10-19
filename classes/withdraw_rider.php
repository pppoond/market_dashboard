<?php

require_once '../classes/database.php';

class WithdrawRider extends Database
{
    protected $tableName = 'withdraw_rider';
    public function withdraw_riders()
    {
        $sql = "SELECT * FROM withdraw_rider ORDER BY wd_rider_id ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function add($rider_id, $total, $bank_name, $no_bank_account, $pay_status)
    {

        $sql = "INSERT INTO {$this->tableName} (rider_id, total, bank_name, no_bank_account,pay_status) VALUES(?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$rider_id, $total, $bank_name, $no_bank_account, $pay_status]);
        $lastInsertedId = $this->conn->lastInsertId();
        return $lastInsertedId;
    }
    public function update($wd_rider_id, $rider_id, $total, $bank_name, $no_bank_account)
    {

        $sql = "UPDATE {$this->tableName} SET rider_id = :rider_id ,total = :total ,bank_name = :bank_name ,no_bank_account = :no_bank_account WHERE wd_rider_id = :wd_rider_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':rider_id', $rider_id, PDO::PARAM_STR);
        $stmt->bindParam(':total', $total, PDO::PARAM_STR);
        $stmt->bindParam(':bank_name', $bank_name, PDO::PARAM_STR);
        $stmt->bindParam(':no_bank_account', $no_bank_account, PDO::PARAM_STR);
        $stmt->bindParam(':wd_rider_id', $wd_rider_id, PDO::PARAM_STR);

        $stmt->execute();
        return $wd_rider_id;
    }
    public function updatePayStatus($wd_rider_id, $pay_status)
    {

        $sql = "UPDATE {$this->tableName} SET pay_status = :pay_status WHERE wd_rider_id = :wd_rider_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':pay_status', $pay_status, PDO::PARAM_STR);
        $stmt->bindParam(':wd_rider_id', $wd_rider_id, PDO::PARAM_STR);
        $stmt->execute();
        return $wd_rider_id;
    }
    public function delete($wd_rider_id)
    {
        $sql = "DELETE FROM {$this->tableName} WHERE wd_rider_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$wd_rider_id]);
    }
    public function findById($wd_rider_id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE wd_rider_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$wd_rider_id]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function findByriderId($rider_id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE rider_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$rider_id]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
}
