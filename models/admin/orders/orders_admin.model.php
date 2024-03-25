<?php
require "database/database.php";
require "models/admin/products/product.model.php";

function add_order_to_database($customer_img, $customer_name, $address, $phone, $order_id) {
    global $connection;

    $statement = $connection->prepare("INSERT INTO orders (customer_img, customer_name, address,phone, order_id) VALUES (:customer_img,:customer_name, :address, :phone, :order_id)");
    $statement->execute([
        ':customer_img' => $customer_img,
        ':customer_name' => $customer_name,
        ':address' => $address,
        ':phone' => $phone,
        ':order_id' => $order_id
    ]);
    if ($statement->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

if (isset($_SESSION['orders']) && !empty($_SESSION['orders'])) {
    foreach ($_SESSION['orders'] as $order) {
        $customer_img = $order[0]['customer_img'];
        $customer_name = $order[0]['customer_name'];
        $address = $order[0]['address'];
        $phone = $order[0]['phone'];
        $order_id = $order[0]['order_id'];
    }
    add_order_to_database($customer_img, $customer_name, $address, $phone, $order_id);
}
?>
