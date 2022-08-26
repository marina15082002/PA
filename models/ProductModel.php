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

    public function getStock()
    {
        $connect = getDatabaseConnection();
        $prep = $connect->prepare("SELECT * FROM stockage");
        $prep->execute();

        return $prep->fetchAll();
    }

    public function getQuantity($code)
    {
        $connect = getDatabaseConnection();

        $prep = $connect->prepare("SELECT quantity FROM stockage WHERE product_code = :product_code");
        $prep->execute([
            "product_code" => $code
        ]);

        return $prep->fetchAll();
    }

    public function updateQuantity($product_code, $quantity)
    {
        $connect = getDatabaseConnection();
        $prep = $connect->prepare("SELECT quantity FROM stockage WHERE product_code = :product_code");
        $prep->execute([
            "product_code" => $product_code
        ]);
        $quantity_old = $prep->fetchAll();
        $quantity_new = $quantity_old[0]["quantity"] - $quantity;

        if ($quantity_new > 0) {
            $prep = $connect->prepare("UPDATE stockage SET quantity = :quantity WHERE product_code = :product_code");
            $prep->execute([
                "quantity" => $quantity_new,
                "product_code" => $product_code
            ]);
        } else {
            $prep = $connect->prepare("DELETE FROM stockage WHERE product_code = :product_code");
            $prep->execute([
                "product_code" => $product_code
            ]);
        }

        return $prep->fetchAll();
    }

    public function insertProductDistrib ($code, $quantity, $date, $address)
    {
        $connect = getDatabaseConnection();

        $id = $connect->prepare("SELECT id FROM DISTRIB WHERE date = :date AND address = :address");
        $id->execute([
            "date" => $date,
            "address" => $address,
        ]);
        $id = $id->fetchAll();

        $prep = $connect->prepare("INSERT INTO PRODUCT_DISTRIB (id_distrib, product_code, quantity) VALUES (:id_distrib, :product_code, :quantity)");
        if ($prep->execute([
            "id_distrib" => $id[0]["id"],
            "product_code" => $code,
            "quantity" => $quantity
        ])) {
            return $connect->lastInsertId();
        }

        return (-1);
    }

    public function insertDistrib($date, $address)
    {
        $connect = getDatabaseConnection();

        $prep = $connect->prepare("INSERT INTO DISTRIB (date, address) VALUES (:date, :address)");
        if ($prep->execute([
            "date" => $date,
            "address" => $address,
        ])){
            return $connect->lastInsertId();
        }

        return (-1);
    }

    public function getAllDistrib() {
        $connect = getDatabaseConnection();

        $prep = $connect->prepare(
            "SELECT * FROM distrib"
        );
        $prep->execute();
        return $prep->fetchAll();
    }

    public function getAllProductsDistrib() {
        $connect = getDatabaseConnection();

        $prep = $connect->prepare(
            "SELECT * FROM PRODUCT_DISTRIB"
        );
        $prep->execute();
        return $prep->fetchAll();
    }
}