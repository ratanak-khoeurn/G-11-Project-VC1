<?php
require "../../../database/database.php";
require "../../../models/add.user/add.user.model.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $phone = $_POST['phone'];
    $profile = $_FILES['profile'];

    $uploadDir = '../../../assets/images/user/';
    $uploadFile = $uploadDir . basename($profile['name']);
    if (
        $profile['size'] < 50000 && in_array($profile["type"], array("png", "jpeg", "jpg"))
    ) {
        echo "no";
    } else {
        move_uploaded_file($profile['tmp_name'], $uploadFile);
        $created = add_user($first_name, $last_name, $email, $password, $role, $phone, $profile['name']);
        if ($created) {
            folder_after($role);

        }
    }
}
