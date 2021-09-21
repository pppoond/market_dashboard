<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/product_image.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $pro_img_id = $_REQUEST['pro_img_id'];
    $pro_img_addr = $_REQUEST['pro_img_addr'];
    $product_image = new ProductImage();
    if (isset($_REQUEST['pro_img_id'])) {
        $updateReturn =  $product_image->update($pro_img_id, $pro_img_addr);
        $lastId = [
            "pro_img_id" => $updateReturn
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
