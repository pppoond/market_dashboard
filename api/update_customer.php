<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/customer.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $customer_id = $_REQUEST['customer_id'];
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $customer_name = $_REQUEST['customer_name'];
    $customer_phone = $_REQUEST['customer_phone'];
    $profile_image = $_REQUEST['profile_image'];
    $sex = $_REQUEST['sex'];
    $customer = new Customer();
    if (isset($_REQUEST['customer_id'])) {
        $updateReturn =  $customer->update(
            $customer_id,
            $username,
            $password,
            $customer_name,
            $customer_phone,
            $profile_image,
            $sex
        );
        $lastId = [
            "customer_id" => (int)$updateReturn
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
            // 'result' => null,
        ];
        echo json_encode($result);
        http_response_code(200);
        exit();
    }
} else {
    http_response_code(405);
}
