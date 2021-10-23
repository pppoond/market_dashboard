<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/category.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $category = new Category();
    $data_arr = array();
    $data_arr['result'] = array();

    if (isset($_GET['findid'])) {
        $results = $category->findById($_GET['findid']);
        foreach ($results as $result) {
            $category_id = $result['category_id'];
            $category_name = $result['category_name'];
            $time_reg = $result['time_reg'];

            $data_items = array(
                "category_id" => $category_id,
                "category_name" => $category_name,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else if (isset($_GET['category_name'])) {
        $results = $category->findByIdCateName($_GET['category_name']);
        foreach ($results as $result) {
            $category_id = $result['category_id'];
            $category_name = $result['category_name'];
            $time_reg = $result['time_reg'];

            $data_items = array(
                "category_id" => $category_id,
                "category_name" => $category_name,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else {
        $results = $category->categorys();
        foreach ($results as $result) {
            $category_id = $result['category_id'];
            $category_name = $result['category_name'];
            $time_reg = $result['time_reg'];

            $data_items = array(
                "category_id" => $category_id,
                "category_name" => $category_name,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    }
    echo json_encode($data_arr, JSON_UNESCAPED_UNICODE);
    http_response_code(200);
    exit();
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $category_name = $_POST['category_name'];
    if (isset($username)) {
        $cate = new Category();
        $result = $cate->add(
            $category_name
        );

        $lastId = [
            "cate_id" => $result
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
