<?php

class Databse
{
    private $conn;

    public function connect()
    {
        include_once 'constants.php';
        setlocale(LC_ALL, 'ru_Ru.UTF8');
        $this->conn = new Mysqli(HOST, USER, PASSWORD, DATABASE);

        if($this->conn) {
            echo 'OK';
            return $this->conn;
        } else {
            return 'DATABASE CONNECTION ERROR';
        }
    }
}

$db = new Databse();
$db->connect();