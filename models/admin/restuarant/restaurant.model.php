<?php
require "../../../database/database.php";
require "resturant.process.php";
global $connection;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (
        isset($_POST['restaurant_name']) &&
        isset($_POST['restaurant_address']) &&
        isset($_FILES['restaurant_image_url']) &&
        isset($_POST['region']) &&
        isset($_POST['manager'])
    ) {

        $res_name = $_POST['restaurant_name'];
        $res_address = $_POST['restaurant_address'];
        $res_image = $_FILES['restaurant_image_url'];
        $region = $_POST['region'];
        $res_owner = $_POST['manager'];

        $uploadDir = '../../../assets/images/restaurant/';
        $uploadFile = $uploadDir . basename($res_image['name']);
        if (
            $res_image['size'] <50000 && in_array($res_image["type"], array("png", "jpeg", "jpg"))){
                echo"no";
            }else{
                var_dump ($res_image['name']);
                var_dump($res_image);
                    move_uploaded_file($res_image['tmp_name'], $uploadFile);
                    $created = create_restaurant( $res_name, $res_address , $res_image['name'], $region,$res_owner);
                    if($created){
                        header('location:/restaurant_admin');
                    }
        
            }
        
        }
    }

