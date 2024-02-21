<?php
require "../../../database/database.php";
require "product.model.php";
// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $product_img = $_POST['product_img'];
    $product_name = $_POST['product_name'];
    $restaurant_name = $_POST['restaurant_name'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $is_created = get_product_data($product_img, $product_name,$restaurant_name, $price, $discount);
    if($is_created){
        header('location:/product_admin');
    }
}
