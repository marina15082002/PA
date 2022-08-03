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
        $prep = $connect->prepare("UPDATE " . $table . " SET type = '" . $values[0] . "', name= '" . $values[1] . "', email= '" . $values[2] . "', siren='" . $values[3] . "', phone='" . $values[4] . "', country= '" . $values[5] . "', city= '" . $values[6] . "', address='" . $values[7] . "' WHERE id = :id;");
        $prep->execute([
            'id' => $id
        ]);

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
}
