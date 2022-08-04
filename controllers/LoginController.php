<?php

/**
 * @file
 * LoginController class file.
 */

declare(strict_types=1);

namespace PA;

include __DIR__ . "\..\models\UserModel.php";

class LoginController
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

        $title = $lang["TITLE_LOGIN"];
        include __DIR__ . "\..\src\login.php";
    }

    public function connect()
    {
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

        $userModel = new Models\UserModel();
        $body = $_POST;

        if (empty($body["password"]) || empty($body["email"])) {
            header("Location: /PA/" . $language . "/error");
            header("Connection: close");
            exit;
        }

        $res = $userModel->userConnect($body["email"], hash("sha256", $body["password"]));

        if ($res == -1) {
            header("Location: /PA/" . $language . "/error");
            header("Connection: close");
            exit;
        }



        header("Location: /PA/" . $language . "/");
        session_start();
        $_SESSION["id"] = $res[0]["id"];
        //header("Connection: close");
        //exit;
    }
}