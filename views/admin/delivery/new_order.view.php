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
        height: 250px;
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
    .action {
    display: flex;
    justify-content: space-between; }

.action a {
    text-decoration: none;
    padding: 8px 16px; /* Adjust padding as needed */
    border-radius: 4px; /* Rounded corners */
    border: 1px solid #ccc; /* Border */
}

.accept-btn {
    background-color: #E21B70; /* Green background for accept button */
    color: white;
    text-align: center;
}


/* Hover styles */
.action a:hover {
    opacity: 0.8; /* Reduce opacity on hover */
}

</style>
<div class="container">

    <h1 class="title">ORDER LISTS</h1>
    <hr>
    <div class="card_container">
        <?php
        $orders = done();
        ?>
        <?php foreach ($orders as $order): ?>
            <div class="card_order">
                <div class="image"
                    style="width:100%;height:70px;display:flex;align-items:center;justify-content:space-between;">
                    <img src="assets/images/user/1702283567614s6x4l2lu.png" alt="" class="user_img">
                    <p>quantity <span>
                            <?= $order['quantity'] ?>
                        </span></p>
                </div>
                <hr>
                <div class="card_footer" style="width:100%;height:10%;">
                    <h4>price:
                        <?= $order['total_price'] ?> $
                    </h4>
                    <h4>Phone:
                        <?= $order['phone'] ?>
                    </h4>
                    <h4>Location:
                        <?= $order['location'] ?>
                    </h4>
                    <div class="action">
                        <a style="width: 100%;" href="controllers/deliverer/accep_direction.php?id=<?=$order['order_id']?>" class="accept-btn">Accept</a>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
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