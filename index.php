<?php

require_once('Autoloader.php');

use Framework\Autoloader as Autoloader;
Autoloader::register();

$route = $_REQUEST["route"] ?? "";
$method = $_SERVER["REQUEST_METHOD"];

if ($route == "") {
    $controller = new IndexController();

    if ($method == "GET") {
        $controller->get();
        die();
    }
}

header("Location: /error");
die();