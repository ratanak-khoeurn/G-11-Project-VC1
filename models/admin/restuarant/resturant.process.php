<?php
function create_restaurant(string $res_name, string $res_address ,string $res_image, string $region, string  $owner_name) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into restaurants (res_name,res_address,restaurant_image_url,region,restaurant_owner_name) 
    values(:res_name,:restaurant_address,:restaurant_image_url,:region,:restaurant_owner_name)");
    $statement->execute([
        ':res_name' => $res_name,
        ':restaurant_address' => $res_address,
        ':restaurant_image_url' => $res_image,
        ':region' => $region,
        ':restaurant_owner_name' => $owner_name
        
    ]);
    return $statement->rowCount() > 0;
}
function check_image($image){
    // File upload directory
    $target_dir = "assets/images/avatar/";
    $file_name = basename($image["name"]);
    $target_file_path = $target_dir . $file_name;
    $file_type = pathinfo($target_file_path, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg', 'jpeg', 'png');
    if (in_array($file_type, $allowTypes) && $image["size"] < 5000000) {
        if (!file_exists($target_file_path)) {
            move_uploaded_file($image['tmp_name'], $target_file_path);
        }
    }
}
