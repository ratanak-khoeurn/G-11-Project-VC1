<?php
require 'database/database.php';
require 'models/order/add.cart.model.php';

?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
  .title {
    margin-top: 30px;
    margin-bottom: 15px;
  }

  .card_container {
    margin-left: -10px;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    height: 80%;
    overflow: scroll;
  }

  .card_order {
    /* border: 1px solid black; */
    box-shadow: 5px 5px 5px rgba(10, 10, 0.4, 0.6);
    width: 25%;
    height: 60%;
    border-radius: 5px;
    padding: 10px;
  }

  .card_header {
    margin-bottom: 10px;
  }

  .card_footer h4 {
    margin-bottom: 20px;
  }

  .user_img {
    height: 55px;
    width: 20%;
  }

  .yes,
  .delete-icon {
    color: white;
    padding: 5px;
    border-radius: 4px;
    margin-top: 5px;
  }

  .yes {
    background: blue;
  }

  .delete-icon {
    background: red;
  }
</style>
<div class="container">

  <h1 class="title">HISTORY LISTS</h1>
  <hr>
  <div class="card_container">
    <?php
    $orders = get_done_delivery($_SESSION['delivery']['user_id']);
    if (!empty($orders)) : ?>
    <div class="card_order">
      <div class="image" style="width:100%;height:150px;display:flex ;flex-direction:column;overflow-y: scroll;">
        <?php
        foreach ($orders as $order):
          ?>
          <div class="image"
            style="width:100%;height:70px;display:flex;align-items:center;justify-content:space-between;">
            <img src="assets/images/user/1702283567614s6x4l2lu.png" alt="" class="user_img">
            <p>quantity <span>
                <?= $order['quantity'] ?>
              </span></p>
            <p></p>

          </div>
        <?php endforeach ?>
      </div>
      <hr>
      <div class="card_footer" style="width:100%;height:10%;">
        <h4>price:
          <?= $orders[0]['total_price'] ?> $
        </h4>
        <h4>Phone:
          <?= $orders[0]['phone'] ?>
        </h4>
        </h4>
        <h4>Phone:
          <?= $orders[0]['location'] ?>
        </h4>
        <?php 
          if($orders[0]['delivery_action']==null):
        ?>
        <div class="action">
            <a href="controllers/deliverer/done_deliver.controller.php" class="yes"
            style="display: inline-block; padding: 8px 12px; background-color: #4CAF50; color: white; text-align: center; text-decoration: none; display: inline-block; border-radius: 4px; border: none; cursor: pointer;width:100%">Done</a>
        </div>
        <?php
        endif;
        ?>


      </div>
    </div>
    <?php
        endif;
    ?>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const deleteIcons = document.querySelectorAll('.delete-icon');
    deleteIcons.forEach(icon => {
      icon.addEventListener('click', function () {
        const customerId = this.getAttribute('card_container');
        const confirmation = confirm("Are you sure you want to delete this customer?");

        if (confirmation) {
          fetch(`delete_customer.php?id=${customerId}`, {
            method: 'DELETE'
          })
            .then(response => {
              if (confirm) {
                console.log(1);
                this.closest('.card_container').remove();

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