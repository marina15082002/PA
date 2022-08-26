<?php

/**
 * @file
 * SubscriptionController class file.
 */

declare(strict_types=1);

namespace PA;

include __DIR__ . "\..\models\SubscriptionModel.php";

class SubscriptionController
{
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

        $subscriptionModel = new Models\SubscriptionModel();
        $body = $_POST;

        session_start();
        $res = $subscriptionModel->add($body["date"], $_SESSION["email"]);

        if ($res == -1) {
            header("Location: /PA/" . $language . "/error");
            header("Connection: close");
            exit;
        }

        header("Location: /PA/" . $language . "/profile");
        header("Connection: close");
        exit;
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
        } else if (preg_match("/^ie/", $route)) {
            $language = "ie";
        } else {
            $language = "fr";
        }

        $subscriptionModel = new Models\SubscriptionModel();
        $body = $_POST;

        session_start();
        $res = $subscriptionModel->delete($_SESSION["email"]);

        if ($res == -1) {
            header("Location: /PA/" . $language . "/error");
            header("Connection: close");
            exit;
        }

        header("Location: /PA/" . $language . "/profile");
        header("Connection: close");
        exit;
    }
}