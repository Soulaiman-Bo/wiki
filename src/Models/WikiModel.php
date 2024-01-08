<?php

namespace App\Models;

use PDO;
use PDOException;
use App\classes\Model;


class WikiModel extends Model
{
    public function InserWiki($data)
    {
        try {
            $columns = implode(',', array_keys($data));
            $values = implode(',', array_fill(0, count($data), '?'));

            $sql = "INSERT INTO `article` ($columns) VALUES ($values)";
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


    public function searchforWiki($data)
    {
        $sql = "SELECT * 
                FROM `article` 
                WHERE `title` 
                LIKE '%$data%' OR  
                `content`  LIKE '%$data%'
                ";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}
