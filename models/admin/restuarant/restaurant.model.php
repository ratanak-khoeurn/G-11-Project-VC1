<?php
session_start(); // Starting the session

require_once("../../../database/database.php");
require "./resturant.process.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   if (
      isset($_POST["restaurant_name"]) &&
      isset($_POST["restaurant_address"]) &&
      isset($_POST["restaurant_image_url"]) &&
      isset($_POST["restaurant_owner_name"])
   ) {
      $res_name = $_POST["restaurant_name"];
      $res_address = $_POST["restaurant_address"];
      $res_image = $_FILES["restaurant_image_url"];
      $region = $_POST["restaurant_name"];
      $res_owner = $_POST["restaurant_owner_name"];
      if(check_image($res_image)){
         signUp($res_name,$res_address,$res_image,$region,$res_owner);
      }

   }
}
