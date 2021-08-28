<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/rider.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $post_username = $_POST["username"];
    $post_password = $_POST["password"];
    $rider = new Rider();
    $data_arr = array();
    $data_arr['result'] = array();

    $results = $rider->loginRider($post_username, $post_password);
    foreach ($results as $result) {
        $rider_id = $result['rider_id'];
        $username = $result['username'];
        $password = $result['password'];
        $rider_name = $result['rider_name'];
        $rider_phone = $result['rider_phone'];
        $sex = $result['sex'];
        $profile_image = $result['profile_image'];
        $time_reg = $result['time_reg'];
        $data_items = array(
            "rider_id" => (int)$rider_id,
            "username" => $username,
            "password" => $password,
            "rider_name" => $rider_name,
            "rider_phone" => $rider_phone,
            "sex" => $sex,
            "time_reg" => $time_reg,
        );
        array_push($data_arr['result'], $data_items);
    }
    // echo json_encode($data_arr, JSON_UNESCAPED_UNICODE);
    if ($rider_id != null) {
        $success = array(
            'result' => [
                'msg' => "success",
                'username' => $username,
                'status' => 200
            ]
        );
        echo json_encode($success, JSON_UNESCAPED_UNICODE);
    } else {
        $success = array(
            'result' => [
                'msg' => "unsuccess",
                'username' => $username,
                'status' => 200
            ]
        );
        echo json_encode($success, JSON_UNESCAPED_UNICODE);
    }
    http_response_code(200);
    exit();
} else {
    http_response_code(405);
}
