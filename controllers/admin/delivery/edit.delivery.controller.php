<?php
require "../../../database/database.php";
require "../../../models/add.user/add.user.model.php";

$id = $_GET['id'];
$delivery = get_user_one( $id );
require '../../../views/admin/delivery/edit.from.delivery.view.php';