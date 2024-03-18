<style>
    .bg-theme-black {

        margin-left: 13.5%;
        width: 73%;
    }

    .contaner,
    h1 {
        font: oblique;
        margin-left: 60%;
        margin-top: 10%;

    }

    /* form.example{
            margin-left: 60%;
          } */

    form.example input[type=text] {
        margin-left: 60%;
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        float: left;
        width: 40%;
        background: #f1f1f1;
    }

    form.example button {
        margin-left: 60%;
        margin-top: 3%;
        float: left;
        width: 15%;
        padding: 10px;
        background: #B82222;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        cursor: pointer;
    }

    form.example button:hover {
        background: #EE1A37;
    }
</style>
</div>




</div>
<div class="container mt-5" style="display: flex;width:100%; flex-wrap:wrap; justify-content:space-between;">
    <!-- <div class="trending-slider"> -->
    <?php
    require "models/offers/offer.model.php";
    require "database/database.php";

    $offers = get_product_offer();
    foreach ($offers as $offer) :

    ?>
        <div class="osahan-slider-item m-0 mb-5" style="width:30%;">
            <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                <div class="list-card-image">
                    <div class="star position-absolute">
                        <span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span>
                    </div>
                    <div class="favourite-heart text-danger position-absolute">
                        <a href="#"><i class="feather-heart"></i></a>
                    </div>
                    <div class="member-plan position-absolute">
                        <span class="badge badge-dark">Promoted</span>
                    </div>
                    <a href="/checkout">
                        <img style="width: 100px;height:200px;" alt="#" src="assets/images/products/<?= $offer['product_img'] ?> " class="img-fluid item-img w-100" />
                    </a>
                </div>
                <div class="p-3 position-relative">
                    <div class="list-card-body">
                        <h6 class="mb-1">
                            <a href="/restaurant" class="text-black">Thai Famous Cuisine</a>
                        </h6>
                        <p class="text-gray mb-3">North Indian • Indian • Pure veg</p>
                        <p class="text-gray mb-3 time">
                            <span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 30–35
                                min</span>
                            <span class="float-right text-black-50"> $250 FOR TWO</span>
                        </p>
                    </div>
                    <div class="list-card-badge" style="display:flex; justify-content:space-between">
                        <div class="offer">
                            <span class="badge badge-success">OFFER</span>
                            <small><?= $offer['discount'] . ' ' ?>% offer</small>
                        </div>
                        <div class="chard">
                            <a href="/checkout" class="shopping-cart-btn" data-product-id="<?= $product['id'] ?>" data-product-image="<?= $product['product_img'] ?>" style="width:40px; display:flex; justify-content:center; text-align:center">
                                <i class="feather-shopping-cart" style="background-color:#E21B70; color:white; padding:5px; width:100px;border-radius:5px"></i>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <?php endforeach ?>
</div>

<div class="most_popular">
    <div class="row">



    </div>
</div>
</div>
</div>