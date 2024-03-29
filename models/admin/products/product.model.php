<?php
if (!function_exists('get_product_data')) {
    function get_product_data(string $product_img, string $product_name, int $res_id, string $category_name, float $price, int $discount): bool
    {
        global $connection;
        $statement = $connection->prepare("INSERT INTO products (product_img, product_name, res_id, category_name, price, discount) VALUES (:product_img, :product_name, :res_id, :category_name, :price, :discount)");
        $statement->execute([
            ":product_img" => $product_img,
            ":product_name" => $product_name,
            ":res_id" => $res_id,
            ":category_name" => $category_name,
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
if (!function_exists('get_name')) {
    function get_name(int $id): string
    {
        global $connection;
        $statement = $connection->prepare("SELECT r.name
            FROM restaurants r
            JOIN products p ON r.id = p.res_id
            WHERE r.id = :id");
        $statement->execute([':id' => $id]);
        $result = $statement->fetch(PDO::FETCH_ASSOC); // Fetch a single row
        if ($result === false) {
            return "No restaurant found"; // Handle case where no restaurant is found
        }
        return $result['name']; // Return the restaurant name
    }
}

if (!function_exists('get_product_base_name')) {
    function get_product_base_name(int $id): array
    {
        global $connection; // Assuming $connection is your database connection

        $statement = $connection->prepare("
            SELECT p.*
            FROM products p
            INNER JOIN restaurants r ON p.res_id = r.id
            WHERE r.manager_id = :id");

        $statement->execute([
            'id' => $id,
        ]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}

if (!function_exists('get_restaurant')) {
    function get_restaurant(): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT id ,name FROM restaurants");
        $statement->execute();
        return $statement->fetchAll();
    }
}
if (!function_exists('get_category')) {
    function get_category(): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT id, name FROM category");
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
    function update_product(string $name, string $picture, string $restaurant_name, string $category_name, int $price, int $discount, int $id): bool
    {
        global $connection;
        $statement = $connection->prepare("UPDATE products SET product_name = :name, product_img = :image ,res_id = :res_id, category_name=:category_name, price=:price, discount=:discount WHERE id = :id");
        $statement->execute([
            ':name' => $name,
            ':image' => $picture,
            ':res_id' => $restaurant_name,
            ':category_name' => $category_name,
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
        $path_file = "../../../assets/images/products/" . $img;
        if (file_exists($path_file)) {
            unlink($path_file);
            echo $path_file;
        }
    }
}
if (!function_exists('select_product')) {
    function select_product(string $name): array
    {
        global $connection;
        $statement = $connection->prepare("select * from products where category_name = :name");
        $statement->execute([':name' => $name]);
        return $statement->fetchAll();
    }
}
