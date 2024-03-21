<?php

// Check if the functions are not already defined before declaring them
if (!function_exists('create_category')) {
    function create_category(string $name, string $picture): bool
    {
        global $connection;
        $statement = $connection->prepare("INSERT INTO category ( name, image) 
        VALUES (:category_name, :picture)");
        $statement->execute([
            ':name' => $name,
            ':image' => $picture
        ]);
        return $statement->rowCount() > 0;
    }
}

if (!function_exists('get_category')) {
    function get_category(): array
    {
        global $connection;
        $categories = $connection->prepare("SELECT * FROM category ");
        $categories->execute();
        return $categories->fetchAll();
    }
}
if (!function_exists('count_product')) {
    function count_product(): array
    {
        global $connection;
        $categories = $connection->prepare("SELECT * FROM category ");
        $categories->execute();
        return $categories->fetchAll();
    }
}

if (!function_exists('get_cate')) {
    function get_cate(int $id): array
    {
        global $connection;
        $statement = $connection->prepare("select * from category where id = :id");
        $statement->execute([':id' => $id]);
        return $statement->fetch(); 
    }
}

if (!function_exists('update_category')) {
    function update_category(string $name, string $picture, int $id): bool
    {
        global $connection;
        $statement = $connection->prepare("UPDATE category SET name = :name, image = :image WHERE id = :id");
        $statement->execute([
            ':name' => $name,
            ':image' => $picture,
            ':id' => $id
        ]);

        return $statement->rowCount() > 0;
    }
}

if (!function_exists('delete_category')) {
    function delete_category(int $id): bool
    {
        global $connection;
        $statement = $connection->prepare(" delete from categories WHERE category_id = :id");
        $statement->execute([
            ':id' => $id
        ]);

        return $statement->rowCount() > 0;
    }
}
if (!function_exists('delete_image_folder')) {
    function delete_image_folder($img)
    {
        $path_file = "../../../assets/images/categories/".$img;
        if (file_exists($path_file)) {
            unlink($path_file);
            echo $path_file;
        }
    }
}

?>