<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/product.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $product_id = $_REQUEST['product_id'];
    $product_status = $_REQUEST['status'];
    $product = new Product();
    if (isset($_REQUEST['product_id'])) {
        $updateReturn =  $product->updateStatus($product_id, $product_status);
        $lastId = [
            "product_id" => $updateReturn
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
