<?php

/**
 * @file
 * GetColumnsModel class file.
 */

declare(strict_types=1);

namespace PA\Models;

class GetColumnsModel
{
    public function getAllTable($connect, $table)
    {
        $connect = getDatabaseConnection();
        $prep = $connect->prepare("SELECT * FROM " . $table);
        $prep->execute();

        return $prep->fetchAll();
    }

    public function getUser($connect, $table, $id)
    {
        $connect = getDatabaseConnection();
        $prep = $connect->prepare("SELECT * FROM " . $table . " WHERE id = :id");
        $prep->execute([
            "id" => $id
        ]);

        return $prep->fetchAll();
    }

    public function getDate($connect, $table, $email)
    {
        $connect = getDatabaseConnection();
        $prep = $connect->prepare("SELECT date FROM " . $table . " WHERE email = :email");
        $prep->execute([
            "email" => $email
        ]);

        return $prep->fetchAll();
    }
}
