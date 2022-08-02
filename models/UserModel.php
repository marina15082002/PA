<?php

/**
 * @file
 * UserModel class file.
 */

declare(strict_types=1);

namespace PA\Models;

include __DIR__ . "\..\library\get-database-connection.php";
include __DIR__ . "\Model.php";

class UserModel
{
    private string $table;

    public function __construct()
    {
        echo "test";
        $this->table = "USERS";
    }

    public function insert(array $values)
    {
        $connect = getDatabaseConnection();
        $prep = $connect->prepare(
            "INSERT INTO " . $this->table . " (type, name, email, siren, phone, country, city, address, password) VALUES ('" . $values[0] . "', '" . $values[1] . "', '" . $values[2] . "', '" . $values[3] . "', '" . $values[4] . "', '" . $values[5] . "', '" . $values[6] . "', '" . $values[7] . "', '" . $values[8] . "')"
            );

        if ($prep->execute()) {
            return $connect->lastInsertId();
        }
        return (-1);
    }

    public function checkElementExist($column, $value)
    {
        $connect = getDatabaseConnection();
        $prep = $connect->prepare("SELECT * FROM " . $this->table . " WHERE " . $column . " = :value");
        $prep->execute([
            'value' => $value
        ]);

        return !!$prep->fetch();
    }

    public function checkPasswordWithEmail($password, $email)
    {
        $passwordHash = $this->connection->prepare("SELECT password FROM " . $this->table . " WHERE email = :email");
        $passwordHash->execute([
            'email' => $email
        ]);
        $passwordHash = $passwordHash->fetchAll();

        $passwordHash = $passwordHash[0]['password'];

        if (password_verify($password, $passwordHash)) {
            return 1;
        }
        return 0;
    }

    public function userConnect($email, $password)
    {
        $connect = getDatabaseConnection();
        $prep = $connect->prepare(
            "SELECT id, adm  FROM " . $this->table . " WHERE email = :email AND password = :password"
        );
        $prep->execute([
            'email' => $email,
            'password' => $password
        ]);

        return $prep->fetch();
    }
}