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
            if (($password == $user['password']) && ($user['role']=='manager')) {
                header('Location: /manager_home');
            } else {
                header("location: /manager");
            }
        }
        else{
            header('Location: /manager');
            echo '<script>alert("Your email not admin");</script>';
        }
        
    }
}
