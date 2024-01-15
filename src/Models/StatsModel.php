<?php

namespace App\Models;

use PDO;
use PDOException;
use App\classes\Model;


class StatsModel extends Model
{
    public function numberofwikies()
    {
        $sql = "SELECT COUNT(1) AS Wikies
                FROM `article`";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function numberofusers()
    {

        $sql = " SELECT COUNT(1) AS users
                 FROM `user`";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function numberofCategories()
    {
        $sql = "SELECT COUNT(1) AS categories
                FROM `categories`";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function topUsers()
    {
        $sql = " SELECT count(1)AS num, U.lastname, U.firstname
        FROM `article` A
        JOIN `user` U
        ON A.author = U.id
        GROUP By A.author
        ORDER BY num DESC
        LIMIT 3";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function topTags()
    {
        $sql = "  SELECT count(1) AS TOTAL, T.name
                    FROM `article_tag` A
                    JOIN `tags` T
                    ON A.tag_id = T.id
                    GROUP BY tag_id
                    ORDER BY TOTAL DESC
                    LIMIT 4";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
