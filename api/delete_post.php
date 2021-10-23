<?php
header('Content-Type: application/json;charset=utf-8');
require '../classes/post.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $post_id = $_POST['post_id'];
    if (isset($post_id)) {
        $post = new Post();
        $result = $post->delete($post_id);

        $lastId = [
            "post_id" => $result
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
