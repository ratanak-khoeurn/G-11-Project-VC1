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
if (!function_exists('get_favourites')) {
    function get_favourites(): array
    {
        global $connection;
        try {
            $statement = $connection->prepare("SELECT * FROM restaurants WHERE res_id IN (SELECT res_id FROM favorites)");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle database error
            // For example, you can log the error or return an empty array
            error_log("Database error: " . $e->getMessage());
            return [];
        }
    }
}


?>

