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
        $final_image = '';

        // Process file upload
        if (!empty($_FILES['product_image_url']['name'])) {
            $new_image = $_FILES['product_image_url'];

            $uploadDir = '../../../assets/images/categories/';
            $final_image = basename($new_image['name']);
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
            } elseif (!move_uploaded_file($new_image['tmp_name'], $uploadFile)) {
                echo "Failed to move uploaded file.";
            } else {
                // Update the category with the new image
                $is_updated = update_category($name, $final_image, $category_id);
                if ($is_updated) {
                    delete_image_folder($image);
                    header('Location: /category');
                    exit;
                } else {
                    echo "Failed to update category.";
                }
            }
        } else {
            // If no new image uploaded, keep the old one
            $final_image = $image;
            $is_updated = update_category($name, $final_image, $category_id);
            if ($is_updated) {
                header('Location: /category');
                exit;
            } else {
                echo "Failed to update category.";
            }
        }
    } else {
        echo "Missing required fields.";
    }
} else {
    echo "Invalid request method.";
}
?>
