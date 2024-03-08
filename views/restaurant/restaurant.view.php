<?php
require_once "database/database.php";
require_once "models/admin/restuarant/resturant.process.php";
$restuarant = get_restaurant();

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
        
        foreach ($restuarant as $res) {
        ?>
            <img alt="#" src="../../../assets/images/restaurant/<?= $res['restaurant_image_url'] ?>" class="restaurant-pic">
        <?php } ?>
        <div class="pt-3 text-white">
            <h2 class="font-weight-bold"><?= $res['res_name'] ?></h2>
            <p class="text-white m-0"><?= $res['res_address'] ?></p>
            <div class="rating-wrap d-flex align-items-center mt-2">
                <ul class="rating-stars list-unstyled">
                    <li>
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
            <div class="row">
                <div class="col-6 col-md-2">
                    <p class="text-white-50 font-weight-bold m-0 small">Delivery</p>
                    <p class="text-white m-0">Free</p>
                </div>
                <div class="col-6 col-md-2">
                    <p class="text-white-50 font-weight-bold m-0 small">Open time</p>
                    <p class="text-white m-0">8:00 AM</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container position-relative" style="display: flex; width: 100%;">
    <div class="row" style="width: 80%; display:flex; flex-direction:column">
        <div class="container" style="width: 100%; justify-content:space-between;">
            <div class="left_side" style="width: 100%; margin-top:20px">
                <p class="font-weight-bold pt-2 m-0">FOOD ITEMS</p>
                <div class="card_product" style="overflow:scroll; height:450px">
                    <div class="trending-scroll rounded" style="width: 100%; display:flex; flex-wrap: wrap; justify-content:space-between; margin-bottom:15px">
                        <?php
                        $restuarant = get_restaurant();
                        foreach ($restuarant as $res) {
                        ?>
                            <div class="osahan-slider-item" style="width: 235px; margin-top: 0px; margin-bottom:10px">
                                <div class="list-card bg-white rounded overflow-hidden position-relative shadow-sm">
                                    <div class="list-card-image">
                                        <a href="#checkout">
                                            <img alt="#" src="../../../assets/images/restaurant/<?= $res['restaurant_image_url'] ?>" class="img-fluid item-img w-100" style="background-color:teal; height:200px">
                                        </a>
                                    </div>
                                    <div class="p-3 position-relative">
                                        <div class="list-card-body">
                                            <h6 class="mb-1"><a href="/checkout" class="text-black"><?= $res['res_name'] ?></a></h6>
                                            <p class="text-gray mb-3"><?= $res['res_address'] ?></p>
                                            <p class="text-gray m-0" style="display:flex; justify-content:space-between"> <span class="text-black-50"> $350 FOR TWO</span>
                                                <i class="feather-shopping-cart h6 mr-2 mb-0" style="background-color:#E21B70;padding:5px; width:50px; color:white; border-radius:5px; justify-content:center; align-items: center; text-align:center; .feather-shopping-cart:hover{background-color:wheat} "></i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="rating_side" style="width:100%">
                <div class="mb-3">
                    <div id="ratings-and-reviews" class="bg-white shadow-sm d-flex align-items-center rounded p-3 mb-3 clearfix restaurant-detailed-star-rating">
                        <h6 class="mb-0">Rate this Place</h6>
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
    
                        <h6 class="mb-1">Comments</h6>
                        <?php
                            require "models/comments/comments.model.php";
                            $comments = get_comment();
                            foreach($comments as $comment):
                        ?>
                        <div class="reviews-members py-3">
                       
                            <div class="media">
                                <a href="#"><img  style="width: 50px;height:50px" alt="#" src="../../assets/images/user/<?= $comment['profile']?>" class="mr-3 rounded-pill"></a>
                                <div class="media-body">
                                    <div class="reviews-members-header">
                            
                                        <h6 class="mb-0"><a class="text-dark" href="#"><?= $comment['user'] ?></a></h6>
                                        <p class="text-muted small"><?=$comment['date'] ?></p>
                                    </div>
                                    <div class="reviews-members-body">
                                        <p><?= $comment['content'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach?>

                       
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
                                <textarea class="form-control" name="comment" required></textarea>
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
    <div class="col-md-4 pt-3" style="margin-top:30px; width: 20%;height:auto">
        <div class="osahan-cart-item rounded rounded shadow-sm overflow-hidden bg-white sticky_sidebar">
            <div class="d-flex border-bottom osahan-cart-item-profile bg-white p-3">
                <img alt="osahan" src="assets/images/starter1.jpg" class="mr-3 rounded-circle img-fluid">
                <div class="d-flex flex-column">
                    <h6 class="mb-1 font-weight-bold">Spice Hut Indian Restaurant</h6>
                    <p class="mb-0 small text-muted"><i class="feather-map-pin"></i> 2036 2ND AVE, NEW YORK, NY
                        10029</p>
                </div>
            </div>
            <div class="bg-white border-bottom py-2">
                <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                    <div class="media align-items-center">
                        <div class="mr-2 text-danger">&middot;</div>
                        <div class="media-body">
                            <p class="m-0">Chicken Tikka Sub</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="count-number float-right"><button type="button" class="btn-sm left dec btn btn-outline-secondary"> <i class="feather-minus"></i>
                            </button><input class="count-number-input" type="text" readonly value="2"><button type="button" class="btn-sm right inc btn btn-outline-secondary"> <i class="feather-plus"></i> </button></span>
                        <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                    </div>
                </div>
                <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                    <div class="media align-items-center">
                        <div class="mr-2 text-danger">&middot;</div>
                        <div class="media-body">
                            <p class="m-0">Methi Chicken Dry
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="count-number float-right"><button type="button" class="btn-sm left dec btn btn-outline-secondary"> <i class="feather-minus"></i>
                            </button><input class="count-number-input" type="text" readonly value="2"><button type="button" class="btn-sm right inc btn btn-outline-secondary"> <i class="feather-plus"></i> </button></span>
                        <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                    </div>
                </div>
                <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                    <div class="media align-items-center">
                        <div class="mr-2 text-danger">&middot;</div>
                        <div class="media-body">
                            <p class="m-0">Reshmi Kebab
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="count-number float-right"><button type="button" class="btn-sm left dec btn btn-outline-secondary"> <i class="feather-minus"></i>
                            </button><input class="count-number-input" type="text" readonly value="2"><button type="button" class="btn-sm right inc btn btn-outline-secondary"> <i class="feather-plus"></i> </button></span>
                        <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                    </div>
                </div>
                <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                    <div class="media align-items-center">
                        <div class="mr-2 text-success">&middot;</div>
                        <div class="media-body">
                            <p class="m-0">Lemon Cheese Dry
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="count-number float-right"><button type="button" class="btn-sm left dec btn btn-outline-secondary"> <i class="feather-minus"></i>
                            </button><input class="count-number-input" type="text" readonly value="2"><button type="button" class="btn-sm right inc btn btn-outline-secondary"> <i class="feather-plus"></i> </button></span>
                        <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                    </div>
                </div>
                <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2">
                    <div class="media align-items-center">
                        <div class="mr-2 text-success">&middot;</div>
                        <div class="media-body">
                            <p class="m-0">Rara Paneer</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="count-number float-right"><button type="button" class="btn-sm left dec btn btn-outline-secondary"> <i class="feather-minus"></i>
                            </button><input class="count-number-input" type="text" readonly value="2"><button type="button" class="btn-sm right inc btn btn-outline-secondary"> <i class="feather-plus"></i> </button></span>
                        <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                    </div>
                </div>
            </div>
            <div class="bg-white p-3 py-3 border-bottom clearfix">
                <div class="input-group-sm mb-2 input-group">
                    <input placeholder="Enter promo code" type="text" class="form-control">
                    <div class="input-group-append"><button type="button" class="btn btn-primary"><i class="feather-percent"></i> APPLY</button></div>
                </div>
                <div class="mb-0 input-group">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="feather-message-square"></i></span></div>
                    <textarea placeholder="Any suggestions? We will pass it on..." aria-label="With textarea" class="form-control"></textarea>
                </div>
            </div>
            <div class="bg-white p-3 clearfix border-bottom">
                <p class="mb-1">Item Total <span class="float-right text-dark">$3140</span>
                    <i class="feather-shopping-cart h6 mr-2 mb-0"></i>
                    <span>Cart</span>
                </p>
                <p class="mb-1">Restaurant Charges <span class="float-right text-dark">$62.8</span>
                    <i class="feather-shopping-cart h6 mr-2 mb-0"></i>
                    <span>Cart</span>
                </p>
                <p class="mb-1">Delivery Fee<span class="text-info ml-1"><i class="feather-info"></i></span><span class="float-right text-dark">$10</span>
                    <i class="feather-shopping-cart h6 mr-2 mb-0"></i>
                    <span>Cart</span>
                </p>
                <p class="mb-1 text-success">Total Discount<span class="float-right text-success">$1884</span>
                </p>
                <hr>
                <h6 class="font-weight-bold mb-0">TO PAY <span class="float-right">$1329</span></h6>
            </div>
            <div class="p-3">
                <a class="btn btn-success btn-block btn-lg" href="/checkout">PAY $1329<i class="feather-arrow-right"></i></a>
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