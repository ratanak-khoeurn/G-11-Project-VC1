<?php
require "../../database/database.php";
function get_order(int $id):array
{
    global $connection;
    $statement= $connection->prepare("select * from products where id =:id");
    $statement->execute([
        ':id' => $id
    ]);
    return $statement->fetchAll();
}

// function add_order(int $){
//     global $connection;
//     $statement = $connection->prepare("insert into orders (")

// }