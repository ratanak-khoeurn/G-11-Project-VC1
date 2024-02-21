<?php
require("../../../database/database.php");
require("resturant.process.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (
        isset($_POST["restaurant_name"]) &&
        isset($_POST["restaurant_address"]) &&
        isset($_FILES["restaurant_image_url"]) &&
        isset($_POST["region"]) &&
        isset($_POST["restaurant_owner_name"])
    ) {
        $res_name = $_POST["restaurant_name"];
        $res_address = $_POST["restaurant_address"];
        $res_image = $_FILES["restaurant_image_url"];
        $region = $_POST['region'];
        $owner_name = $_POST['restaurant_owner_name'];
        $directory = "../../assets/images/avatar";

        $target_file = $directory . basename($_FILES['restaurant_image_url']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $checkImageSize = getimagesize($_FILES["restaurant_image_url"]["tmp_name"]);
        
        if ($checkImageSize) {
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                echo "Wrong Image extension!";
               //  header('Location: /signup');
       // Terminate script execution after redirection
            } else {
                $newFileName = uniqid();
                $nameInDirectory = $directory . $newFileName . '.' . $imageFileType;
                $nameInDB = $newFileName . '.' . $imageFileType;
                move_uploaded_file($_FILES["restaurant_image_url"]["tmp_name"], $nameInDirectory);

                // $user = accountExist($email); // Assuming this is the line you commented out intentionally

                // Assuming accountExist and create_restaurant functions are defined in restaurant.process.php
                // if (count($user) == 0) { // Commented out for now assuming accountExist is not defined
                $is_created = create_restaurant($res_name, $res_address, $nameInDB, $region, $owner_name);
                if ($is_created) {
                    header("location: /restaurant_admin");
                    exit; // Terminate script execution after redirection
                }
                // }
            }
        } else {
              echo "yes";
            // Terminate script execution after redirection
        }
    } else {
        echo "no";
    }
}
?>