<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/address.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $address = new Address();
    $data_arr = array();
    $data_arr['result'] = array();

    if (isset($_GET['findid'])) {
        $results = $address->findById($_GET['findid']);
        foreach ($results as $result) {
            $address_id = $result['address_id'];
            $customer_id = $result['customer_id'];
            $address = $result['address'];
            $lat = $result['lat'];
            $lng = $result['lng'];
            $addr_status = $result['addr_status'];
            $time_reg = $result['time_reg'];
            $data_items = array(
                "address_id" => (int)$address_id,
                "customer_id" => (int)$customer_id,
                "address" =>  $address,
                "lat" => (float)$lat,
                "lng" => (float)$lng,
                "addr_status" => $addr_status,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else if (isset($_GET['find_customer_id'])) {
        $results = $address->findByCustomerId($_GET['find_customer_id']);
        foreach ($results as $result) {
            $address_id = $result['address_id'];
            $customer_id = $result['customer_id'];
            $address = $result['address'];
            $lat = $result['lat'];
            $lng = $result['lng'];
            $addr_status = $result['addr_status'];
            $time_reg = $result['time_reg'];
            $data_items = array(
                "address_id" => (int)$address_id,
                "customer_id" => (int)$customer_id,
                "address" =>  $address,
                "lat" => (float)$lat,
                "lng" => (float)$lng,
                "addr_status" => $addr_status,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    } else if (isset($_GET['delete_by_id'])) {
        if ($address->findById($_GET['delete_by_id']) != null) {
            $results = $address->delete($_GET['delete_by_id']);
            $lastId = [
                "address_id" => $_GET['delete_by_id'],
                "detail" => "deleted"
            ];

            $result = [
                'title' => 'delete',
                'msg' => "success",
                'status' => 200,
                'result' => $lastId,
            ];
        } else {
            $result = [
                'title' => 'delete',
                'msg' => "unsuccess",
                'status' => 200,
                'result' => "nodata",
            ];
        }


        echo json_encode($result);
        http_response_code(200);
        exit();
    } else {
        $results = $address->addresss();
        foreach ($results as $result) {
            $address_id = $result['address_id'];
            $customer_id = $result['customer_id'];
            $address = $result['address'];
            $lat = $result['lat'];
            $lng = $result['lng'];
            $addr_status = $result['addr_status'];
            $time_reg = $result['time_reg'];
            $data_items = array(
                "address_id" => (int)$address_id,
                "customer_id" => (int)$customer_id,
                "address" =>  $address,
                "lat" => (float)$lat,
                "lng" => (float)$lng,
                "addr_status" => $addr_status,
                "time_reg" => $time_reg,
            );
            array_push($data_arr['result'], $data_items);
        }
    }
    echo json_encode($data_arr, JSON_UNESCAPED_UNICODE);
    http_response_code(200);
    exit();
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $customer_id = $_POST['customer_id'];
    $address = $_POST['address'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $addr_status = $_POST['addr_status'];
    // if (isset($customer_id) && isset($address) && isset($lat) && isset($lng) && isset($addr_status)) {
    //     $address = new Address();
    //     $result = $address->addAddress(
    //         $customer_id,
    //         $address,
    //         $lat,
    //         $lng,
    //         $addr_status
    //     );

    //     $lastId = [
    //         "address_id" => $result
    //     ];

    //     $result = [
    //         'msg' => "success",
    //         'status' => 200,
    //         'result' => $lastId,
    //     ];

    //     echo json_encode($result);
    //     http_response_code(200);
    //     exit();
    // } else {
    //     $result = [
    //         'msg' => "unsuccess",
    //         'status' => 200,
    //     ];
    //     echo json_encode($result);
    //     http_response_code(200);
    //     exit();
    // }
    // echo $customer_id .
    //     $address .
    //     $lat .
    //     $lng .
    //     $addr_status;
} else {
    http_response_code(405);
}
