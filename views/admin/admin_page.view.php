<?php
require 'database/database.php';
require 'models/add.user/add.user.model.php';


?>
<link rel="stylesheet" href="../../vendor/css/admin_page.css">
<script src="../../vendor/js/admin_page.js" defer></script>
<div class="main">
  <div class="top">
    <h2 class="title">Admins</h2>
    <input type="text">
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
        $admins = get_admin_to_show();
        foreach($admins as $index=>$admin):
      ?>
      <tr>
        <td><?= $index+1?></td>
        <td><?= $admin['first_name']?></td>
        <td><?= $admin['last_name']?></td>
        <td><?= $admin['email']?></td>
        <td><?= $admin['password']?></td>
        <td><?= $admin['phone']?></td>
        <td>
          <img src="../../assets/images/user/<?= $admin['picture']?>" alt="" style="width: 60px;height:60px;border-radius:5px;">
        </td>
        <td style="display:flex;justify-content:space-evenly;padding:30px 10px">
          <a href=""><img src="../../assets/images/icons/delete_admin.png" style="width: 30px;height:30px" alt=""></a>
          <a href=""><img src="../../assets/images/icons/del_admin.png" style="width: 30px;height:30px" alt=""></a>
        </td>
      </tr>
  <?php endforeach?>
    </tbody>
  </table>

</div>