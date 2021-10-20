<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/payment_rider.php';
require '../classes/rider.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $payment_rider = new PaymentRider();
    $riders = new Rider();
    $data_arr = array();
    $data_arr['result'] = array();

    if (isset($_GET['findid'])) {
        $results = $payment_rider->findById($_GET['findid']);
        foreach ($results as $result) {
            $pay_rider_id = $result['pay_rider_id'];
            $rider_id = $result['rider_id'];
            $total = $result['total'];
            $slip = $result['slip'];
            $bank_name = $result['bank_name'];
            $account_name = $result['account_name'];
            $no_bank_account = $result['no_bank_account'];
            $pay_status = $result['pay_status'];
            $time_reg = $result['time_reg'];

            $rider_item = array();
            $result_riders = $riders->findById($rider_id);
            foreach ($result_riders as $result_rider) {
                $rider_id = $result_rider['rider_id'];
                $username = $result_rider['username'];
                $password = $result_rider['password'];
                $payment_rider_name = $result_rider['rider_name'];
                $payment_rider_phone = $result_rider['rider_phone'];
                $profile_image = $result_rider['profile_image'];
                $credit = $result_rider['credit'];
                $wallet = $result_rider['wallet'];
                $lat = $result_rider['lat'];
                $lng = $result_rider['lng'];
                $payment_rider_status = $result_rider['rider_status'];
                $time_reg = $result_rider['time_reg'];
                $rider_item = array(
                    "rider_id" => $rider_id,
                    "username" => $username,
                    "password" => $password,
                    "rider_name" => $payment_rider_name,
                    "rider_phone" => $payment_rider_phone,
                    "profile_image" => $profile_image,
                    "wallet" => $wallet,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "status" => $payment_rider_status,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "pay_rider_id" => $pay_rider_id,
                "rider_id" => $rider_item,
                "total" => $total,
                "slip" => $slip,
                "bank_name" => $bank_name,
                "account_name" => $account_name,
                "no_bank_account" => $no_bank_account,
                "pay_status" => $pay_status,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else if (isset($_GET['rider_id'])) {
        $results = $payment_rider->findBypayment_riderId($_GET['rider_id']);
        foreach ($results as $result) {
            $pay_rider_id = $result['pay_rider_id'];
            $rider_id = $result['rider_id'];
            $total = $result['total'];
            $slip = $result['slip'];
            $bank_name = $result['bank_name'];
            $account_name = $result['account_name'];
            $no_bank_account = $result['no_bank_account'];
            $pay_status = $result['pay_status'];
            $time_reg = $result['time_reg'];

            $rider_item = array();
            $result_riders = $riders->findById($rider_id);
            foreach ($result_riders as $result_rider) {
                $rider_id = $result_rider['rider_id'];
                $username = $result_rider['username'];
                $password = $result_rider['password'];
                $payment_rider_name = $result_rider['rider_name'];
                $payment_rider_phone = $result_rider['rider_phone'];
                $profile_image = $result_rider['profile_image'];
                $credit = $result_rider['credit'];
                $wallet = $result_rider['wallet'];
                $lat = $result_rider['lat'];
                $lng = $result_rider['lng'];
                $payment_rider_status = $result_rider['rider_status'];
                $time_reg = $result_rider['time_reg'];
                $rider_item = array(
                    "rider_id" => $rider_id,
                    "username" => $username,
                    "password" => $password,
                    "rider_name" => $payment_rider_name,
                    "rider_phone" => $payment_rider_phone,
                    "profile_image" => $profile_image,
                    "wallet" => $wallet,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "status" => $payment_rider_status,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "pay_rider_id" => $pay_rider_id,
                "rider_id" => $rider_item,
                "total" => $total,
                "slip" => $slip,
                "bank_name" => $bank_name,
                "account_name" => $account_name,
                "no_bank_account" => $no_bank_account,
                "pay_status" => $pay_status,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else {
        $results = $payment_rider->payment_riders();
        foreach ($results as $result) {
            $pay_rider_id = $result['pay_rider_id'];
            $rider_id = $result['rider_id'];
            $total = $result['total'];
            $slip = $result['slip'];
            $bank_name = $result['bank_name'];
            $account_name = $result['account_name'];
            $no_bank_account = $result['no_bank_account'];
            $pay_status = $result['pay_status'];
            $time_reg = $result['time_reg'];

            $rider_item = array();
            $result_riders = $riders->findById($rider_id);
            foreach ($result_riders as $result_rider) {
                $rider_id = $result_rider['rider_id'];
                $username = $result_rider['username'];
                $password = $result_rider['password'];
                $payment_rider_name = $result_rider['rider_name'];
                $payment_rider_phone = $result_rider['rider_phone'];
                $profile_image = $result_rider['profile_image'];
                $credit = $result_rider['credit'];
                $wallet = $result_rider['wallet'];
                $lat = $result_rider['lat'];
                $lng = $result_rider['lng'];
                $payment_rider_status = $result_rider['rider_status'];
                $time_reg = $result_rider['time_reg'];
                $rider_item = array(
                    "rider_id" => $rider_id,
                    "username" => $username,
                    "password" => $password,
                    "rider_name" => $payment_rider_name,
                    "rider_phone" => $payment_rider_phone,
                    "profile_image" => $profile_image,
                    "wallet" => $wallet,
                    "lat" => (float)$lat,
                    "lng" => (float)$lng,
                    "status" => $payment_rider_status,
                    "time_reg" => $time_reg,
                );
            }

            $data_items = array(
                "pay_rider_id" => $pay_rider_id,
                "rider_id" => $rider_item,
                "total" => $total,
                "slip" => $slip,
                "bank_name" => $bank_name,
                "account_name" => $account_name,
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
    $slip = $_POST['slip'];
    $bank_name = $_POST['bank_name'];
    $account_name = $_POST['account_name'];
    $no_bank_account = $_POST['no_bank_account'];
    $pay_status = $_POST['pay_status'];
    if (isset($rider_id) && isset($total) && isset($slip) && isset($bank_name)) {
        $payment_rider = new PaymentRider();
        $result = $payment_rider->add(
            $rider_id,
            $total,
            $slip,
            $bank_name,
            $account_name,
            $no_bank_account,
            $pay_status
        );

        $lastId = [
            "pay_rider_id" => $result
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
