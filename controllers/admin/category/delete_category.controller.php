
<?php
require("../../../database/database.php");
require("../../../models/admin/category/category.process.php");

if (isset($_GET['id'])) {
    $category_id = $_GET['id'];
    delete_category($category_id);
    header("location:/category");
    exit;   
}
?>