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