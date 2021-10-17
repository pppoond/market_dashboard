<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/order.php';
require '../classes/order_detail.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $order_id = $_POST['order_id'];
    if (isset($order_id)) {
        $order = new Order();
        $orderDetail = new OrderDetail();
        $orderDetail->deleteByOrderId($order_id);
        $result = $order->delete($order_id);
        $lastId = [
            "order_id" => $result
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
