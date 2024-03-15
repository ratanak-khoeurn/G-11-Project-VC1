<?php
session_start();
require "../../database/database.php";
$email = $_SESSION['user']['email'];
require "../../models/favorites/favorite.model.php";
// $user_id = get_user_favorite($_SESSION['user']['email']);
if(isset($_GET['id'])){
    $user_id = $_SESSION['user']['user_id'];
    $res_id = $_GET['id'];
    $to_add = add_favorites($user_id, $res_id);
    if($to_add){
        echo $to_add;
        header('location:/all_restaurants');
    }
}