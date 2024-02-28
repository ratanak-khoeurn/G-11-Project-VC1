<?php
require '../../../database/database.php';

$id = $_GET["id"] ? $_GET["id"] : null;
if (isset($id)) {
    require "../../../models/admin/category/category.model.php";
    $category = get_cate($id);
    require "../../../views/admin/category_edit.view.php";
}