<?php

/**
 * @file
 * ProfileController class file.
 */

declare(strict_types=1);

namespace PA;

use PA\Models;

require_once __DIR__ . "\..\library\get-database-connection.php";
require_once __DIR__ . "\..\models\GetColumnsModel.php";
require_once __DIR__ . "\..\models\ModifyModel.php";

class ProfileController
{
    public function get()
    {
        $title = "ProfileUsers";
        $connect = getDatabaseConnection();
        $getColumnsModel = new Models\GetColumnsModel();

        session_start();

        $table = $getColumnsModel->getUser($connect, "USERS", $_SESSION['id']);

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

        $title = $lang["TITLE_MODIFY_USERS"];
        include __DIR__ . "\..\src\modifyUsers.php";
    }

    public function modify()
    {
        $route = $_REQUEST["route"] ?? "";

        if (preg_match("/^en/", $route)) {
            $language = "en";
        } else if (preg_match("/^it/", $route)) {
            $language = "it";
        } else if (preg_match("/^pt/", $route)) {
            $language = "pt";
        } else {
            $language = "fr";
        }

        $body = $_POST;

        $this->checkInputs($language);

        $connect = getDatabaseConnection();
        $modifyModel = new Models\ModifyModel();

        $modifyModel->modifyColumn($connect, "USERS", $_SESSION['id'], array(
            $body['type'],
            $body['name'],
            $body['email'],
            $body['siren'],
            $body['phone'],
            $body['country'],
            $body['city'],
            $body['address']
        ));

        header("Location: /PA/" . $language . "/modifyUsers");
        header("Connection: close");
        exit;
    }

    private function checkInputs($language)
    {
        $body = $_POST;

        if (!isset($body['name']) || empty($body['name'])) {
            header("Location: /PA/" . $language . "/modifyUsers?fieldEmptyError=true");
            header("Connection: close");
            exit;
        }

        if (!isset($body['email']) || empty($body['email'])) {
            header("Location: /PA/" . $language . "/modifyUsers?fieldEmptyError=true");
            header("Connection: close");
            exit;
        }

        if (!filter_var($body['email'], FILTER_VALIDATE_EMAIL)) {
            header("Location: /PA/" . $language . "/modifyUsers?emailSyntaxError=true");
            header("Connection: close");
            exit;
        }

        if (!isset($body['siren']) || empty($body['siren'])) {
            header("Location: /PA/" . $language . "/modifyUsers?fieldEmptyError=true");
            header("Connection: close");
            exit;
        }

        if (!isset($body['phone']) || empty($body['phone'])) {
            header("Location: /PA/" . $language . "/modifyUsers?fieldEmptyError=true");
            header("Connection: close");
            exit;
        }

        $pattern = "#^(0|\\+33|0033)[1-9][0-9]{8}$#";
        if (isset($body['phone']) && !empty($body['phone']) && preg_match($pattern, $body['phone']) == 0) {
            header("Location: /PA/" . $language . "/modifyUsers?phoneSyntaxError=true");
            header("Connection: close");
            exit;
        }

        if (!isset($body['country']) || empty($body['country'])) {
            header("Location: /PA/" . $language . "/modifyUsers?fieldEmptyError=true");
            header("Connection: close");
            exit;
        }

        if (!isset($body['city']) || empty($body['city'])) {
            header("Location: /PA/" . $language . "/modifyUsers?fieldEmptyError=true");
            header("Connection: close");
            exit;
        }

        if (!isset($body['address']) || empty($body['address'])) {
            header("Location: /PA/" . $language . "/modifyUsers?fieldEmptyError=true");
            header("Connection: close");
            exit;
        }
    }

    public function delete()
    {
        $route = $_REQUEST["route"] ?? "";

        if (preg_match("/^en/", $route)) {
            $language = "en";
        } else if (preg_match("/^it/", $route)) {
            $language = "it";
        } else if (preg_match("/^pt/", $route)) {
            $language = "pt";
        } else {
            $language = "fr";
        }

        $body = $_POST;

        $connect = getDatabaseConnection();
        $modifyModel = new Models\ModifyModel();

        $modifyModel->deleteColumn($connect, "USERS", $_SESSION['id']);

        header("Location: /PA/" . $language . "/modifyUsers");
        header("Connection: close");
        exit;
    }
}
