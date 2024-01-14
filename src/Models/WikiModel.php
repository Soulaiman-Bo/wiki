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
    public function InserWikistatus($id)
    {
        try {
            $sql = "INSERT INTO `wikistatus`(`wiki_id`, `status`) VALUES ($id, 1)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
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
        $sql = "SELECT A.*, W.status, T.firstname, T.lastname, M.src , R.id AS category_id, R.name
        FROM `article` A 
        JOIN `wikistatus` W 
        ON A.id = W.wiki_id
        JOIN `user` T 
        ON A.author = T.id
        JOIN `images` M 
        ON A.header_img = M.id
        JOIN `categories` R
        ON A.category = R.id
        WHERE `display` != 'archived'  AND w.status = 2  AND  (A.title  LIKE '%$data%' OR `content` LIKE '%$data%')" ;

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function setwikistatus($id, $status)
    {
        $sql = "UPDATE `wikistatus` 
                SET `status` = $status
                WHERE `wikistatus`.`wiki_id` = $id";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function archivewiki($id, $status)
    {

        $sql = "UPDATE `article` 
                SET `display` = '$status'
                WHERE `id` = $id";


        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
    }

    public function getAllWikies()
    {
        $sql = "SELECT A.*, W.status 
                FROM `article` A 
                JOIN `wikistatus` W 
                ON A.id = W.wiki_id
                WHERE `display` != 'archived'";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getAllWikiesForTheWeb()
    {

        $sql = " SELECT A.*, W.status, T.firstname, T.lastname, M.src ,  R.id as category_id, R.name
                FROM `article` A 
                JOIN `wikistatus` W 
                ON A.id = W.wiki_id
                JOIN `user` T 
                ON A.author = T.id
                JOIN `images` M 
                ON A.header_img = M.id
                JOIN `categories` R
                ON A.category = R.id
                WHERE `display` != 'archived' AND w.status = 2;";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getSinglewiki($id)
    {

        $sql = " SELECT A.*, W.status, T.firstname, T.lastname, M.src , R.id, R.name
                FROM `article` A 
                JOIN `wikistatus` W 
                ON A.id = W.wiki_id
                JOIN `user` T 
                ON A.author = T.id
                JOIN `images` M 
                ON A.header_img = M.id
                JOIN `categories` R
                ON A.category = R.id
                WHERE `display` != 'archived' AND w.status = 2 AND A.id = $id";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getAllWikiesByUserId($id)
    {
        $sql = "SELECT A.*, W.status 
        FROM `article` A 
        JOIN `wikistatus` W 
        ON A.id = W.wiki_id
        WHERE A.author = $id AND `display` != 'archived'";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function countwikies()
    {
        $sql = "SELECT status, count(1) as count  
                FROM `wikistatus`
                group by status ";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
