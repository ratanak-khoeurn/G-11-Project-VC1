<?php
require "../../database/database.php";
require "../../models/order/add.cart.model.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user']['user_id'];
    $orders = $_SESSION['order'];
    $quantities = $_POST['quantity'];
    $total = $_POST['total_prices'];
    $action = '0';
    foreach ($orders as $index => $order) {
        $productId = $order[0]['id'];
        $res_id = $order[0]['res_id'];
        $quantity = $quantities[$index];
        $totalPrice = $order[0]['price'] * $quantity;
        add_orders($res_id, $user_id, $productId, $quantity, $totalPrice, $action, $total);
    }
    $_SESSION['order'] = null;
    header("location: /place_order");
}
