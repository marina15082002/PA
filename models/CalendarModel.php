<?php

/**
 * @file
 * CalendarModel class file.
 */

declare(strict_types=1);

namespace PA\Models;

class CalendarModel
{
    private string $table;

    public function __construct()
    {
        $this->table = "users";
    }

    public function getInfosUser()
    {
        session_start();
        $connect = getDatabaseConnection();

        $prep = $connect->prepare(
            "SELECT * FROM " . $this->table . " WHERE email = '" . $_SESSION["email"] . "'"
        );
        $prep->execute();
        return $prep->fetchAll();
    }

    public function insert($connect, $values) {
        $prep = $connect->prepare(
            "INSERT INTO collect (date, hours, email, phone, country, city, address) VALUES ('" . $values[0] . "', '" . $values[1] . "', '" . $values[2] . "', '" . $values[3] . "', '" . $values[4] . "', '" . $values[5] . "', '" . $values[6] . "')"
        );

        var_dump($prep);

        if ($prep->execute()) {
            return $connect->lastInsertId();
        }
        return (-1);
    }

    public function getAllCollect($connect) {
        $prep = $connect->prepare(
            "SELECT * FROM collect"
        );
        $prep->execute();
        return $prep->fetchAll();
    }

    public function getAllProducts($connect) {
        $prep = $connect->prepare(
            "SELECT * FROM PRODUCT_COLLECT"
        );
        $prep->execute();
        return $prep->fetchAll();
    }
}