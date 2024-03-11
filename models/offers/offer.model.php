<?php
require "database/database.php";

function get_product_offer(): array {
    global $connection;
    $statement = $connection->prepare("SELECT * FROM products WHERE discount != 0");
    $statement->execute();
    $products = $statement->fetchAll();
    return $products;
}

