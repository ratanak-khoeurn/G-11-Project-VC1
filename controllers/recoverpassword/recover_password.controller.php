<?php
session_start();
require_once("../../database/database.php");
require "../../models/signin.model.php";
$errors = [];

// Assuming $connection is defined in signin.model.php
if (!isset($connection)) {
    require '../../views/errors/404.php';
    die();
}
echo $_SESSION['pin_code'];
$email = getEmailByPinCode($_SESSION['pin_code']);
var_dump($email);
if (!$email) {
    session_destroy();
    header("Location: controllers/signin/check_singin_user.controller.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    strlen($_POST['new-password']) > 0 ? "" : $errors['new_password'] = "Please enter a password with at least 8 characters.";
    $_POST['new-password'] == $_POST['confirm-password'] ? "" : $errors['confirm_password'] = "Passwords do not match.";

    if (empty($errors)) {
        // No encryption needed, save password directly
        updateNewPassword($email['email'], $_POST['new-password']);
        setPinCodeByEmail($email['email'], null);
        session_destroy();
        header("Location: controllers/signin/check_singin_user.controller.php");
    }
}

require "../../views/recoverpassword/recover_password.php";
