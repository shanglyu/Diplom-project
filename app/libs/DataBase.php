<?php

class DataBase
{
    private $host = "db"; // ← Tên service MySQL, KHÔNG phải "localhost"
    private $username = "root";
    private $password = "root_password";
    private $dbname = "pho84";

    public function dataBaseConnetion()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8';

        try {
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die('Database connection error: ' . $e->getMessage());
        }
    }
}
