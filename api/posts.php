<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/post.php';
require '../classes/store.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $post = new Post();
    $store = new Store();
    $data_arr = array();
    $data_arr['result'] = array();

    if (isset($_GET['findid'])) {
        $results = $post->findById($_GET['findid']);
        foreach ($results as $result) {
            $post_id = $result['post_id'];
            $store_id = $result['store_id'];
            $message = $result['message'];
            $images = $result['images'];
            $time_reg = $result['time_reg'];

            $store_item = array();
            $result_stores = $store->findById($store_id);
            foreach ($result_stores as $result_store) {
                $store_id = $result_store['store_id'];
                $email = $result_store['email'];
                $username = $result_store['username'];
                $password = $result_store['password'];
                $store_name = $result_store['store_name'];
                $store_phone = $result_store['store_phone'];
                $profile_image = $result_store['profile_image'];
                $wallet = $result_store['wallet'];
                $lat = $result_store['lat'];
                $lng = $result_store['lng'];
                $store_status = $result_store['status'];
                $time_reg = $result_store['time_reg'];
                $store_item = array(
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
                    "status" => $store_status,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "post_id" => $post_id,
                "store_id" => $store_item,
                "message" => $message,
                "images" => (explode(',', $images)),
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else if (isset($_GET['store_id'])) {
        $results = $post->findByIdStoreId($_GET['store_id']);
        foreach ($results as $result) {
            $post_id = $result['post_id'];
            $store_id = $result['store_id'];
            $message = $result['message'];
            $images = $result['images'];
            $time_reg = $result['time_reg'];

            $store_item = array();
            $result_stores = $store->findById($store_id);
            foreach ($result_stores as $result_store) {
                $store_id = $result_store['store_id'];
                $email = $result_store['email'];
                $username = $result_store['username'];
                $password = $result_store['password'];
                $store_name = $result_store['store_name'];
                $store_phone = $result_store['store_phone'];
                $profile_image = $result_store['profile_image'];
                $wallet = $result_store['wallet'];
                $lat = $result_store['lat'];
                $lng = $result_store['lng'];
                $store_status = $result_store['status'];
                $time_reg = $result_store['time_reg'];
                $store_item = array(
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
                    "status" => $store_status,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "post_id" => $post_id,
                "store_id" => $store_item,
                "message" => $message,
                "images" => (explode(',', $images)),
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else {
        $results = $post->posts();
        foreach ($results as $result) {
            $post_id = $result['post_id'];
            $store_id = $result['store_id'];
            $message = $result['message'];
            $images = $result['images'];
            $time_reg = $result['time_reg'];

            $store_item = array();
            $result_stores = $store->findById($store_id);
            foreach ($result_stores as $result_store) {
                $store_id = $result_store['store_id'];
                $email = $result_store['email'];
                $username = $result_store['username'];
                $password = $result_store['password'];
                $store_name = $result_store['store_name'];
                $store_phone = $result_store['store_phone'];
                $profile_image = $result_store['profile_image'];
                $wallet = $result_store['wallet'];
                $lat = $result_store['lat'];
                $lng = $result_store['lng'];
                $store_status = $result_store['status'];
                $time_reg = $result_store['time_reg'];
                $store_item = array(
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
                    "status" => $store_status,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "post_id" => $post_id,
                "store_id" => $store_item,
                "message" => $message,
                "images" => (explode(',', $images)),
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    }
    echo json_encode($data_arr, JSON_UNESCAPED_UNICODE);
    http_response_code(200);
    exit();
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $store_id = $_POST['store_id'];
    $message = $_POST['message'];
    $images = $_POST['images'];
    if (isset($store_id)) {
        $post = new Post();
        $result = $post->add(
            $store_id,
            $message,
            $images
        );

        $lastId = [
            "post_id" => $result
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
