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
            $bank_name = $result['bank_name'];
            $account_name = $result['account_name'];
            $no_bank_account = $result['no_bank_account'];
            $time_reg = $result['time_reg'];
            $data_items = array(
                "admin_id" => $admin_id,
                "username" => $username,
                "password" => $password,
                "admin_name" => $admin_name,
                "bank_name" =>   $bank_name,
                "account_name" =>  $account_name,
                "no_bank_account" => $no_bank_account,
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
            $bank_name = $result['bank_name'];
            $account_name = $result['account_name'];
            $no_bank_account = $result['no_bank_account'];
            $time_reg = $result['time_reg'];
            $data_items = array(
                "admin_id" => $admin_id,
                "username" => $username,
                "password" => $password,
                "admin_name" => $admin_name,
                "bank_name" =>   $bank_name,
                "account_name" =>  $account_name,
                "no_bank_account" => $no_bank_account,
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
            $bank_name = $result['bank_name'];
            $account_name = $result['account_name'];
            $no_bank_account = $result['no_bank_account'];
            $time_reg = $result['time_reg'];
            $data_items = array(
                "admin_id" => $admin_id,
                "username" => $username,
                "password" => $password,
                "admin_name" => $admin_name,
                "bank_name" =>   $bank_name,
                "account_name" =>  $account_name,
                "no_bank_account" => $no_bank_account,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    }

    echo json_encode($data_arr, JSON_UNESCAPED_UNICODE);
    http_response_code(200);
    exit();
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {


    $username = $_POST['username'];
    $password = $_POST['password'];
    $admin_name = $_POST['admin_name'];
    $bank_name = $_POST['bank_name'];
    $account_name = $_POST['account_name'];
    $no_bank_account = $_POST['no_bank_account'];
    if (isset($username) && isset($password)) {
        $admin = new Admin();
        $updateReturn =  $admin->add(
            $username,
            $password,
            $admin_name,
            $bank_name,
            $account_name,
            $no_bank_account
        );
        $lastId = [
            "admin_id" => $updateReturn
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
