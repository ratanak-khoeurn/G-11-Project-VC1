<?php
require '../../../database/database.php';

$id = $_GET["id"] ? $_GET["id"] : null;
if (isset($id)) {
    require "../../../models/admin/products/product.model.php";
    $product = get_product_one($id);
    require "../../../views/admin/product/edit.product.view.php";
}