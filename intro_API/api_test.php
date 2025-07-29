<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

if ($_SERVER["REMOTE_ADDR"] == "127.0.0.1") {
    $data = [
        "data" => [
            ["message" => "Wrong Try To Get Data"]
        ],
        "connection_status" => false
    ];
    echo json_encode($data);
} else {
    $d = [
        "data" => [
            [
                "name" => "john",
                "age" => "30",
                "city" => "cairo"
            ],
            [
                "name" => "Ahmed",
                "age" => "40",
                "city" => "Alex"
            ]
        ],
        "connection" => true
    ];
    echo json_encode($d);
}
?>
