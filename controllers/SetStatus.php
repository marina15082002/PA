<?php

namespace PA;

include __DIR__ . "\..\library\get-database-connection.php";

$connect = getDatabaseConnection();

$prep = $connect->prepare("UPDATE collect SET status = :status WHERE email = :email;");
$prep->execute([
    'status' => $_GET['status'],
    'email' => $_GET['email']
]);

$prep->fetch();

