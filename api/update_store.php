<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/store.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $store_id = $_REQUEST['store_id'];
    $username = $_REQUEST['username'];
    $store_phone = $_REQUEST['store_phone'];
    $store_name = $_REQUEST['store_name'];
    $profile_image = $_REQUEST['profile_image'];
    $store = new Store();
    if (isset($_REQUEST['store_id'])) {
        $updateReturn =  $store->update(
            $store_id,
            $username,
            $store_phone,
            $store_name,
            $profile_image
        );
        $lastId = [
            "store_id" => $updateReturn
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
