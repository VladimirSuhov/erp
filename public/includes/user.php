<?php

/*
 *  User Class for account registration and login
 */

class User
{
    private $conn;
    function __construct() {
        include_once '../database/db.php';
        $db = new Databse();
        $this->conn = $db->connect();
    }

    public function emailExists($email) {
       $pre_stmt = $this->conn->prepare("SELECT email FROM user WHERE email = ?");
       $pre_stmt->bind_param("s", $email);
       $pre_stmt->execute() or die($this->conn->error);
       $result = $pre_stmt->get_result();

        if($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function createUserAccount($username, $email, $password, $usertype) {

        if ($this->emailExists($email)) {
            echo "EMAIL_ALREADY_EXISTS";
        } else {
           $pass_hash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 8]);
           $date = date("Y-m-d");
           $notes = "";
           $last_login = "";
           $pre_stmt = $this->conn->prepare("INSERT INTO user (username, email, password, register_date, last_login, notes, user_type) VALUES (?, ?, ?, ?, ?, ?, ?)");
           $pre_stmt->bind_param("sssssss", $username, $email, $pass_hash, $date, $last_login, $notes, $usertype);
           $result = $pre_stmt->execute() or die($this->conn->error);

            if ($result) {
                return $this->conn->insert_id;
            } else {
               return "SOME ERROR";
            }
        }
    }

    public function userLogin($email, $password) {
        $pre_stmt = $this->conn->prepare("SELECT id, username, password, last_login FROM user WHERE email = ?");
        $pre_stmt->bind_param("s", $email);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();

        if($result->num_rows < 0) {
            echo "NOT_REGISTRED";
        } else {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION["user_id"] = $row['id'];
                $_SESSION["user_name"] = $row['username'];
                $_SESSION["last_login"] = $row['last_login'];

                $last_login = date("Y-d-m h:m:s");

                $pre_stmt = $this->conn->prepare("UPDATE user SET last_login = ? WHERE email = ?");
                $pre_stmt->bind_param("ss", $last_login, $email);
                $result = $pre_stmt->execute() or die($this->conn->error);

                if ($result) {
                    echo "LOGGED_IN";
                    return true;
                }
            } else {
                echo "PASS_NOT_MATCHED";
            }
        }
    }
}

$user = new User();
