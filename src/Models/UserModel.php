<?php

namespace App\Models;

use PDO;
use PDOException;
use App\classes\Model;


class UserModel extends Model
{
    public function GetUser($email)
    {
        $sql = "SELECT * FROM user WHERE email = '$email' ";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function GetAllUsers()
    {
        $sql = "SELECT U.*, I.src, I.alt 
                FROM user U
                join images I 
                ON U.profile_img = I.id";
        
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function InsertUser($data)
    {
        try {
            $columns = implode(',', array_keys($data));
            $values = implode(',', array_fill(0, count($data), '?'));
            $sql = "INSERT INTO `user` ($columns) VALUES ($values)";
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

    public function deleteUser($id)
    {
        try {
            $sql = "DELETE FROM `user` WHERE `id` = $id";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $lastInsertId = $id;

            return $lastInsertId;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage() . "\n", 3, "errors.log");
            echo "Database error: " . $e->getMessage();
            return false;
        }
    }

    public function InsertUserProfileImage($data)
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
