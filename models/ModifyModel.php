<?php

/**
 * @file
 * ModifyModel class file.
 */

declare(strict_types=1);

namespace PA\Models;

class ModifyModel
{
    public function modifyColumn($connect, $table, $id, $values)
    {
        if ($table == "USERS") {
            $prep = $connect->prepare("UPDATE " . $table . " SET type = '" . $values[0] . "', name= '" . $values[1] . "', email= '" . $values[2] . "', siren='" . $values[3] . "', phone='" . $values[4] . "', country= '" . $values[5] . "', city= '" . $values[6] . "', address='" . $values[7] . "' WHERE id = :id;");
            $prep->execute([
                'id' => $id
            ]);
        } else if ($table == "ADMIN") {
            $prep = $connect->prepare("UPDATE " . $table . " SET name= '" . $values[0] . "', email= '" . $values[1] . "', phone='" . $values[3] . "', phone='" . $values[4] . "', poste= '" . $values[5] . "' WHERE id = :id;");
            $prep->execute([
                'id' => $id
            ]);
        }


        $prep->fetch();
    }

    public function deleteColumn($connect, $table, $id)
    {
        $prep = $connect->prepare("DELETE FROM " . $table . " WHERE id = :id;");
        $prep->execute([
            'id' => $id
        ]);

        $prep->fetch();
    }

    public function insertAdmin($connect, $table, array $values)
    {
        $prep = $connect->prepare(
            "INSERT INTO " . $table . " (name, email, phone, password, poste) VALUES ('" . $values[0] . "', '" . $values[1] . "', '" . $values[2] . "', '" . $values[3] . "', '" . $values[4] . "')"
        );

        var_dump($prep);

        if ($prep->execute()) {
            return $connect->lastInsertId();
        }
        return (-1);
    }
}
