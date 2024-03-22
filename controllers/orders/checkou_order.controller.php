<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    echo $_POST['total_prices'];
    echo $_POST['quantity'];
    echo $_POST['id'];
}