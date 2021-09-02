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
            $username = $result['username'];
            $password = $result['password'];
            $store_name = $result['store_name'];
            $store_phone = $result['store_phone'];
            $profile_image = $result['profile_image'];
            $wallet = $result['wallet'];
            $lat = $result['lat'];
            $lng = $result['lng'];
            $time_reg = $result['time_reg'];
            $data_items = array(
                "store_id" => (int)$store_id,
                "username" => $username,
                "password" => $password,
                "store_name" => $store_name,
                "store_phone" => $store_phone,
                "profile_image" => $profile_image,
                "wallet" => $wallet,
                "lat" => (float)$lat,
                "lng" => (float)$lng,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else if (isset($_GET['find_username'])) {
        $results = $store->findByUsername($_GET['find_username']);
        foreach ($results as $result) {
            $store_id = $result['store_id'];
            $username = $result['username'];
            $password = $result['password'];
            $store_name = $result['store_name'];
            $store_phone = $result['store_phone'];
            $profile_image = $result['profile_image'];
            $wallet = $result['wallet'];
            $lat = $result['lat'];
            $lng = $result['lng'];
            $time_reg = $result['time_reg'];
            $data_items = array(
                "store_id" => (int)$store_id,
                "username" => $username,
                "password" => $password,
                "store_name" => $store_name,
                "store_phone" => $store_phone,
                "profile_image" => $profile_image,
                "wallet" => $wallet,
                "lat" => (float)$lat,
                "lng" => (float)$lng,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else {
        $results = $store->stores();
        foreach ($results as $result) {
            $store_id = $result['store_id'];
            $username = $result['username'];
            $password = $result['password'];
            $store_name = $result['store_name'];
            $store_phone = $result['store_phone'];
            $profile_image = $result['profile_image'];
            $wallet = $result['wallet'];
            $lat = $result['lat'];
            $lng = $result['lng'];
            $time_reg = $result['time_reg'];
            $data_items = array(
                "store_id" => (int)$store_id,
                "username" => $username,
                "password" => $password,
                "store_name" => $store_name,
                "store_phone" => $store_phone,
                "profile_image" => $profile_image,
                "wallet" => $wallet,
                "lat" => (float)$lat,
                "lng" => (float)$lng,
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
    $storeName = $_POST['store_name'];
    $storePhone = $_POST['store_phone'];
    if (isset($username) && isset($password) && isset($storeName) && isset($storePhone)) {
        $store = new Store();
        $result = $store->add($username, $password, $storePhone, $storeName);

        $lastId = [
            "store_id" => (int)$result
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
} else if ($_SERVER['REQUEST_METHOD'] == "PUT") {
} else {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $store_name = $_REQUEST['store_name'];
    $store_phone = $_REQUEST['store_phone'];
    $profile_image = $_REQUEST['profile_image'];
    $wallet = $_REQUEST['wallet'];
    $lat = $_REQUEST['lat'];
    $lng = $_REQUEST['lng'];

    http_response_code(405);
}
