<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json;charset=utf-8');
require '../classes/order.php';
require '../classes/store.php';
require '../classes/rider.php';
require '../classes/customer.php';
require '../classes/address.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $order = new Order();
    $store = new Store();
    $rider = new Rider();
    $customer = new Customer();
    $address_class = new Address();
    $data_arr = array();
    $data_arr['result'] = array();

    if (isset($_GET['findid'])) {
        $results = $order->findById($_GET['findid']);
        foreach ($results as $result) {
            $order_id = $result['order_id'];
            $store_id = $result['store_id'];
            $rider_id = $result['rider_id'];
            $customer_id = $result['customer_id'];
            $address_id = $result['address_id'];
            $order_date = $result['order_date'];
            $total = $result['total'];
            $cash_method = $result['cash_method'];
            $order_status = $result['status'];
            $time_reg_order = $result['time_reg'];

            $store_item = array();
            $result_stores = $store->findById($store_id);
            foreach ($result_stores as $result_store) {
                $store_id = $result_store['store_id'];
                $username = $result_store['username'];
                $password = $result_store['password'];
                $store_name = $result_store['store_name'];
                $store_phone = $result_store['store_phone'];
                $profile_image = $result_store['profile_image'];
                $wallet = $result_store['wallet'];
                $lat = $result_store['lat'];
                $lng = $result_store['lng'];
                $store_status = $result_store['status'];
                $time_reg = $result_store['time_reg'];
                $store_item = array(
                    "store_id" => $store_id,
                    "username" => $username,
                    "password" => $password,
                    "store_name" => $store_name,
                    "store_phone" => $store_phone,
                    "profile_image" => $profile_image,
                    "wallet" => $wallet,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "status" => $store_status,
                    "time_reg" => $time_reg,
                );
            }

            $rider_item = array();
            $result_riders = $rider->findById($rider_id);
            foreach ($result_riders as $result_rider) {
                $rider_id = $result_rider['rider_id'];
                $username = $result_rider['username'];
                $password = $result_rider['password'];
                $rider_phone = $result_rider['rider_phone'];
                $rider_name = $result_rider['rider_name'];
                $sex = $result_rider['sex'];
                $rider_status = $result_rider['rider_status'];
                $credit = $result_rider['credit'];
                $wallet = $result_rider['wallet'];
                $profile_image = $result_rider['profile_image'];
                $lat = $result_rider['lat'];
                $lng = $result_rider['lng'];
                $time_reg = $result_rider['time_reg'];
                $rider_item = array(
                    "rider_id" => $rider_id,
                    "username" => $username,
                    "password" => $password,
                    "rider_phone" => $rider_phone,
                    "rider_name" => $rider_name,
                    "sex" => $sex,
                    "rider_status" => $rider_status,
                    "credit" => $credit,
                    "wallet" => $wallet,
                    "profile_image" => $profile_image,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "time_reg" => $time_reg,
                );
            }

            $customer_item = array();
            $result_customers = $customer->findById($customer_id);
            foreach ($result_customers as $result_customer) {
                $customer_id = $result_customer['customer_id'];
                $username = $result_customer['username'];
                $password = $result_customer['password'];
                $customer_name = $result_customer['customer_name'];
                $customer_phone = $result_customer['customer_phone'];
                $sex = $result_customer['sex'];
                $profile_image = $result_customer['profile_image'];
                $time_reg = $result_customer['time_reg'];
                $customer_item = array(
                    "customer_id" => $customer_id,
                    "username" => $username,
                    "password" => $password,
                    "customer_name" => $customer_name,
                    "customer_phone" => $customer_phone,
                    "profile_image" => $profile_image,
                    "sex" => $sex,
                    "time_reg" => $time_reg,
                );
            }

            $address_item = array();
            $result_addresses = $address_class->findById($address_id);
            foreach ($result_addresses as $result_addresse) {
                $address_id = $result_addresse['address_id'];
                $customer_id = $result_addresse['customer_id'];
                $address = $result_addresse['address'];
                $lat = $result_addresse['lat'];
                $lng = $result_addresse['lng'];
                $addr_status = $result_addresse['addr_status'];
                $time_reg = $result_addresse['time_reg'];
                $address_item = array(
                    "address_id" => $address_id,
                    "customer_id" => $customer_id,
                    "address" =>  $address,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "addr_status" => $addr_status,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "order_id" => $order_id,
                "store_id" => $store_item,
                "rider_id" => $rider_item,
                "customer_id" => $customer_item,
                "address_id" => $address_item,
                "order_date" => $order_date,
                "total" => $total,
                "cash_method" => $cash_method,
                "status" => $order_status,
                "time_reg" => $time_reg_order,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else if (isset($_GET['customer_id'])) {
        $results = $order->ordersByCustomer($_GET['customer_id']);
        foreach ($results as $result) {
            $order_id = $result['order_id'];
            $store_id = $result['store_id'];
            $rider_id = $result['rider_id'];
            $customer_id = $result['customer_id'];
            $address_id = $result['address_id'];
            $order_date = $result['order_date'];
            $total = $result['total'];
            $cash_method = $result['cash_method'];
            $order_status = $result['status'];
            $time_reg_order = $result['time_reg'];

            $store_item = array();
            $result_stores = $store->findById($store_id);
            foreach ($result_stores as $result_store) {
                $store_id = $result_store['store_id'];
                $username = $result_store['username'];
                $password = $result_store['password'];
                $store_name = $result_store['store_name'];
                $store_phone = $result_store['store_phone'];
                $profile_image = $result_store['profile_image'];
                $wallet = $result_store['wallet'];
                $lat = $result_store['lat'];
                $lng = $result_store['lng'];
                $store_status = $result_store['status'];
                $time_reg = $result_store['time_reg'];
                $store_item = array(
                    "store_id" => $store_id,
                    "username" => $username,
                    "password" => $password,
                    "store_name" => $store_name,
                    "store_phone" => $store_phone,
                    "profile_image" => $profile_image,
                    "wallet" => $wallet,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "status" => $store_status,
                    "time_reg" => $time_reg,
                );
            }

            $rider_item = array();
            $result_riders = $rider->findById($rider_id);
            foreach ($result_riders as $result_rider) {
                $rider_id = $result_rider['rider_id'];
                $username = $result_rider['username'];
                $password = $result_rider['password'];
                $rider_phone = $result_rider['rider_phone'];
                $rider_name = $result_rider['rider_name'];
                $sex = $result_rider['sex'];
                $rider_status = $result_rider['rider_status'];
                $credit = $result_rider['credit'];
                $wallet = $result_rider['wallet'];
                $profile_image = $result_rider['profile_image'];
                $lat = $result_rider['lat'];
                $lng = $result_rider['lng'];
                $time_reg = $result_rider['time_reg'];
                $rider_item = array(
                    "rider_id" => $rider_id,
                    "username" => $username,
                    "password" => $password,
                    "rider_phone" => $rider_phone,
                    "rider_name" => $rider_name,
                    "sex" => $sex,
                    "rider_status" => $rider_status,
                    "credit" => $credit,
                    "wallet" => $wallet,
                    "profile_image" => $profile_image,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "time_reg" => $time_reg,
                );
            }

            $customer_item = array();
            $result_customers = $customer->findById($customer_id);
            foreach ($result_customers as $result_customer) {
                $customer_id = $result_customer['customer_id'];
                $username = $result_customer['username'];
                $password = $result_customer['password'];
                $customer_name = $result_customer['customer_name'];
                $customer_phone = $result_customer['customer_phone'];
                $sex = $result_customer['sex'];
                $profile_image = $result_customer['profile_image'];
                $time_reg = $result_customer['time_reg'];
                $customer_item = array(
                    "customer_id" => $customer_id,
                    "username" => $username,
                    "password" => $password,
                    "customer_name" => $customer_name,
                    "customer_phone" => $customer_phone,
                    "profile_image" => $profile_image,
                    "sex" => $sex,
                    "time_reg" => $time_reg,
                );
            }

            $address_item = array();
            $result_addresses = $address_class->findById($address_id);
            foreach ($result_addresses as $result_addresse) {
                $address_id = $result_addresse['address_id'];
                $customer_id = $result_addresse['customer_id'];
                $address = $result_addresse['address'];
                $lat = $result_addresse['lat'];
                $lng = $result_addresse['lng'];
                $addr_status = $result_addresse['addr_status'];
                $time_reg = $result_addresse['time_reg'];
                $address_item = array(
                    "address_id" => $address_id,
                    "customer_id" => $customer_id,
                    "address" =>  $address,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "addr_status" => $addr_status,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "order_id" => $order_id,
                "store_id" => $store_item,
                "rider_id" => $rider_item,
                "customer_id" => $customer_item,
                "address_id" => $address_item,
                "order_date" => $order_date,
                "total" => $total,
                "cash_method" => $cash_method,
                "status" => $order_status,
                "time_reg" => $time_reg_order,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else if (isset($_GET['store_id']) && isset($_GET['order_status']) && isset($_GET['order_date'])) {
        $results = $order->ordersByStoreStatusDateToday($_GET['store_id'], $_GET['order_status'], $_GET['order_date']);
        foreach ($results as $result) {
            $order_id = $result['order_id'];
            $store_id = $result['store_id'];
            $rider_id = $result['rider_id'];
            $customer_id = $result['customer_id'];
            $address_id = $result['address_id'];
            $order_date = $result['order_date'];
            $total = $result['total'];
            $cash_method = $result['cash_method'];
            $order_status = $result['status'];
            $time_reg_order = $result['time_reg'];

            $store_item = array();
            $result_stores = $store->findById($store_id);
            foreach ($result_stores as $result_store) {
                $store_id = $result_store['store_id'];
                $username = $result_store['username'];
                $password = $result_store['password'];
                $store_name = $result_store['store_name'];
                $store_phone = $result_store['store_phone'];
                $profile_image = $result_store['profile_image'];
                $wallet = $result_store['wallet'];
                $lat = $result_store['lat'];
                $lng = $result_store['lng'];
                $store_status = $result_store['status'];
                $time_reg = $result_store['time_reg'];
                $store_item = array(
                    "store_id" => $store_id,
                    "username" => $username,
                    "password" => $password,
                    "store_name" => $store_name,
                    "store_phone" => $store_phone,
                    "profile_image" => $profile_image,
                    "wallet" => $wallet,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "status" => $store_status,
                    "time_reg" => $time_reg,
                );
            }

            $rider_item = array();
            $result_riders = $rider->findById($rider_id);
            foreach ($result_riders as $result_rider) {
                $rider_id = $result_rider['rider_id'];
                $username = $result_rider['username'];
                $password = $result_rider['password'];
                $rider_phone = $result_rider['rider_phone'];
                $rider_name = $result_rider['rider_name'];
                $sex = $result_rider['sex'];
                $rider_status = $result_rider['rider_status'];
                $credit = $result_rider['credit'];
                $wallet = $result_rider['wallet'];
                $profile_image = $result_rider['profile_image'];
                $lat = $result_rider['lat'];
                $lng = $result_rider['lng'];
                $time_reg = $result_rider['time_reg'];
                $rider_item = array(
                    "rider_id" => $rider_id,
                    "username" => $username,
                    "password" => $password,
                    "rider_phone" => $rider_phone,
                    "rider_name" => $rider_name,
                    "sex" => $sex,
                    "rider_status" => $rider_status,
                    "credit" => $credit,
                    "wallet" => $wallet,
                    "profile_image" => $profile_image,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "time_reg" => $time_reg,
                );
            }

            $customer_item = array();
            $result_customers = $customer->findById($customer_id);
            foreach ($result_customers as $result_customer) {
                $customer_id = $result_customer['customer_id'];
                $username = $result_customer['username'];
                $password = $result_customer['password'];
                $customer_name = $result_customer['customer_name'];
                $customer_phone = $result_customer['customer_phone'];
                $sex = $result_customer['sex'];
                $profile_image = $result_customer['profile_image'];
                $time_reg = $result_customer['time_reg'];
                $customer_item = array(
                    "customer_id" => $customer_id,
                    "username" => $username,
                    "password" => $password,
                    "customer_name" => $customer_name,
                    "customer_phone" => $customer_phone,
                    "profile_image" => $profile_image,
                    "sex" => $sex,
                    "time_reg" => $time_reg,
                );
            }

            $address_item = array();
            $result_addresses = $address_class->findById($address_id);
            foreach ($result_addresses as $result_addresse) {
                $address_id = $result_addresse['address_id'];
                $customer_id = $result_addresse['customer_id'];
                $address = $result_addresse['address'];
                $lat = $result_addresse['lat'];
                $lng = $result_addresse['lng'];
                $addr_status = $result_addresse['addr_status'];
                $time_reg = $result_addresse['time_reg'];
                $address_item = array(
                    "address_id" => $address_id,
                    "customer_id" => $customer_id,
                    "address" =>  $address,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "addr_status" => $addr_status,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "order_id" => $order_id,
                "store_id" => $store_item,
                "rider_id" => $rider_item,
                "customer_id" => $customer_item,
                "address_id" => $address_item,
                "order_date" => $order_date,
                "total" => $total,
                "cash_method" => $cash_method,
                "status" => $order_status,
                "time_reg" => $time_reg_order,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else if (isset($_GET['rider_id']) && isset($_GET['order_status']) && isset($_GET['order_date'])) {
        $results = $order->ordersByRiderStatusDateToday($_GET['rider_id'], $_GET['order_status'], $_GET['order_date']);
        foreach ($results as $result) {
            $order_id = $result['order_id'];
            $store_id = $result['store_id'];
            $rider_id = $result['rider_id'];
            $customer_id = $result['customer_id'];
            $address_id = $result['address_id'];
            $order_date = $result['order_date'];
            $total = $result['total'];
            $cash_method = $result['cash_method'];
            $order_status = $result['status'];
            $time_reg_order = $result['time_reg'];

            $store_item = array();
            $result_stores = $store->findById($store_id);
            foreach ($result_stores as $result_store) {
                $store_id = $result_store['store_id'];
                $username = $result_store['username'];
                $password = $result_store['password'];
                $store_name = $result_store['store_name'];
                $store_phone = $result_store['store_phone'];
                $profile_image = $result_store['profile_image'];
                $wallet = $result_store['wallet'];
                $lat = $result_store['lat'];
                $lng = $result_store['lng'];
                $store_status = $result_store['status'];
                $time_reg = $result_store['time_reg'];
                $store_item = array(
                    "store_id" => $store_id,
                    "username" => $username,
                    "password" => $password,
                    "store_name" => $store_name,
                    "store_phone" => $store_phone,
                    "profile_image" => $profile_image,
                    "wallet" => $wallet,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "status" => $store_status,
                    "time_reg" => $time_reg,
                );
            }

            $rider_item = array();
            $result_riders = $rider->findById($rider_id);
            foreach ($result_riders as $result_rider) {
                $rider_id = $result_rider['rider_id'];
                $username = $result_rider['username'];
                $password = $result_rider['password'];
                $rider_phone = $result_rider['rider_phone'];
                $rider_name = $result_rider['rider_name'];
                $sex = $result_rider['sex'];
                $rider_status = $result_rider['rider_status'];
                $credit = $result_rider['credit'];
                $wallet = $result_rider['wallet'];
                $profile_image = $result_rider['profile_image'];
                $lat = $result_rider['lat'];
                $lng = $result_rider['lng'];
                $time_reg = $result_rider['time_reg'];
                $rider_item = array(
                    "rider_id" => $rider_id,
                    "username" => $username,
                    "password" => $password,
                    "rider_phone" => $rider_phone,
                    "rider_name" => $rider_name,
                    "sex" => $sex,
                    "rider_status" => $rider_status,
                    "credit" => $credit,
                    "wallet" => $wallet,
                    "profile_image" => $profile_image,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "time_reg" => $time_reg,
                );
            }

            $customer_item = array();
            $result_customers = $customer->findById($customer_id);
            foreach ($result_customers as $result_customer) {
                $customer_id = $result_customer['customer_id'];
                $username = $result_customer['username'];
                $password = $result_customer['password'];
                $customer_name = $result_customer['customer_name'];
                $customer_phone = $result_customer['customer_phone'];
                $sex = $result_customer['sex'];
                $profile_image = $result_customer['profile_image'];
                $time_reg = $result_customer['time_reg'];
                $customer_item = array(
                    "customer_id" => $customer_id,
                    "username" => $username,
                    "password" => $password,
                    "customer_name" => $customer_name,
                    "customer_phone" => $customer_phone,
                    "profile_image" => $profile_image,
                    "sex" => $sex,
                    "time_reg" => $time_reg,
                );
            }

            $address_item = array();
            $result_addresses = $address_class->findById($address_id);
            foreach ($result_addresses as $result_addresse) {
                $address_id = $result_addresse['address_id'];
                $customer_id = $result_addresse['customer_id'];
                $address = $result_addresse['address'];
                $lat = $result_addresse['lat'];
                $lng = $result_addresse['lng'];
                $addr_status = $result_addresse['addr_status'];
                $time_reg = $result_addresse['time_reg'];
                $address_item = array(
                    "address_id" => $address_id,
                    "customer_id" => $customer_id,
                    "address" =>  $address,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "addr_status" => $addr_status,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "order_id" => $order_id,
                "store_id" => $store_item,
                "rider_id" => $rider_item,
                "customer_id" => $customer_item,
                "address_id" => $address_item,
                "order_date" => $order_date,
                "total" => $total,
                "cash_method" => $cash_method,
                "status" => $order_status,
                "time_reg" => $time_reg_order,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else if (isset($_GET['order_status']) && $_GET['store_id']) {
        $results = $order->ordersByStoreStatus($_GET['store_id'], $_GET['order_status']);
        foreach ($results as $result) {
            $order_id = $result['order_id'];
            $store_id = $result['store_id'];
            $rider_id = $result['rider_id'];
            $customer_id = $result['customer_id'];
            $address_id = $result['address_id'];
            $order_date = $result['order_date'];
            $total = $result['total'];
            $cash_method = $result['cash_method'];
            $order_status = $result['status'];
            $time_reg_order = $result['time_reg'];

            $store_item = array();
            $result_stores = $store->findById($store_id);
            foreach ($result_stores as $result_store) {
                $store_id = $result_store['store_id'];
                $username = $result_store['username'];
                $password = $result_store['password'];
                $store_name = $result_store['store_name'];
                $store_phone = $result_store['store_phone'];
                $profile_image = $result_store['profile_image'];
                $wallet = $result_store['wallet'];
                $lat = $result_store['lat'];
                $lng = $result_store['lng'];
                $store_status = $result_store['status'];
                $time_reg = $result_store['time_reg'];
                $store_item = array(
                    "store_id" => $store_id,
                    "username" => $username,
                    "password" => $password,
                    "store_name" => $store_name,
                    "store_phone" => $store_phone,
                    "profile_image" => $profile_image,
                    "wallet" => $wallet,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "status" => $store_status,
                    "time_reg" => $time_reg,
                );
            }

            $rider_item = array();
            $result_riders = $rider->findById($rider_id);
            foreach ($result_riders as $result_rider) {
                $rider_id = $result_rider['rider_id'];
                $username = $result_rider['username'];
                $password = $result_rider['password'];
                $rider_phone = $result_rider['rider_phone'];
                $rider_name = $result_rider['rider_name'];
                $sex = $result_rider['sex'];
                $rider_status = $result_rider['rider_status'];
                $credit = $result_rider['credit'];
                $wallet = $result_rider['wallet'];
                $profile_image = $result_rider['profile_image'];
                $lat = $result_rider['lat'];
                $lng = $result_rider['lng'];
                $time_reg = $result_rider['time_reg'];
                $rider_item = array(
                    "rider_id" => $rider_id,
                    "username" => $username,
                    "password" => $password,
                    "rider_phone" => $rider_phone,
                    "rider_name" => $rider_name,
                    "sex" => $sex,
                    "rider_status" => $rider_status,
                    "credit" => $credit,
                    "wallet" => $wallet,
                    "profile_image" => $profile_image,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "time_reg" => $time_reg,
                );
            }

            $customer_item = array();
            $result_customers = $customer->findById($customer_id);
            foreach ($result_customers as $result_customer) {
                $customer_id = $result_customer['customer_id'];
                $username = $result_customer['username'];
                $password = $result_customer['password'];
                $customer_name = $result_customer['customer_name'];
                $customer_phone = $result_customer['customer_phone'];
                $sex = $result_customer['sex'];
                $profile_image = $result_customer['profile_image'];
                $time_reg = $result_customer['time_reg'];
                $customer_item = array(
                    "customer_id" => $customer_id,
                    "username" => $username,
                    "password" => $password,
                    "customer_name" => $customer_name,
                    "customer_phone" => $customer_phone,
                    "profile_image" => $profile_image,
                    "sex" => $sex,
                    "time_reg" => $time_reg,
                );
            }

            $address_item = array();
            $result_addresses = $address_class->findById($address_id);
            foreach ($result_addresses as $result_addresse) {
                $address_id = $result_addresse['address_id'];
                $customer_id = $result_addresse['customer_id'];
                $address = $result_addresse['address'];
                $lat = $result_addresse['lat'];
                $lng = $result_addresse['lng'];
                $addr_status = $result_addresse['addr_status'];
                $time_reg = $result_addresse['time_reg'];
                $address_item = array(
                    "address_id" => $address_id,
                    "customer_id" => $customer_id,
                    "address" =>  $address,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "addr_status" => $addr_status,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "order_id" => $order_id,
                "store_id" => $store_item,
                "rider_id" => $rider_item,
                "customer_id" => $customer_item,
                "address_id" => $address_item,
                "order_date" => $order_date,
                "total" => $total,
                "cash_method" => $cash_method,
                "status" => $order_status,
                "time_reg" => $time_reg_order,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else if (isset($_GET['order_date']) && $_GET['store_id']) {
        $results = $order->ordersByStoreDate($_GET['store_id'], $_GET['order_date']);
        foreach ($results as $result) {
            $order_id = $result['order_id'];
            $store_id = $result['store_id'];
            $rider_id = $result['rider_id'];
            $customer_id = $result['customer_id'];
            $address_id = $result['address_id'];
            $order_date = $result['order_date'];
            $total = $result['total'];
            $cash_method = $result['cash_method'];
            $order_status = $result['status'];
            $time_reg_order = $result['time_reg'];

            $store_item = array();
            $result_stores = $store->findById($store_id);
            foreach ($result_stores as $result_store) {
                $store_id = $result_store['store_id'];
                $username = $result_store['username'];
                $password = $result_store['password'];
                $store_name = $result_store['store_name'];
                $store_phone = $result_store['store_phone'];
                $profile_image = $result_store['profile_image'];
                $wallet = $result_store['wallet'];
                $lat = $result_store['lat'];
                $lng = $result_store['lng'];
                $store_status = $result_store['status'];
                $time_reg = $result_store['time_reg'];
                $store_item = array(
                    "store_id" => $store_id,
                    "username" => $username,
                    "password" => $password,
                    "store_name" => $store_name,
                    "store_phone" => $store_phone,
                    "profile_image" => $profile_image,
                    "wallet" => $wallet,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "status" => $store_status,
                    "time_reg" => $time_reg,
                );
            }

            $rider_item = array();
            $result_riders = $rider->findById($rider_id);
            foreach ($result_riders as $result_rider) {
                $rider_id = $result_rider['rider_id'];
                $username = $result_rider['username'];
                $password = $result_rider['password'];
                $rider_phone = $result_rider['rider_phone'];
                $rider_name = $result_rider['rider_name'];
                $sex = $result_rider['sex'];
                $rider_status = $result_rider['rider_status'];
                $credit = $result_rider['credit'];
                $wallet = $result_rider['wallet'];
                $profile_image = $result_rider['profile_image'];
                $lat = $result_rider['lat'];
                $lng = $result_rider['lng'];
                $time_reg = $result_rider['time_reg'];
                $rider_item = array(
                    "rider_id" => $rider_id,
                    "username" => $username,
                    "password" => $password,
                    "rider_phone" => $rider_phone,
                    "rider_name" => $rider_name,
                    "sex" => $sex,
                    "rider_status" => $rider_status,
                    "credit" => $credit,
                    "wallet" => $wallet,
                    "profile_image" => $profile_image,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "time_reg" => $time_reg,
                );
            }

            $customer_item = array();
            $result_customers = $customer->findById($customer_id);
            foreach ($result_customers as $result_customer) {
                $customer_id = $result_customer['customer_id'];
                $username = $result_customer['username'];
                $password = $result_customer['password'];
                $customer_name = $result_customer['customer_name'];
                $customer_phone = $result_customer['customer_phone'];
                $sex = $result_customer['sex'];
                $profile_image = $result_customer['profile_image'];
                $time_reg = $result_customer['time_reg'];
                $customer_item = array(
                    "customer_id" => $customer_id,
                    "username" => $username,
                    "password" => $password,
                    "customer_name" => $customer_name,
                    "customer_phone" => $customer_phone,
                    "profile_image" => $profile_image,
                    "sex" => $sex,
                    "time_reg" => $time_reg,
                );
            }

            $address_item = array();
            $result_addresses = $address_class->findById($address_id);
            foreach ($result_addresses as $result_addresse) {
                $address_id = $result_addresse['address_id'];
                $customer_id = $result_addresse['customer_id'];
                $address = $result_addresse['address'];
                $lat = $result_addresse['lat'];
                $lng = $result_addresse['lng'];
                $addr_status = $result_addresse['addr_status'];
                $time_reg = $result_addresse['time_reg'];
                $address_item = array(
                    "address_id" => $address_id,
                    "customer_id" => $customer_id,
                    "address" =>  $address,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "addr_status" => $addr_status,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "order_id" => $order_id,
                "store_id" => $store_item,
                "rider_id" => $rider_item,
                "customer_id" => $customer_item,
                "address_id" => $address_item,
                "order_date" => $order_date,
                "total" => $total,
                "cash_method" => $cash_method,
                "status" => $order_status,
                "time_reg" => $time_reg_order,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else if (isset($_GET['order_date']) && $_GET['rider_id']) {
        $results = $order->ordersByRiderDate($_GET['rider_id'], $_GET['order_date']);
        foreach ($results as $result) {
            $order_id = $result['order_id'];
            $store_id = $result['store_id'];
            $rider_id = $result['rider_id'];
            $customer_id = $result['customer_id'];
            $address_id = $result['address_id'];
            $order_date = $result['order_date'];
            $total = $result['total'];
            $cash_method = $result['cash_method'];
            $order_status = $result['status'];
            $time_reg_order = $result['time_reg'];

            $store_item = array();
            $result_stores = $store->findById($store_id);
            foreach ($result_stores as $result_store) {
                $store_id = $result_store['store_id'];
                $username = $result_store['username'];
                $password = $result_store['password'];
                $store_name = $result_store['store_name'];
                $store_phone = $result_store['store_phone'];
                $profile_image = $result_store['profile_image'];
                $wallet = $result_store['wallet'];
                $lat = $result_store['lat'];
                $lng = $result_store['lng'];
                $store_status = $result_store['status'];
                $time_reg = $result_store['time_reg'];
                $store_item = array(
                    "store_id" => $store_id,
                    "username" => $username,
                    "password" => $password,
                    "store_name" => $store_name,
                    "store_phone" => $store_phone,
                    "profile_image" => $profile_image,
                    "wallet" => $wallet,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "status" => $store_status,
                    "time_reg" => $time_reg,
                );
            }

            $rider_item = array();
            $result_riders = $rider->findById($rider_id);
            foreach ($result_riders as $result_rider) {
                $rider_id = $result_rider['rider_id'];
                $username = $result_rider['username'];
                $password = $result_rider['password'];
                $rider_phone = $result_rider['rider_phone'];
                $rider_name = $result_rider['rider_name'];
                $sex = $result_rider['sex'];
                $rider_status = $result_rider['rider_status'];
                $credit = $result_rider['credit'];
                $wallet = $result_rider['wallet'];
                $profile_image = $result_rider['profile_image'];
                $lat = $result_rider['lat'];
                $lng = $result_rider['lng'];
                $time_reg = $result_rider['time_reg'];
                $rider_item = array(
                    "rider_id" => $rider_id,
                    "username" => $username,
                    "password" => $password,
                    "rider_phone" => $rider_phone,
                    "rider_name" => $rider_name,
                    "sex" => $sex,
                    "rider_status" => $rider_status,
                    "credit" => $credit,
                    "wallet" => $wallet,
                    "profile_image" => $profile_image,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "time_reg" => $time_reg,
                );
            }

            $customer_item = array();
            $result_customers = $customer->findById($customer_id);
            foreach ($result_customers as $result_customer) {
                $customer_id = $result_customer['customer_id'];
                $username = $result_customer['username'];
                $password = $result_customer['password'];
                $customer_name = $result_customer['customer_name'];
                $customer_phone = $result_customer['customer_phone'];
                $sex = $result_customer['sex'];
                $profile_image = $result_customer['profile_image'];
                $time_reg = $result_customer['time_reg'];
                $customer_item = array(
                    "customer_id" => $customer_id,
                    "username" => $username,
                    "password" => $password,
                    "customer_name" => $customer_name,
                    "customer_phone" => $customer_phone,
                    "profile_image" => $profile_image,
                    "sex" => $sex,
                    "time_reg" => $time_reg,
                );
            }

            $address_item = array();
            $result_addresses = $address_class->findById($address_id);
            foreach ($result_addresses as $result_addresse) {
                $address_id = $result_addresse['address_id'];
                $customer_id = $result_addresse['customer_id'];
                $address = $result_addresse['address'];
                $lat = $result_addresse['lat'];
                $lng = $result_addresse['lng'];
                $addr_status = $result_addresse['addr_status'];
                $time_reg = $result_addresse['time_reg'];
                $address_item = array(
                    "address_id" => $address_id,
                    "customer_id" => $customer_id,
                    "address" =>  $address,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "addr_status" => $addr_status,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "order_id" => $order_id,
                "store_id" => $store_item,
                "rider_id" => $rider_item,
                "customer_id" => $customer_item,
                "address_id" => $address_item,
                "order_date" => $order_date,
                "total" => $total,
                "cash_method" => $cash_method,
                "status" => $order_status,
                "time_reg" => $time_reg_order,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else if (isset($_GET['store_id'])) {
        $results = $order->findByStoreId($_GET['store_id']);
        foreach ($results as $result) {
            $order_id = $result['order_id'];
            $store_id = $result['store_id'];
            $rider_id = $result['rider_id'];
            $customer_id = $result['customer_id'];
            $address_id = $result['address_id'];
            $order_date = $result['order_date'];
            $total = $result['total'];
            $cash_method = $result['cash_method'];
            $order_status = $result['status'];
            $time_reg_order = $result['time_reg'];

            $store_item = array();
            $result_stores = $store->findById($store_id);
            foreach ($result_stores as $result_store) {
                $store_id = $result_store['store_id'];
                $username = $result_store['username'];
                $password = $result_store['password'];
                $store_name = $result_store['store_name'];
                $store_phone = $result_store['store_phone'];
                $profile_image = $result_store['profile_image'];
                $wallet = $result_store['wallet'];
                $lat = $result_store['lat'];
                $lng = $result_store['lng'];
                $store_status = $result_store['status'];
                $time_reg = $result_store['time_reg'];
                $store_item = array(
                    "store_id" => $store_id,
                    "username" => $username,
                    "password" => $password,
                    "store_name" => $store_name,
                    "store_phone" => $store_phone,
                    "profile_image" => $profile_image,
                    "wallet" => $wallet,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "status" => $store_status,
                    "time_reg" => $time_reg,
                );
            }

            $rider_item = array();
            $result_riders = $rider->findById($rider_id);
            foreach ($result_riders as $result_rider) {
                $rider_id = $result_rider['rider_id'];
                $username = $result_rider['username'];
                $password = $result_rider['password'];
                $rider_phone = $result_rider['rider_phone'];
                $rider_name = $result_rider['rider_name'];
                $sex = $result_rider['sex'];
                $rider_status = $result_rider['rider_status'];
                $credit = $result_rider['credit'];
                $wallet = $result_rider['wallet'];
                $profile_image = $result_rider['profile_image'];
                $lat = $result_rider['lat'];
                $lng = $result_rider['lng'];
                $time_reg = $result_rider['time_reg'];
                $rider_item = array(
                    "rider_id" => $rider_id,
                    "username" => $username,
                    "password" => $password,
                    "rider_phone" => $rider_phone,
                    "rider_name" => $rider_name,
                    "sex" => $sex,
                    "rider_status" => $rider_status,
                    "credit" => $credit,
                    "wallet" => $wallet,
                    "profile_image" => $profile_image,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "time_reg" => $time_reg,
                );
            }

            $customer_item = array();
            $result_customers = $customer->findById($customer_id);
            foreach ($result_customers as $result_customer) {
                $customer_id = $result_customer['customer_id'];
                $username = $result_customer['username'];
                $password = $result_customer['password'];
                $customer_name = $result_customer['customer_name'];
                $customer_phone = $result_customer['customer_phone'];
                $sex = $result_customer['sex'];
                $profile_image = $result_customer['profile_image'];
                $time_reg = $result_customer['time_reg'];
                $customer_item = array(
                    "customer_id" => $customer_id,
                    "username" => $username,
                    "password" => $password,
                    "customer_name" => $customer_name,
                    "customer_phone" => $customer_phone,
                    "profile_image" => $profile_image,
                    "sex" => $sex,
                    "time_reg" => $time_reg,
                );
            }

            $address_item = array();
            $result_addresses = $address_class->findById($address_id);
            foreach ($result_addresses as $result_addresse) {
                $address_id = $result_addresse['address_id'];
                $customer_id = $result_addresse['customer_id'];
                $address = $result_addresse['address'];
                $lat = $result_addresse['lat'];
                $lng = $result_addresse['lng'];
                $addr_status = $result_addresse['addr_status'];
                $time_reg = $result_addresse['time_reg'];
                $address_item = array(
                    "address_id" => $address_id,
                    "customer_id" => $customer_id,
                    "address" =>  $address,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "addr_status" => $addr_status,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "order_id" => $order_id,
                "store_id" => $store_item,
                "rider_id" => $rider_item,
                "customer_id" => $customer_item,
                "address_id" => $address_item,
                "order_date" => $order_date,
                "total" => $total,
                "cash_method" => $cash_method,
                "status" => $order_status,
                "time_reg" => $time_reg_order,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else if (isset($_GET['rider_id']) && isset($_GET['order_status'])) {
        $results = $order->ordersByRiderStatus($_GET['rider_id'], $_GET['order_status']);
        foreach ($results as $result) {
            $order_id = $result['order_id'];
            $store_id = $result['store_id'];
            $rider_id = $result['rider_id'];
            $customer_id = $result['customer_id'];
            $address_id = $result['address_id'];
            $order_date = $result['order_date'];
            $total = $result['total'];
            $cash_method = $result['cash_method'];
            $order_status = $result['status'];
            $time_reg_order = $result['time_reg'];

            $store_item = array();
            $result_stores = $store->findById($store_id);
            foreach ($result_stores as $result_store) {
                $store_id = $result_store['store_id'];
                $username = $result_store['username'];
                $password = $result_store['password'];
                $store_name = $result_store['store_name'];
                $store_phone = $result_store['store_phone'];
                $profile_image = $result_store['profile_image'];
                $wallet = $result_store['wallet'];
                $lat = $result_store['lat'];
                $lng = $result_store['lng'];
                $store_status = $result_store['status'];
                $time_reg = $result_store['time_reg'];
                $store_item = array(
                    "store_id" => $store_id,
                    "username" => $username,
                    "password" => $password,
                    "store_name" => $store_name,
                    "store_phone" => $store_phone,
                    "profile_image" => $profile_image,
                    "wallet" => $wallet,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "status" => $store_status,
                    "time_reg" => $time_reg,
                );
            }

            $rider_item = array();
            $result_riders = $rider->findById($rider_id);
            foreach ($result_riders as $result_rider) {
                $rider_id = $result_rider['rider_id'];
                $username = $result_rider['username'];
                $password = $result_rider['password'];
                $rider_phone = $result_rider['rider_phone'];
                $rider_name = $result_rider['rider_name'];
                $sex = $result_rider['sex'];
                $rider_status = $result_rider['rider_status'];
                $credit = $result_rider['credit'];
                $wallet = $result_rider['wallet'];
                $profile_image = $result_rider['profile_image'];
                $lat = $result_rider['lat'];
                $lng = $result_rider['lng'];
                $time_reg = $result_rider['time_reg'];
                $rider_item = array(
                    "rider_id" => $rider_id,
                    "username" => $username,
                    "password" => $password,
                    "rider_phone" => $rider_phone,
                    "rider_name" => $rider_name,
                    "sex" => $sex,
                    "rider_status" => $rider_status,
                    "credit" => $credit,
                    "wallet" => $wallet,
                    "profile_image" => $profile_image,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "time_reg" => $time_reg,
                );
            }

            $customer_item = array();
            $result_customers = $customer->findById($customer_id);
            foreach ($result_customers as $result_customer) {
                $customer_id = $result_customer['customer_id'];
                $username = $result_customer['username'];
                $password = $result_customer['password'];
                $customer_name = $result_customer['customer_name'];
                $customer_phone = $result_customer['customer_phone'];
                $sex = $result_customer['sex'];
                $profile_image = $result_customer['profile_image'];
                $time_reg = $result_customer['time_reg'];
                $customer_item = array(
                    "customer_id" => $customer_id,
                    "username" => $username,
                    "password" => $password,
                    "customer_name" => $customer_name,
                    "customer_phone" => $customer_phone,
                    "profile_image" => $profile_image,
                    "sex" => $sex,
                    "time_reg" => $time_reg,
                );
            }

            $address_item = array();
            $result_addresses = $address_class->findById($address_id);
            foreach ($result_addresses as $result_addresse) {
                $address_id = $result_addresse['address_id'];
                $customer_id = $result_addresse['customer_id'];
                $address = $result_addresse['address'];
                $lat = $result_addresse['lat'];
                $lng = $result_addresse['lng'];
                $addr_status = $result_addresse['addr_status'];
                $time_reg = $result_addresse['time_reg'];
                $address_item = array(
                    "address_id" => $address_id,
                    "customer_id" => $customer_id,
                    "address" =>  $address,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "addr_status" => $addr_status,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "order_id" => $order_id,
                "store_id" => $store_item,
                "rider_id" => $rider_item,
                "customer_id" => $customer_item,
                "address_id" => $address_item,
                "order_date" => $order_date,
                "total" => $total,
                "cash_method" => $cash_method,
                "status" => $order_status,
                "time_reg" => $time_reg_order,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else if (isset($_GET['rider_id'])) {
        $results = $order->ordersByRider($_GET['rider_id']);
        foreach ($results as $result) {
            $order_id = $result['order_id'];
            $store_id = $result['store_id'];
            $rider_id = $result['rider_id'];
            $customer_id = $result['customer_id'];
            $address_id = $result['address_id'];
            $order_date = $result['order_date'];
            $total = $result['total'];
            $cash_method = $result['cash_method'];
            $order_status = $result['status'];
            $time_reg_order = $result['time_reg'];

            $store_item = array();
            $result_stores = $store->findById($store_id);
            foreach ($result_stores as $result_store) {
                $store_id = $result_store['store_id'];
                $username = $result_store['username'];
                $password = $result_store['password'];
                $store_name = $result_store['store_name'];
                $store_phone = $result_store['store_phone'];
                $profile_image = $result_store['profile_image'];
                $wallet = $result_store['wallet'];
                $lat = $result_store['lat'];
                $lng = $result_store['lng'];
                $store_status = $result_store['status'];
                $time_reg = $result_store['time_reg'];
                $store_item = array(
                    "store_id" => $store_id,
                    "username" => $username,
                    "password" => $password,
                    "store_name" => $store_name,
                    "store_phone" => $store_phone,
                    "profile_image" => $profile_image,
                    "wallet" => $wallet,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "status" => $store_status,
                    "time_reg" => $time_reg,
                );
            }

            $rider_item = array();
            $result_riders = $rider->findById($rider_id);
            foreach ($result_riders as $result_rider) {
                $rider_id = $result_rider['rider_id'];
                $username = $result_rider['username'];
                $password = $result_rider['password'];
                $rider_phone = $result_rider['rider_phone'];
                $rider_name = $result_rider['rider_name'];
                $sex = $result_rider['sex'];
                $rider_status = $result_rider['rider_status'];
                $credit = $result_rider['credit'];
                $wallet = $result_rider['wallet'];
                $profile_image = $result_rider['profile_image'];
                $lat = $result_rider['lat'];
                $lng = $result_rider['lng'];
                $time_reg = $result_rider['time_reg'];
                $rider_item = array(
                    "rider_id" => $rider_id,
                    "username" => $username,
                    "password" => $password,
                    "rider_phone" => $rider_phone,
                    "rider_name" => $rider_name,
                    "sex" => $sex,
                    "rider_status" => $rider_status,
                    "credit" => $credit,
                    "wallet" => $wallet,
                    "profile_image" => $profile_image,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "time_reg" => $time_reg,
                );
            }

            $customer_item = array();
            $result_customers = $customer->findById($customer_id);
            foreach ($result_customers as $result_customer) {
                $customer_id = $result_customer['customer_id'];
                $username = $result_customer['username'];
                $password = $result_customer['password'];
                $customer_name = $result_customer['customer_name'];
                $customer_phone = $result_customer['customer_phone'];
                $sex = $result_customer['sex'];
                $profile_image = $result_customer['profile_image'];
                $time_reg = $result_customer['time_reg'];
                $customer_item = array(
                    "customer_id" => $customer_id,
                    "username" => $username,
                    "password" => $password,
                    "customer_name" => $customer_name,
                    "customer_phone" => $customer_phone,
                    "profile_image" => $profile_image,
                    "sex" => $sex,
                    "time_reg" => $time_reg,
                );
            }

            $address_item = array();
            $result_addresses = $address_class->findById($address_id);
            foreach ($result_addresses as $result_addresse) {
                $address_id = $result_addresse['address_id'];
                $customer_id = $result_addresse['customer_id'];
                $address = $result_addresse['address'];
                $lat = $result_addresse['lat'];
                $lng = $result_addresse['lng'];
                $addr_status = $result_addresse['addr_status'];
                $time_reg = $result_addresse['time_reg'];
                $address_item = array(
                    "address_id" => $address_id,
                    "customer_id" => $customer_id,
                    "address" =>  $address,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "addr_status" => $addr_status,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "order_id" => $order_id,
                "store_id" => $store_item,
                "rider_id" => $rider_item,
                "customer_id" => $customer_item,
                "address_id" => $address_item,
                "order_date" => $order_date,
                "total" => $total,
                "cash_method" => $cash_method,
                "status" => $order_status,
                "time_reg" => $time_reg_order,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else {
        $results = $order->orders();
        foreach ($results as $result) {
            $order_id = $result['order_id'];
            $store_id = $result['store_id'];
            $rider_id = $result['rider_id'];
            $customer_id = $result['customer_id'];
            $address_id = $result['address_id'];
            $order_date = $result['order_date'];
            $total = $result['total'];
            $cash_method = $result['cash_method'];
            $order_status = $result['status'];
            $time_reg_order = $result['time_reg'];

            $store_item = array();
            $result_stores = $store->findById($store_id);
            foreach ($result_stores as $result_store) {
                $store_id = $result_store['store_id'];
                $username = $result_store['username'];
                $password = $result_store['password'];
                $store_name = $result_store['store_name'];
                $store_phone = $result_store['store_phone'];
                $profile_image = $result_store['profile_image'];
                $wallet = $result_store['wallet'];
                $lat = $result_store['lat'];
                $lng = $result_store['lng'];
                $store_status = $result_store['status'];
                $time_reg = $result_store['time_reg'];
                $store_item = array(
                    "store_id" => $store_id,
                    "username" => $username,
                    "password" => $password,
                    "store_name" => $store_name,
                    "store_phone" => $store_phone,
                    "profile_image" => $profile_image,
                    "wallet" => $wallet,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "status" => $store_status,
                    "time_reg" => $time_reg,
                );
            }

            $rider_item = array();
            $result_riders = $rider->findById($rider_id);
            foreach ($result_riders as $result_rider) {
                $rider_id = $result_rider['rider_id'];
                $username = $result_rider['username'];
                $password = $result_rider['password'];
                $rider_phone = $result_rider['rider_phone'];
                $rider_name = $result_rider['rider_name'];
                $sex = $result_rider['sex'];
                $rider_status = $result_rider['rider_status'];
                $credit = $result_rider['credit'];
                $wallet = $result_rider['wallet'];
                $profile_image = $result_rider['profile_image'];
                $lat = $result_rider['lat'];
                $lng = $result_rider['lng'];
                $time_reg = $result_rider['time_reg'];
                $rider_item = array(
                    "rider_id" => $rider_id,
                    "username" => $username,
                    "password" => $password,
                    "rider_phone" => $rider_phone,
                    "rider_name" => $rider_name,
                    "sex" => $sex,
                    "rider_status" => $rider_status,
                    "credit" => $credit,
                    "wallet" => $wallet,
                    "profile_image" => $profile_image,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "time_reg" => $time_reg,
                );
            }

            $customer_item = array();
            $result_customers = $customer->findById($customer_id);
            foreach ($result_customers as $result_customer) {
                $customer_id = $result_customer['customer_id'];
                $username = $result_customer['username'];
                $password = $result_customer['password'];
                $customer_name = $result_customer['customer_name'];
                $customer_phone = $result_customer['customer_phone'];
                $sex = $result_customer['sex'];
                $profile_image = $result_customer['profile_image'];
                $time_reg = $result_customer['time_reg'];
                $customer_item = array(
                    "customer_id" => $customer_id,
                    "username" => $username,
                    "password" => $password,
                    "customer_name" => $customer_name,
                    "customer_phone" => $customer_phone,
                    "profile_image" => $profile_image,
                    "sex" => $sex,
                    "time_reg" => $time_reg,
                );
            }

            $address_item = array();
            $result_addresses = $address_class->findById($address_id);
            foreach ($result_addresses as $result_addresse) {
                $address_id = $result_addresse['address_id'];
                $customer_id = $result_addresse['customer_id'];
                $address = $result_addresse['address'];
                $lat = $result_addresse['lat'];
                $lng = $result_addresse['lng'];
                $addr_status = $result_addresse['addr_status'];
                $time_reg = $result_addresse['time_reg'];
                $address_item = array(
                    "address_id" => $address_id,
                    "customer_id" => $customer_id,
                    "address" =>  $address,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "addr_status" => $addr_status,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "order_id" => $order_id,
                "store_id" => $store_item,
                "rider_id" => $rider_item,
                "customer_id" => $customer_item,
                "address_id" => $address_item,
                "order_date" => $order_date,
                "total" => $total,
                "cash_method" => $cash_method,
                "status" => $order_status,
                "time_reg" => $time_reg_order,
            );
            array_push($data_arr['result'], $data_items);
        }
    }
    echo json_encode($data_arr, JSON_UNESCAPED_UNICODE);
    http_response_code(200);
    exit();
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $store_id = $_POST['store_id'];
    $rider_id = $_POST['rider_id'];
    $customer_id = $_POST['customer_id'];
    $address_id = $_POST['address_id'];
    $order_date = $_POST['order_date'];
    $total = $_POST['total'];
    $cash_method = $_POST['cash_method'];
    $order_status = $_POST['order_status'];
    if (isset($store_id) && isset($rider_id) && isset($customer_id) && isset($address_id) && isset($order_date) && isset($total) && isset($cash_method) && isset($order_status)) {
        $order = new Order();
        $result = $order->add(
            $store_id,
            $rider_id,
            $customer_id,
            $address_id,
            $order_date,
            $total,
            $cash_method,
            $order_status
        );

        $lastId = [
            "order_id" => $result
        ];

        $result = [
            'msg' => "success",
            'status' => 200,
            'result' => $lastId,
        ];

        echo json_encode($result);
        http_response_code(200);
        exit();
    } else {
        $result = [
            'msg' => "unsuccess",
            'status' => 200,
        ];
        echo json_encode($result);
        http_response_code(200);
        exit();
    }
} else {
    http_response_code(405);
}
