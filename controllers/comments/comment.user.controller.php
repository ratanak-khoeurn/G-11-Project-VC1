<?php
// require "../../models/comments.model.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $comment = $_POST['comment'];
    echo $comment;
}