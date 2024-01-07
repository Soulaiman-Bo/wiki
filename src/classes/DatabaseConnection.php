<?php

namespace App\classes;

use PDO;
use PDOException;

class DatabaseConnection
{
    private static $instance;
    private $connection;

    private $host;
    private $username;
    private $password;
    private $database;

    private function __construct()
    {

        $this->host = $_ENV['DB_HOST'];
        $this->username = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASS'];
        $this->database = $_ENV['DB_NAME'];

        $this->connect();
    }

    private function connect()
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->database}";

            $this->connection = new PDO($dsn, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function closeConnection()
    {
        $this->connection = null;
    }
}
