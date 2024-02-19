<?php
require ("../../../database/database.php");
require("./resturant.process.php");


if ($_SERVER["REQUEST_METHOD"] === "POST") {
   if((isset($_POST["restaurant_name"])) 
   && ((isset($_POST["restaurant_address"])))
   && ((isset($_POST["restaurant_image_url"])))
   && ((isset($_POST["region"])))
   && ((isset($_POST["restaurant_owner_name"])))){
    $res_name = $_POST["restaurant_name"];
    $res_address = $_POST["restaurant_address"];
    $res_image = $_POST["restaurant_image_url"];
    $region =$_POST['region'];
    $owner_name = $_POST['restaurant_owner_name'];
   //  $res_address = $_POST["restaurant_address"];
   
   };
   $is_created = create_restaurant($res_name, $res_address ,$res_image, $region,  $owner_name );
   if($is_created) {
      header("/restaurant_admin");
   };
}