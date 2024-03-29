<?php
if (!function_exists('create_restaurant')) {
    function create_restaurant(string $name, string $image, int $manager_id, string $delivery, string $location): bool {
        global $connection;

        $statement = $connection->prepare("INSERT INTO restaurants (name, image, manager_id, delivery, location) VALUES (:name, :image, :manager_id, :delivery, :location)");

        $result = $statement->execute([
            ":name" => $name,
            ":image" => $image,
            ":manager_id" => $manager_id,
            ":delivery" => $delivery,
            ":location" => $location,
        ]);

        return $result;
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
if (!function_exists('get_manager')) {
    function get_manager(): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT user_id,first_name , last_name FROM users WHERE role = 'restaurant_owner'"); // Fixed typo in table name
        $statement->execute();
        return $statement->fetchAll();
    }
}
if (!function_exists('delete_restaurant')) {
    function delete_restaurant(int $id): bool
    {
        global $connection;
        $statement = $connection->prepare(" delete from restaurants WHERE id = :id");
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
        $statement = $connection->prepare("select * from restaurants where id = :id");
        $statement->execute([':id' => $id]);
        return $statement->fetch();
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
if (!function_exists('get_logo_restaurant')) {
    function get_logo_restaurant(int $id):array
    {
        global $connection;
        $statement = $connection->prepare("SELECT r.name, r.image
        FROM restaurants AS r
        JOIN users AS u ON r.manager_id = u.user_id
        WHERE u.user_id = :id");
        $statement->execute([':id' => $id]);
        return $statement->fetch();
        
        }
    }

