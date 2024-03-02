<?php
if (!function_exists('add_user')) {
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
}
if (!function_exists('get_admin_to_show')) {
    function get_admin_to_show(): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM users WHERE role = 'admin'");
        $statement->execute();
        return $statement->fetchAll();
    }
}
if (!function_exists("get_manager_to_show")) {
    function get_manager_to_show(): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM users WHERE role = 'restaurant_owner'");
        $statement->execute();
        return $statement->fetchAll();
    }
}
if (!function_exists("delete_admin")) {
    function delete_admin(int $id): bool
    {
        global $connection;
        $statement = $connection->prepare(" delete from users WHERE user_id = :id");
        $statement->execute([
            ':id' => $id
        ]);

        return $statement->rowCount() > 0;
    }
}
if (!function_exists('delete_image_admin')) {
    function delete_image_admin($img)
    {
        $path_file = "../../../assets/images/user/" . $img;
        if (file_exists($path_file)) {
            unlink($path_file);
            echo $path_file;
        }
    }
}
if (!function_exists("get_customer_to_show")) {
    function get_customer_to_show(): array
    {
        global $connection;
        $statement = $connection->prepare("SELECT * FROM users WHERE role = 'user'");
        $statement->execute();
        return $statement->fetchAll();
    }
}
if (!function_exists("delete_user")) {
    function delete_user(int $id): bool
    {
        global $connection;
        $statement = $connection->prepare(" delete from users WHERE user_id = :id");
        $statement->execute([
            ':id' => $id
        ]);

        return $statement->rowCount() > 0;
    }
}
if (!function_exists('delete_image_user')) {
    function delete_image_user($img)
    {
        $path_file = "../../../assets/images/user/" . $img;
        if (file_exists($path_file)) {
            unlink($path_file);
            echo $path_file;
        }
    }
}
if (!function_exists("folder_after")) {
    function folder_after($role)
    {
        if ($role == "admin") {
            header(('location:/add_admin'));
        } elseif ($role == 'delivery') {
            header('location:/deliverer_admin');
        } else {
            header('location:/manager_admin');
        }
    }
}
if (!function_exists("get_user_one")) {
      function get_user_one(int $id): array
    {
        global $connection;
        $statement = $connection->prepare("select * from users where user_id = :id");
        $statement->execute([':id' => $id]);
        return $statement->fetch();
    }
}
if (!function_exists('update_user')) {
    function update_user(string $first_name, string $last_name, string $email, string $password, string $role,string $picture,string $phone, int $id): bool
    {
        global $connection;
        $statement = $connection->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name ,email = :email, password=:password,role=:role ,picture =:picture,phone=:phone  WHERE user_id = :id");
        $statement->execute([
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':email' => $email,
            ':password' => $password,
            ':role' => $role,
            ':picture' => $picture,
            ':phone' => $phone,
            ':id' => $id
        ]);

        return $statement->rowCount() > 0;
    }
}