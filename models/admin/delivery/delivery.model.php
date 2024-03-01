<?php
function get_delivery_to_show(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE role = 'delivery'");
    $statement->execute();
    return $statement->fetchAll();
}