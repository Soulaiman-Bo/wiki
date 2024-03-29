<?php

namespace App\Models;

use PDO;
use PDOException;
use App\classes\Model;


class ImageModel extends Model {
    public function InsertImage($data)
    {
        try {
            $columns = implode(',', array_keys($data));
            $values = implode(',', array_fill(0, count($data), '?'));
            $sql = "INSERT INTO `images` ($columns) VALUES ($values)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(array_values($data));
            $lastInsertId = $this->connection->lastInsertId();

            return $lastInsertId;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage() . "\n", 3, "errors.log");
            echo "Database error: " . $e->getMessage();
            return false;
        }
    }
}