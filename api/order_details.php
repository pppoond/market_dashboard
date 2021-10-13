<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/order_detail.php';
require '../classes/order.php';
require '../classes/store.php';
require '../classes/rider.php';
require '../classes/customer.php';
require '../classes/address.php';
require '../classes/product.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $order_detail = new OrderDetail();
    $order = new Order();
    $store = new Store();
    $rider = new Rider();
    $customer = new Customer();
    $address_class = new Address();
    $product = new Product();
    $data_arr = array();
    $data_arr['result'] = array();

    if (isset($_GET['findid'])) {
        $results = $order_detail->findById($_GET['findid']);
        foreach ($results as $result) {
            $order_detail_id = $result['order_detail_id'];
            $order_id = $result['order_id'];
            $product_id = $result['product_id'];
            $quantity = $result['quantity'];
            $time_reg = $result['time_reg'];

            $order_array = array();
            $results_orders = $order->findById($order_id);
            foreach ($results_orders as $results_order) {
                $order_id = $results_order['order_id'];
                $store_id = $results_order['store_id'];
                $rider_id = $results_order['rider_id'];
                $customer_id = $results_order['customer_id'];
                $address_id = $results_order['address_id'];
                $order_date = $results_order['order_date'];
                $total = $results_order['total'];
                $cash_method = $results_order['cash_method'];
                $order_status = $results_order['status'];
                $time_reg = $results_order['time_reg'];

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

                $order_array = array(
                    "order_id" => $order_id,
                    "store_id" => $store_item,
                    "rider_id" => $rider_item,
                    "customer_id" => $customer_item,
                    "address_id" => $address_item,
                    "order_date" => $order_date,
                    "total" => $total,
                    "cash_method" => $cash_method,
                    "status" => $order_status,
                    "time_reg" => $time_reg,
                );
            }

            $product_array = array();
            $results_products = $product->findById($product_id);
            foreach ($results_products as $results_product) {
                $product_id = $results_product['product_id'];
                $store_id = $results_product['store_id'];
                $category_id = $results_product['category_id'];
                $product_name = $results_product['product_name'];
                $product_detail = $results_product['product_detail'];
                $price = $results_product['price'];
                $unit = $results_product['unit'];
                $status = $results_product['status'];
                $time_reg = $results_product['time_reg'];

                $product_array = array(
                    "product_id" => $product_id,
                    "store_id" => $store_id,
                    "category_id" => $category_id,
                    "product_name" => $product_name,
                    "product_detail" => $product_detail,
                    "status" => $status,
                    "price" => $price,
                    "unit" => $unit,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "order_detail_id" => $order_detail_id,
                "order_id" => $order_array,
                "product_id" => $product_array,
                "quantity" => $quantity,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else if (isset($_GET['order_id'])) {
        $results = $order_detail->findByOrderId($_GET['order_id']);
        foreach ($results as $result) {
            $order_detail_id = $result['order_detail_id'];
            $order_id = $result['order_id'];
            $product_id = $result['product_id'];
            $quantity = $result['quantity'];
            $time_reg = $result['time_reg'];

            $order_array = array();
            $results_orders = $order->findById($order_id);
            foreach ($results_orders as $results_order) {
                $order_id = $results_order['order_id'];
                $store_id = $results_order['store_id'];
                $rider_id = $results_order['rider_id'];
                $customer_id = $results_order['customer_id'];
                $address_id = $results_order['address_id'];
                $order_date = $results_order['order_date'];
                $total = $results_order['total'];
                $cash_method = $results_order['cash_method'];
                $order_status = $results_order['status'];
                $time_reg = $results_order['time_reg'];

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

                $order_array = array(
                    "order_id" => $order_id,
                    "store_id" => $store_item,
                    "rider_id" => $rider_item,
                    "customer_id" => $customer_item,
                    "address_id" => $address_item,
                    "order_date" => $order_date,
                    "total" => $total,
                    "cash_method" => $cash_method,
                    "status" => $order_status,
                    "time_reg" => $time_reg,
                );
            }

            $product_array = array();
            $results_products = $product->findById($product_id);
            foreach ($results_products as $results_product) {
                $product_id = $results_product['product_id'];
                $store_id = $results_product['store_id'];
                $category_id = $results_product['category_id'];
                $product_name = $results_product['product_name'];
                $product_detail = $results_product['product_detail'];
                $price = $results_product['price'];
                $unit = $results_product['unit'];
                $status = $results_product['status'];
                $time_reg = $results_product['time_reg'];

                $product_array = array(
                    "product_id" => $product_id,
                    "store_id" => $store_id,
                    "category_id" => $category_id,
                    "product_name" => $product_name,
                    "product_detail" => $product_detail,
                    "status" => $status,
                    "price" => $price,
                    "unit" => $unit,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "order_detail_id" => $order_detail_id,
                "order_id" => $order_array,
                "product_id" => $product_array,
                "quantity" => $quantity,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else {
        $results = $order_detail->order_details();
        foreach ($results as $result) {
            $order_detail_id = $result['order_detail_id'];
            $order_id = $result['order_id'];
            $product_id = $result['product_id'];
            $quantity = $result['quantity'];
            $time_reg = $result['time_reg'];

            $order_array = array();
            $results_orders = $order->findById($order_id);
            foreach ($results_orders as $results_order) {
                $order_id = $results_order['order_id'];
                $store_id = $results_order['store_id'];
                $rider_id = $results_order['rider_id'];
                $customer_id = $results_order['customer_id'];
                $address_id = $results_order['address_id'];
                $order_date = $results_order['order_date'];
                $total = $results_order['total'];
                $cash_method = $results_order['cash_method'];
                $order_status = $results_order['status'];
                $time_reg = $results_order['time_reg'];

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

                $order_array = array(
                    "order_id" => $order_id,
                    "store_id" => $store_item,
                    "rider_id" => $rider_item,
                    "customer_id" => $customer_item,
                    "address_id" => $address_item,
                    "order_date" => $order_date,
                    "total" => $total,
                    "cash_method" => $cash_method,
                    "status" => $order_status,
                    "time_reg" => $time_reg,
                );
            }

            $product_array = array();
            $results_products = $product->findById($product_id);
            foreach ($results_products as $results_product) {
                $product_id = $results_product['product_id'];
                $store_id = $results_product['store_id'];
                $category_id = $results_product['category_id'];
                $product_name = $results_product['product_name'];
                $product_detail = $results_product['product_detail'];
                $price = $results_product['price'];
                $unit = $results_product['unit'];
                $status = $results_product['status'];
                $time_reg = $results_product['time_reg'];

                $product_array = array(
                    "product_id" => $product_id,
                    "store_id" => $store_id,
                    "category_id" => $category_id,
                    "product_name" => $product_name,
                    "product_detail" => $product_detail,
                    "status" => $status,
                    "price" => $price,
                    "unit" => $unit,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "order_detail_id" => $order_detail_id,
                "order_id" => $order_array,
                "product_id" => $product_array,
                "quantity" => $quantity,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    }
    echo json_encode($data_arr, JSON_UNESCAPED_UNICODE);
    http_response_code(200);
    exit();
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $order_id = $_POST['order_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    if (isset($order_id) && isset($product_id) && isset($quantity)) {
        $order_detail = new OrderDetail();
        $result = $order_detail->add($order_id, $product_id, $quantity);

        $lastId = [
            "order_detail_id" => $result
        ];

        $data_arr = [
            'msg' => "success",
            'status' => 200,
            'result' => $lastId,
        ];

        echo json_encode($data_arr);
        http_response_code(200);
        exit();
    } else {
        $data_arr = [
            'msg' => "unsuccess",
            'status' => 200,
        ];
        echo json_encode($data_arr);
        http_response_code(200);
        exit();
    }
} else {

    http_response_code(405);
}
