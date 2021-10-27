<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/withdraw_store.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $wd_store_id = $_REQUEST['wd_store_id'];
    $pay_status = $_REQUEST['pay_status'];
    $withdraw_store = new WithdrawStore();
    if (isset($_REQUEST['wd_store_id'])) {
        $updateReturn =  $withdraw_store->updatePayStatus(
            $wd_store_id,
            $pay_status
        );
        $lastId = [
            "wd_store_id" => $updateReturn
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
