<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);
$route = $_REQUEST["route"] ?? "undefined";
$method = $_SERVER["REQUEST_METHOD"];

use PA\IndexController;

if ($route === "index") {
    include __DIR__ . "/controllers/IndexController.php";
    $controller = new IndexController();
    if ($method == "GET") {
        $controller->get();
        die();
    }
    die();
}
