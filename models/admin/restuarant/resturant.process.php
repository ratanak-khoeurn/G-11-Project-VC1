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
        ':restaurant_owner_name' => $owner_name,
        
    ]);
    return $statement->rowCount() > 0;
}
  
