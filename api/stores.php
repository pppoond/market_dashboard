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
            $sex = $result['sex'];
            $profile_image = $result['profile_image'];
            $time_reg = $result['time_reg'];
            $data_items = array(
                "store_id" => (int)$store_id,
                "username" => $username,
                // "password" => $password,
                "store_name" => $store_name,
                "store_phone" => $store_phone,
                "profile_image" => $profile_image,
                "sex" => $sex,
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
            $sex = $result['sex'];
            $profile_image = $result['profile_image'];
            $time_reg = $result['time_reg'];
            $data_items = array(
                "store_id" => (int)$store_id,
                "username" => $username,
                // "password" => $password,
                "store_name" => $store_name,
                "store_phone" => $store_phone,
                "profile_image" => $profile_image,
                "sex" => $sex,
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
            $sex = $result['sex'];
            $profile_image = $result['profile_image'];
            $time_reg = $result['time_reg'];
            $data_items = array(
                "store_id" => (int)$store_id,
                "username" => $username,
                "password" => $password,
                "store_name" => $store_name,
                "store_phone" => $store_phone,
                "profile_image" => $profile_image,
                "sex" => $sex,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    }




    echo json_encode($data_arr, JSON_UNESCAPED_UNICODE);
    http_response_code(200);
    exit();
} else {
    http_response_code(405);
}
