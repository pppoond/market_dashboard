<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/withdraw_store.php';
require '../classes/store.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $withdraw_store = new WithdrawStore();
    $store = new Store();
    $data_arr = array();
    $data_arr['result'] = array();

    if (isset($_GET['findid'])) {
        $results = $withdraw_store->findById($_GET['findid']);
        foreach ($results as $result) {
            $wd_store_id = $result['wd_store_id'];
            $store_id = $result['store_id'];
            $total = $result['total'];
            $bank_name = $result['bank_name'];
            $no_bank_account = $result['no_bank_account'];
            $pay_status = $result['pay_status'];
            $time_reg = $result['time_reg'];

            $store_item = array();
            $result_stores = $store->findById($store_id);
            foreach ($result_stores as $result_store) {
                $store_id = $result_store['store_id'];
                $username = $result_store['username'];
                $password = $result_store['password'];
                $store_name = $result_store['store_name'];
                $store_phone = $result_store['store_phone'];
                $profile_image = $result_store['profile_image'];
                $wallet = $result_store['wallet'];
                $lat = $result_store['lat'];
                $lng = $result_store['lng'];
                $store_status = $result_store['status'];
                $time_reg = $result_store['time_reg'];
                $store_item = array(
                    "store_id" => $store_id,
                    "username" => $username,
                    "password" => $password,
                    "store_name" => $store_name,
                    "store_phone" => $store_phone,
                    "profile_image" => $profile_image,
                    "wallet" => $wallet,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "status" => $store_status,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "wd_store_id" => $wd_store_id,
                "store_id" => $store_item,
                "total" => $total,
                "bank_name" => $bank_name,
                "no_bank_account" => $no_bank_account,
                "pay_status" => $pay_status,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else if (isset($_GET['find_store_id'])) {
        $results = $withdraw_store->findByStoreId($_GET['find_store_id']);
        foreach ($results as $result) {
            $wd_store_id = $result['wd_store_id'];
            $store_id = $result['store_id'];
            $total = $result['total'];
            $bank_name = $result['bank_name'];
            $no_bank_account = $result['no_bank_account'];
            $pay_status = $result['pay_status'];
            $time_reg = $result['time_reg'];

            $store_item = array();
            $result_stores = $store->findById($store_id);
            foreach ($result_stores as $result_store) {
                $store_id = $result_store['store_id'];
                $username = $result_store['username'];
                $password = $result_store['password'];
                $store_name = $result_store['store_name'];
                $store_phone = $result_store['store_phone'];
                $profile_image = $result_store['profile_image'];
                $wallet = $result_store['wallet'];
                $lat = $result_store['lat'];
                $lng = $result_store['lng'];
                $store_status = $result_store['status'];
                $time_reg = $result_store['time_reg'];
                $store_item = array(
                    "store_id" => $store_id,
                    "username" => $username,
                    "password" => $password,
                    "store_name" => $store_name,
                    "store_phone" => $store_phone,
                    "profile_image" => $profile_image,
                    "wallet" => $wallet,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "status" => $store_status,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "wd_store_id" => $wd_store_id,
                "store_id" => $store_item,
                "total" => $total,
                "bank_name" => $bank_name,
                "no_bank_account" => $no_bank_account,
                "pay_status" => $pay_status,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else {
        $results = $withdraw_store->withdraw_stores();
        foreach ($results as $result) {
            $wd_store_id = $result['wd_store_id'];
            $store_id = $result['store_id'];
            $total = $result['total'];
            $bank_name = $result['bank_name'];
            $no_bank_account = $result['no_bank_account'];
            $pay_status = $result['pay_status'];
            $time_reg = $result['time_reg'];

            $store_item = array();
            $result_stores = $store->findById($store_id);
            foreach ($result_stores as $result_store) {
                $store_id = $result_store['store_id'];
                $username = $result_store['username'];
                $password = $result_store['password'];
                $store_name = $result_store['store_name'];
                $store_phone = $result_store['store_phone'];
                $profile_image = $result_store['profile_image'];
                $wallet = $result_store['wallet'];
                $lat = $result_store['lat'];
                $lng = $result_store['lng'];
                $store_status = $result_store['status'];
                $time_reg = $result_store['time_reg'];
                $store_item = array(
                    "store_id" => $store_id,
                    "username" => $username,
                    "password" => $password,
                    "store_name" => $store_name,
                    "store_phone" => $store_phone,
                    "profile_image" => $profile_image,
                    "wallet" => $wallet,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "status" => $store_status,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "wd_store_id" => $wd_store_id,
                "store_id" => $store_item,
                "total" => $total,
                "bank_name" => $bank_name,
                "no_bank_account" => $no_bank_account,
                "pay_status" => $pay_status,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    }
    echo json_encode($data_arr, JSON_UNESCAPED_UNICODE);
    http_response_code(200);
    exit();
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $store_id = $_POST['store_id'];
    $total = $_POST['total'];
    $bank_name = $_POST['bank_name'];
    $no_bank_account = $_POST['no_bank_account'];
    $pay_status = $_POST['pay_status'];
    if (isset($store_id) && isset($total) && isset($bank_name) && isset($no_bank_account)) {
        $withdraw_store = new WithdrawStore();
        $result = $withdraw_store->add(
            $store_id,
            $total,
            $bank_name,
            $no_bank_account,
            $pay_status
        );

        $lastId = [
            "wd_store_id" => $result
        ];

        $data_arr = [
            'msg' => "success",
            'status' => 200,
            'result' => $lastId,
        ];

        echo json_encode($data_arr);
        http_response_code(200);
        exit();
    } else {
        $data_arr = [
            'msg' => "unsuccess",
            'status' => 200,
        ];
        echo json_encode($data_arr);
        http_response_code(200);
        exit();
    }
} else {
    http_response_code(405);
}
