<?php
require 'models/admin/orders/orders_admin.model.php';

?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
  .title{
    margin-top: 30px;
    margin-bottom: 15px;
  }
  .card_container{
    margin-left: -10px;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    height: 80%;
    overflow: scroll;
  }
  .card_order{
    /* border: 1px solid black; */
    box-shadow: 5px 5px 5px rgba(10, 10, 0.4, 0.6);
    width: 18%;
    height: 330px;
    border-radius: 5px;
    padding: 10px;
  }
  .card_header{
    margin-bottom: 10px;
  }
  .user_img{
    height: 185px;
    width: 100%;
  }
  .yes,
  .delete-icon{
    color: white;
    padding: 5px;
    border-radius: 4px;
    margin-top: 5px;
  }
  .yes{
    background: blue;
  }
  .delete-icon{
    background: red;
  }
</style>
<div class="container">
  <h1 class="title">ORDERS LISTS</h1>
  <hr>
<div class="card_container">
  <div class="card_order">
    <div class="card_header">
      <img src="assets/images/user/1702283567614s6x4l2lu.png" alt="" class="user_img">
    </div>
    <div class="card_footer">
      <h4>Name: Ratanak</h4>
      <h4>price: 150$</h4>
      <h4>Phone: 0962728396</h4>
      <h4>Address: street 371, Ou Bek Kh'om</h4>
      <div class="action">
        <button class="yes">Accept</button>
        <button class="delete-icon">Delete</button>
      </div>
    </div>
  </div>
</div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const deleteIcons = document.querySelectorAll('.delete-icon');
    deleteIcons.forEach(icon => {
      icon.addEventListener('click', function() {
        const customerId = this.getAttribute('card_container');
        const confirmation = confirm("Are you sure you want to delete this customer?");

        if (confirmation) {
          fetch(`delete_customer.php?id=${customerId}`, { method: 'DELETE' })
            .then(response => {
              if(confirm){
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
