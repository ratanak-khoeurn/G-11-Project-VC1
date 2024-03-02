<?php
    require "../../../database/database.php";
    require "../../../models/add.user/add.user.model.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require "../../../models/admin/products/product.model.php";
        if (!empty($_POST['email']) ) {
            $id = $_POST['id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $new_profile = $_FILES['profile'];
            $final_image = '';
            $old_image = $_GET['image'];
            $role = $_POST['role'];
    
        }
            if (!empty($_FILES['profile']['name'])) {
                $new_image = $_FILES['profile']['name'];
    
                $uploadDir = '../../../assets/images/user/';
                $final_image = basename($new_profile['name']);
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
                } elseif (!move_uploaded_file($new_profile['tmp_name'], $uploadFile)) {
                    echo "Failed to move uploaded file.";
                } else {
                    // Update the category with the new image
                    $is_updated = update_user($first_name, $last_name, $email,$password,$role,$final_image,$phone,$id);
                    if ($is_updated) {
                        delete_image_user($old_image);
                        folder_after($role);
                        exit;
                    } else {
                        echo "Failed to update product.";
                        echo "Failed to update product.";
                    }
                }
            } else {
                $final_image = $old_image;
                $is_updated = update_user($first_name, $last_name, $email,$password,$role,$final_image,$phone,$id);
                echo $is_updated;
                if ($is_updated) {
                    folder_after($role);
                    exit;
                } else {
                    echo "Failed to update product.";
                }
            }
    
    }
?>;