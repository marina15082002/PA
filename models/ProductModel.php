<?php

/**
 * @file
 * ProductModel class file.
 */

declare(strict_types=1);

namespace PA\Models;

include __DIR__ . "\..\library\get-database-connection.php";

class ProductModel
{
    private string $table;

    public function __construct()
    {
        $this->table = "product_collect";
    }

    public function delete()
    {
        $connect = getDatabaseConnection();
        $prep = $connect->prepare("DELETE FROM " . $this->table . " WHERE email = '" . $_SESSION["email"] . "'");
        $prep->execute();
        return $prep->fetchAll();
    }

    public function insert(array $values)
    {
        $connect = getDatabaseConnection();

        $prep = $connect->prepare(
            "INSERT INTO " . $this->table . " (email, product_code, product_name, quantity) VALUES ('" . $values[0] . "', '" . $values[1] . "', '" . $values[2] . "', " . $values[3] . ")"
        );

        if ($prep->execute()) {
            return $connect->lastInsertId();
        }
        return (-1);
    }

    public function getProductsUser()
    {
        session_start();
        $connect = getDatabaseConnection();

        $prep = $connect->prepare(
            "SELECT * FROM " . $this->table . " WHERE email = '" . $_SESSION["email"] . "'"
        );
        $prep->execute();
        return $prep->fetchAll();
    }

    public function getCollect($email)
    {
        $connect = getDatabaseConnection();
        $prep = $connect->prepare("SELECT * FROM collect WHERE email = '" . $email . "'");
        $prep->execute([
            "email" => $email
        ]);

        return $prep->fetchAll();
    }
}