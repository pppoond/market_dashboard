<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/rider.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $rider_id = $_REQUEST['rider_id'];
    $rider_status = $_REQUEST['rider_status'];
    $rider = new Rider();
    if (isset($_REQUEST['rider_id'])) {
        $updateReturn =  $rider->updateStatus(
            $rider_id,
            $rider_status
        );
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
