<?php
require "../../database/database.php";
require "../../models/signup.model.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $passowrdENgript =  password_hash($password,PASSWORD_BCRYPT);

    $iscreated = signUp($first_name,$last_name, $email, $passowrdENgript);
    if ($iscreated){
        header('location:/signin');
    }else{
        header('location:/signup');

    }
}
//password_hash



