<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/address.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $post_customer_id = $_POST['customer_id'];
    $post_address = $_POST['address'];
    $post_lat = $_POST['lat'];
    $post_lng = $_POST['lng'];
    $post_addr_status = $_POST['addr_status'];
    if (isset($post_customer_id) && isset($post_address) && isset($post_lat) && isset($post_lng) && isset($post_addr_status)) {
        $address = new Address();
        $result = $address->addAddress($post_customer_id, $post_address, $post_lat, $post_lng, $post_addr_status);
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
