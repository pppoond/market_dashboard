<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/order.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $order_id = $_REQUEST['order_id'];
    $order_status = $_REQUEST['order_status'];
    $orders = new Order();
    if (isset($_REQUEST['order_id'])) {
        $updateReturn =  $orders->updateStatus($order_id, $order_status);
        $lastId = [
            "order_id" => $updateReturn
        ];

        $result = [
            'title' => "update_status",
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
