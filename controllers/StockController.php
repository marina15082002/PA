<?php

/**
 * @file
 * LoginController class file.
 */

declare(strict_types=1);

namespace PA;

include __DIR__ . "\..\models\ProductModel.php";

class StockController
{
    public function get()
    {
        $route = $_REQUEST["route"] ?? "";

        if (preg_match("/^en/", $route)) {
            $GLOBALS["site_lang"] = new Lang\En();
            $lang = $GLOBALS["site_lang"]->getArray();
            $language = "en";
        } else if (preg_match("/^it/", $route)) {
            $GLOBALS["site_lang"] = new Lang\It();
            $lang = $GLOBALS["site_lang"]->getArray();
            $language = "it";
        } else if (preg_match("/^pt/", $route)) {
            $GLOBALS["site_lang"] = new Lang\Pt();
            $lang = $GLOBALS["site_lang"]->getArray();
            $language = "pt";
        } else {
            $GLOBALS["site_lang"] = new Lang\Fr();
            $lang = $GLOBALS["site_lang"]->getArray();
            $language = "fr";
        }

        $title = $lang["TITLE_LOGIN"];
        include __DIR__ . "\..\src\stock.php";
    }
}