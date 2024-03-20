<?php
require "../../../database/database.php";
require "product.model.php"; // Assuming this file contains the create_product() function
global $connection;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $product_image = $_FILES['product_img'];
    $product_name = $_POST['product_name'];
    $category_name = $_POST['category_name'];
    $restaurant_name = $_POST['restaurant_name'];
    echo $restaurant_name;
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $uploadDir = '../../../assets/images/products/';
    $uploadFile = $uploadDir . basename($product_image['name']);
    
    if ($product_image['size'] > 0 && in_array(pathinfo($uploadFile, PATHINFO_EXTENSION), array("png", "jpeg", "jpg"))) {
        if (move_uploaded_file($product_image['tmp_name'], $uploadFile)) {
            // Call the function to insert product data into the database
            $is_created = get_product_data($product_image['name'],$product_name, $restaurant_name,$price, $discount, $category_name );
            
            if ($is_created) {
                // Use JavaScript to trigger SweetAlert for success message and redirect
                echo "<script>Swal.fire('Success', 'Product created successfully', 'success').then(() => window.location.href = '/product_admin');</script>";
            } else {
                // Use JavaScript to trigger SweetAlert for error message
                echo "<script>Swal.fire('Error', 'Failed to create product', 'error');</script>";
            }
        } else {
            // Use JavaScript to trigger SweetAlert for error message
            echo "<script>Swal.fire('Error', 'Failed to upload file', 'error');</script>";
        }
    } else {
        // Use JavaScript to trigger SweetAlert for error message
        echo "<script>Swal.fire('Error', 'Invalid file or file type. Please upload a valid PNG, JPEG, or JPG file', 'error');</script>";
    }
}
?>
