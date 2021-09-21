<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/product_image.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $product_images = array();
    $product_images['result'] = array();
    $productImage = new ProductImage();
    if (isset($_GET['findid'])) {
        $pro_img_id = $_GET['findid'];
        $product_images['result'] = array();
        $in_results = $productImage->findById($pro_img_id);
        foreach ($in_results as $in_result) {
            $pro_img_id = $in_result['pro_img_id'];
            $product_id = $in_result['product_id'];
            $pro_img_addr = $in_result['pro_img_addr'];
            $in_time_reg = $in_result['time_reg'];
            $in_data_items = array(
                "pro_img_id" => $pro_img_id,
                "product_id" => $product_id,
                "pro_img_addr" => $pro_img_addr,
                "time_reg" => $in_time_reg,
            );
            array_push($product_images['result'], $in_data_items);
        }
        echo json_encode($result);
        http_response_code(200);
        exit();
    } else if (isset($_GET['delete'])) {
        $pro_img_id = $_GET['delete'];
        $result = $productImage->delete($pro_img_id);
        $lastId = [
            "pro_img_id" => (int)$result
        ];

        $result = [
            'title' => 'delete',
            'msg' => "success",
            'status' => 200,
            'result' => $lastId,
        ];

        echo json_encode($result);
        http_response_code(200);
        exit();
    } else if (isset($_GET['delete_from_product'])) {
    } else {

        $in_results = $productImage->product_images();
        foreach ($in_results as $in_result) {
            $pro_img_id = $in_result['pro_img_id'];
            $product_id = $in_result['product_id'];
            $pro_img_addr = $in_result['pro_img_addr'];
            $in_time_reg = $in_result['time_reg'];
            $in_data_items = array(
                "pro_img_id" => $pro_img_id,
                "product_id" => $product_id,
                "pro_img_addr" => $pro_img_addr,
                "time_reg" => $in_time_reg,
            );
            array_push($product_images['result'], $in_data_items);
        }
    }
    $data_arr = array(
        'result' => $product_images['result']
    );
    echo json_encode($data_arr, JSON_UNESCAPED_UNICODE);
    http_response_code(200);
    exit();
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $product_id = $_POST['product_id'];
    $pro_img_addr = $_POST['pro_img_addr'];
    if (isset($product_id) && isset($pro_img_addr)) {
        $product_image = new ProductImage();
        $result = $product_image->add($product_id, $pro_img_addr);
        $lastId = [
            "pro_img_id" => (int)$result
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
