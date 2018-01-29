<?php


class Databse
{
    private $conn;

    public function connect()
    {

        include_once 'constants.php';

        $this->conn = new Mysqli(HOST, USER, PASSWORD, DATABASE);

        if ($this->conn) {
            return $this->conn;
        } else {
            echo "DB CONNECTION ERROR";
        }
    }
}

$db = new Databse();
$db->connect();

