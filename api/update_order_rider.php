<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/order.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $order_id = $_REQUEST['order_id'];
    $rider_id = $_REQUEST['rider_id'];
    $orders = new Order();
    if (isset($_REQUEST['order_id'])) {
        $updateReturn =  $orders->updateRiderId($order_id, $rider_id);
        $lastId = [
            "order_id" => $updateReturn
        ];

        $result = [
            'title' => "update_rider_id",
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
