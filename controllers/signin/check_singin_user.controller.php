<?php
session_start();
require_once '../../database/database.php';
require_once '../../models/signin.model.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $role = htmlspecialchars($_POST['role']);
    $user = getUser($email);
    $_SESSION['user'] = $user;
    var_dump($_SESSION['user']);
    if (count($user) >= 0) {
        if ($email == $_SESSION['user']['email']) {
            if (($password == $user['password']) && ($_SESSION['user']['role'] == 'admin')) {
                header('Location: /admin');
                echo 'yes';
            } else {
                echo 'no admin';
            }

        } else {
            echo 'haha';
        }
    }
}