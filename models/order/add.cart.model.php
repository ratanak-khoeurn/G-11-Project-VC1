<?php
if (!function_exists('get_order')) {
    function get_order(): array
    {
        global $connection;
        $statement = $connection->prepare("
    SELECT 
        orders.order_id, 
        products.product_img AS product_image, 
        products.product_name AS product_name, 
        products.price AS product_price, 
        products.discount AS product_discount, 
        restaurants.delivery AS restaurant_delivery 
    FROM 
        orders 
    INNER JOIN 
        products ON orders.product_id = products.id 
    INNER JOIN 
        restaurants ON orders.res_id = restaurants.id
");

        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}


if (!function_exists('add_to_cart')) {
    function add_to_cart(int $user_id, int $res_id, int $product_id): bool
    {
        global $connection;
        $statement = $connection->prepare("INSERT INTO orders (res_id,product_id,user_id) VALUES (:user_id, :res_id, :product_id)");

        return $statement->execute([
            ":user_id" => $user_id,
            ":res_id" => $res_id,
            ":product_id" => $product_id,
        ]);
    }
}

if (!function_exists('count_order')) {
    function count_order(): int
    {
        global $connection;

        // Prepare the SQL statement to count the number of rows in the orders table
        $statement = $connection->prepare("SELECT COUNT(*) AS order_count FROM orders");

        // Execute the SQL statement
        $statement->execute();

        // Fetch the result (count) directly from the statement and return it
        return (int) $statement->fetchColumn();
    }
}
