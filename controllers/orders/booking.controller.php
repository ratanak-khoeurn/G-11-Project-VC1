<?php
session_start();
require "../../database/database.php";
require "../../models/order/add.cart.model.php";
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $phone =  $_POST['phone'];
    $address =  $_POST['address'];
    $id = $_SESSION['user']['user_id'];
    update_order($address,$phone,$id);
}
if(isset($_GET['action'])){
    get_accept($_SESSION['manager']['user_id']);
    header('location:/order');
    $_SESSION['action']= 'accept';
}
header('location: /order');
