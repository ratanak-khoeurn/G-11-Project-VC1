<?php
require("../../../database/database.php");
require("./resturant.process.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $img = $_GET['image'];
    delete_restaurant($id);
    delete_image_restaurant($img);
    header("location:/restaurant_admin");
    exit;   
}
?>