<?php

require '../classes/customer.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_GET['name']) && isset($_GET['category'])) {
        $customer = new Customer();
        $name = $_GET['name'];
        $category = $_GET['category'];

        $result = $customer->add($name, $category);

        $lastId = [
            "id" => $result
        ];

        $result = [
            'status' => 'success',
            'result' => $lastId,
        ];

        echo json_encode($result);
        http_response_code(200);
        exit();
    } else {
        $result = [
            'status' => 'unsuccess',
        ];
        echo json_encode($result);
        http_response_code(200);
        exit();
    }
} else {
    http_response_code(405);
}
