<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/address.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $post_address_id = $_POST['address_id'];
    $post_addr_status = $_POST['addr_status'];
    if (isset($post_address_id) && isset($post_addr_status)) {
        $address = new Address();
        $result = $address->updateAddrStatus($post_address_id, $post_addr_status);
        $lastId = [
            "address_id" => (int)$result
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
