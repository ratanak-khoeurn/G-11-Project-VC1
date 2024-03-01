<?php
if (!function_exists('create_restaurant')) {
    function create_restaurant(string $res_name, string $res_address, string $res_image, string $region, string  $owner_name): bool
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
}
if (!function_exists('get_restaurant')) {
    function get_restaurant(): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM restaurants"); // Fixed typo in table name
        $statement->execute();
        return $statement->fetchAll();
    }
}
if (!function_exists('delete_restaurant')) {
    function delete_restaurant(int $id): bool
    {
        global $connection;
        $statement = $connection->prepare(" delete from restaurants WHERE res_id = :id");
        $statement->execute([
            ':id' => $id
        ]);

        return $statement->rowCount() > 0;
    }
}
if (!function_exists('get_restaurant_one')) {
    function get_restaurant_one(int $id): array
    {
        global $connection;
        $statement = $connection->prepare("select * from restaurants where res_id = :id");
        $statement->execute([':id' => $id]);
        return $statement->fetch();
    }
}

if (!function_exists('update_restaurant')) {
    function update_restaurant(string $name, string $address, string $image, string $region, string $owner, int $id): bool
    {
        global $connection;
        $statement = $connection->prepare("UPDATE restaurants SET res_name = :name,res_address = :address, restaurant_image_url = :image ,region = :region ,restaurant_owner_name = :owner WHERE res_id = :id");
        $statement->execute([
            ':name' => $name,
            ':address' => $address,
            ':image' => $image,
            ':region' => $region,
            ':owner' => $owner,
            ':id' => $id
        ]);

        return $statement->rowCount() > 0;
    }
}
if (!function_exists('delete_image_restaurant')) {
    function delete_image_restaurant($img)
    {
        $path_file = "../../../assets/images/restaurant/" . $img;
        if (file_exists($path_file)) {
            unlink($path_file);
            echo $path_file;
        }
    }
}
