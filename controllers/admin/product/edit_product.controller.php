
<?php
require '../../../database/database.php';

$id = $_GET["id"] ? $_GET["id"] : null;
if (isset($id)) {
    require "../../../models/admin/product/product.process.php";
    $category = get_cate($id);
    require "../../../views/admin/edit.product.view.php";
}