<?php
session_start();
require "../../database/database.php";
require "../../models/order/add.cart.model.php";
if (isset($_GET['id']) && isset($_SESSION['user'])) {

    if (!isset($_SESSION['order'])) {
        $_SESSION['order'] = [];
    }

    $itemToAdd = get_order($_GET['id']);
    $itemExists = false;
    foreach ($_SESSION['order'] as $index => $order) {
        if ($order[0]['id'] == $_GET['id']) {
            $itemExists = true;
            echo '<script>alert("yes")</script>';
        }
    }
    if (!$itemExists) {
        $_SESSION['order'][] = $itemToAdd;
    } else {
        echo "<script>alert('Item already exists in the cart');</script>";
    }
    if (isset($_GET['num']) & $_GET['num'] == 1) {
        header('location: /checkout');
        exit;
    } else {
        header('Location: /restaurant?id=' . $_GET["res"]);
        exit;
    }
}
    else {
        // Output JavaScript alert
        echo "<script>alert('Item already exists in the cart');</script>";
        // Redirect to the restaurant page
        echo "<script>window.location.href='/restaurant?id=" . $_GET["res"] . "';</script>";
        // Stop further execution
        exit;
    }