<?php
if (!function_exists('get_product_one')) {
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
}
if (!function_exists('get_product')) {
    function get_product(): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM products");
        $statement->execute();
        return $statement->fetchAll();
    }
}

if (!function_exists('delete_product')) {
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
}
if (!function_exists('get_product_one')) {
    function get_product_one(int $id): array
    {
        global $connection;
        $statement = $connection->prepare("select * from products where id = :id");
        $statement->execute([':id' => $id]);
        return $statement->fetch();
    }
}

if (!function_exists('update_product')) {
    function update_product(string $name, string $picture, string $restaurant_name, int $price, int $discount, int $id): bool
    {
        global $connection;
        $statement = $connection->prepare("UPDATE products SET product_name = :name, product_img = :image ,restaurant_name = :restaurant_name,price=:price,discount=:discount WHERE id = :id");
        $statement->execute([
            ':name' => $name,
            ':image' => $picture,
            ':restaurant_name' => $restaurant_name,
            ':price' => $price,
            ':discount' => $discount,
            ':id' => $id
        ]);

        return $statement->rowCount() > 0;
    }
}
if (!function_exists('delete_image_product')) {
    function delete_image_product($img)
    {
        $path_file = "../../../assets/images/products/".$img;
        if (file_exists($path_file)) {
            unlink($path_file);
            echo $path_file;
        }
    }
}