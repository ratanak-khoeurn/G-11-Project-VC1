<?php
require "database/database.php";
require "models/admin/products/product.model.php";
require "./models/order/add.cart.model.php";
?>
<div class="checkout">

    <div class="head" style="display: flex; align-items: center;width:50%;justify-content:space-between">
        <?php if (isset ($_SESSION['id']) && !empty ($_SESSION['id'])): ?>
            <a href="/restaurant?id=<?= $_SESSION['id'] ?>">
            <?php else: ?>
                <a href="#">
                <?php endif; ?>
                <button
                    style="margin-left: 30px; margin-top:30px; padding:0 10px; height:40px; border:none; background:#E21B70; color:white">Back</button>
            </a>
            <h3 class="mt-5">YOUR ORDER LIST</h3>
    </div>
    <div class="checkout-left" style="width: 90.5%; margin-left:52px;gap:10px">
        <div class="checout-card">
            <?php
            // Fetch orders from the database
            $orders = ($_SESSION['order']);
            if (!empty ($orders)) {
                foreach ($orders as $order):
                    ?>
                    <form action="controllers/orders/checkou_order.controller.php" method="post">

                        <div class="card" style="display: flex; align-items: center;">
                            <div style="height: 100%; gap: 10px" class="row product" data-price="<?= $order[0]['price'] ?>">
                                <div style="width: 20%; background: black; height: 100%">
                                    <a href=""><img style="width: 100%; height: 100%"
                                            src="assets/images/products/<?= $order[0]['product_img'] ?>" alt=""></a>
                                </div>
                                <div class="brand" style="width: 27%; display: flex; flex-direction: column;">
                                    <h5>
                                        <?= $order[0]['product_name'] ?>
                                    </h5>

                                    <p class="ori_price">Price <span>
                                            <?= $order[0]['price'] ?>
                                        </span>$</p>
                                    <p class="discount">Discount:
                                        <span>
                                            <?= $order[0]['discount'] ?>
                                        </span>%
                                    </p>
                                    <p><i class="feather-truck"></i> <span class="deli">
                                            <?= get_delivery($order[0]['res_id']) ?>
                                        </span>$ </p>

                                </div>
                                <div class="to_other">
                                    <a
                                        href="controllers/orders/remove.cart.controller.php?action=remove&id=<?= $order[0]['id'] ?>">
                                        <p class="btn btn-sm btn-outline-dark">move</p>
                                    </a>

                                </div>
                                <div class="quantity" style="width: 20%; display: flex; align-items: center; gap: 10px;">
                                    <div class="quantity-controls" style="display:flex;">
                                        <p style="background-color: #E21B70; color: white; border: none; padding: 2px 10px; font-size: 16px; cursor: pointer;"
                                            class="quantity-btn minus">-</p>
                                        <input style="width: 40px; height: 33px; text-align: center; font-size: 16px;"
                                            class="quantity-input" type="number" value="1" data-quantity="1" name="quantity">
                                            <input type="hidden" value="<?=$order[0]['id']?>" class="quantities" name="id">
                                        <p style="background-color: #E21B70; color: white; border: none; padding: 5px 10px; font-size: 16px; cursor: pointer;"
                                            class="quantity-btn plus">+</p>
                                    </div>
                                </div>
                                <div class="all"
                                    style="display: flex; justify-content: center; margin-top: 10px;flex-direction:column">
                                    <p class="price">Price: <span>
                                            <?= $order[0]['product_price'] ?>
                                        </span> $</p>
                                    <p class="discount_1">0.00 </p>
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

        <!-- Display total prices -->
        <div class="total-prices">
            <h2 style="margin-top:30px; text-align:center; color:#E21B70">Your Price</h2>
            <hr style="border:2px solid black; width:100%">
            <h6 style="margin-bottom:30px">Item Price: <span class="totals">0.00</span> $</h6>
            <h6 style="margin-bottom:30px">Total Discount: <span class="discount-amount">0.00</span> $</h6>
            <h6 style="margin-bottom:30px">Delivery: <span class="delivery-charge">0.00</span> $</h6>
            <h6 style="margin-bottom:30px">Total Price: <input style="border: none;width:70px" type="text" name="total_prices" id="total-price" class="price-after-discount" >
                $</h6>
            <button type="submit"
                style="width: 100%; border:none; background:#E21B70; color:white; padding:10px 0">Check Out
                Now</button>
        </div>
    </div>
    </form>

    <script>
        const products = document.querySelectorAll('.product');
        let deliverer = document.querySelector('.delivery-charge');
        const delivery = parseFloat(document.querySelector('.deli').textContent);
        deliverer.textContent = delivery;
        let totalPrice = 0;
        let totalDiscount = 0;
        let totalAfterDiscount = 0;
        let final_discount = 0;

        products.forEach(function (product) {
            const discount_product = product.querySelector('.discount_1'); // Select discount element within the product
            const price = parseFloat(product.getAttribute('data-price'));
            const discountPercentage = parseFloat(product.querySelector('.discount').textContent.split(':')[1]);
            const quantityInput = product.querySelector('.quantity-input');
            const priceElement = product.querySelector('.price');
            const price_product = parseInt(product.querySelector('.ori_price').firstElementChild.textContent);
            let totalPricePerProduct = price;
            priceElement.textContent = 'Price: ' + totalPricePerProduct.toFixed(2) + ' $';

            updateTotals(price, 0);

            product.querySelector('.quantity-btn.minus').addEventListener('click', function () {
                let quantity = parseInt(quantityInput.value);
                if (quantity > 1) {
                    quantityInput.value = quantity - 1;
                    totalPricePerProduct -= price;
                    const newTotalPrice = totalPrice - price;
                    const discountAmount = (discountPercentage / 100) * price_product * (quantity - 1);
                    discount_product.textContent = discountAmount.toFixed(2);
                    priceElement.textContent = 'Price: ' + totalPricePerProduct.toFixed(2) + ' $';
                    updateTotals(-price, -(-discountAmount));
                }
            });

            product.querySelector('.quantity-btn.plus').addEventListener('click', function () {
                let quantity = parseInt(quantityInput.value);
                quantityInput.value = quantity + 1;
                totalPricePerProduct += price;
                const newTotalPrice = totalPrice + price;
                const discountAmount = (discountPercentage / 100) * price_product * (quantity + 1);
                discount_product.textContent = discountAmount.toFixed(2);
                priceElement.textContent = 'Price: ' + totalPricePerProduct.toFixed(2) + ' $';
                updateTotals(price, discountAmount);
            });
            quantityInput.addEventListener('input', function () {
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
            const productDiscount = parseFloat(discountAmount); // Convert discountAmount to a number
            totalDiscount = 0; // Reset totalDiscount before accumulating
            products.forEach(function (product) {
                const discountText = product.querySelector('.discount_1').textContent.trim();
                const discountValue = parseFloat(discountText);
                if (!isNaN(discountValue)) {
                    totalDiscount += discountValue;
                } else {
                    console.log('Invalid discount value:', discountText);
                }
            });
            const finallyTotal = totalPrice + parseFloat(deliverer.textContent);
            totalAfterDiscount = totalPrice - totalDiscount;

            document.querySelector('.totals').textContent = totalPrice.toFixed(2);
            document.querySelector('.discount-amount').textContent = totalDiscount.toFixed(2);
            document.querySelector('.price-after-discount').value = finallyTotal.toFixed(2);
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
                                    <img alt="#" src="../../assets/images/products/<?= $product['product_img'] ?>"
                                        class="img-fluid item-img w-100" style="height:200px" />
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
                                        <a href="controllers/orders/add_to_cart.controller.php?id=<?= $product['id'] ?>&num=1"
                                            style="width:40px; display:flex; justify-content:center; text-align:center">
                                            <i class="feather-shopping-cart"
                                                style="background-color:#E21B70; color:white; padding:5px; width:100px;border-radius:5px"></i>
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

    .to_other {
        display: flex;
        align-items: center;
        width: 12%;
    }

    .card {
        width: 90%;
        margin: auto;
        margin-top: 20px;
        height: 18vh;
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