<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/store.php';
require '../classes/product.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $store_id = $_REQUEST['store_id'];
    $wallet = $_REQUEST['wallet'];
    $store = new Store();
    if (isset($_REQUEST['store_id'])) {
        $updateReturn =  $store->updateWallet(
            $store_id,
            $wallet
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
