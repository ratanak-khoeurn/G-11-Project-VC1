<?php
require_once "database/database.php";
require_once "models/admin/restuarant/resturant.process.php";
require_once "models/admin/products/product.model.php";
?>

<div class="d-none">
    <div class="bg-primary p-3 d-flex align-items-center">
        <a class="toggle togglew toggle-2" href="#"><span></span></a>
        <h4 class="font-weight-bold m-0 text-white">Osahan Bar</h4>
    </div>
</div>
<div class="offer-section py-4">
    <div class="container position-relative">


        <?php
        $res_id = isset($_GET['id']) ? $_GET['id'] : null;
        function get_restaurant_by_id($id)
        {
            $restaurants = get_restaurant();
            foreach ($restaurants as $res) {
                if ($res['res_id'] == $id) {
                    return $res;
                }
            }
            return null;
        }
        $restaurant = get_restaurant_by_id($res_id);
        if ($restaurant) {

        ?>
            <img alt="<?= $restaurant['res_name'] ?>" src="../../../assets/images/restaurant/<?= $restaurant['restaurant_image_url'] ?>" class="restaurant-pic" style="margin-right:30px">
            <h2 class="res_name" style="color:white; padding-top:0px; margin-left:10px"><?= $restaurant['res_name'] ?></h2>
            <p class="res_address" style="color:white; margin-left:10px"><?= $restaurant['res_address'] ?></p>
        <?php } ?>

        <div class="pt-3 text-white">
            <div class="rating-wrap d-flex align-items-center" style="margin-top: -10px;">
                <ul class="rating-stars list-unstyled">
                    <li style="margin-left:10px">
                        <i class="feather-star text-warning"></i>
                        <i class="feather-star text-warning"></i>
                        <i class="feather-star text-warning"></i>
                        <i class="feather-star text-warning"></i>
                        <i class="feather-star"></i>
                    </li>
                </ul>
                <p class="label-rating text-white ml-2 small"> (245 Reviews)</p>
            </div>
        </div>
        <div class="pb-4">
            <div class="row" style="margin-left:5px">
                <div class="col-6 col-md-2">
                    <p class="text-white-50 font-weight-bold m-0 small">Delivery</p>
                    <p class="text-white m-0"><i class="feather-truck"></i> Free</p>
                </div>
                <div class="col-6 col-md-2" style="margin-left: -75px;">
                    <p class="text-white-50 font-weight-bold m-0 small">Open time</p>
                    <p class="text-white m-0">8:00 AM</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container position-relative" style="display: flex;flex-direction:column; width: 100%;">
    <div class="row" style="width: 100%; display:flex; flex-direction:column">
        <div class="container" style="width: 100%; justify-content:space-between;">
            <div class="left_side" style="width: 100%; margin-top:20px">
                <p class="font-weight-bold pt-2 m-0">FOOD ITEMS</p>
                <div class="card_product" style="overflow:scroll; height:450px; margin-top:10px">
                    <div class="trending-scroll rounded" style="width: 100%; display:flex; flex-wrap: wrap; justify-content:space-between; margin-bottom:15px">
                        <?php
                        $products = get_product();
                        foreach ($products as $product) {
                        $desired_restaurant_name = $restaurant['res_name'];
                        $product_restaurant_name = $product['restaurant_name'];
                        if ($desired_restaurant_name === $product_restaurant_name) {
                        ?>
                            <div class="osahan-slider-item" style="width: 250px; margin-top: 0px; margin-bottom:10px">
                                <div class="list-card bg-white rounded overflow-hidden position-relative shadow-sm">
                                    <div class="list-card-image">
                                    <a href="/checkout">
                                            <img alt="#" src="../../../assets/images/products/<?= $product['product_img'] ?>" class="img-fluid item-img" style="background-color:teal; height:200px; width: 100%;">
                                        </a>
                                    </div>
                                    <div class="p-3 position-relative">
                                        <div class="list-card-body">
                                            <h6 class="mb-1"><a href="/checkout" class="text-black"><?= $product['product_name'] ?></a></h6>
                                            <p class="text-gray mb-3"><?= $product['restaurant_name'] ?></p>
                                            <p class="text-gray m-0" style="display:flex; justify-content:space-between"> <span class="text-black-50"> $350 FOR TWO</span>
                                            <a href="#?id=<?=$res['res_id']?>"><i class="feather-shopping-cart h+6 mr-2 mb-0" style="background-color:#E21B70;padding:10px; width:50px; color:white;font-size:15px; border-radius:5px; justify-content:center; align-items: center; text-align:center;cursor:pointer; .feather-shopping-cart:hover{background-color:wheat} "></i></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } }?>
                    </div>
                </div>
            </div>

            <div class="rating_side" style="width:100%">
                <div class="mb-3">
                    <div id="ratings-and-reviews" class="bg-white shadow-sm d-flex align-items-center rounded p-3 mb-3 clearfix restaurant-detailed-star-rating">
                        <h6 class="mt-0">Rate this Place</h6>
                        <div class="star-rating ml-auto">
                            <div class="d-inline-block h6 m-0"><i class="feather-star text-warning"></i>
                                <i class="feather-star text-warning"></i>
                                <i class="feather-star text-warning"></i>
                                <i class="feather-star text-warning"></i>
                                <i class="feather-star"></i>
                            </div>
                            <b class="text-black ml-2">334</b>
                        </div>
                    </div>
                    <div class="bg-white rounded p-3 mb-3 clearfix graph-star-rating rounded shadow-sm">
                        <h6 class="mb-0 mb-1">Ratings and Reviews</h6>
                        <p class="text-muted mb-4 mt-1 small">Rated 3.5 out of 5</p>
                        <div class="graph-star-rating-body">
                            <div class="rating-list">
                                <div class="rating-list-left font-weight-bold small">5 Star</div>
                                <div class="rating-list-center">
                                    <div class="progress">
                                        <div role="progressbar" class="progress-bar bg-info" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 56%;"></div>
                                    </div>
                                </div>
                                <div class="rating-list-right font-weight-bold small">56 %</div>
                            </div>
                            <div class="rating-list">
                                <div class="rating-list-left font-weight-bold small">4 Star</div>
                                <div class="rating-list-center">
                                    <div class="progress">
                                        <div role="progressbar" class="progress-bar bg-info" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width: 23%;"></div>
                                    </div>
                                </div>
                                <div class="rating-list-right font-weight-bold small">23 %</div>
                            </div>
                            <div class="rating-list">
                                <div class="rating-list-left font-weight-bold small">3 Star</div>
                                <div class="rating-list-center">
                                    <div class="progress">
                                        <div role="progressbar" class="progress-bar bg-info" aria-valuenow="11" aria-valuemin="0" aria-valuemax="100" style="width: 11%;"></div>
                                    </div>
                                </div>
                                <div class="rating-list-right font-weight-bold small">11 %</div>
                            </div>
                            <div class="rating-list">
                                <div class="rating-list-left font-weight-bold small">2 Star</div>
                                <div class="rating-list-center">
                                    <div class="progress">
                                        <div role="progressbar" class="progress-bar bg-info" aria-valuenow="6" aria-valuemin="0" aria-valuemax="100" style="width: 6%;"></div>
                                    </div>
                                </div>
                                <div class="rating-list-right font-weight-bold small">6 %</div>
                            </div>
                            <div class="rating-list">
                                <div class="rating-list-left font-weight-bold small">1 Star</div>
                                <div class="rating-list-center">
                                    <div class="progress">
                                        <div role="progressbar" class="progress-bar bg-info" aria-valuenow="4" aria-valuemin="0" aria-valuemax="100" style="width: 4%;"></div>
                                    </div>
                                </div>
                                <div class="rating-list-right font-weight-bold small">4 %</div>
                            </div>
                        </div>
                        <div class="graph-star-rating-footer text-center mt-3"><button type="button" class="btn btn-primary btn-block btn-sm">Rate and Review</button></div>
                    </div>
                    <div class="bg-white p-3 mb-3 restaurant-detailed-ratings-and-reviews shadow-sm rounded">
                        <a class="text-primary float-right" href="#">Top Rated</a>
                        <h6 class="mb-1">All Ratings and Reviews</h6>
                        <div class="reviews-members py-3">
                            <div class="media">
                                <a href="#"><img alt="#" src="assets/images/reviewer1.png" class="mr-3 rounded-pill"></a>
                                <div class="media-body">
                                    <div class="reviews-members-header">
                                        <div class="star-rating float-right">
                                            <div class="d-inline-block" style="font-size: 14px;"><i class="feather-star text-warning"></i>
                                                <i class="feather-star text-warning"></i>
                                                <i class="feather-star text-warning"></i>
                                                <i class="feather-star text-warning"></i>
                                                <i class="feather-star"></i>
                                            </div>
                                        </div>
                                        <h6 class="mb-0"><a class="text-dark" href="#">Trump</a></h6>
                                        <p class="text-muted small">Tue, 20 Mar 2020</p>
                                    </div>
                                    <div class="reviews-members-body">
                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It hasroots in a piece of classNameical Latin literature from 45 BC, making it
                                            over 2000 years old.</p>
                                    </div>
                                    <div class="reviews-members-footer"><a class="total-like btn btn-sm btn-outline-primary" href="#"><i class="feather-thumbs-up"></i> 856M</a> <a class="total-like btn btn-sm btn-outline-primary" href="#"><i class="feather-thumbs-down"></i> 158K</a>
                                        <span class="total-like-user-main ml-2" dir="rtl">
                                            <a href="#" aria-describedby="tooltip-top0"><img alt="#" src="assets/images/reviewer3.png" class="total-like-user rounded-pill"></a>
                                            <a href="#" aria-describedby="tooltip-top1"><img alt="#" src="assets/images/reviewer4.png" class="total-like-user rounded-pill"></a>
                                            <a href="#"><img alt="#" src="assets/images/reviewer5.png" class="total-like-user rounded-pill"></a>
                                            <a href="#" aria-describedby="tooltip-top3"><img alt="#" src="assets/images/reviewer6.png" class="total-like-user rounded-pill"></a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="reviews-members py-3">
                            <div class="media">
                                <a href="#"><img alt="#" src="assets/images/reviewer2.png" class="mr-3 rounded-pill"></a>
                                <div class="media-body">
                                    <div class="reviews-members-header">
                                        <div class="star-rating float-right">
                                            <div class="d-inline-block" style="font-size: 14px;"><i class="feather-star text-warning"></i>
                                                <i class="feather-star text-warning"></i>
                                                <i class="feather-star text-warning"></i>
                                                <i class="feather-star text-warning"></i>
                                                <i class="feather-star"></i>
                                            </div>
                                        </div>
                                        <h6 class="mb-0"><a class="text-dark" href="#">Jhon Smith</a></h6>
                                        <p class="text-muted small">Tue, 20 Mar 2020</p>
                                    </div>
                                    <div class="reviews-members-body">
                                        <p>It is a long established fact that a reader will be distracted by the
                                            readable content of a page when looking at its layout.</p>
                                    </div>
                                    <div class="reviews-members-footer"><a class="total-like btn btn-sm btn-outline-primary" href="#"><i class="feather-thumbs-up"></i> 88K</a> <a class="total-like btn btn-sm btn-outline-primary" href="#"><i class="feather-thumbs-down"></i> 1K</a><span class="total-like-user-main ml-2" dir="rtl"><a href="#"><img alt="#" src="assets/images/reviewer3.png" class="total-like-user rounded-pill"></a><a href="#"><img alt="#" src="assets/images/reviewer4.png" class="total-like-user rounded-pill"></a><a href="#"><img alt="#" src="assets/images/reviewer5.png" class="total-like-user rounded-pill"></a><a href="#"><img alt="#" src="assets/images/reviewer6.png" class="total-like-user rounded-pill"></a></span></div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <a class="text-center w-100 d-block mt-3 font-weight-bold" href="#">See All Reviews</a>
                    </div>
                    <div class="bg-white p-3 rating-review-select-page rounded shadow-sm">
                        <h6 class="mb-3">Leave Comment</h6>
                        <div class="d-flex align-items-center mb-3">
                            <p class="m-0 small">Rate the Place</p>
                            <div class="star-rating ml-auto">
                                <div class="d-inline-block"><i class="feather-star text-warning"></i>
                                    <i class="feather-star text-warning"></i>
                                    <i class="feather-star text-warning"></i>
                                    <i class="feather-star text-warning"></i>
                                    <i class="feather-star"></i>
                                </div>
                            </div>
                        </div>
                        <form action="controllers/comments/comment.user.controller.php" method="POST">
                            <div class="form-group">
                                <label class="form-label small">Your Comment</label>
                                <textarea class="form-control" name="comment"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary btn-block">Submit Comment</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="osahan-menu-fotter fixed-bottom bg-white px-3 py-2 text-center d-none">
    <div class="row">
        <div class="col">
            <a href="home.html" class="text-dark small font-weight-bold text-decoration-none">
                <p class="h4 m-0"><i class="feather-home text-dark"></i></p>
                Home
            </a>
        </div>
        <div class="col selected">
            <a href="trending.html" class="text-danger small font-weight-bold text-decoration-none">
                <p class="h4 m-0"><i class="feather-map-pin"></i></p>
                Trending
            </a>
        </div>
        <div class="col bg-white rounded-circle mt-n4 px-3 py-2">
            <div class="bg-danger rounded-circle mt-n0 shadow">
                <a href="/checkout" class="text-white small font-weight-bold text-decoration-none">
                    <i class="feather-shopping-cart"></i>
                </a>
            </div>
        </div class="col">
        <a href="favorites.html" class="text-dark small font-weight-bold text-decoration-none">
            <p class="h4 m-0"><i class="feather-heart"></i></p>
            Favorites
        </a>
    </div>
    <div class="col">
        <a href="profile.html" class="text-dark small font-weight-bold text-decoration-none">
            <p class="h4 m-0"><i class="feather-user"></i></p>
            Profile
        </a>
    </div>
</div>
</div>
</div>