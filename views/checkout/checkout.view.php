<?php
require "database/database.php";
require "models/admin/products/product.model.php";
?>
<div class="checkout">
    <h3>YOUR ORDER LIST</h3>
    <div class="checkout-left" style="width: 90.5%; margin-left:52px">
        <div class="card">
            <div class="row">
                <div class="col-md-4 body"> 
                    <img src="assets/images/FOOD.jpg" class="card-img" alt="product_food" style=" width:200px; margin-left:-30px; height: 103px;">
                    <div class="top">
                        <h5 class="me-3">Khmer food</h5>
                        <div class="d-flex body-top" style="gap:10px;">
                            <button class="btn btn-sm btn-outline-dark">Remove</button>
                            <button class="btn btn-sm btn-outline-dark" style="width:100px">Add to Card</button>
                        </div>
                    </div>
                </div>
                <div class="card-1">
                    <input type="number" style="width:40px;height:30px" placeholder="1">
                    <p>price :100$</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="row">
                <div class="col-md-4 body">
                    <img src="assets/images/FOOD.jpg" class="card-img" alt="" style="width:200px; margin-left:-30px; height: 103px;">
                    <div class="top">
                        <h5 class="me-3">Khmer food</h5>
                        <div class="d-flex body-top" style="gap:10px;">
                            <button class="btn btn-sm btn-outline-dark">Remove</button>
                            <button class="btn btn-sm btn-outline-dark" style="width:100px">Add to Card</button>
                        </div>
                    </div>
                </div>
                <div class="card-1">
                    <input type="number" style="width:40px;height:30px" placeholder="1">
                    <p>price :100$</p>
                </div>
            </div>
        </div>
        <a href="/place_order"><button class="check"> Check out</button></a>
    </div>
</div>
<!-- </div> -->

</div>
<div class="row">
    <div class="container">
        <div class="trending-slider">
                <?php 
                    $products = get_product();
                    foreach ($products as $product){
                ?>
            <div class="osahan-slider-item">
                <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                    <div class="list-card-image">
                        <a href="#">
                            <img alt="#" src="../../assets/images/products/<?= $product['product_img'] ?>" class="img-fluid item-img w-100" style="height:200px" />
                        </a>
                    </div>
                    <div class="p-3 position-relative">
                        <div class="list-card-body">
                            <h6 class="mb-1">
                                <a href="/restaurant" class="text-black"><?= $product['product_name'] ?></a>
                            </h6>
                            <p class="text-gray mb-3"><?= $product['restaurant_name'] ?></p>
                            <p class="text-gray mb-3 time">
                                <span class="bg-light text-dark"  style="padding:5px"><i
                                        class="feather-clock"></i> 15–30 min</span>
                                <button class="float-right" style="border:none; border-radius:5px; background-color:#E21B70; color:white;padding:5px">Add to cart +</button>
                            </p>
                        </div>
                       
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
​
</div>
</div>
<style>
    .checkout {
        width: 80%;
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
</style>