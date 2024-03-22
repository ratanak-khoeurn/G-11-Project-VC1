<?php
require "../../../database/database.php";
require "resturant.process.php";
global $connection;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delivery']) && !empty($_POST['delivery'])) {
        $deliveryOption = $_POST['delivery'];
        echo $deliveryOption;
        $res_name = $_POST['restaurant_name'];
        $res_address = $_POST['restaurant_address'];
        $res_image = $_FILES['restaurant_image_url'];
        $res_owner = intval($_POST['manager']);
        echo $res_owner;
        if ($deliveryOption=='paid'){
            $deliveryOption = $_POST['deliveryPrice'];
            echo $deliveryOption;
        }
        $uploadDir = '../../../assets/images/restaurant/';
        $uploadFile = $uploadDir . basename($res_image['name']);
        if (
            $res_image['size'] <50000 && in_array($res_image["type"], array("png", "jpeg", "jpg"))){
                echo"no";
            }else{
                    move_uploaded_file($res_image['tmp_name'],  $uploadFile);
                    $created = create_restaurant( $res_name, $res_image['name'],$res_owner,$deliveryOption,$res_address );
                    if($created){
                        header('location:/restaurant_admin');
                    }
            }
    } 
}

        // $uploadDir = '../../../assets/images/restaurant/';
        // $uploadFile = $uploadDir . basename($res_image['name']);
        // if (
        //     $res_image['size'] <50000 && in_array($res_image["type"], array("png", "jpeg", "jpg"))){
        //         echo"no";
        //     }else{
        //             move_uploaded_file($res_image['tmp_name'],  $uploadFile);
        //             $created = create_restaurant( $res_name, $res_address , $res_image['name'], $region,$res_owner);
        //             if($created){
        //                 header('location:/restaurant_admin');
        //             }
        
        //     }
        
    //     }
    // }
