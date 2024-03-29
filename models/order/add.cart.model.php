
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
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return (int)$result['delivery'];
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
if (!function_exists('accept_order_admin')) {
    function accept_order_admin(): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM orders WHERE  to_pay = 'true' and action ='0'");
        $statement->execute();
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
if (!function_exists('inprogress_admin')) {
    function inprogress_admin(): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM orders WHERE  to_pay = 'true' and action ='1'");
        $statement->execute();
        return $statement->fetchAll();
    }
}
if (!function_exists('inprogress_customer')) {
    function inprogress_customer(int $id): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM orders WHERE  action ='0' or action = '1' and  user_id= :id");
        $statement->execute([
            ':id'=> $id
        ]);
        return $statement->fetchAll();
    }
}
if (!function_exists('accept_order_admin')) {
    function accept_order_admin(): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM orders WHERE res_id where to_pay = 'true' and action ='1'");
        $statement->execute();
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
if (!function_exists('done_admin')) {
    function done_admin(): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM orders where action = '1' ");
        $statement->execute();
        return $statement->fetchAll();
    }
}

if (!function_exists('get_deliveries')) {
    function get_deliveries(): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM orders WHERE res_id IN (SELECT id FROM restaurants WHERE manager_id = :manager_id) AND to_pay = 'true' and action ='2'");
        $statement->execute();
        return $statement->fetchAll();
    }
}
if (!function_exists('count_delivery_order')) {
    function count_delivery_order(): int
    {
        global $connection;
        $statement = $connection->prepare("SELECT COUNT(*) FROM orders WHERE to_pay = 'true' AND action = '1'");
        $statement->execute();
        return $statement->fetchColumn();
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

if (!function_exists('count_restaurants')) {
    function count_restaurants(): int
    {
        global $connection;
        $statement = $connection->prepare("SELECT COUNT(DISTINCT id) FROM restaurants");
        $statement->execute();
        return (int) $statement->fetchColumn();
    }
}
if (!function_exists('count_category')) {
    function count_category(): int
    {
        global $connection;
        $statement = $connection->prepare("SELECT COUNT(DISTINCT id) FROM category");
        $statement->execute();
        return (int) $statement->fetchColumn();
    }
}

if (!function_exists('count_product')) {
    function count_product(): int
    {
        global $connection;
        $statement = $connection->prepare("SELECT COUNT(DISTINCT id) FROM products");
        $statement->execute();
        return (int) $statement->fetchColumn();
    }
}

if (!function_exists('count_order')) {
    function count_order(): int
    {
        global $connection;
        $statement = $connection->prepare("SELECT COUNT(DISTINCT order_id) FROM orders");
        $statement->execute();
        return (int) $statement->fetchColumn();
    }
}
if (!function_exists('restaurant')) {
    function restaurant(): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT * from restaurants");
        $statement->execute();
        return  $statement->fetchAll();
    }
}
if (!function_exists('product_name')) {
    function product_name(int $id): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT products.product_name
                                           FROM products 
                                           INNER JOIN orders 
                                           ON products.id = orders.product_id 
                                           WHERE orders.user_id = :id");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
if (!function_exists('product_name')) {
    function product_name($user_id): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT products.name AS product_name,
                                                    orders.quantity
                                           FROM orders
                                           INNER JOIN products
                                           ON orders.product_id = products.id
                                           WHERE orders.user_id = :id");
        $statement->bindParam(':id', $user_id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
















