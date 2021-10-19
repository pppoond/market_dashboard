<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/withdraw_rider.php';
require '../classes/rider.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $withdraw_rider = new WithdrawRider();
    $rider = new Rider();
    $data_arr = array();
    $data_arr['result'] = array();

    if (isset($_GET['findid'])) {
        $results = $withdraw_rider->findById($_GET['findid']);
        foreach ($results as $result) {
            $wd_rider_id = $result['wd_rider_id'];
            $rider_id = $result['rider_id'];
            $total = $result['total'];
            $bank_name = $result['bank_name'];
            $no_bank_account = $result['no_bank_account'];
            $pay_status = $result['pay_status'];
            $time_reg = $result['time_reg'];

            $rider_item = array();
            $result_riders = $rider->findById($rider_id);
            foreach ($result_riders as $result_rider) {
                $rider_id = $result_rider['rider_id'];
                $username = $result_rider['username'];
                $password = $result_rider['password'];
                $rider_name = $result_rider['rider_name'];
                $rider_phone = $result_rider['rider_phone'];
                $profile_image = $result_rider['profile_image'];
                $wallet = $result_rider['wallet'];
                $lat = $result_rider['lat'];
                $lng = $result_rider['lng'];
                $rider_status = $result_rider['rider_status'];
                $time_reg = $result_rider['time_reg'];
                $rider_item = array(
                    "rider_id" => $rider_id,
                    "username" => $username,
                    "password" => $password,
                    "rider_name" => $rider_name,
                    "rider_phone" => $rider_phone,
                    "profile_image" => $profile_image,
                    "wallet" => $wallet,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "status" => $rider_status,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "wd_rider_id" => $wd_rider_id,
                "rider_id" => $rider_item,
                "total" => $total,
                "bank_name" => $bank_name,
                "no_bank_account" => $no_bank_account,
                "pay_status" => $pay_status,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else if (isset($_GET['find_rider_id'])) {
        $results = $withdraw_rider->findByriderId($_GET['find_rider_id']);
        foreach ($results as $result) {
            $wd_rider_id = $result['wd_rider_id'];
            $rider_id = $result['rider_id'];
            $total = $result['total'];
            $bank_name = $result['bank_name'];
            $no_bank_account = $result['no_bank_account'];
            $pay_status = $result['pay_status'];
            $time_reg = $result['time_reg'];

            $rider_item = array();
            $result_riders = $rider->findById($rider_id);
            foreach ($result_riders as $result_rider) {
                $rider_id = $result_rider['rider_id'];
                $username = $result_rider['username'];
                $password = $result_rider['password'];
                $rider_name = $result_rider['rider_name'];
                $rider_phone = $result_rider['rider_phone'];
                $profile_image = $result_rider['profile_image'];
                $wallet = $result_rider['wallet'];
                $lat = $result_rider['lat'];
                $lng = $result_rider['lng'];
                $rider_status = $result_rider['rider_status'];
                $time_reg = $result_rider['time_reg'];
                $rider_item = array(
                    "rider_id" => $rider_id,
                    "username" => $username,
                    "password" => $password,
                    "rider_name" => $rider_name,
                    "rider_phone" => $rider_phone,
                    "profile_image" => $profile_image,
                    "wallet" => $wallet,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "status" => $rider_status,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "wd_rider_id" => $wd_rider_id,
                "rider_id" => $rider_item,
                "total" => $total,
                "bank_name" => $bank_name,
                "no_bank_account" => $no_bank_account,
                "pay_status" => $pay_status,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else {
        $results = $withdraw_rider->withdraw_riders();
        foreach ($results as $result) {
            $wd_rider_id = $result['wd_rider_id'];
            $rider_id = $result['rider_id'];
            $total = $result['total'];
            $bank_name = $result['bank_name'];
            $no_bank_account = $result['no_bank_account'];
            $pay_status = $result['pay_status'];
            $time_reg = $result['time_reg'];

            $rider_item = array();
            $result_riders = $rider->findById($rider_id);
            foreach ($result_riders as $result_rider) {
                $rider_id = $result_rider['rider_id'];
                $username = $result_rider['username'];
                $password = $result_rider['password'];
                $rider_name = $result_rider['rider_name'];
                $rider_phone = $result_rider['rider_phone'];
                $profile_image = $result_rider['profile_image'];
                $wallet = $result_rider['wallet'];
                $lat = $result_rider['lat'];
                $lng = $result_rider['lng'];
                $rider_status = $result_rider['rider_status'];
                $time_reg = $result_rider['time_reg'];
                $rider_item = array(
                    "rider_id" => $rider_id,
                    "username" => $username,
                    "password" => $password,
                    "rider_name" => $rider_name,
                    "rider_phone" => $rider_phone,
                    "profile_image" => $profile_image,
                    "wallet" => $wallet,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "status" => $rider_status,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "wd_rider_id" => $wd_rider_id,
                "rider_id" => $rider_item,
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
    $rider_id = $_POST['rider_id'];
    $total = $_POST['total'];
    $bank_name = $_POST['bank_name'];
    $no_bank_account = $_POST['no_bank_account'];
    $pay_status = $_POST['pay_status'];
    if (isset($rider_id) && isset($total) && isset($bank_name) && isset($no_bank_account)) {
        $withdraw_rider = new WithdrawRider();
        $result = $withdraw_rider->add(
            $rider_id,
            $total,
            $bank_name,
            $no_bank_account,
            $pay_status
        );

        $lastId = [
            "wd_rider_id" => $result
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
