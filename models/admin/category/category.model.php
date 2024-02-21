<?php
require "../../../database/database.php";
require "category.process.php";
global $connection;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['category']) && isset($_FILES['product_image_url'])) {
        $name = $_POST['category'];
        $picture = $_FILES['product_image_url'];
        // var_dump($picture['name']);
    }
    $uploadDir = '../../../assets/images/categories/';
    $uploadFile = $uploadDir . basename($picture['name']);
    if ($picture['size'] < 5000000 && in_array($picture["type"], array("png", "jpeg", "jpg"))) {
    }else {
        move_uploaded_file($picture["tmp_name"], $uploadFile);
        echo 'something went wrong';
        echo $picture["size"];
        echo $picture["type"];
    }
}
// if (!empty($name)) {
//     // Check if $picture is set before passing it to create_category
//     $is_get_answer = create_category($name, isset($picture) ? $uploadFile : null);
//     if ($is_get_answer) {
//         // header('location:/category');
//     } else {
//         echo 'Not found';
//     }
// }
