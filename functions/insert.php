<?php

require '../classes/product.php';



if (isset($_GET['name']) && isset($_GET['category'])) {
    $product = new Product();
    $name = $_GET['name'];
    $category = $_GET['category'];

    $result = $product->add($name, $category);

    $lastId = [
        "id" => $result
    ];

    $result = [
        'status' => 'success',
        'result' => $lastId,
    ];

    echo json_encode($result);
    exit();
} else {
    $result = [
        'status' => 'unsuccess',
    ];
    echo json_encode($result);
    exit();
}
