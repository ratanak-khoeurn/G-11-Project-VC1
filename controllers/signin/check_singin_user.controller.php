<?php
require_once '../../database/database.php';
require_once '../../models/signin.model.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Escape the query string to prevent SQL injection.
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);//123
 
    // Get data from database
    $user = getUser($email);
    // Check if user exists
    if (count($user) >= 0) {
        if($email==$user['email']){
            if (($password== $user['password']) && ($user['role']=='user')) {
                header('Location: /');
            } else {
                header("location: /signin");
                echo '<script>alert("You are not an admin");</script>';
            }
        }
        else{
            header('Location: /signin');
            echo '<script>alert("Your email not admin");</script>';
        }
        
    }
}