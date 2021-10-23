<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/store.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $store = new Store();
    $data_arr = array();
    $data_arr['result'] = array();

    if (isset($_GET['findid'])) {
        $results = $store->findById($_GET['findid']);
        foreach ($results as $result) {
            $store_id = $result['store_id'];
            $email = $result['email'];
            $username = $result['username'];
            $password = $result['password'];
            $store_name = $result['store_name'];
            $store_phone = $result['store_phone'];
            $profile_image = $result['profile_image'];
            $wallet = $result['wallet'];
            $lat = $result['lat'];
            $lng = $result['lng'];
            $status = $result['status'];
            $time_reg = $result['time_reg'];
            $data_items = array(
                "store_id" => $store_id,
                "email" => $email,
                "username" => $username,
                "password" => $password,
                "store_name" => $store_name,
                "store_phone" => $store_phone,
                "profile_image" => $profile_image,
                "wallet" => $wallet,
                "lat" => (float)$lat,
                "lng" => (float)$lng,
                "status" => (int)$status,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else if (isset($_GET['find_username'])) {
        $results = $store->findByUsername($_GET['find_username']);
        foreach ($results as $result) {
            $store_id = $result['store_id'];
            $email = $result['email'];
            $username = $result['username'];
            $password = $result['password'];
            $store_name = $result['store_name'];
            $store_phone = $result['store_phone'];
            $profile_image = $result['profile_image'];
            $wallet = $result['wallet'];
            $lat = $result['lat'];
            $lng = $result['lng'];
            $status = $result['status'];
            $time_reg = $result['time_reg'];
            $data_items = array(
                "store_id" => $store_id,
                "email" => $email,
                "username" => $username,
                "password" => $password,
                "store_name" => $store_name,
                "store_phone" => $store_phone,
                "profile_image" => $profile_image,
                "wallet" => $wallet,
                "lat" => (float)$lat,
                "lng" => (float)$lng,
                "status" => (int)$status,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else {
        $results = $store->stores();
        foreach ($results as $result) {
            $store_id = $result['store_id'];
            $email = $result['email'];
            $username = $result['username'];
            $password = $result['password'];
            $store_name = $result['store_name'];
            $store_phone = $result['store_phone'];
            $profile_image = $result['profile_image'];
            $wallet = $result['wallet'];
            $lat = $result['lat'];
            $lng = $result['lng'];
            $status = $result['status'];
            $time_reg = $result['time_reg'];
            $data_items = array(
                "store_id" => $store_id,
                "email" => $email,
                "username" => $username,
                "password" => $password,
                "store_name" => $store_name,
                "store_phone" => $store_phone,
                "profile_image" => $profile_image,
                "wallet" => $wallet,
                "lat" => (float)$lat,
                "lng" => (float)$lng,
                "status" => (int)$status,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    }
    echo json_encode($data_arr, JSON_UNESCAPED_UNICODE);
    http_response_code(200);
    exit();
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $store_phone = $_POST['store_phone'];
    $store_name = $_POST['store_name'];
    if (isset($username)) {
        $store = new Store();
        $result = $store->add(
            $email,
            $username,
            $password,
            $store_phone,
            $store_name
        );

        $lastId = [
            "store_id" => $result
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
        ];
        echo json_encode($result);
        http_response_code(200);
        exit();
    }
} else {

    http_response_code(405);
}
