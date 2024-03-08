<?php
session_start();
require  "../../database/database.php";
require "../../models/comments/comments.model.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $comment = $_POST['comment'];
    store_comment($comment,$_SESSION['user']['first_name'],$_SESSION['user']['picture']);
    echo $_SESSION['user']['first_name'];
    
}