<?php
// require 'models/restaurant.model.php';
if($_SERVER['REQUEST_METHOD'] === "POST"){
    if(isset($_POST["restaurant_name"]) && isset( $_POST["restaurant_address"])){
        echo $_POST["restaurant_name"];
        // getStoreRestaurant( $_POST["restaurant_name"]);

}};