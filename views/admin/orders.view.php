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

  .yes button{
    background: #E21B70;
    color: white;
    padding: 5px 5px  ;
    border-radius: 4px;
  }

  .delete-icon {
    background: red;
  }
</style>
<div class="container">

  <h1 class="title">ORDERS LISTS</h1>
  <hr>
  <div class="card_container">
    <?php
    if(isset($_SESSION['manager']) && $_SESSION['manager']) {
      $orders = accept_order($_SESSION['manager']['user_id']);
    } elseif(isset($_SESSION['admin']) && $_SESSION['admin']) {
      // Make sure accept_order_admin() function exists before calling it
      if(function_exists('accept_order_admin')) {
        $orders = accept_order_admin();
      } else {
        $orders = array(); 
      }
    }

    if (!empty($orders)) :
    ?>
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
          <?= $orders[0]['alls'] ?> $
        </h4>
        <h4>Phone:
          <?= $orders[0]['phone'] ?>
        </h4>
        </h4>
        <h4>Phone:
          <?= $orders[0]['location'] ?>
        </h4>
        <div class="action">
            <a href="controllers/orders/booking.controller.php?action=1" class="yes"><button>Accept</button></a>
            <a href=""><button class="delete-icon">Cancel</button></a>
        </div>

      </div>
    </div>
  </div>
  <?php else : ?>
    <h1>Don't have new order</h1>
    <?php endif ?>
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
              if (response.ok) {
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
