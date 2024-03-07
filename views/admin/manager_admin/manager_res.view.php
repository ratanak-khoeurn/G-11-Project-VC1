<?php
require 'database/database.php';
require 'models/add.user/add.user.model.php';
?>
<link rel="stylesheet" href="../../vendor/css/manager.css">
<script src="../../vendor/js/manager.js" defer></script>
<div class="main">
    <div class="top">
        <h2>Restaurant's Manager</h2>
        <input type="text" placeholder="  Search Restaurant's Manager">
    </div>
    <hr>
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
            $managers = get_manager_to_show();
            foreach ($managers as $index => $manager) :
            ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $manager['first_name'] ?></td>
                    <td><?= $manager['last_name'] ?></td>
                    <td><?= $manager['email'] ?></td>
                    <td><?= $manager['password'] ?></td>
                    <td><?= $manager['phone'] ?></td>
                    <td>
                        <img src="../../assets/images/user/<?= $manager['picture'] ?>" alt="" style="width: 60px;height:60px;border-radius:5px;">
                    </td>
                    <td style="display:flex;justify-content:space-evenly;padding:30px 10px">
                        <a href="../../controllers/admin/delivery/edit.delivery.controller.php?id=<?=$manager['user_id']?>&p=manager"><img src="../../assets/images/icons/delete_admin.png" style="width: 30px;height:30px" alt=""></a>
                        <a href="../../controllers/admin/manager/delete.manager.controller.php?id=<?=$manager['user_id']?>&image=<?=$manager['picture']?>&role=2"><img src="../../assets/images/icons/del_admin.png" style="width: 30px;height:30px" alt=""></a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>
</div>