<?php
session_start();
require "../../database/database.php";
require "../../models/signin.model.php";
$email = getEmailByPinCode($_SESSION['pin_code']);
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    echo $_POST['new_password'];
    strlen($_POST['new_password']) > 0 ? "" : $errors['new_password'] = "Please enter a password with at least 8 characters.";
    $_POST['new_password'] == $_POST['confirm_password'] ? "" : $errors['confirm_password'] = "Passwords do not match.";
}
if (empty($errors)) {
    // No encryption needed, save password directly
    updateNewPassword($email['email'], $_POST['new_password']);
    setPinCodeByEmail($email['email'], null);
    session_destroy();
    header("Location: /signin");
}

?>