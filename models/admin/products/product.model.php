<?php
function get_product_data(string $product_img, string $product_name, string $restaurant_name, int $price, int $discount): bool
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
function get_product(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM products");
    $statement->execute();
    return $statement->fetchAll();
}



function delete_product($product_id): bool
{
    global $connection;
    $query = "DELETE FROM products WHERE id = :id";
    $statement = $connection->prepare($query);
    $statement->execute([
        ':id' => $product_id
    ]);
    return $statement->rowCount() > 0;
}