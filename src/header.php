<!DOCTYPE html>
<html>
<?php
    $route = $_REQUEST["route"] ?? "";

    if (preg_match("/^fr/", $route)) {
        $GLOBALS["site_lang"] = new PA\Lang\Fr();
        $lang = $GLOBALS["site_lang"]->getArray();
    } else if (preg_match("/^en/", $route)) {
        $GLOBALS["site_lang"] = new PA\Lang\En();
        $lang = $GLOBALS["site_lang"]->getArray();
    } else {
        header("Location: /" . $GLOBALS["default_lang"] . "/" . $route);
    }
?>

<head>
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="../library/bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="/PA/src/css/style.css">
</head>

<body>
    <header><h1>Header</h1></header>