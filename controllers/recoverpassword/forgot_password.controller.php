<?php 
session_start();
require "../../database/database.php";
require "../../models/signin.model.php";
// session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    empty($_POST['email'])? $errorEmail = "Please enter your email address." : "";

    if (! isset($errorEmail)) {
        getUser($_POST['email']) ? "" : $errorEmail = "Your email address is not valid.";

        if (getUser($_POST['email'])) {
            $email = $_POST['email'];
            $pinCode =  random_int(100000, 999999);
            setPinCodeByEmail($email, $pinCode);
            $_SESSION['email_reset'] = $email;

            require "../../controllers/recoverpassword/send_mail.php";

            header("location: /code_security");
        }
    }
}

require "../../views/recoverpassword/forgot_password.php";