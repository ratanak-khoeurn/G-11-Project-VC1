<?php
require "../../database/database.php";
require "../../views/admin/forgot_password.php";

$email = $_POST['email'];
$token = bin2hex(random_bytes(16));
$token_hash = hash("sha256", $token);
$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

global $connection;
$statement = $connection->prepare("UPDATE users SET reset_token_hash=?, reset_token_expire_at=? WHERE email=?");
// Assuming reset_token_hash and reset_token_expire_at are strings, and email is also a string
$statement->bindParam(1, $token_hash, PDO::PARAM_STR);
$statement->bindParam(2, $expiry, PDO::PARAM_STR);
$statement->bindParam(3, $email, PDO::PARAM_STR);
$statement->execute();
// No need to fetch data since UPDATE queries don't return rows

if ($statement->rowCount() > 0){
    
}