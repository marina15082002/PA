<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="/PA/src/css/bootstrap.min.css">
    <link rel="stylesheet" href="/PA/src/css/icons.css">

    <title><?php echo $title; ?></title>
    <!--
    <link rel="stylesheet" href="../library/bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="/PA/src/css/style3.css">
    -->
</head>

<body>
<?php
    $route = $_REQUEST["route"] ?? "";

    if (preg_match("/^fr/", $route)) {
        $GLOBALS["site_lang"] = new PA\Lang\Fr();
        $lang = $GLOBALS["site_lang"]->getArray();
        $language = "fr";
    } else if (preg_match("/^en/", $route)) {
        $GLOBALS["site_lang"] = new PA\Lang\En();
        $lang = $GLOBALS["site_lang"]->getArray();
        $language = "en";
    } else if (preg_match("/^it/", $route)) {
        $GLOBALS["site_lang"] = new PA\Lang\It();
        $lang = $GLOBALS["site_lang"]->getArray();
    } else if (preg_match("/^pt/", $route)) {
        $GLOBALS["site_lang"] = new PA\Lang\Pt();
        $lang = $GLOBALS["site_lang"]->getArray();
    } else {
        header("Location: /" . $GLOBALS["default_lang"] . "/" . $route);
    }
    ?>