<?php

require 'models/add.user/add.user.model.php';
?>

<link rel="stylesheet" href="../../vendor/css/customer.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $customers = get_customer_to_show();
      foreach ($customers as $index => $customer) :
      ?>
        <tr>
          <td><?= $index + 1 ?></td>
          <td><?= $customer['first_name'] ?></td>
          <td><?= $customer['last_name'] ?></td>
          <td><?= $customer['email'] ?></td>
          <td><?= $customer['password'] ?></td>
          <td><?= $customer['phone'] ?></td>
          <td>
            <img src="../../assets/images/user/<?= $customer['picture'] ?>" alt="" style="width: 60px;height:60px;border-radius:5px;">
          </td>
          <td style="color:red; size:45px;">
            <a href="controllers/admin/manager/delete.manager.controller.php?id=<?=$customer['user_id'] ?>&role=1"><i class="material-icons delete-icon" data-id="<?= $customer[$index] ?>" style="cursor: pointer;">delete</i></a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const deleteIcons = document.querySelectorAll('.delete-icon');
    deleteIcons.forEach(icon => {
      icon.addEventListener('click', function() {
        const customerId = this.getAttribute('data-id');
        const confirmation = confirm("Are you sure you want to delete this customer?");

        if (confirmation) {
          fetch(`delete_customer.php?id=${customerId}`, { method: 'DELETE' })
            .then(response => {
              if(confirm){
                console.log(1);
                this.closest('tr').remove();

              } else {
                console.error('Failed to delete customer.');
              }
            })
            .catch(error => {
              console.error('Error:', error);
            });
        }
      });
    });
  });
</script>
