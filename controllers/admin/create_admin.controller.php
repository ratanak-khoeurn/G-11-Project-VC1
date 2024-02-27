<?php
    require "../../database/database.php";
    require "../../models/signup.model.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $picture = $_FILES['profile']['name'];
        echo $first_name . ' ' . $last_name . ' ';
        
    }


?>