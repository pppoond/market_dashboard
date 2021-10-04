<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/store.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $storeName = $_POST['store_name'];
    $storePhone = $_POST['store_phone'];
    if (isset($username)) {
        $store = new Store();
        $result = $store->add(
            $username,
            $password,
            $storePhone,
            $storeName
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
