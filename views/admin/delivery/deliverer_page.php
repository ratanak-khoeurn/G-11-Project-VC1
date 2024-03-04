<?php
require 'database/database.php';
require 'models/admin/delivery/delivery.model.php';
?>
<link rel="stylesheet" href="../../vendor/css/deliverer.css">
<script src="../../vendor/js/deliver.js" defer></script>
<div class="nav">
    <div class="main">
        <h1 class="title">DELIVERY LIST</h1>
        <input type="text" placeholder="Find Delivery Here..." style="background: #E21B70;">

    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Phone</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $delivery = get_delivery_to_show();
            foreach ($delivery as $index => $deliver) :
            ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $deliver['first_name'] ?></td>
                    <td><?= $deliver['last_name'] ?></td>
                    <td><?= $deliver['email'] ?></td>
                    <td><?= $deliver['password'] ?></td>
                    <td><?= $deliver['phone'] ?></td>
                    <td>
                        <img src="../../assets/images/user/<?= $deliver['picture'] ?>" alt="" style="width: 60px;height:60px;border-radius:5px;">
                    </td>
                    <td style="display:flex;justify-content:space-evenly;padding:30px 10px">
                        <a href="../../controllers/admin/delivery/edit.delivery.controller.php?id=<?=$deliver['user_id']?>&image=<?=$deliver['picture']?>&p=delivery"><img src="../../assets/images/icons/delete_admin.png" style="width: 30px;height:30px" alt=""></a>
                        <a href="../../controllers/admin/users/delete.delivery.controller.php?id=<?=$deliver['user_id']?>&image=<?=$deliver['picture']?>"><img src="../../assets/images/icons/del_admin.png" style="width: 30px;height:30px" alt=""></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>