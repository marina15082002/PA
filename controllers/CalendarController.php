<?php

/**
 * @file
 * CalendarController class file.
 */

declare(strict_types=1);

namespace PA;

include __DIR__ . "\..\models\CalendarModel.php";
include __DIR__ . "\..\library\get-database-connection.php";

class CalendarController
{
    public function get()
    {
        $route = $_REQUEST["route"] ?? "";

        if (preg_match("/^en/", $route)) {
            $GLOBALS["site_lang"] = new Lang\En();
            $lang = $GLOBALS["site_lang"]->getArray();
        } else if (preg_match("/^it/", $route)) {
            $GLOBALS["site_lang"] = new Lang\It();
            $lang = $GLOBALS["site_lang"]->getArray();
        } else if (preg_match("/^pt/", $route)) {
            $GLOBALS["site_lang"] = new Lang\Pt();
            $lang = $GLOBALS["site_lang"]->getArray();
        } else if (preg_match("/^ie/", $route)) {
            $GLOBALS["site_lang"] = new Lang\Ie();
            $lang = $GLOBALS["site_lang"]->getArray();
        } else {
            $GLOBALS["site_lang"] = new Lang\Fr();
            $lang = $GLOBALS["site_lang"]->getArray();
        }

        $title = $lang["TITLE_CALENDAR"];
        include __DIR__ . "\..\src\calendar.php";
    }

    public function getAdmin()
    {
        $route = $_REQUEST["route"] ?? "";

        $connect = getDatabaseConnection();
        $calendarModel = new Models\CalendarModel();

        $tableCollect = $calendarModel->getAllCollect($connect);
        $tableProducts = $calendarModel->getAllProducts($connect);

        if (preg_match("/^en/", $route)) {
            $GLOBALS["site_lang"] = new Lang\En();
            $lang = $GLOBALS["site_lang"]->getArray();
        } else if (preg_match("/^it/", $route)) {
            $GLOBALS["site_lang"] = new Lang\It();
            $lang = $GLOBALS["site_lang"]->getArray();
        } else if (preg_match("/^pt/", $route)) {
            $GLOBALS["site_lang"] = new Lang\Pt();
            $lang = $GLOBALS["site_lang"]->getArray();
        } else if (preg_match("/^ie/", $route)) {
            $GLOBALS["site_lang"] = new Lang\Ie();
            $lang = $GLOBALS["site_lang"]->getArray();
        } else {
            $GLOBALS["site_lang"] = new Lang\Fr();
            $lang = $GLOBALS["site_lang"]->getArray();
        }

        $title = $lang["TITLE_CALENDAR"];
        include __DIR__ . "\..\src\calendarAdmin.php";
    }

    public function add() {
        $route = $_REQUEST["route"] ?? "";

        if (preg_match("/^en/", $route)) {
            $language = "en";
        } else if (preg_match("/^it/", $route)) {
            $language = "it";
        } else if (preg_match("/^pt/", $route)) {
            $language = "pt";
        } else if (preg_match("/^ie/", $route)) {
            $language = "ie";
        } else {
            $language = "fr";
        }

        $body = $_POST;

        if ($body["day"] < 10) {
            $body["day"] = "0" . $body["day"];
        }

        if ($body["month"] < 10) {
            $body["month"] = "0" . $body["month"];
        }

        session_start();

        $calendarModel = new Models\CalendarModel();
        $connect = getDatabaseConnection();
        $res = $calendarModel->insert($connect, array(
            $body["years"] . "-" . $body["month"] . "-" . $body["day"],
            $body["hours"],
            $_SESSION["email"],
            $body["phone"],
            $body["country"],
            $body["city"],
            $body["address"]
        ));

        if ($res == -1) {
            header("Location: /PA/" . $language . "/error");
            header("Connection: close");
            exit;
        }

        header("Location: /PA/" . $language . "/printCollectUser");
        header("Connection: close");
        exit;
    }

}
