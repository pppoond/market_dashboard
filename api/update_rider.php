<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/rider.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $rider_id = $_REQUEST['rider_id'];
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $rider_phone = $_REQUEST['rider_phone'];
    $rider_name = $_REQUEST['rider_name'];
    $sex = $_REQUEST['sex'];
    $profile_image = $_REQUEST['profile_image'];
    $rider = new Rider();
    if (isset($_REQUEST['rider_id'])) {
        $updateReturn =  $rider->update(
            $rider_id,
            $username,
            $password,
            $rider_phone,
            $rider_name,
            $sex,
            $profile_image
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
