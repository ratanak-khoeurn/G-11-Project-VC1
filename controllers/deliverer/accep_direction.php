<?php
session_start();
require "../../database/database.php";
require "../../models/order/add.cart.model.php";
$delivery_id = $_SESSION['delivery']['user_id'];
$id = $_GET['id'];
inprogress_delivery($delivery_id,$id);
$_SESSION['id'] = $id;
header("location: /direction");