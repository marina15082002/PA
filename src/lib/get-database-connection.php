<?php

function getDatabaseConnection() {
    $driver = "mysql";

    $databaseName = "pa-rattrapage";

    $hostName = "localhost;port=81";

    $dataSourceName = "$driver:dbname=$databaseName;host=$hostName";

    $userName = "root";

    $password = "root";

    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    /**
     * Récupérer une connection à une base de données
     * @see https://www.php.net/manual/en/pdo.construct.php
     */
    $connection = new PDO($dataSourceName, $userName, $password, $options);

    return $connection;
}
