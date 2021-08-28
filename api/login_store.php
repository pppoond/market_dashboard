<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/store.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $post_username = $_POST["username"];
    $post_password = $_POST["password"];
    $store = new Store();
    $data_arr = array();
    $data_arr['result'] = array();

    $results = $store->loginstore($post_username, $post_password);
    foreach ($results as $result) {
        $store_id = $result['store_id'];
        $username = $result['username'];
        $password = $result['password'];
        $store_name = $result['store_name'];
        $store_phone = $result['store_phone'];
        $profile_image = $result['profile_image'];
        $time_reg = $result['time_reg'];
        $data_items = array(
            "store_id" => (int)$store_id,
            "username" => $username,
            "password" => $password,
            "store_name" => $store_name,
            "store_phone" => $store_phone,
            "time_reg" => $time_reg,
        );
        array_push($data_arr['result'], $data_items);
    }
    // echo json_encode($data_arr, JSON_UNESCAPED_UNICODE);
    if ($store_id != null) {
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
