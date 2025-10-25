<?php

final class Signup extends Dbh
{
    private $username;
    private $password;

    public function __construct($username = "", $password = "")
    {
        $this->username = $username;
        $this->password = $password;
    }   

    private function insertUser()
    {
        $conn = parent::connect();
        $query = "INSERT INTO users ('username', 'password') VALUES (:username, :password);";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->execute();
    }   

    private function isEmptySubmit() 
    {
        return (empty($this->username) || empty($this->password)) ? true : false;
    }

    public function signUpUser()
    {
        if ($this->isEmptySubmit()) {
            header("location: " . $_SERVER['DOCUMENT_ROOT'] . "/index.php");
            die();
        }

        $this->insertUser();
    }
}
