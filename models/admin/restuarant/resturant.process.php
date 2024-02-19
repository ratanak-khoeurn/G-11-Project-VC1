<?php
function signUp(string $res_name, string $res_address ,string $res_image, $res_owner ) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into users (res_name, res_address, res_image, res_owner) values(:name,  :email, :password, :image)");
    $statement->execute([
        ':res_name' => $res_name,
        ':res_address'=> $res_address,
        ':res_image'=> $res_image,
        ''
        
    ]);
    return $statement->rowCount() > 0;
}