<?php

/**
 * @file
 * DistributionController class file.
 */

declare(strict_types=1);

namespace PA;

include __DIR__ . "\..\models\ProductModel.php";

class DistributionController
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
        } else {
            $GLOBALS["site_lang"] = new Lang\Fr();
            $lang = $GLOBALS["site_lang"]->getArray();
        }

        $productModel = new Models\ProductModel();
        $i = 0;
        $tabName = [];
        $tabQuantity = [];
        while ($_POST["product" . $i]) {
            $quantity = $productModel->getQuantity($_POST["product" . $i]);
            $tabName[$i] = $_POST["product" . $i];
            $tabQuantity[$i] = $quantity[0]["quantity"];
            $i += 1;
        }

        $title = $lang["TITLE_ERROR"];
        include __DIR__ . "\..\src\distribution.php";
    }

    public function getDistrib()
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
        } else {
            $GLOBALS["site_lang"] = new Lang\Fr();
            $lang = $GLOBALS["site_lang"]->getArray();
        }

        $calendarModel = new Models\ProductModel();

        $tableCollect = $calendarModel->getAllDistrib();
        $tableProducts = $calendarModel->getAllProductsDistrib();

        $title = $lang["TITLE_ERROR"];
        include __DIR__ . "\..\src\calendarDistrib.php";
    }

    public function insert() {
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

        $productModel = new Models\ProductModel();

        $res = $productModel->insertDistrib($_POST["date"], $_POST["address"]);

        if ($res == -1) {
            header("Location: /PA/" . $language . "/error");
            header("Connection: close");
            exit;
        }

        $i = 0;
        while (isset($_POST["product" . $i])) {
            $res = $productModel->insertProductDistrib($_POST["product" . $i], $_POST["quantity" . $i], $_POST["date"], $_POST["address"]);

            if ($res == -1) {
                header("Location: /PA/" . $language . "/error");
                header("Connection: close");
                exit;
            }

            $res = $productModel->updateQuantity($_POST["product" . $i], $_POST["quantity" . $i]);

            $i += 1;
        }

        header("Location: /PA/" . $language . "/calendarDistrib");
        header("Connection: close");
        exit;
    }
}
