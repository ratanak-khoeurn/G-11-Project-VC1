<?php
require_once "database/database.php";
require_once "models/admin/restuarant/resturant.process.php";
require_once "models/admin/products/product.model.php";
require_once "models/comments/comments.model.php";
?>
<div class="container position-relative" style="display: flex;flex-direction:column; width: 100%;">
    <div class="row" style="width: 100%; display:flex; flex-direction:column">
        <div class="container" style="width: 100%; justify-content:space-between;">
            <div class="left_side" style="width: 100%; margin-top:20px">
                <div class="card_product" style="overflow:scroll; height:450px; margin-top:10px">
                    <div class="trending-scroll rounded"
                        style="width: 100%; display:flex; flex-wrap: wrap;gap:25px; margin-bottom:15px">
                        <?php
                        $categories = select_product($_GET['name']);
                        foreach ($categories as $category) {
                                ?>
                                <div class="osahan-slider-item" style="width: 250px; margin-top: 0px; margin-bottom:10px">
                                    <div class="list-card bg-white rounded overflow-hidden position-relative shadow-sm">
                                        <div class="list-card-image">
                                            <a href="/checkout">
                                                <img id="product_img" alt="#"
                                                    src="../../../assets/images/products/<?= $category['product_img'] ?>"
                                                    class="img-fluid item-img"
                                                    style="background-color:teal; height:200px; width: 100%;">
                                            </a>
                                        </div>
                                        <div class="p-3 position-relative">
                                            <div class="list-card-body">
                                                <h6 class="mb-1"><a href="/checkout" class="text-black">
                                                        <?= $category['product_name'] ?>
                                                    </a></h6>
                                                <p class="text-gray mb-3">
                                                    <?= $category['category_name'] ?>
                                                </p>
                                                <p class="text-gray m-0" style="display:flex; justify-content:space-between">
                                                    <span class="text-black-50"> Price:<?= $category['price'] ?> $</span>
                                                    <a href="controllers/orders/add_to_cart.controller.php?>"
                                                        style="width:40px; display:flex; justify-content:center; text-align:center">
                                                        <i class="feather-shopping-cart"
                                                            style="background-color:#E21B70; color:white; padding:5px; width:100px;border-radius:5px"></i>
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                    </div>
                
    </div>
</div>
