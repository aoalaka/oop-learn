<?php

class Dbh {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "oop_example";
    
    protected function connect() {
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
            $pdo = new PDO($dsn, $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die ("Connection failed: " . $e->getMessage());
        }
    }
}