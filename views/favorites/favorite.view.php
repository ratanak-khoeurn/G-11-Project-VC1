<?php
require_once "database/database.php";
require_once "models/admin/restuarant/resturant.process.php";

?>
<div class="osahan-favorites">
    <div class="d-none">
        <div class="bg-primary border-bottom p-3 d-flex align-items-center">
            <a class="toggle togglew toggle-2" href="#"><span></span></a>
            <h4 class="font-weight-bold m-0 text-white">Favorites</h4>
        </div>
    </div>

    <div class="container most_popular py-5">
        <h2 class="font-weight-bold mb-3">Favorites</h2>
        <div class="row">
            <?php
            $restuarant = get_restaurant();
            foreach ($restuarant as $res) {

            ?>
                <div class="col-md-4 mb-3">
                    <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm grid-card">
                        <div class="list-card-image">
                            <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>
                            <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                            <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span>
                            </div>
                            <a href="/restaurant">
                                <img alt="#" src="../../../assets/images/restaurant/<?= $res['restaurant_image_url'] ?>" class="img-fluid item-img w-100" style="background-color:teal; height:250px">
                            </a>
                        </div>
                        <div class="p-3 position-relative">
                            <div class="list-card-body">
                                <h6 class="mb-1"><a href="/restaurant" class="text-black"><?= $res['res_name'] ?></a></h6>
                                <p class="text-gray mb-3"><?= $res['res_address'] ?></p>
                                <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 15–25 min</span> <span class="float-right text-black-50"> $500 FOR TWO</span></p>
                            </div>
                            <div class="list-card-badge">
                                <span class="badge badge-danger">OFFER</span> <small>65% <?= $res['res_name'] ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>