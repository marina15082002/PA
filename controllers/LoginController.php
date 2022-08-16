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

    private function checkConnect($language)
    {
        $userModel = new Models\UserModel();
        $body = $_POST;

        $res = $userModel->checkEmailPassword($body['email'], hash("sha256", $body["password"]));

        echo $res;
        if (empty($res)) {
            header("Location: /PA/" . $language . "/login?passwordEmailError=true");
            header("Connection: close");
            exit;
        }
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

        $this->checkConnect($language);

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

        $res = $userModel->getUser($res[0]["id"]);

        header("Location: /PA/" . $language . "/");
        session_start();
        $_SESSION["id"] = $res[0]["id"];
        $_SESSION["email"] = $body["email"];
        $_SESSION["name"] = $res[0]["name"];
        $_SESSION["type"] = $res[0]["type"];
        $_SESSION["siren"] = $res[0]["siren"];
        $_SESSION["phone"] = $res[0]["phone"];
        $_SESSION["country"] = $res[0]["country"];
        $_SESSION["city"] = $res[0]["city"];
        $_SESSION["address"] = $res[0]["address"];
        $_SESSION["poste"] = $res[0]["poste"];
        header("Connection: close");
        exit;
    }
}