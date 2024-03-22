<?php
require("../../../database/database.php");

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require "../../../models/admin/products/product.model.php";
    if (!empty($_POST['product_name'])) {
        $id = $_POST['product_id'];
        $name = $_POST['product_name'];
        $res_name = $_POST['restaurant_name'];
        $category_name = $_POST['category_name'];
        $price = $_POST['price'];
        $discount = $_POST['discount'];
        $new_product_image = $_FILES['product_image_url'];
        $final_image = '';
        $old_image = $_POST['image'];

        if (!empty($new_product_image['name'])) {
            $uploadDir = '../../../assets/images/products/';
            $final_image = basename($new_product_image['name']);
            $uploadFile = $uploadDir . $final_image;
            $fileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
            $maxFileSize = 5000000;             
            if ($new_product_image['error'] !== UPLOAD_ERR_OK) {
                echo "Error uploading file.";
            } elseif (!in_array($fileType, array("png", "jpeg", "jpg"))) {
                echo "Invalid file type. Only PNG, JPEG, and JPG files are allowed.";
            } elseif ($new_product_image['size'] > $maxFileSize) {
                echo "File size exceeds the limit.";
            } elseif (!move_uploaded_file($new_product_image['tmp_name'], $uploadFile)) {
                echo "Failed to move uploaded file.";
            } else {
                $is_updated = update_product($name, $final_image, $res_name, $category_name, $price, $discount, $id); // Corrected variable name
                if ($is_updated) {
                    delete_image_product($old_image);
                    header('Location: /product_admin');
                    exit;
                } else {
                    echo "Failed to update product.";
                }
            }
        } else {
            $final_image = $old_image;
            $is_updated = update_product($name, $final_image, $res_name, $category_name, $price, $discount, $id); // Corrected variable name
            if ($is_updated) {
                header('Location: /product_admin');
                exit;
            } else {
                echo "Failed to update product.";
            }
        }
    }
}
?>
