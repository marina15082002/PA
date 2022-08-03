<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);
$route = $_REQUEST["route"] ?? "";
$method = $_SERVER["REQUEST_METHOD"];

if (preg_match("/^fr/", $route)) {
    include __DIR__ . "\library\lang\French.php";
    $GLOBALS["site_lang"] = new PA\Lang\Fr();
    $lang = $GLOBALS["site_lang"]->getArray();
} else if (preg_match("/^en/", $route)) {
    include __DIR__ . "\library\lang\English.php";
    $GLOBALS["site_lang"] = new PA\Lang\En();
    $lang = $GLOBALS["site_lang"]->getArray();
} else if (preg_match("/^it/", $route)) {
    include __DIR__ . "\library\lang\Italian.php";
    $GLOBALS["site_lang"] = new PA\Lang\It();
    $lang = $GLOBALS["site_lang"]->getArray();
} else if (preg_match("/^pt/", $route)) {
    include __DIR__ . "\library\lang\Portuguese.php";
    $GLOBALS["site_lang"] = new PA\Lang\Pt();
    $lang = $GLOBALS["site_lang"]->getArray();
} else if (preg_match("/^ie/", $route)) {
    include __DIR__ . "\library\lang\Irish.php";
    $GLOBALS["site_lang"] = new PA\Lang\Ie();
    $lang = $GLOBALS["site_lang"]->getArray();
} else {
    header("Location: /" . $GLOBALS["default_lang"] . "/" . $route);
}

$route = explode("/", $route, 2)[1];

if ($route == "") {
    include __DIR__ . "\controllers\IndexController.php";
    $controller = new PA\IndexController();
    if ($method == "GET") {
        $controller->get();
        die();
    }
}
if (preg_match("/^signup/", $route)) {
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

if (preg_match("/^error/", $route)) {
    include __DIR__ . "\controllers\ErrorController.php";
    $controller = new PA\ErrorController();

    if ($method == "GET") {
        $controller->get();
        die();
    }
}

if (preg_match("/^modifyUsers/", $route)) {
    include __DIR__ . "\controllers\ModifyController.php";
    $controller = new PA\ModifyController();

    if ($method == "GET") {
        $controller->get();
        die();
    }

    if ($method == "POST") {
        $controller->modify();
        die();
    }
}

if (preg_match("/^deleteUsers/", $route)) {
    include __DIR__ . "\controllers\ModifyController.php";
    $controller = new PA\ModifyController();

    if ($method == "POST") {
        $controller->delete();
        die();
    }
}

die();
