<?php

namespace App\Models;

use PDO;
use PDOException;
use App\classes\Model;


class CategoryModel extends Model
{

    public function insertCategory($data)
    {
        try {
            $columns = implode(',', array_keys($data));
            $values = implode(',', array_fill(0, count($data), '?'));

            $sql = "INSERT INTO `categories` ($columns) VALUES ($values)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(array_values($data));
            $lastInsertId = $this->connection->lastInsertId();

            return $lastInsertId;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                http_response_code(400);
                echo json_encode([
                    "message" => "Category already exists",
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

    public function selectAllCategories()
    {
        $sql = "SELECT * FROM `categories` ";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function deleteCtaegory($id)
    {
        try {
            $sql = "DELETE FROM `categories` WHERE id = $id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage() . "\n", 3, "errors.log");
            echo "Database error: " . $e->getMessage();
            exit;
        }
    }

    public function selectWikiesByCategory($id)
    {
        $sql = "SELECT A.*, C.name AS categoty_name, C.id AS category_id
                FROM `article` A
                join `categories` C 
                ON A.category = C.id
                WHERE A.category = $id";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
