<?php
session_start();
require_once '../../database/database.php';
require_once '../../models/signup.model.php';
require_once '../../models/signin.model.php';

$_SESSION['wrong_password'] = '';
$_SESSION['wrong_email'] = '';
$_SESSION['login_admin'] = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_GET['signup'])) {
        // Sign Up Logic
        $first_name = htmlspecialchars($_POST['first_name']);
        $last_name = htmlspecialchars($_POST['last_name']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $profile = $_FILES['profile'];

        $uploadDir = '../../../assets/images/user/';
        $uploadFile = $uploadDir . basename($profile['name']);
        if (
            $profile['size'] > 0 && in_array($profile["type"], array("png", "jpeg", "jpg"))
        ) {
            echo "no";
        } else {
            move_uploaded_file($profile['tmp_name'], $uploadFile);
            $is_created = signUp($first_name, $last_name, $email, $password, $profile['name']);

            if ($is_created) {
                $_SESSION['user'] = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $email,
                    'password' => $password,
                    'picture' => $profile['name']
                );
                header('Location: /');
                exit();
            } else {
                header('Location: /signup');
                exit();
            }
        }

    } elseif (isset($_GET['sigin'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $user = getUser($email);
        $_SESSION['user'] = $user;

        if ($_SESSION['user']['email'] == $email && $password == $user['password']) {
            // $_SESSION['admin'] = $user['role'];
            if ($_SESSION['user']['role'] == 'admin') {
                $_SESSION['admin'] = $user;
                header('Location: /admin');
                $_SESSION['login_admin'] = 'login';
                exit();

            } elseif ($_SESSION['user']['role'] == 'user') {
                $_SESSION['users'] = $user;
                header('Location: /');
                exit();
            }
        } else {
            header('Location: /signin');


            if ($user['email']!=$email) {
                $_SESSION['wrong_email'] = 'wrong email';
            } else {
                $_SESSION['wrong_password'] = 'wrong password';
            }
            $_SESSION['login_admin'] = '';
            exit();
        }
    }
}
