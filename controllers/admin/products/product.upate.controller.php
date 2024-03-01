<?php
require("../../../database/database.php");

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require "../../../models/admin/products/product.model.php";
    if (!empty($_POST['product_name']) ) {
        $id = $_POST['product_id'];
        $name = $_POST['product_name'];
        $res_name = $_POST['restaurant_name'];
        $price = $_POST['price'];
        $discount = $_POST['discount'];
        $new_product_image = $_FILES['product_image_url'];
        $final_image = '';
        $old_image = $_POST['image'];
        echo $new_product_image['name'];

    }
        if (!empty($_FILES['product_image_url']['name'])) {
            $new_image = $_FILES['product_image_url'];

            $uploadDir = '../../../assets/images/products/';
            $final_image = basename($new_product_image['name']);
            $uploadFile = $uploadDir . $final_image;
            $fileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
            $maxFileSize = 5000000; // Adjust as needed

            // Validate the uploaded file
            if ($new_image['error'] !== UPLOAD_ERR_OK) {
                echo "Error uploading file.";
            } elseif (!in_array($fileType, array("png", "jpeg", "jpg"))) {
                echo "Invalid file type. Only PNG, JPEG, and JPG files are allowed.";
            } elseif ($new_image['size'] > $maxFileSize) {
                echo "File size exceeds the limit.";
            } elseif (!move_uploaded_file($new_product_image['tmp_name'], $uploadFile)) {
                echo "Failed to move uploaded file.";
            } else {
                // Update the category with the new image
                $is_updated = update_product($name, $final_image, $res_name,$price,$discount,$id);
                if ($is_updated) {
                    delete_image_product($image);
                    header('Location: /product_admin');
                    exit;
                } else {
                    echo "Failed to update product.";
                }
            }
        } else {
            $final_image = $old_image;
            $is_updated = update_product($name, $final_image, $res_name,$price,$discount,$id);
            if ($is_updated) {
                header('Location: /product_admin');
                exit;
            } else {
                echo "Failed to update product.";
            }
        }
}
?>
