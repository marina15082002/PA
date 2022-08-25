<?php

/**
 * @file
 * PrintCollectUserController class file.
 */

declare(strict_types=1);

namespace PA;

include __DIR__ . "\..\models\PrintCollectModel.php";

class PrintCollectUserController
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

        $getColumnsModel = new Models\PrintCollectModel();

        session_start();

        $table_products = $getColumnsModel->getProductsUser();
        $table_infos = $getColumnsModel->getCollect($_SESSION["email"]);

        $title = $lang["TITLE_PRINT_COLLECT_USER"];
        include __DIR__ . "\..\src\printCollectUser.php";
    }

    public function delete() {
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

        $productModel = new Models\PrintCollectModel();
        $body = $_POST;

        $res = $productModel->delete();

        if ($res == -1) {
            header("Location: /PA/" . $language . "/error");
            header("Connection: close");
            exit;
        }

        header("Location: /PA/" . $language . "/message");
        header("Connection: close");
        exit;
    }
}
