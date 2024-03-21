<?php
session_start();
require "../../database/database.php";
require "../../models/order/add.cart.model.php";

if (isset($_GET['id']) && isset($_SESSION['user'])) {
    $res_id = $_GET['res'];
    $product_id = $_GET['id'];
    $user_id = $_SESSION['user']['user_id'];
    $existing_product = add_to_cart($res_id, $product_id, $user_id);

    if (!$existing_product) {
        $is_added = add_to_cart($res_id, $product_id, $user_id);

        if ($is_added) {
            echo 'yes';
        } else {
            echo 'Failed to add the product to the cart.';
        }
    } else {
        echo '<script>alert("Product already exists in the cart.");</script>';
    }
}
?>
