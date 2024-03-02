<?php
    require "../../../database/database.php";
    require "../../../models/add.user/add.user.model.php";
    $id = $_GET['id'];
    $pcture = $_GET['image'];
    delete_admin($id);
    delete_image_admin($pcture);
    header('location:/deliverer_admin');
    exit;
?>