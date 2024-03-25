<?php
    session_start();
   require "../../database/database.php";
   require "../../models/order/add.cart.model.php";
    $id =  $_SESSION['id'];
    deliver_action($id);
    header('location:/deliver_new_order');