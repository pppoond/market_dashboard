<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json;charset=utf-8');
require '../classes/order.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $order = new Order();
    $data_arr = array();
    $data_arr['result'] = array();

    if (isset($_GET['findid'])) {
        $results = $order->findById($_GET['findid']);
        foreach ($results as $result) {
            $order_id = $result['order_id'];
            $store_id = $result['store_id'];
            $rider_id = $result['rider_id'];
            $customer_id = $result['customer_id'];
            $order_date = $result['order_date'];
            $total = $result['total'];
            $status = $result['status'];
            $time_reg = $result['time_reg'];

            $data_items = array(
                "order_id" => $order_id,
                "store_id" => $store_id,
                "rider_id" => $rider_id,
                "customer_id" => $customer_id,
                "order_date" => $order_date,
                "total" => $total,
                "status" => $status,
                "time_reg" => $time_reg,
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
            $order_date = $result['order_date'];
            $total = $result['total'];
            $status = $result['status'];
            $time_reg = $result['time_reg'];

            $data_items = array(
                "order_id" => $order_id,
                "store_id" => $store_id,
                "rider_id" => $rider_id,
                "customer_id" => $customer_id,
                "order_date" => $order_date,
                "total" => $total,
                "status" => $status,
                "time_reg" => $time_reg,
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
            $order_date = $result['order_date'];
            $total = $result['total'];
            $status = $result['status'];
            $time_reg = $result['time_reg'];

            $data_items = array(
                "order_id" => $order_id,
                "store_id" => $store_id,
                "rider_id" => $rider_id,
                "customer_id" => $customer_id,
                "order_date" => $order_date,
                "total" => $total,
                "status" => $status,
                "time_reg" => $time_reg,
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
            $order_date = $result['order_date'];
            $total = $result['total'];
            $status = $result['status'];
            $time_reg = $result['time_reg'];

            $data_items = array(
                "order_id" => $order_id,
                "store_id" => $store_id,
                "rider_id" => $rider_id,
                "customer_id" => $customer_id,
                "order_date" => $order_date,
                "total" => $total,
                "status" => $status,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    }
    echo json_encode($data_arr, JSON_UNESCAPED_UNICODE);
    http_response_code(200);
    exit();
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $store_id = $_POST['store_id'];
    $category_id = $_POST['category_id'];
    $order_name = $_POST['order_name'];
    $order_detail = $_POST['order_detail'];
    if (isset($store_id) && isset($category_id) && isset($order_name) && isset($order_detail)) {
        $order = new order();
        $result = $order->add($store_id, $category_id, $order_name, $order_detail);

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
