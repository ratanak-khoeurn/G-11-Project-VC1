<?php
session_start();
require_once '../../database/database.php';
require_once '../../models/signup.model.php';
require_once '../../models/signin.model.php';

// Reset error messages
$_SESSION['wrong_password'] = '';
$_SESSION['wrong_email'] = '';
$_SESSION['login_admin'] = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_GET['signup'])) {
        // Sign Up Logic
        $first_name = htmlspecialchars($_POST['first_name']);
        $last_name = htmlspecialchars($_POST['last_name']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']); // Simple password
        $profile = $_FILES['profile'];

        // Basic form validation
        if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($profile['name'])) {
            echo "Please fill in all fields.";
            exit();
        }

        // Validate file upload
        if ($profile['size'] > 0 && in_array(pathinfo($profile['name'], PATHINFO_EXTENSION), array("png", "jpeg", "jpg"))) {
            $uploadDir = '../../assets/images/user/';
            $uploadFile = $uploadDir . basename($profile['name']);

            if (move_uploaded_file($profile['tmp_name'], $uploadFile)) {
                $is_created = signUp($first_name, $last_name, $email, $password, $profile['name']);

                if ($is_created) {
                    $_SESSION['user'] = array(
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'email' => $email,
                        'password' => $password, // Simple password
                        'picture' => $profile['name']
                    );
                    header('Location: /');
                    exit();
                } else {
                    header('Location: /signup');
                    exit();
                }
            } else {
                echo "Failed to move uploaded file.";
            }
        } else {
            echo "Invalid file type or size.";
        }
    } elseif (isset($_GET['sigin'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        // Basic form validation
        if (empty($email) || empty($password)) {
            echo "Please fill in all fields.";
            exit();
        }

        $user = getUser($email);
        var_dump($user);
        if ($user) {
            $_SESSION['user'] = $user;

            if ($user['role'] == 'admin') {
                if ($user['password'] == $password) {
                    $_SESSION['admin'] = $user;
                    $_SESSION['role'] = 'admin';
                    header('Location: /admin_admin');
                    $_SESSION['login_admin'] = 'login';
                    exit();
                } else {
                    $_SESSION['wrong_password'] = ($user && $user['password'] == $password) ? '' : 'wrong password';
                    header('Location: /signin');
                }
            } elseif ($user['role'] == 'user') {
                if ($user['password'] == $password) {

                    $_SESSION['user'] = $user;
                    header('Location: /');
                    exit();
                } else {
                    $_SESSION['wrong_password'] = ($user && $user['password'] == $password) ? '' : 'wrong password';
                    header('Location: /signin');
                }
            } elseif ($user['role'] == 'restaurant_owner') {
                if ($user['password'] == $password) {

                    $_SESSION['manager'] = $user;
                    $_SESSION['role'] = 'manager'; // Fixed typo (changed '==' to '=')
                    header('Location: /admin_admin');
                } else {
                    $_SESSION['wrong_password'] = ($user && $user['password'] == $password) ? '' : 'wrong password';
                    header('Location: /signin');
                }
            } elseif ($user['role'] == 'delivery') {
                if ($user['password'] == $password) {

                    $_SESSION['delivery'] = $user;
                    $_SESSION['role'] = 'delivery'; // Fixed typo (changed '==' to '=')
                    header('Location: /admin_admin');
                } else {
                    $_SESSION['wrong_password'] = ($user && $user['password'] == $password) ? '' : 'wrong password';
                    header('Location: /signin');
                }
            }
        } else {
            header('Location: /signin');
            $_SESSION['wrong_email'] = ($user ? '' : 'wrong email');
            $_SESSION['login_admin'] = '';
            exit();
        }
    }
}
