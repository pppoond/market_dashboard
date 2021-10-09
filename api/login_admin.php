<?php
session_start();
header('Content-Type: application/json;charset=utf-8');
require '../classes/admin.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $post_username = $_POST["username"];
    $post_password = $_POST["password"];
    $admin = new Admin();
    $data_arr = array();
    $data_arr['result'] = array();

    $results = $admin->loginadmin($post_username, $post_password);
    foreach ($results as $result) {
        $admin_id = $result['admin_id'];
        $username = $result['username'];
        $password = $result['password'];
        $admin_name = $result['admin_name'];
        $time_reg = $result['time_reg'];
        $data_items = array(
            "admin_id" => $admin_id,
            "username" => $username,
            "password" => $password,
            "admin_name" => $admin_name,
            "time_reg" => $time_reg,
        );
        array_push($data_arr['result'], $data_items);
    }
    // echo json_encode($data_arr, JSON_UNESCAPED_UNICODE);
    if ($admin_id != null) {

        $_SESSION["admin_id"] = $admin_id;

        $success = array(
            'result' => [
                'msg' => "success",
                'username' => $username,
                'status' => 200
            ]
        );
        echo json_encode($success, JSON_UNESCAPED_UNICODE);
    } else {
        $success = array(
            'result' => [
                'msg' => "unsuccess",
                'username' => $username,
                'status' => 200
            ]
        );
        echo json_encode($success, JSON_UNESCAPED_UNICODE);
    }
    http_response_code(200);
    exit();
} else {
    http_response_code(405);
}
