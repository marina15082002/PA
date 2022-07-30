<?php

ini_set("display_errors", 1);

error_reporting(E_ALL);

$route = $_REQUEST["route"] ?? "undefined";

$method = $_SERVER["REQUEST_METHOD"];

if ($route === "index") {
     include __DIR__ . "/controllers/IndexController.php";
    // die();

    $controller = new IndexController();

    if ($method == "GET") {
        $controller->get();
        die();
    }
}

die();
