<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/store.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {
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
