<?php
require("../../../database/database.php");
require("./resturant.process.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    delete_restaurant($id);
    header("location:/restaurant_admin");
    exit;   
}
?>