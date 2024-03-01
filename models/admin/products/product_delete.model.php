<?php
require("../../../database/database.php");
require("product.model.php");

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $image = $_GET['image'];
    delete_product($product_id);
    delete_image_product($image);
    header("location:/product_admin");
    exit;   
}
?>