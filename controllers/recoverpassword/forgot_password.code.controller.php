<?php 
session_start();
require "models/signin.model.php";
if (! isset($_SESSION['email_reset'])) {
    require 'views/errors/404.php';
    echo $_SESSION['email_reset'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    empty($_POST['pin-code'])? $errorCode = "Please enter PIN CODE" : "";
    if (! empty($_POST['pin-code'])) {
        $code = getPinCodeByEmail($_SESSION['email_reset'])['pin_code'];
        ($code == $_POST['pin-code']) ? "" : $errorCode = "PIN CODE is incorrect";

        if ($code == $_POST['pin-code']) {
            $_SESSION['pin_code'] = $code;
            header("location: /recover_password");
        }
    }
}

require "views/recoverpassword/forgot_password.code.php";