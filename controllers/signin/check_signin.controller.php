<?php
session_start();
require_once '../../database/database.php';
require_once '../../models/signin.model.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Escape the query string to prevent SQL injection.
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);//123
 
    // Get data from database
    $user = getUser($email);
    // Check if user exists
    if (count($user) > 0) {
        // Check if password is correct
        if (($password== $user['password']) && ($user['role']=='admin')) {
            $_SESSION['user'] = $user;
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['img'] = $user['last_name'];
            $_SESSION['role'] = $user['role'];
            header('Location: /admin');
        } else {
            echo '&lt;script&gt;alert("text not admin");&lt;/script&gt;';
            header("location: /signin");
        }
    }
}
