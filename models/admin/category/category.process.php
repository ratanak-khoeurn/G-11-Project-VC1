<?php
function create_category(string $name, string $picture): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO categories ( category_name, picture) 
    VALUES (:category_name, :picture)");
    $statement->execute([
        ':category_name' => $name,
        ':picture' => $picture,
    ]);
    return $statement->rowCount() > 0;
}

function get_category(): array
{
    global $connection;
    $categories = $connection->prepare("SELECT * FROM categories ");
    $categories->execute();
    return $categories->fetchAll();
}

function get_cate(int $id) : array
{
    global $connection;
    $statement = $connection->prepare("select * from categories where category_id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}
function update_category(string $name, string $picture, int $id) : bool
{
    global $connection;
    $statement = $connection->prepare(" UPDATE categories SET category_name = :name, picture = :image WHERE id = :id");
    $statement->execute([
        ':name' => $name,
        ':image' => $picture,
        ':id' => $id
    ]);

    return $statement->rowCount() > 0;
}
