<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);
$route = $_REQUEST["route"] ?? "";
$method = $_SERVER["REQUEST_METHOD"];

if ($route == "") {
    include __DIR__ . "\controllers\IndexController.php";
    $controller = new PA\IndexController();
    if ($method == "GET") {
        $controller->get();
        die();
    }
}

if ($route == "signup") {
    include __DIR__ . "\controllers\SignupController.php";
    $controller = new PA\SignupController();

    if ($method == "GET") {
        $controller->get();
        die();
    }


    if ($method == "POST") {
        $controller->create();
        die();
    }
}

if ($route == "error") {
    include __DIR__ . "\controllers\ErrorController.php";
    $controller = new PA\ErrorController();

    if ($method == "GET") {
        $controller->get();
        die();
    }
}

die();
