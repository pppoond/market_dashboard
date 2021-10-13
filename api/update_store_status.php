<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/store.php';
require '../classes/product.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $store_id = $_REQUEST['store_id'];
    $store_status = $_REQUEST['store_status'];
    $store = new Store();
    $product = new Product();
    if (isset($_REQUEST['store_id'])) {
        if ($store_status == '0') {
            $product->updateStatusByStoreId($store_id,  $store_status);
        }
        $updateReturn =  $store->updateStatus(
            $store_id,
            $store_status
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
