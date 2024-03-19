<?php
require "database/database.php";
require "models/admin/products/product.model.php";
?>
<div class="checkout">
    <div class="head" style="display: flex; align-items: center;width:50%;justify-content:space-between">
        <?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) : ?>
            <a href="/restaurant?id=<?= $_SESSION['id'] ?>">
            <?php else : ?>
                <a href="#">
                <?php endif; ?>
                <button style="margin-left: 30px; margin-top:30px; padding:0 10px; height:40px; border:none; background:#E21B70; color:white">Back</button>
                </a>
                <h3 class="mt-5">YOUR ORDER LIST</h3>
    </div>
    <div class="checkout-left" style="width: 90.5%; margin-left:52px;gap:10px">
        <div class="checout-card">
            <?php
            $orders = isset($_SESSION['order']) ? $_SESSION['order'] : null;
            if (!empty($orders)) {
                foreach ($orders as $order) :
            ?>
                    <div class="card" style="display: flex; align-items: center;">
                        <div style="height: 100%;gap:20px" class="row product" data-price="<?= $order[0]['price'] ?>">
                            <div style="width: 20%;background:black;height:100%">
                                <a href=""><img style="width: 100%;height:100%" src="assets/images/products/<?= $order[0]['product_img'] ?>" alt=""></a>
                            </div>
                            <div class="brand" style="width: 30%;display: flex;flex-direction:column;">
                                <h5>
                                    <?= $order[0]['product_name'] ?>
                                </h5>
                                <a href="controllers/orders/remove.cart.controller.php?action=remove&id=<?= $order[0]['id'] ?>">
                                    <button class="btn btn-sm btn-outline-dark">Remove</button>
                                </a>
                                <p class="discount">Discount:
                                    <?= $order[0]['discount'] ?>%
                                </p> 
                            </div>
                            <div class="quantity" style="width:20%;display:flex;align-items: center;gap:10px">
                                <div class="quantity-controls">
                                    <button style="background-color: #E21B70; color: white; border: none; padding: 5px 10px; font-size: 16px; cursor: pointer;" class="quantity-btn minus">-</button>
                                    <input style="width: 40px; height: 30px; text-align: center; font-size: 16px;" class="quantity-input" type="number" value="1">
                                    <button style="background-color: #E21B70; color: white; border: none; padding: 5px 10px; font-size: 16px; cursor: pointer;" class="quantity-btn plus">+</button>
                                </div>

                            </div>
                            <div class="all" style="display:flex;align-items: center;margin-top:10px">
                                <p class="price">Price:
                                    <?= $order[0]['price'] ?> $
                                </p>
                            </div>
                        </div>
                    </div>
            <?php
                endforeach;
            } else {
                echo '<img style="width:300px;height:300px;display:block;margin:auto;margin-top:20px" src="assets/images/error.png" alt="">';
            }
            ?>
        </div>
        <div class="total-prices">
            <h2 style="margin-top:30px;text-align:center;color:#E21B70">Your Price</h2>
            <hr style="border:2px solid black;width:100%">
            <h6 style="margin-bottom:30px">Item Price: <span class="totals">0.00</span> $</h6>
            <h6 style="margin-bottom:30px">Total Discount: <span class="discount-amount">0.00</span> $</h6>
            <h6 style="margin-bottom:30px">Delivery: <span class="discount-amount">0.00</span> $</h6>
            <h6 style="margin-bottom:30px">Total Price: <span class="price-after-discount">0.00</span> $</h6>
            <a href="/place_order"><button style="width: 100%;border:none;background:#E21B70;color:white;padding:10px 0">Check Out
                    Now</button></a>
        </div>
    </div>

    <script>
        const products = document.querySelectorAll('.product');
        let totalPrice = 0;
        let totalDiscount = 0;
        let totalAfterDiscount = 0;

        products.forEach(function(product) {
            const price = parseFloat(product.getAttribute('data-price'));
            const discountPercentage = parseFloat(product.querySelector('.discount').textContent.split(':')[1]).value;
            const quantityInput = product.querySelector('.quantity-input');
            console.log(quantityInput)
            const priceElement = product.querySelector('.price');

            let totalPricePerProduct = price;
            priceElement.textContent = 'Price: ' + totalPricePerProduct.toFixed(2) + ' $';

            updateTotals(price, 0);

            product.querySelector('.quantity-btn.minus').addEventListener('click', function() {
                let quantity = parseInt(quantityInput.value);
                console.log(quantity);
                if (quantity > 1) {
                    quantityInput.value = quantity - 1;
                    totalPricePerProduct -= price;
                    priceElement.textContent = 'Price: ' + totalPricePerProduct.toFixed(2) + ' $';
                    const newTotalPrice = totalPrice - price;
                    const discountAmount = (discountPercentage / 100) * newTotalPrice;
                    updateTotals(-price, -discountAmount);
                }
            });
            product.querySelector('.quantity-btn.plus').addEventListener('click', function() {
                let quantity = parseInt(quantityInput.value);
                quantityInput.value = quantity + 1;
                totalPricePerProduct += price;
                priceElement.textContent = 'Price: ' + totalPricePerProduct.toFixed(2) + ' $';
                const newTotalPrice = totalPrice + price;
                const discountAmount = (discountPercentage / 100) * newTotalPrice;
                updateTotals(price, discountAmount);
            });

            quantityInput.addEventListener('input', function() {
                let quantity = parseInt(quantityInput.value);
                if (quantity < 1 || isNaN(quantity)) {
                    quantityInput.value = 1;
                    quantity = 1;
                }
                const quantityChange = quantity - parseInt(quantityInput.getAttribute('data-quantity'));
                totalPricePerProduct = quantity * price;
                priceElement.textContent = 'Price: ' + totalPricePerProduct.toFixed(2) + ' $';
                const discountAmount = (discountPercentage / 100) * totalPricePerProduct;
                updateTotals(price * quantityChange, discountAmount);
                quantityInput.setAttribute('data-quantity', quantity);
            });
        });

        function updateTotals(amount, discountAmount) {
            totalPrice += amount;
            totalDiscount = discountAmount;
            totalAfterDiscount = totalPrice - totalDiscount;
            document.querySelector('.totals').textContent = totalPrice.toFixed(2);
            document.querySelector('.discount-amount').textContent = totalDiscount.toFixed(2);
            document.querySelector('.price-after-discount').textContent = totalAfterDiscount.toFixed(2);
        }
    </script>



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
        width: 91%;
        display: flex;
        justify-content: center;
        flex-direction: column;
        margin: auto;
        height: auto;
    }

    .checkout-left {
        display: flex;
        width: 50%;
        border: 1px solid gainsboro;
        margin: auto;
        margin-top: 30px;
        overflow-y: scroll;
        height: 400px;
    }

    .checout-card {
        width: 70%;
        overflow-y: scroll;
        margin-bottom: 30px;
    }

    .check {
        width: 50%;
        height: 50px;
        margin-top: 30px;
        border: none;
        background: #E21B70;
        color: white;
    }

    .card {
        width: 90%;
        margin: auto;
        margin-top: 20px;
        height: 15vh;
        display: flex;
        justify-content: center;
    }

    .body,
    .row {
        width: 100%;
        display: flex;
    }

    .total-prices {
        display: flex;
        flex-direction: column;
        height: 100%;
        width: 30%;
    }
</style>