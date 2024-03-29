<?php
// session_start();
require "../../database/database.php";
require "../../models/order/add.cart.model.php";

session_start(); // Start the session to store validation errors

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array();
    
    // Validate card number
    if (isset($_POST['card']) && $_POST['card'] == 'cards') {
        $cardNumber = $_POST['card_number'];
        echo $cardNumber;
        if (!isValidCardNumber($cardNumber)) {
            $errors['card_number'] = 'Invalid card number';
        }

        // Validate card expiry
        $expiry = $_POST['date_number'];
        if (!isValidExpiry($expiry)) {
            $errors['expiry'] = 'Invalid expiry date';
        }

        // Validate card CVV
        $cvc = $_POST['cvc_number'];
        if (!isValidCVV($cvc)) {
            $errors['cvc'] = 'Invalid CVV';
        }

        if (count($errors) > 0) {
            $_SESSION['errors'] = $errors;
            header("Location: /place_order");
            exit();
        }
    } else {
        $phone =  $_POST['phone'];
        $address =  $_POST['address'];
        $id = $_SESSION['user']['user_id'];
        if ($_POST['payment_method'] == 'cash_on_delivery') {

            update_order($address,$phone,$id);
            header('location:/order');
            exit();
            echo 'yes';
        } else {
            echo $id;
            update_order($address,$phone,$id);
            header('location:/order');
            exit();
        }
    }
}

function isValidCardNumber($cardNumber)
{
    return preg_match('/^\d{16}$/', $cardNumber);
}

function isValidExpiry($expiry)
{
    return preg_match('/^\d{2}\/\d{2}$/', $expiry);
}

function isValidCVV($cvc)
{
    return preg_match('/^\d{3}$/', $cvc);
}

if (isset($_GET['action'])) {
    get_accept($_SESSION['manager']['user_id']);
    // header('location:/order');
    $_SESSION['action'] = 'accept';
}

if (isset($_POST['custom_button'])) {
    // Redirect the user to a different page
    header('Location: /desired_page.php');
    exit();
}

// header('location: /order');
