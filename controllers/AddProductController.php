<?php

/**
 * @file
 * AddProductController class file.
 */

declare(strict_types=1);

namespace PA;

include __DIR__ . "\..\models\ProductModel.php";

class AddProductController
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

        $productModel = new Models\ProductModel();
        $table = $productModel->getProductsUser();

        $title = $lang["TITLE_ADD_PRODUCT"];
        include __DIR__ . "\..\src\addProduct.php";
    }

    public function add()
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

        $productModel = new Models\ProductModel();
        $body = $_POST;

        session_start();

        $res = $productModel->delete();

        for ($i = 1; $i <= $_GET['index']; $i++){
            $res = $productModel->insert(
                array(
                    $_SESSION['email'],
                    $body['barcode' . $i],
                    $body['name' . $i],
                    $body['quantity' . $i]
                )
            );

            if ($res == -1) {
                header("Location: /PA/" . $language . "/error");
                header("Connection: close");
                exit;
            }
        }

        $printCollect = $productModel->getCollect($_SESSION['email']);
        var_dump($printCollect);

        if ($printCollect[0] == "") {
            header("Location: /PA/" . $language . "/calendar");
            header("Connection: close");
            exit;
        } else {
            header("Location: /PA/" . $language . "/");
            header("Connection: close");
            exit;
        }
    }
}

