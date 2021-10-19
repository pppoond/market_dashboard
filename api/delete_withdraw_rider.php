<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/withdraw_rider.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $wd_rider_id = $_POST['wd_rider_id'];
    if (isset($wd_rider_id)) {
        $withdraw_rider = new WithdrawRider();
        $result = $withdraw_rider->delete($wd_rider_id);

        $lastId = [
            "wd_rider_id" => $result
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
