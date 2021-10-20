<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/payment_rider.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $pay_rider_id = $_REQUEST['pay_rider_id'];
    $pay_status = $_REQUEST['pay_status'];
    $withdraw_store = new PaymentRider();
    if (isset($_REQUEST['pay_rider_id'])) {
        $updateReturn =  $withdraw_store->updatePayStatus(
            $pay_rider_id,
            $pay_status
        );
        $lastId = [
            "withdraw_store_id" => $updateReturn
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
