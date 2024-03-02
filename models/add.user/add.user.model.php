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
function get_manager_to_show(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE role = 'restaurant_owner'");
    $statement->execute();
    return $statement->fetchAll();
}

function delete_admin(int $id): bool
{
    global $connection;
    $statement = $connection->prepare(" delete from users WHERE user_id = :id");
    $statement->execute([
        ':id' => $id
    ]);

    return $statement->rowCount() > 0;
}
function delete_image_admin($img)
{
    $path_file = "../../../assets/images/user/" . $img;
    if (file_exists($path_file)) {
        unlink($path_file);
        echo $path_file;
    }
}

function get_customer_to_show(): array
{
    global $connection;
    $statement = $connection->prepare("SELECT * FROM users WHERE role = 'user'");
    $statement->execute();
    return $statement->fetchAll();
}
function delete_user(int $id): bool
{
    global $connection;
    $statement = $connection->prepare(" delete from users WHERE user_id = :id");
    $statement->execute([
        ':id' => $id
    ]);

    return $statement->rowCount() > 0;
}

function delete_image_user($img)
{
    $path_file = "../../../assets/images/user/" . $img;
    if (file_exists($path_file)) {
        unlink($path_file);
        echo $path_file;
    }
}
