<?php
session_start();
require "../../database/database.php";
require "../../models/comments/comments.model.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment = $_POST['comment'];
    if (isset($_SESSION['user']['user_id'])) {
        store_comment((int)$_SESSION['user']['user_id'], $comment); // Fix argument order
        header('Location: /restaurant?id=' . $_GET["id"]);
        exit(); // Ensure script execution stops here
    } else {
        // echo '<script>alert("You do not have an account!")</script>';
        exit(); // Ensure script execution stops here
    }
}
?>
