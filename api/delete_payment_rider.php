<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/payment_rider.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $pay_rider_id = $_POST['pay_rider_id'];
    if (isset($pay_rider_id)) {
        $payment_rider = new PaymentRider();
        $result = $payment_rider->delete($pay_rider_id);

        $lastId = [
            "pay_rider_id" => $result
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
