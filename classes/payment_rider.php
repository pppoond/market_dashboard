<?php

require_once '../classes/database.php';

class PaymentRider extends Database
{
    protected $tableName = 'payment_rider';
    public function payment_riders()
    {
        $sql = "SELECT * FROM {$this->tableName} ORDER BY pay_rider_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function add($rider_id, $total, $slip, $bank_name, $account_name, $no_bank_account, $pay_status)
    {

        $sql = "INSERT INTO {$this->tableName} (rider_id, total,slip, bank_name, account_name,no_bank_account,pay_status) VALUES(?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$rider_id, $total, $slip, $bank_name, $account_name, $no_bank_account, $pay_status]);
        $lastInsertedId = $this->conn->lastInsertId();
        return $lastInsertedId;
    }
    public function update($pay_rider_id, $rider_id, $total, $bank_name, $account_name, $no_bank_account)
    {

        $sql = "UPDATE {$this->tableName} SET rider_id = :rider_id ,total = :total ,bank_name = :bank_name ,account_name = :account_name ,no_bank_account = :no_bank_account WHERE pay_rider_id = :pay_rider_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':rider_id', $rider_id, PDO::PARAM_STR);
        $stmt->bindParam(':total', $total, PDO::PARAM_STR);
        $stmt->bindParam(':bank_name', $bank_name, PDO::PARAM_STR);
        $stmt->bindParam(':account_name', $account_name, PDO::PARAM_STR);
        $stmt->bindParam(':no_bank_account', $no_bank_account, PDO::PARAM_STR);
        $stmt->bindParam(':pay_rider_id', $pay_rider_id, PDO::PARAM_STR);

        $stmt->execute();
        return $pay_rider_id;
    }
    public function updatePayStatus($pay_rider_id, $pay_status)
    {

        $sql = "UPDATE {$this->tableName} SET pay_status = :pay_status WHERE pay_rider_id = :pay_rider_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':pay_status', $pay_status, PDO::PARAM_STR);
        $stmt->bindParam(':pay_rider_id', $pay_rider_id, PDO::PARAM_STR);
        $stmt->execute();
        return $pay_rider_id;
    }
    public function delete($pay_rider_id)
    {
        $sql = "DELETE FROM {$this->tableName} WHERE pay_rider_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$pay_rider_id]);
    }
    public function findById($pay_rider_id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE pay_rider_id = ?  ORDER BY pay_rider_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$pay_rider_id]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function findBypayment_riderId($rider_id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE rider_id = ?  ORDER BY pay_rider_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$rider_id]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
}
