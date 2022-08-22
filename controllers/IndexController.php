<?php

/**
 * @file
 * IndexController class file.
 */

declare(strict_types=1);

namespace PA;

class IndexController
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

        $title = $lang["TITLE_INDEX"];
        include "/src/accueil.php";
    }
}
