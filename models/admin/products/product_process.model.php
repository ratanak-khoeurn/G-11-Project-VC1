<?php
require "../../../database/database.php";
require "product.model.php";
global $connection;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $product_image = $_FILES['product_img'];
    $product_name = $_POST['product_name'];
    $category_name= $_POST['category_name'];
    $restaurant_name = $_POST['restaurant_name'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $uploadDir = '../../../assets/images/products/';
    $uploadFile = $uploadDir . basename($product_image['name']);
    
    if ($product_image['size'] > 0 && in_array(pathinfo($uploadFile, PATHINFO_EXTENSION), array("png", "jpeg", "jpg"))) {
        if (move_uploaded_file($product_image['tmp_name'], $uploadFile)) {
            $is_created = get_product_data($product_image['name'], $product_name, $restaurant_name, $category_name, $price, $discount);
            
            if ($is_created) {
                header('location:/product_admin');
                exit;
            } else {
                echo "Failed to create product.";
            }
        } else {
            echo "Failed to upload file.";
        }
    } else {
        echo "Invalid file or file type. Please upload a valid PNG, JPEG, or JPG file.";
    }
}
?>

