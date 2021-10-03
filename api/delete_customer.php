<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/customer.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $customer_id = $_POST['customer_id'];
    if (isset($customer_id)) {
        $customer = new Customer();
        $result = $customer->delete($customer_id);

        $lastId = [
            "customer_id" => $result
        ];

        $result = [
            'title' => "delete",
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
