<!-- 
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
} -->

<?php
if (!function_exists('get_order')) {

    function get_order(int $id): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM products WHERE id = :id");
        $statement->execute([
            ':id' => $id
        ]);
        return $statement->fetchAll();
    }
}
if (!function_exists('get_delivery')) {
    function get_delivery(int $id): int
    {
        global $connection;
        $statement = $connection->prepare("SELECT delivery FROM restaurants WHERE id = :id");
        $statement->execute([
            ':id' => $id
        ]);
        $result = $statement->fetch(PDO::FETCH_ASSOC); // Fetch as associative array
        return $result['delivery']; // Return the delivery fee
    }
}

if (!function_exists('add_orders')) {
    function add_orders(int $res_id,int $user_id,int $productId,int $quantity,string $totalPrice,string $action, string $total): bool
    {
        global $connection;
        $statement = $connection->prepare("INSERT INTO orders (res_id, product_id, user_id, quantity,total_price,action,alls,to_pay) VALUES (:res_id, :product_id, :user_id, :quantity, :total_price,:action,:alls,:pay)");
        $statement->execute([
            ':res_id' => $res_id,
            ':product_id' => $productId,
            ':user_id' => $user_id,
            ':quantity' => $quantity,
            ':total_price' => $totalPrice,
            ':action' => $action,
            ':alls' => $total,
            ':pay'=> 'false'
        ]);
        return $statement->rowCount() > 0;
    }
}
if (!function_exists('update_order')) {
    function update_order(string $location, string $phone, int $user_id): bool
    {
        global $connection;
        $statement = $connection->prepare("UPDATE orders SET location = :location, phone = :phone , to_pay = :pay WHERE user_id = :user_id AND action = '0'");
        $statement->execute([
            ':location' => $location,
            ':phone' => $phone,
            'pay'=> 'true',
            ':user_id' => $user_id,
        ]);
        return $statement->rowCount() > 0;
    }
}

if (!function_exists('accept_order')) {
    function accept_order(int $manager_id): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM orders WHERE res_id IN (SELECT id FROM restaurants WHERE manager_id = :manager_id) AND to_pay = 'true' and action ='0'");
        $statement->execute([
            ':manager_id' => $manager_id,
        ]);
        return $statement->fetchAll();
    }
}

if (!function_exists('get_accept')) {
    function get_accept(int $manager_id): array
    {
        global $connection;
        $statement = $connection->prepare("UPDATE orders SET action = :action WHERE res_id IN (SELECT id FROM restaurants WHERE manager_id = :user_id) AND action='0'");
        $statement->execute([
            ':action'=> '1',
            ':user_id' => $manager_id,
        ]);
        return $statement->fetchAll();
    }
}

if (!function_exists('inprogress')) {
    function inprogress(int $manager_id): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM orders WHERE res_id IN (SELECT id FROM restaurants WHERE manager_id = :manager_id) AND to_pay = 'true' and action ='1'");
        $statement->execute([
            ':manager_id' => $manager_id,
        ]);
        return $statement->fetchAll();
    }
}
if (!function_exists('done')) {
    function done(): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM orders where action = '1' ");
        $statement->execute();
        return $statement->fetchAll();
    }
}

if (!function_exists('get_delivery')) {
    function get_delivery(): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM orders WHERE res_id IN (SELECT id FROM restaurants WHERE manager_id = :manager_id) AND to_pay = 'true' and action ='2'");
        $statement->execute();
        return $statement->fetchAll();
    }
}

if (!function_exists('inprogress_delivery')) {
    function inprogress_delivery(int $deliver_id,int $id): array
    {
        global $connection;
        $statement = $connection->prepare("UPDATE orders SET delivery_id = :delivery_id WHERE order_id = :id");
        $statement->execute([
            ':delivery_id' => $deliver_id,
            ':id' => $id,
        ]);
        return $statement->fetchAll();
    }
}

if (!function_exists('get_done_delivery')) {
    function get_done_delivery(int $deliver_id): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM orders WHERE delivery_id = :id");
        $statement->execute([
            ':id'=> $deliver_id
        ]);
        return $statement->fetchAll();
    }
}
if (!function_exists('location_customer')) {
    function location_customer(int $order): array // Change return type to array
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM orders WHERE order_id = :id");
        $statement->execute([
            ':id'=> $order
        ]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
if (!function_exists('deliver_action')) {
    function deliver_action(int $order): bool // Change return type to bool for success/failure indication
    {
        global $connection;
        $statement = $connection->prepare("UPDATE orders SET action =:action , delivery_action = :deliver WHERE order_id = :id AND delivery_id IS NOT NULL");
        $success = $statement->execute([
            ':id'=> $order,
            ':action'=>'2',
            ':deliver' => 'done'
        ]);
        return $success;
    }
}

if (!function_exists('manager_done')) {
    function manager_done(int $manager_id): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM orders WHERE res_id IN (SELECT id FROM restaurants WHERE manager_id = :manager_id) AND to_pay = 'true' and action ='2'");
        $statement->execute([
            ':manager_id' => $manager_id,
        ]);
        return $statement->fetchAll();
    }
}









