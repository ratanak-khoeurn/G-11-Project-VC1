<?php
require "database/database.php";
require "models/admin/products/product.model.php";
?>
<div class="checkout">
    <div class="head" style="display: flex;">
        <button style="margin-left: 30px;margin-top:30px;padding:0 10px;height:40px;border:none;background:#E21B70;color:white">Back</button>
        <h3>YOUR ORDER LIST</h3>
    </div>
    <div class="checkout-left" style="width: 90.5%; margin-left:52px">
        <?php

        $orders = $_SESSION['order'];
        if (!empty($orders)) {
            foreach ($orders as $order) :
        ?>
                <div class="card">
                    <div class="row product" data-price="<?= $order[0]['price'] ?>">
                        <div class="col-md-4 body">
                            <img src="assets/images/products/<?= $order[0]['product_img'] ?>" class="card-img" alt="product_food" style="width:200px; margin-left:-30px; height: 103px;">
                            <div class="top">
                                <h5 class="me-3"><?= $order[0]['product_name'] ?></h5>
                                <div class="d-flex body-top" style="gap:10px;">
                                    <a href="controllers/orders/remove.cart.controller.php?action=remove&id=<?= $order[0]['id'] ?>"><button class="btn btn-sm btn-outline-dark">Remove</button></a>
                                    <p>Discount: <spant class="discount">1</span>%</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-1">
                            <div class="quantity">
                                <button class="quantity-btn minus">-</button>
                                <input type="number" style="width:40px;height:30px" class="quantity-input" placeholder="1" value="1">
                                <button class="quantity-btn plus">+</button>
                            </div>
                            <p class="price">Price: <?= $order[0]['price'] ?> $</p>
                        </div>
                    </div>
                </div>
        <?php
            endforeach;
        } else {

            echo '<h1 style="text-align:center;">DO NOT HAVE ANY ORDER</h1>';
        }
        ?>
        <script>
            const products = document.querySelectorAll('.product');
            let totles = document.querySelector('.totles');
            products.forEach(function(product) {
                console.log(product);
                const price = parseFloat(product.getAttribute('data-price'));
                const quantityInput = product.querySelector('.quantity-input');
                const priceElement = product.querySelector('.price');
                const minusBtn = product.querySelector('.minus');
                const plusBtn = product.querySelector('.plus');
                let totalPrice = price;
                priceElement.textContent = 'Price: ' + totalPrice.toFixed(2) + ' $';

                minusBtn.addEventListener('click', function() {
                    let quantity = parseInt(quantityInput.value);
                    if (quantity > 1) {
                        quantityInput.value = quantity - 1;
                        totalPrice -= price;
                        priceElement.textContent = 'Price: ' + totalPrice.toFixed(2) + ' $';
                    }
                });

                plusBtn.addEventListener('click', function() {
                    let quantity = parseInt(quantityInput.value);
                    quantityInput.value = quantity + 1;
                    totalPrice += price;
                    priceElement.textContent = 'Price: ' + totalPrice.toFixed(2) + ' $';
                });

                quantityInput.addEventListener('input', function() {
                    let quantity = parseInt(quantityInput.value);
                    if (quantity < 1) {
                        quantityInput.value = 1;
                        quantity = 1;
                    }
                    totalPrice = quantity * price;
                    priceElement.textContent = 'Price: ' + totalPrice.toFixed(2) + ' $';
                });
            });
        </script>
        <hr>
        <div class="total" style="text-align:end;padding-right:180px;font-size:20px">
            Total :<span class="totles"></span>$
        </div>
        <a href="/place_order"><button class="check"> Check out</button></a>
    </div>
</div>

</div>
<div class="row">
    <div class="container">
        <div class="trending-slider">
            <?php
            $products = get_product();
            foreach ($products as $product) {
            ?>
                <div class="osahan-slider-item w-300">
                    <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                        <div class="list-card-image">
                            <a href="#">
                                <img alt="#" src="../../assets/images/products/<?= $product['product_img'] ?>" class="img-fluid item-img w-100" style="height:200px" />
                            </a>
                        </div>
                        <div class="p-3 position-relative">
                            <div class="list-card-body">
                                <h6 class="mb-1"><a href="/checkout" class="text-black">
                                        <?= $product['product_name'] ?>
                                    </a></h6>
                                <p class="text-gray mb-3">
                                    <?= $product['restaurant_name'] ?>
                                </p>
                                <p class="text-gray m-0" style="display:flex; justify-content:space-between">
                                    <span class="text-black-50"> $350 FOR TWO</span>
                                    <a href="controllers/orders/add_to_cart.controller.php?id=<?= $product['id'] ?>&num=1" style="width:40px; display:flex; justify-content:center; text-align:center">
                                        <i class="feather-shopping-cart" style="background-color:#E21B70; color:white; padding:5px; width:100px;border-radius:5px"></i>
                                    </a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>​
</div>
​
</div>
</div>
<style>
    .checkout {
        width: 82%;
        display: flex;
        justify-content: center;
        flex-direction: column;
        margin: auto;
        height: auto;
    }

    .checkout-left {
        width: 91%;
        border: 1px solid gainsboro;
        margin: auto;
        margin-top: 30px;
        overflow-y: scroll;
        height: 400px;
    }

    .check {
        width: 90%;
        height: 50px;
        margin-top: 30px;
        border: none;
        background: #E21B70;
        color: white;
        margin-left: 53px;
        margin-bottom: 20px;
    }

    .card {
        width: 90%;
        margin: auto;
        margin-top: 20px;
        /* margin-bottom: 20px; */
        height: 15vh;
        display: flex;
        justify-content: center;
    }

    .body,
    .row {
        width: 100%;
        display: flex;
    }

    .card-1 {
        display: flex;
        align-items: center;
        width: 400px;
        margin-left: 200px;
        justify-content: space-between;
    }

    .card-1 p {
        margin-top: 20px;
    }

    .body-top {
        display: flex;
    }

    .body-top button {
        height: 30px;
    }

    .card img {
        width: 150px;
        height: 100px;
        padding-left: 30px;
    }

    .top {
        padding: 0 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    h3 {
        padding-top: 30px;
        margin: auto;
    }

    .quantity-btn {
        background-color: #E21B70;
        color: #ffffff;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }

    .quantity-btn:hover {
        background-color: black;
    }

    .quantity-input {
        text-align: center;
        border: 1px solid #ced4da;
    }

    .quantity {
        display: flex;
        align-items: center;
    }

    .price {
        margin-top: 10px;
    }
</style>