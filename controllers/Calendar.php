<?php

namespace PA;

include __DIR__ . "\..\models\CalendarModel.php";
include __DIR__ . "\..\library\get-database-connection.php";

$connect = getDatabaseConnection();
$calendarModel = new Models\CalendarModel();

$tableCollect = $calendarModel->getAllCollect($connect);
$tableProducts = $calendarModel->getAllProducts($connect);

$data = [
    "tableCollect" => $tableCollect,
    "tableProducts" => $tableProducts,
];

echo json_encode($data);