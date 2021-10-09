<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/store.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $store_id = $_REQUEST['store_id'];
    $lat = $_REQUEST['lat'];
    $lng = $_REQUEST['lng'];
    $store = new Store();
    if (isset($_REQUEST['store_id']) && isset($_REQUEST['lat']) && isset($_REQUEST['lng'])) {
        $updateReturn =  $store->updateLatLng(
            $store_id,
            $lat,
            $lng
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
