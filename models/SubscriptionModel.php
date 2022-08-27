<?php

/**
 * @file
 * SubscriptionModel class file.
 */

declare(strict_types=1);

namespace PA\Models;

include __DIR__ . "\..\library\get-database-connection.php";

class SubscriptionModel
{
    private string $table;

    public function __construct()
    {
        $this->table = "SUBSCRIPTION";
    }

    public function add($date, $email)
    {
        $connect = getDatabaseConnection();
        $prep = $connect->prepare(
            "INSERT INTO " . $this->table . " (date, email) VALUES ('" . $date . "', '" . $email . "')"
        );
        if ($prep->execute()) {
            return $connect->lastInsertId();
        }
        return (-1);
    }

    public function delete($email)
    {
        $connect = getDatabaseConnection();
        $prep = $connect->prepare("DELETE FROM " . $this->table . " WHERE email = '" . $email . "'");
        if ($prep->execute()) {
            return $prep->fetchAll();
        }
        return (-1);
    }
}
