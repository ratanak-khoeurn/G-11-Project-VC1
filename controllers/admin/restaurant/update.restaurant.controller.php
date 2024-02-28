<?php
require("../../../database/database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require "../../../models/admin/restuarant/resturant.process.php";
    if (!empty($_POST['restaurant_name'])) {
        $id = $_POST['restaurant_id'];
        $name = $_POST['restaurant_name'];
        $address = $_POST['restaurant_address'];
        $new_image = $_FILES['restaurant_image_url'];
        $old_image = $_POST['old_image'];
        $region = $_POST['region'];
        $owner = $_POST['restaurant_owner_name'];
    }
    if (!empty($new_image['name'])) {
        $uploadDir = '../../../assets/images/restaurant/';
        $final_image = basename($new_image['name']);
        $uploadFile = $uploadDir . $final_image;
        $fileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
        $maxFileSize = 5000000;

        if ($new_image['error'] !== UPLOAD_ERR_OK) {
            echo "Error uploading file.";
        } elseif (!in_array($fileType, array("png", "jpeg", "jpg"))) {
            echo "Invalid file type. Only PNG, JPEG, and JPG files are allowed.";
        } elseif ($new_image['size'] > $maxFileSize) {
            echo "File size exceeds the limit.";
        } elseif (!move_uploaded_file($new_image['tmp_name'], $uploadFile)) {
            echo "Failed to move uploaded file.";
        } else {
            $is_updated = update_restaurant($name, $address, $final_image, $region, $owner, $id);
            if ($is_updated) {
                delete_image_restaurant($old_image);
                header('Location: /restaurant_admin');
                exit;
            } else {
                echo "Failed to update product.";
            }
        }
    } else {
        $final_image = $old_image;
        $is_updated = update_restaurant($name, $address, $final_image, $region, $owner, $id);
        if ($is_updated) {
            header('Location: /restaurant_admin');
            exit;
        } else {
            echo "Failed to update product.";
        }
    }
}
