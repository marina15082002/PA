<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);
$route = $_REQUEST["route"] ?? "";
$method = $_SERVER["REQUEST_METHOD"];

if (preg_match("/^en/", $route)) {
    include __DIR__ . "\library\lang\English.php";
    $GLOBALS["site_lang"] = new PA\Lang\En();
    $lang = $GLOBALS["site_lang"]->getArray();
    $language = "en";
} else if (preg_match("/^it/", $route)) {
    include __DIR__ . "\library\lang\Italian.php";
    $GLOBALS["site_lang"] = new PA\Lang\It();
    $lang = $GLOBALS["site_lang"]->getArray();
    $language = "it";
} else if (preg_match("/^pt/", $route)) {
    include __DIR__ . "\library\lang\Portuguese.php";
    $GLOBALS["site_lang"] = new PA\Lang\Pt();
    $lang = $GLOBALS["site_lang"]->getArray();
    $language = "pt";
} else if (preg_match("/^ie/", $route)) {
    include __DIR__ . "\library\lang\Irish.php";
    $GLOBALS["site_lang"] = new PA\Lang\Ie();
    $lang = $GLOBALS["site_lang"]->getArray();
    $language = "ie";
} else {
    include __DIR__ . "\library\lang\French.php";
    $GLOBALS["site_lang"] = new PA\Lang\Fr();
    $lang = $GLOBALS["site_lang"]->getArray();
    $language = "fr";
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

if (preg_match("/^login/", $route)) {
    include __DIR__ . "\controllers\LoginController.php";
    $controller = new PA\LoginController();

    if ($method == "GET") {
        $controller->get();
        die();
    }

    if ($method == "POST") {
        $controller->connect();
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

if (preg_match("/^modifyAdmin/", $route)) {
    include __DIR__ . "\controllers\ModifyController.php";
    $controller = new PA\ModifyController();

    if ($method == "GET") {
        $controller->getAdmin();
        die();
    }

    if ($method == "POST") {
        $controller->modifyAdmin();
        die();
    }
}

if (preg_match("/^createAdmin/", $route)) {
    include __DIR__ . "\controllers\ModifyController.php";
    $controller = new PA\ModifyController();

    if ($method == "POST") {
        $controller->createAdmin();
        die();
    }
}

if (preg_match("/^deleteAdmin/", $route)) {
    include __DIR__ . "\controllers\ModifyController.php";
    $controller = new PA\ModifyController();

    if ($method == "POST") {
        $controller->deleteAdmin();
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

if (preg_match("/^deleteUser/", $route)) {
    include __DIR__ . "\controllers\ProfileController.php";
    $controller = new PA\ProfileController();

    if ($method == "POST") {
        $controller->delete();
        die();
    }
}

if (preg_match("/^signout/", $route)) {
    session_start();
    session_destroy();
    header("Location: /PA/" . $language . "/");
    die();
}

if (preg_match("/^addProduct/", $route)) {
    include __DIR__ . "\controllers\AddProductController.php";
    $controller = new PA\AddProductController();

    if ($method == "GET") {
        $controller->get();
        die();
    }

   if ($method == "POST") {
        $controller->add();
        die();
    }
}

if (preg_match("/^calendarAdmin/", $route)) {
    include __DIR__ . "\controllers\CalendarController.php";
    $controller = new PA\CalendarController();

    if ($method == "GET") {
        $controller->getAdmin();
        die();
    }

    if ($method == "POST") {
        $controller->addAdmin();
        die();
    }
}


if (preg_match("/^calendar/", $route)) {
    include __DIR__ . "\controllers\CalendarController.php";
    $controller = new PA\CalendarController();

    if ($method == "GET") {
        $controller->get();
        die();
    }

    if ($method == "POST") {
        $controller->add();
        die();
    }
}

if (preg_match("/^stock/", $route)) {
    include __DIR__ . "\controllers\StockController.php";
    $controller = new PA\StockController();

    if ($method == "GET") {
        $controller->get();
        die();
    }
}

if (preg_match("/^ProductController/", $route)) {
    include __DIR__ . "\controllers\AddProductController.php";
    $controller = new PA\AddProductController();

    if ($method == "POST") {
        $controller->error($_GET["name1"]);
        die();
    }
}

if (preg_match("/^printCollectUser/", $route)) {
    include __DIR__ . "\controllers\PrintCollectUserController.php";
    $controller = new PA\PrintCollectUserController();

    if ($method == "GET") {
        $controller->get();
        die();
    }

    if ($method == "POST") {
        $controller->delete();
        die();
    }
}

if (preg_match("/^message/", $route)) {
    include __DIR__ . "\controllers\MessageController.php";
    $controller = new PA\MessageController();

    if ($method == "GET") {
        $controller->get();
        die();
    }
}

if (preg_match("/^profile/", $route)) {
    include __DIR__ . "\controllers\ProfileController.php";
    $controller = new PA\ProfileController();

    if ($method == "GET") {
        $controller->get();
        die();
    }

    if ($method == "POST") {
        $controller->modify();
        die();
    }
}

die();
