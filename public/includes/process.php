<?php

include_once "../database/constants.php";
include_once "user.php";
include_once "helpers.php";


//Registration
if (isset($_POST['username']) &&
    isset($_POST['email'])    &&
    isset($_POST['password1'])&&
    isset($_POST['password2'])&&
    isset($_POST['usertype']))
{
    $name = formatChars( $_POST['username'] );
    $email = formatChars( $_POST['email'] );
    $password1 = formatChars($_POST['password1']);
    $password2 = formatChars($_POST['password2']);
    $usertype = formatChars($_POST['usertype']);

    if($password1 == $password2) {
        $user = new User();
        $user->createUserAccount($name, $email, $password2, $usertype);
    } else {
        json_encode(['success' => false, 'message' => 'Passwords doesnt match']);
    }

}

//Login

if (isset($_POST['log_email']) &&
    isset($_POST['log_password']))
{
    $log_email = formatChars( $_POST['log_email'] );
    $log_password = formatChars($_POST['log_password']);

    $user = new User();
    $user->userLogin($log_email, $log_password);
}