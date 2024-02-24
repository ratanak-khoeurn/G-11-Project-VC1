<?php
require("../../../database/database.php");
require("product.model.php");

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    delete_product($product_id);
    header("location:/product_admin");
    exit;   
}
?>