<?php
session_start();
if (isset($_GET['action']) && $_GET['action'] === 'remove') {
    if (isset($_GET['id'])) {
        $removeId = $_GET['id'];
        echo $removeId;
        foreach ($_SESSION['order'] as $index => $order) {
            if ($order[0]['id'] == $removeId) {
                unset($_SESSION['order'][$index]);
            }
        }
    } else {
        echo 'ID is not set'; 
    }
    header('Location: /checkout');
    exit; 
}
?>
