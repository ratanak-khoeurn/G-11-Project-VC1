<?php

if (!function_exists('add_favorites')) {
    function add_favorites(int $user_id ,int $res_id): bool
    {
        global $connection;
        $statement = $connection->prepare("INSERT INTO favorites (user_id, res_id) VALUES (:user_id, :res_id)");
        $statement->execute([
            ':user_id' => $user_id,
            ':res_id' => $res_id
        ]);
        return $statement->rowCount() > 0;
    }
}

if (!function_exists('get_data_restaurants')) {
    function get_data_restaurants(): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM restaurants");
        $statement->execute();
        return $statement->fetchAll();
    }
}

if (!function_exists('get_user_favorite')) {
    function get_user_favorite(string $email): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT user_id FROM  users WHERE email = :email");
        $statement->execute([
            ':email'=>$email
        ]);
        return $statement->fetchAll();
    }
}
?>

