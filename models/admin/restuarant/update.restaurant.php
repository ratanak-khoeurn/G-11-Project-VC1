<?php

if (!function_exists('update_restaurant')) {
    function update_restaurant(int $id, string $name, string $image, int $manager_id, string $location, string $delivery): bool
    {
        global $connection;
        $statement = $connection->prepare("UPDATE restaurants SET name = :name, image = :image, manager_id = :manager_id, delivery = :delivery, location = :location WHERE id = :id");
        $statement->execute([
            ':id' => $id,
            ':name' => $name,
            ':image' => $image,
            ':manager_id' => $manager_id,
            ':delivery' => $delivery,
            ':location' => $location
        ]);

        return $statement->rowCount() > 0;
    }
}
if (!function_exists('get_manager')) {
    function get_manager(): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT user_id, first_name from users where role == 'restaurant_owner'");
        $statement->execute();

        return $statement->fetchAll();
    }
}
?>
