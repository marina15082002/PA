<?php

/**
 * @file
 * PrintCollectModel class file.
 */

declare(strict_types=1);

namespace PA\Models;

include __DIR__ . "\..\library\get-database-connection.php";

class PrintCollectModel
{
    public function getCollect($email)
    {
        $connect = getDatabaseConnection();
        $prep = $connect->prepare("SELECT * FROM collect WHERE email = '" . $email . "'");
        $prep->execute([
            "email" => $email
        ]);

        return $prep->fetchAll();
    }

    public function getProductsUser()
    {
        $connect = getDatabaseConnection();

        $prep = $connect->prepare(
            "SELECT * FROM product_collect WHERE email = '" . $_SESSION["email"] . "'"
        );
        $prep->execute();
        return $prep->fetchAll();
    }

    public function delete()
    {
        $connect = getDatabaseConnection();
        session_start();
        $prep = $connect->prepare("DELETE FROM product_collect WHERE email = '" . $_SESSION["email"] . "'");
        $prep->execute();
        $prep->fetchAll();

        $prep = $connect->prepare("DELETE FROM collect WHERE email = '" . $_SESSION["email"] . "'");
        $prep->execute();
        return $prep->fetchAll();
    }
}
