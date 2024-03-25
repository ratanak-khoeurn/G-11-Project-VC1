<?php
// Include necessary files
require "../../database/database.php";
require "../../models/order/add.cart.model.php";

// Start the session
session_start();

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assuming user_id is stored in the session
    $user_id = $_SESSION['user']['user_id']; 

    
    // Retrieve orders from session
    $orders = $_SESSION['order'];
    
    // Retrieve quantity data from the form
    $quantities = $_POST['quantity'];
    $total = $_POST['total_prices'];
    $action = '0';
    
    // Process each order in the session data
    foreach ($orders as $index => $order) {
        // Extract order details
        $productId = $order[0]['id'];
        $res_id = $order[0]['res_id'];
        $quantity = $quantities[$index]; 
        $totalPrice = $order[0]['price'] * $quantity;
        
        // Add the order to the database
        add_orders($res_id, $user_id, $productId, $quantity, $totalPrice,$action,$total);
    }
    $_SESSION['order'] = null;
    header("location: /place_order");
}
?>

