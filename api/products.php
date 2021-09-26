<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json;charset=utf-8');
require '../classes/product.php';
require '../classes/product_image.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $product = new Product();
    $productImage = new ProductImage();
    $data_arr = array();
    $data_arr['result'] = array();

    if (isset($_GET['findid'])) {
        $results = $product->findById($_GET['findid']);
        foreach ($results as $result) {
            $product_id = $result['product_id'];
            $store_id = $result['store_id'];
            $category_id = $result['category_id'];
            $product_name = $result['product_name'];
            $product_detail = $result['product_detail'];
            $status = $result['status'];
            $time_reg = $result['time_reg'];

            $product_images = array();
            $in_results = $productImage->findByProductId($product_id);
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
                array_push($product_images, $in_data_items);
            }

            $data_items = array(
                "product_id" => $product_id,
                "store_id" => $store_id,
                "category_id" => $category_id,
                "product_name" => $product_name,
                "product_detail" => $product_detail,
                "status" => $status,
                "time_reg" => $time_reg,
                "product_images" => $product_images,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else if (isset($_GET['find_store_id'])) {
        $results = $product->findByStoreId($_GET['find_store_id']);
        foreach ($results as $result) {
            $product_id = $result['product_id'];
            $store_id = $result['store_id'];
            $category_id = $result['category_id'];
            $product_name = $result['product_name'];
            $product_detail = $result['product_detail'];
            $status = $result['status'];
            $time_reg = $result['time_reg'];

            $product_images = array();
            $in_results = $productImage->findByProductId($product_id);
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
                array_push($product_images, $in_data_items);
            }

            $data_items = array(
                "product_id" => $product_id,
                "store_id" => $store_id,
                "category_id" => $category_id,
                "product_name" => $product_name,
                "product_detail" => $product_detail,
                "status" => $status,
                "time_reg" => $time_reg,
                "product_images" => $product_images,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else {
        $results = $product->findByStoreId($_GET['find_store_id']);
        foreach ($results as $result) {
            $product_id = $result['product_id'];
            $store_id = $result['store_id'];
            $category_id = $result['category_id'];
            $product_name = $result['product_name'];
            $product_detail = $result['product_detail'];
            $status = $result['status'];
            $time_reg = $result['time_reg'];

            $product_images = array();
            $in_results = $productImage->findByProductId($product_id);
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
                array_push($product_images, $in_data_items);
            }

            $data_items = array(
                "product_id" => $product_id,
                "store_id" => $store_id,
                "category_id" => $category_id,
                "product_name" => $product_name,
                "product_detail" => $product_detail,
                "status" => $status,
                "time_reg" => $time_reg,
                "product_images" => $product_images,
            );
            array_push($data_arr['result'], $data_items);
        }
    }
    echo json_encode($data_arr, JSON_UNESCAPED_UNICODE);
    http_response_code(200);
    exit();
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $store_id = $_POST['store_id'];
    $category_id = $_POST['category_id'];
    $product_name = $_POST['product_name'];
    $product_detail = $_POST['product_detail'];
    if (isset($store_id) && isset($category_id) && isset($product_name) && isset($product_detail)) {
        $product = new Product();
        $result = $product->add($store_id, $category_id, $product_name, $product_detail);

        $lastId = [
            "product_id" => $result
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
