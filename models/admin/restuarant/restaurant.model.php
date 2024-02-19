<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
   if((isset($_POST["restaurant_name"])) 
   && (isset($_POST["restaurant_address"])) 
   && (isset($_POST["restaurant_image_url"]))
   &&(isset($_POST["restaurant_owner_name"]))){
    $res_name = $_POST["restaurant_name"];
    $res_address = $_POST["restaurant_address"];
    $res_image = $_POST["restaurant_image_url"];
    $res_owner = $_POST["restaurant_owner_name"];

   };
}