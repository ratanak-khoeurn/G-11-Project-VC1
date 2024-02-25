
<?php

require_once("database/database.php");
require_once("models/admin/category/category.process.php");

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if all required fields are present
    if (!empty($_POST['category']) && isset($_FILES['product_image_url']) && isset($_POST['category_id'])) {
        // Get the data from the form
        $name = $_POST['category'];
        $category_id = $_POST['category_id'];

        $uploadDir = 'assets/images/categories/';
        $uploadFile = $uploadDir . basename($_FILES['product_image_url']['name']);
        $fileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

        // Adjusted file size limit to 500 KB
        $maxFileSize = 500000;

        // Check if the uploaded file is valid
        if ($_FILES['product_image_url']['error'] !== UPLOAD_ERR_OK) {
            echo "Error uploading file.";
        } elseif (!in_array($fileType, array("png", "jpeg", "jpg"))) {
            echo "Invalid file type. Only PNG, JPEG, and JPG files are allowed.";
        } elseif ($_FILES['product_image_url']['size'] > $maxFileSize) {
            echo "File size exceeds the limit (500 KB).";
        } elseif (!move_uploaded_file($_FILES['product_image_url']['tmp_name'], $uploadFile)) {
            echo "Failed to move uploaded file.";
        } else {
            // Update category in the database
            $is_updated = update_category($name, $uploadFile, $category_id);
            header('Location: /category'); // Redirect to category page after successful update
            // exit();
        }
    }
}