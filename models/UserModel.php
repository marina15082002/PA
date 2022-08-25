<?php

/**
 * @file
 * UserModel class file.
 */

declare(strict_types=1);

namespace PA\Models;

include __DIR__ . "\..\library\get-database-connection.php";

class UserModel
{
    private string $table;

    public function __construct()
    {
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

    public function checkEmailPassword($email, $password)
    {
        $connect = getDatabaseConnection();
        $prep = $connect->prepare("SELECT * FROM " . $this->table . " WHERE email = :email and password = :password");
        $prep->execute([
            'email' => $email,
            'password' => $password
        ]);

        $res = $prep->fetchAll();

        if (!$res[0]) {
            echo "test";
            $prep = $connect->prepare(
                "SELECT *  FROM ADMIN WHERE email = :email AND password = :password"
            );

            $prep->execute([
                'email' => $email,
                'password' => $password
            ]);

            return !!$prep->fetchAll();
        }

        return !!$res;
    }

    public function userConnect($email, $password)
    {
        $connect = getDatabaseConnection();
        $prep = $connect->prepare(
            "SELECT id  FROM " . $this->table . " WHERE email = :email AND password = :password"
        );
        $res = $prep->execute([
            'email' => $email,
            'password' => $password
        ]);

        $res = $prep->fetchAll();

        if (!$res[0]) {
            echo "test";
            $prep = $connect->prepare(
                "SELECT id  FROM ADMIN WHERE email = :email AND password = :password"
            );

            $prep->execute([
                'email' => $email,
                'password' => $password
            ]);

            return $prep->fetchAll();
        }

        return $res;
    }

    public function getUser($email)
    {
        $connect = getDatabaseConnection();
        $prep = $connect->prepare("SELECT * FROM " . $this->table . " WHERE email = :email");
        $res = $prep->execute([
            'email' => $email
        ]);

        $res = $prep->fetchAll();

        if (!$res[0]) {
            $prep = $connect->prepare("SELECT * FROM ADMIN WHERE email = :email");
            $prep->execute([
                'email' => $email
            ]);
            return $prep->fetchAll();
        }

        return $res;
    }
}