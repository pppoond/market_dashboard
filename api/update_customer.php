<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/customer.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $customer = new Customer();
    $data_arr = array();
    $data_arr['result'] = array();

    $results = $customer->customers();
    foreach ($results as $result) {
        $customer_id = $result['customer_id'];
        $username = $result['username'];
        $password = $result['password'];
        $customer_name = $result['customer_name'];
        $customer_phone = $result['customer_phone'];
        $sex = $result['sex'];
        $profile_image = $result['profile_image'];
        $time_reg = $result['time_reg'];
        $data_items = array(
            "customer_id" => (int)$customer_id,
            "username" => $username,
            "password" => $password,
            "customer_name" => $customer_name,
            "customer_phone" => $customer_phone,
            "sex" => $sex,
            "time_reg" => $time_reg,
        );
        array_push($data_arr['result'], $data_items);
    }
    echo json_encode($data_arr, JSON_UNESCAPED_UNICODE);
    http_response_code(200);
    exit();
} else {
    http_response_code(405);
}
