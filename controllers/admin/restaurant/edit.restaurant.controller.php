<?php
require '../../../database/database.php';

$id = $_GET["id"] ? $_GET["id"] : null;
if (isset($id)) {
    require "../../../models/admin/restuarant/resturant.process.php";
    $product = get_restaurant_one($id);
    require "../../../views/admin/restaurant/edit.restaurant.view.php";
    
}