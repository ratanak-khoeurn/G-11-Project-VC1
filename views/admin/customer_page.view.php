<?php 
    require 'database/database.php';
    require 'models/add.user/add.user.model.php';


?>

<link rel="stylesheet" href="../../vendor/css/customer.css">
<div class="container">
<h1 class="title" style="margin-top: 30px; margin-bottom: 15px;">CUSTOMER LISTS</h1>
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
      </tr>
    </thead>
    <tbody>
      <?php
        $admins = get_customer_to_show();
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
      </tr>
  <?php endforeach?>
    </tbody>
  </table>
</div>
