<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/product.php';
require '../classes/product_image.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $product_id = $_POST['product_id'];
    if (isset($product_id)) {
        $product = new Product();
        $product_image = new ProductImage();
        $product_image->deleteByProductId($product_id);
        $result = $product->delete($product_id);

        $lastId = [
            "product_id" => $result
        ];

        $result = [
            'title' => "delete",
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
