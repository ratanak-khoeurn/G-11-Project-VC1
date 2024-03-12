<?php
session_start();

require "../../models/order/add.cart.model.php";
if (isset($_GET['id'])) {
    if (isset($_GET['res'])) {
        echo $_GET['res'];
    }

    if (!isset($_SESSION['order'])) {
        $_SESSION['order'] = [];
    }

    $itemToAdd = get_order($_GET['id']);
    $itemExists = false;
    foreach ($_SESSION['order'] as $index => $order) {
        if ($order[0]['id'] == $_GET['id']) {
            $itemExists = true;
            echo '<script>alert("yes")</script>';
            // break;
        }
    }
    if (!$itemExists) {
        $_SESSION['order'][] = $itemToAdd;
    } else {
        echo "<script>alert('Item already exists in the cart');</script>";
    }
    header('Location: /restaurant?id=' . $_GET["res"]);
    exit;
}
?>
