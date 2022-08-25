<?php

namespace PA;

include __DIR__ . "\..\models\PrintCollectModel.php";

$printCollectModel = new Models\PrintCollectModel();

session_start();
$printCollect = $printCollectModel->getCollect($_SESSION['email']);

if ($printCollect != "") {
    $data = [
        "printCollect" => $printCollect,
    ];
} else {
    $data = [
        "printCollect" => "empty",
    ];
}

echo json_encode($data);