<?php

namespace App\classes;

class Model
{

    protected $connection;
    protected $stmt;

    public function __construct()
    {
        $dbInstance = DatabaseConnection::getInstance();
        $this->connection = $dbInstance->getConnection();
    }

    public function closeConnection()
    {
        $this->connection = null;
    }
}
