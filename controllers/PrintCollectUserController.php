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
            $language = "en";
        } else if (preg_match("/^it/", $route)) {
            $language = "it";
        } else if (preg_match("/^pt/", $route)) {
            $language = "pt";
        } else {
            $language = "fr";
        }

        header("Location: /PA/" . $language . "/addProduct");
        header("Connection: close");
        exit;
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
