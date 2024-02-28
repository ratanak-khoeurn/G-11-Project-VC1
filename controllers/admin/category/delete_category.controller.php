
<?php
require("../../../database/database.php");
require("../../../models/admin/category/category.process.php");

if (isset($_GET['id'])) {
    $category_id = $_GET['id'];
    delete_category($category_id);

}
if (isset($_GET['image'])) {
    $img = $_GET['image'];
    delete_image_folder($img);
    header("location:/category");
    exit;   
}
?>