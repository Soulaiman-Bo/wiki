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
    public function updateTag($id, $name)
    {
        try {

            $sql = "UPDATE `tags` 
                    SET `name` = '$name'
                    WHERE `tags`.`id` = $id;
            ";

            $stmt = $this->connection->prepare($sql);
            $stmt->execute();

            return 1;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage() . "\n", 3, "errors.log");
            echo "Database error: " . $e->getMessage();
            exit;
        }
    }
    public function assignTagsToWiki($data)
    {
        try {
            $values = "";

            foreach ($data as $key => $value) {
                $values .= " ($value, $key),";
            }

            $sql = "INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES  $values";

            $sql = rtrim($sql, ',');

            // echo $sql;
            // exit;

            $stmt = $this->connection->prepare($sql);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage() . "\n", 3, "errors.log");
            echo "Database error: " . $e->getMessage();
            return false;
        }
    }
    public function searchforTag($data)
    {
        $sql = "SELECT * FROM `tags` WHERE `name` LIKE '%$data%'";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function  getTagById($id)
    {
        $sql = "SELECT * FROM `tags` WHERE `id` = $id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function selectWikiesByTag($id)
    {

        $sql = "SELECT * 
                FROM `article_tag` T
                join `article` A
                ON T.article_id = A.id
                WHERE tag_id = $id";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function selectTagsByWiki($id)
    {

        $sql = "SELECT * 
                FROM `article_tag` T 
                JOIN tags A 
                ON T.tag_id = A.id
                WHERE T.article_id = $id";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
