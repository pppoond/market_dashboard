<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/withdraw_store.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $wd_store_id = $_POST['wd_store_id'];
    if (isset($wd_store_id)) {
        $withdraw_store = new WithdrawStore();
        $result = $withdraw_store->delete($wd_store_id);

        $lastId = [
            "wd_store_id" => $result
        ];

        $result = [
            'title' => "delete",
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
