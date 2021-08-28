<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/customer.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $customerName = $_POST['customer_name'];
    $customerPhone = $_POST['customer_phone'];
    if (isset($username)) {
        $customer = new Customer();
        $result = $customer->add($username, $password, $customerName, $customerPhone);

        $lastId = [
            "customer_id" => $result
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
