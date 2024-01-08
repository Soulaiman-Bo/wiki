<?php

namespace App\Models;

use PDO;
use PDOException;
use App\classes\Model;


class TagModel extends Model
{

    public function insertTag($data)
    {
        try {
            $columns = implode(',', array_keys($data));
            $values = implode(',', array_fill(0, count($data), '?'));

            $sql = "INSERT INTO `tags` ($columns) VALUES ($values)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(array_values($data));
            $lastInsertId = $this->connection->lastInsertId();

            return $lastInsertId;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                http_response_code(400);
                echo json_encode([
                    "message" => "Tag already exists",
                ]);
                exit;
            } else {
                error_log("Database error: " . $e->getMessage() . "\n", 3, "errors.log");
                echo "Database error: " . $e->getMessage();
                exit;
            }

            return false;
        }
    }

    public function selectAllTags()
    {
        $sql = "SELECT * FROM `tags` ";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function deleteTag($id)
    {
        try {
            $sql = "DELETE FROM `tags` WHERE id = $id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();

        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage() . "\n", 3, "errors.log");
            echo "Database error: " . $e->getMessage();
            exit;
        }
    }
}
