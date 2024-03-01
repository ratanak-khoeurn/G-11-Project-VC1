<?php
function add_user(string $first_name, string $last_name, string $email, string $password, string $role, string $phone, string $profile): bool
{
    global $connection;

    $statement = $connection->prepare("insert into users (first_name,last_name, email, password, role, phone,picture) values (:first_name,:last_name, :email, :password,:role,:phone,:picture)");
    $statement->execute([
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':email' => $email,
        ':password' => $password,
        ':role' => $role,
        ':phone' => $phone,
        ':picture' => $profile
    ]);
    // return true if the user is created successfully.
    return $statement->rowCount() > 0;
}
function get_admin_to_show(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE role = 'admin'");
    $statement->execute();
    return $statement->fetchAll();
}
