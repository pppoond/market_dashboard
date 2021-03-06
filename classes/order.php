<?php

require_once '../classes/database.php';

class Order extends Database
{
    protected $tableName = 'orders';
    public function orders()
    {
        $sql = "SELECT * FROM {$this->tableName} ORDER BY order_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }

    public function ordersByStore($store_id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE store_id = :store_id ORDER BY order_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':store_id', $store_id, PDO::PARAM_STR);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }

    public function ordersByRider($rider_id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE rider_id = :rider_id  ORDER BY order_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':rider_id', $rider_id, PDO::PARAM_STR);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function ordersByStatus($rider_id, $status)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE rider_id = :rider_id ORDER BY order_id DESC LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':rider_id', $rider_id, PDO::PARAM_STR);
        // $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }

    public function ordersByRiderStatus($rider_id, $status)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE rider_id = :rider_id AND status = :status ORDER BY order_id DESC LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':rider_id', $rider_id, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }

    public function ordersByStoreStatus($store_id, $status)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE store_id = :store_id AND status = :status ORDER BY order_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':store_id', $store_id, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }

    public function ordersByStoreStatusDateToday($store_id, $status, $order_date)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE store_id = :store_id AND status = :status AND order_date = :order_date ORDER BY order_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':store_id', $store_id, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':order_date', $order_date, PDO::PARAM_STR);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function ordersByRiderStatusDateToday($rider_id, $status, $order_date)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE rider_id = :rider_id AND status = :status AND order_date = :order_date ORDER BY order_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':rider_id', $rider_id, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':order_date', $order_date, PDO::PARAM_STR);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function ordersByStoreDate($store_id, $order_date)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE store_id = :store_id AND order_date = :order_date ORDER BY order_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':store_id', $store_id, PDO::PARAM_STR);
        $stmt->bindParam(':order_date', $order_date, PDO::PARAM_STR);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function ordersByRiderDate($rider_id, $order_date)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE rider_id = :rider_id AND order_date = :order_date ORDER BY order_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':rider_id', $rider_id, PDO::PARAM_STR);
        $stmt->bindParam(':order_date', $order_date, PDO::PARAM_STR);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function ordersByCustomer($customer_id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE customer_id = :customer_id  ORDER BY order_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_STR);
        $stmt->execute();
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function add($store_id, $rider_id, $customer_id, $address_id, $order_date, $total, $cash_method, $status)
    {
        $sql = "INSERT INTO {$this->tableName} (store_id, rider_id, customer_id, address_id ,order_date,total,cash_method,status) VALUES(:store_id, :rider_id, :customer_id, :address_id, :order_date,:total,:cash_method,:status)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':store_id', $store_id, PDO::PARAM_STR);
        $stmt->bindParam(':rider_id', $rider_id, PDO::PARAM_STR);
        $stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_STR);
        $stmt->bindParam(':address_id', $address_id, PDO::PARAM_STR);
        $stmt->bindParam(':order_date', $order_date, PDO::PARAM_STR);
        $stmt->bindParam(':total', $total, PDO::PARAM_STR);
        $stmt->bindParam(':cash_method', $cash_method, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->execute();
        $lastInsertedId = $this->conn->lastInsertId();
        return $lastInsertedId;
    }
    public function update($order_id, $store_id, $rider_id, $customer_id, $address_id, $order_date, $total, $cash_method, $order_status)
    {
        $sql = "UPDATE {$this->tableName} SET store_id= :store_id ,rider_id= :rider_id ,customer_id = :customer_id ,address_id = :address_id ,order_date = :order_date ,total = :total ,cash_method = :cash_method ,status = :order_status WHERE order_id = :order_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':store_id', $store_id, PDO::PARAM_STR);
        $stmt->bindParam(':rider_id', $rider_id, PDO::PARAM_STR);
        $stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_STR);
        $stmt->bindParam(':address_id', $address_id, PDO::PARAM_STR);
        $stmt->bindParam(':order_date', $order_date, PDO::PARAM_STR);
        $stmt->bindParam(':total', $total, PDO::PARAM_STR);
        $stmt->bindParam(':cash_method', $cash_method, PDO::PARAM_STR);
        $stmt->bindParam(':order_status', $order_status, PDO::PARAM_STR);
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_STR);
        $stmt->execute();
        return $order_id;
    }
    public function updateStatus($order_id, $order_status)
    {
        $sql = "UPDATE {$this->tableName} SET status = :status WHERE order_id = :order_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':status', $order_status, PDO::PARAM_STR);
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_STR);
        $stmt->execute();
        return $order_id;
    }
    public function updateRiderId($order_id, $rider_id)
    {
        $sql = "UPDATE {$this->tableName} SET rider_id = :rider_id WHERE order_id = :order_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':rider_id', $rider_id, PDO::PARAM_STR);
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_STR);
        $stmt->execute();
        return $order_id;
    }
    public function delete($order_id)
    {
        $sql = "DELETE FROM {$this->tableName} WHERE order_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$order_id]);
        return $order_id;
    }
    public function findById($order_id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE order_id = ?  ORDER BY order_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$order_id]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
    public function findByStoreId($storeId)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE store_id = ?  ORDER BY order_id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$storeId]);
        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }
}
