<?php
function create_category(string $name, string $picture):bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO categories ( category_name, picture) 
    VALUES (:category_name, :picture)");
    $statement->execute([
        ':category_name'=> $name,
        ':picture'=> $picture,
    ]);
    return $statement->rowCount() > 0;
}

function get_category():array
{
    global $connection;
    $categories = $connection->prepare("SELECT * FROM categories ");
    $categories->execute();
    return $categories->fetchAll();
}