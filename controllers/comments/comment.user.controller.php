<?php
session_start();
require  "../../database/database.php";
require "../../models/comments/comments.model.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $comment = $_POST['comment'];
    if(isset($_SESSION['user']['first_name'])){
        store_comment($comment,$_SESSION['user']['first_name'],$_SESSION['user']['picture']);
        echo $_SESSION['user']['first_name'];
    }else{
        echo '<script>alert("You do not have an account!")</script>';
    header('location: /restaurant');
    exit(); // Ensure script execution stops here
    }
}