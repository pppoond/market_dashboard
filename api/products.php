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
} else {
    http_response_code(405);
}
