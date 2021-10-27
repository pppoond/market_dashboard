<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/rider.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $rider_id = $_REQUEST['rider_id'];
    $credit = $_REQUEST['credit'];
    $rider = new rider();
    if (isset($_REQUEST['rider_id']) && isset($_REQUEST['credit'])) {
        $updateReturn =  $rider->updateCredit($rider_id, $credit);
        $lastId = [
            "rider_id" => $updateReturn
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
