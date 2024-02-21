<?php
require "../../../database/database.php";
require "category.process.php";
global $connection;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['category']) && isset($_FILES['product_image_url'])){
        $name = $_POST['category'];
        $picture = $_FILES['product_image_url'];

    };
    if (!empty($name)) {
        $is_get_answer = create_category($name,$picture);
        if ($is_get_answer) {
            header('location:/category');
        }else{
            echo 'Not found';
        }
    };
};


