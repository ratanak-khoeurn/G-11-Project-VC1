<?php
require("../../../database/database.php");

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require "../../../models/admin/category/category.process.php";
    // Check if all required fields are present
    if (!empty($_POST['category']) && isset($_FILES['product_image_url']['name']) && isset($_POST['category_id'])) {
        // Get the data from the form
        $name = $_POST['category'];
        $category_id = $_POST['category_id'];
        $image = $_POST['image_input'];

        // Delete the image from the folder
        
        // Process file upload
        $uploadDir = '../../../assets/images/categories/';
        $uploadFile = $uploadDir . basename($_FILES['product_image_url']['name']);
        $fileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
        $maxFileSize = 500000;
        if ($_FILES['product_image_url']['error'] !== UPLOAD_ERR_OK) {
            echo "Error uploading file.";
        } elseif (!in_array($fileType, array("png", "jpeg", "jpg"))) {
            echo "Invalid file type. Only PNG, JPEG, and JPG files are allowed.";
        } elseif ($_FILES['product_image_url']['size'] > $maxFileSize) {
            echo "File size exceeds the limit (500 KB).";
        } elseif (!move_uploaded_file($_FILES['product_image_url']['tmp_name'], $uploadFile)) {
            echo "Failed to move uploaded file.";
        } else {
            // Update the category with the new image
            $is_updated = update_category($name, $_FILES['product_image_url']["name"], $category_id);
            if ($is_updated) {
                delete_image_folder($image);
                header('location:/category');
            } else {
                echo "Failed to update category.";
            }
        }
    } else {
        echo "Missing required fields.";
    }
}
?>
