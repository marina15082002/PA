<?php

namespace PA;

include __DIR__ . "\..\library\get-database-connection.php";
include __DIR__ . "\..\models\GetColumnsModel.php";

$connect = getDatabaseConnection();

$getColumnModel = new Models\GetColumnsModel();
$table = $getColumnModel->getAllTable($connect, "admin");

$data = [
    "users" => $table,
];

echo json_encode($data);



