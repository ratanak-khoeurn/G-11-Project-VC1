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
function get_product_one(int $id): array
{
    global $connection;
    $statement = $connection->prepare("select * from products where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

function update_product(string $name, string $picture, int $id): bool
{
    global $connection;
    $statement = $connection->prepare("UPDATE categories SET category_name = :name, picture = :image WHERE category_id = :id");
    $statement->execute([
        ':name' => $name,
        ':image' => $picture,
        ':id' => $id
    ]);

    return $statement->rowCount() > 0;
}
