<?php
if (!function_exists('get_product_manager')) {
    function product_data($product_img, $product_name, $restaurant_name, $price, $discount): bool
    {
        global $connection;
        $statement = $connection->prepare("INSERT INTO products(product_img, product_name, restaurant_name, price, discount) VALUES (:product_img, :product_name, :restaurant_name, :price, :discount)");
        $statement->execute([
            ":product_img" => $product_img,
            ":product_name" => $product_name,
            ":restaurant_name" => $restaurant_name,
            ":price" => $price,
            ":discount" => $discount
        ]);
        return $statement->rowCount() > 0;
    }
}
if (!function_exists('get_products')) {
    function get_products(): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM products");
        $statement->execute();
        return $statement->fetchAll();
    }
}
?>