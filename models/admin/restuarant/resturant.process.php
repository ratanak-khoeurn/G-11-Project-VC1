<?php
function signUp(string $res_name, string $res_address ,string $res_image,string $region, $res_owner ) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into users (res_name, res_address, res_image,res_region,res_owner) values(:name,  :address,:image ,:region,:owner)");
    $statement->execute([
        ':name' => $res_name,
        ':address'=> $res_address,
        ':image'=> $res_image,
        ':region' => $region,
        ':owner' => $res_owner
        
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
