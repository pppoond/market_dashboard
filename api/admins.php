<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json;charset=utf-8');
require '../classes/admin.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $admin = new Admin();
    $data_arr = array();
    $data_arr['result'] = array();

    if (isset($_GET['findid'])) {
        $results = $admin->findById($_GET['findid']);
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
    } else if (isset($_GET['find_username'])) {
        $results = $admin->findByUsername($_GET['find_username']);
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
    } else {
        $results = $admin->admins();
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
    }




    echo json_encode($data_arr, JSON_UNESCAPED_UNICODE);
    http_response_code(200);
    exit();
} else {
    http_response_code(405);
}
