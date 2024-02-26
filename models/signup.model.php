<?php

function signUp(string $first_name,string $last_name, string $email, string $password) : bool
{
    global $connection;

    $statement = $connection->prepare("insert into users (first_name,last_name, email, password, role) values (:first_name,:last_name, :email, :password, :role)");
    $statement->execute([
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':email' => $email,
        ':password' => $password,
        ':role' => 'user',

    ]);
    // return true if the user is created successfully.
    return $statement->rowCount() > 0;
    
}
function sign_up_admin(string $first_name,string $last_name, string $email, string $password ,string $profile) : bool
{
    global $connection;

    $statement = $connection->prepare("insert into users (first_name,last_name, email, password, role,picture) values (:first_name,:last_name, :email, :password, :role,:picture)");
    $statement->execute([
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':email' => $email,
        ':password' => $password,
        ':role' => 'admin',
        ':picture' => $profile

    ]);
    // return true if the user is created successfully.
    return $statement->rowCount() > 0;
    
}
