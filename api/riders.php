<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/rider.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $rider = new Rider();
    $data_arr = array();
    $data_arr['result'] = array();

    if (isset($_GET['findid'])) {
        $results = $rider->findById($_GET['findid']);
        foreach ($results as $result) {
            $rider_id = $result['rider_id'];
            $username = $result['username'];
            $password = $result['password'];
            $rider_phone = $result['rider_phone'];
            $rider_name = $result['rider_name'];
            $sex = $result['sex'];
            $rider_status = $result['rider_status'];
            $credit = $result['credit'];
            $wallet = $result['wallet'];
            $profile_image = $result['profile_image'];
            $time_reg = $result['time_reg'];
            $data_items = array(
                "rider_id" => $rider_id,
                "username" => $username,
                "password" => $password,
                "rider_phone" => $rider_phone,
                "rider_name" => $rider_name,
                "sex" => $sex,
                "rider_status" => $rider_status,
                "credit" => $credit,
                "wallet" => $wallet,
                "profile_image" => $profile_image,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else if (isset($_GET['find_username'])) {
        $results = $rider->findByUsername($_GET['find_username']);
        foreach ($results as $result) {
            $rider_id = $result['rider_id'];
            $username = $result['username'];
            $password = $result['password'];
            $rider_phone = $result['rider_phone'];
            $rider_name = $result['rider_name'];
            $sex = $result['sex'];
            $rider_status = $result['rider_status'];
            $credit = $result['credit'];
            $wallet = $result['wallet'];
            $profile_image = $result['profile_image'];
            $time_reg = $result['time_reg'];
            $data_items = array(
                "rider_id" => $rider_id,
                "username" => $username,
                "password" => $password,
                "rider_phone" => $rider_phone,
                "rider_name" => $rider_name,
                "sex" => $sex,
                "rider_status" => $rider_status,
                "credit" => $credit,
                "wallet" => $wallet,
                "profile_image" => $profile_image,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else {
        $results = $rider->riders();
        foreach ($results as $result) {
            $rider_id = $result['rider_id'];
            $username = $result['username'];
            $password = $result['password'];
            $rider_phone = $result['rider_phone'];
            $rider_name = $result['rider_name'];
            $sex = $result['sex'];
            $rider_status = $result['rider_status'];
            $credit = $result['credit'];
            $wallet = $result['wallet'];
            $profile_image = $result['profile_image'];
            $time_reg = $result['time_reg'];
            $data_items = array(
                "rider_id" => $rider_id,
                "username" => $username,
                "password" => $password,
                "rider_phone" => $rider_phone,
                "rider_name" => $rider_name,
                "sex" => $sex,
                "rider_status" => $rider_status,
                "credit" => $credit,
                "wallet" => $wallet,
                "profile_image" => $profile_image,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    }
    echo json_encode($data_arr, JSON_UNESCAPED_UNICODE);
    http_response_code(200);
    exit();
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $riderName = $_POST['rider_name'];
    $riderPhone = $_POST['rider_phone'];
    if (isset($username) && isset($password) && isset($riderName) && isset($riderPhone)) {
        $rider = new rider();
        $result = $rider->add($username, $password, $riderPhone, $riderName);

        $lastId = [
            "rider_id" => (int)$result
        ];

        $data_arr = [
            'msg' => "success",
            'status' => 200,
            'result' => $lastId,
        ];

        echo json_encode($data_arr);
        http_response_code(200);
        exit();
    } else {
        $data_arr = [
            'msg' => "unsuccess",
            'status' => 200,
        ];
        echo json_encode($data_arr);
        http_response_code(200);
        exit();
    }
} else {

    http_response_code(405);
}
