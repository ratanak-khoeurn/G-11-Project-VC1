<?php
require_once "database/database.php";
require_once "models/admin/restuarant/resturant.process.php";
require_once "models/add.user/add.user.model.php";
require_once "models/favorites/favorite.model.php";
function add_favorites($user_id, $res_id): bool
{
    global $connection;
    $statement = $connection->prepare("INSERT INTO favorites (user_id, res_id) VALUES (:user_id, :res_id)");
    $statement->execute([
        ':user_id' => $user_id,
        ':res_id' => $res_id
    ]);
    return $statement->rowCount() > 0;
}

if (isset($_GET['user_id']) && isset($_GET['res_id'])) {
    $user_id = $_GET['user_id'];
    $res_id = $_GET['res_id'];
    add_favorites($user_id, $res_id);
}
?>
<script src="../../vendor/js/search_restaurant_homepage.js" defer></script>
<div class="d-none">
    <div class="bg-primary p-3 d-flex align-items-center">
        <a class="toggle togglew toggle-2" href="#"><span></span></a>
        <h4 class="font-weight-bold m-0 text-white">Search</h4>
    </div>
</div>
<div class="osahan-popular">

    <div class="container">
        <div class="search py-5">
            <div class="input-group mb-4">
                <input type="text" class="search_btn form-control form-control-lg input_search border-right-0" id="inlineFormInputGroup" placeholder="search restaurant here ...............">
                <div class="input-group-prepend">
                    <div class="btn input-group-text bg-white border_search border-left-0 text-primary"><i class="feather-search"></i></div>
                </div>
            </div>

            <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active border-0 bg-light text-dark rounded" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="feather-home mr-2"></i>Restaurants</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link border-0 bg-light text-dark rounded ml-3" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="feather-disc mr-2"></i>Dishes</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <div class="container mt-4 mb-4 p-0">

                        <div class="row">
                            <?php
                            $restuarant = get_restaurant();
                            foreach ($restuarant as $res) {
                            ?>
                                <div class="col-md-3 pb-3" id="card">
                                    <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                                        <div class="list-card-image">
                                            <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>
                                            <div class="favourite-heart text-danger position-absolute">
                                                <a href="controllers/favorites/add_favorite.controller.php?id= <?= $res['id'] ?>" class="add_favorite">
                                                    <i class="feather-heart" style="cursor:pointer"></i>
                                                </a>
                                            </div>
                                            <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>
                                            <a href="<?php echo isset($_SESSION['user']) ? "/restaurant?id=" . $res['id'] : "javascript:void(0);"; ?>" id="restaurant" class="widget-header mr-4 text-white">
                                                <?php if (!isset($_SESSION['user'])) : ?>
                                                    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
                                                    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
                                                    <script>
                                                        // Function to show the alert message
                                                        function showAlert() {
                                                            swal({
                                                                title: "You don't have an account!",
                                                                text: "You need to register first.",
                                                                timer: 2000
                                                            });
                                                        }

                                                        // Add event listener to elements with ID "restaurant"
                                                        document.querySelectorAll('#restaurant, #offers').forEach(function(element) {
                                                            element.addEventListener('click', function(event) {
                                                                event.preventDefault();
                                                                showAlert(); // Call the showAlert function
                                                            });
                                                        });
                                                    </script>
                                                <?php endif; ?>

                                                <img alt="<?= $res['name'] ?>" src="../../../assets/images/restaurant/<?= $res['image'] ?>" class="img-fluid item-img w-100" style="height:200px">
                                            </a>


                                        </div>
                                        <div class="p-3 position-relative">
                                            <div class="list-card-body">
                                                <h6 class="mb-1"><a href="#" class="text-black">
                                                        <?= $res['name'] ?>
                                                    </a>
                                                </h6>
                                                <p class="text-gray mb-1 small">
                                                    <?= $res['location'] ?>
                                                </p>
                                                <p class="text-gray mb-1 rating">
                                                <ul class="rating-stars list-unstyled">
                                                    <li>
                                                        <i class="feather-star star_active"></i>
                                                        <i class="feather-star star_active"></i>
                                                        <i class="feather-star star_active"></i>
                                                        <i class="feather-star star_active"></i>
                                                        <i class="feather-star"></i>
                                                    </li>
                                                </ul>
                                                </p>
                                            </div>
    
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                    <div class="row d-flex align-items-center justify-content-center py-5">
                        <div class="col-md-4 py-5">
                            <div class="text-center py-5">
                                <p class="h4 mb-4"><i class="feather-search bg-primary text-white rounded p-2"></i>
                                </p>
                                <p class="font-weight-bold text-dark h5">Nothing found</p>
                                <p>we could not find anything that would match your search request, please try
                                    again.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        function toggleFavorite(element) {
            element.classList.toggle('favorite');
        }
        document.querySelectorAll('.add_favorite').forEach(item => {
            item.addEventListener('click', event => {
                event.preventDefault();
                toggleFavorite(item.querySelector('.feather-heart'));
                fetch(item.getAttribute('href'), {
                        method: 'POST'
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Failed to add to favorites');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
    </script>
    <style>
        .favourite-heart .feather-heart.favorite {
            background-color: pink;
        }
    </style>
    <div class="osahan-menu-fotter fixed-bottom bg-white px-3 py-2 text-center d-none">
        <div class="row">
            <div class="col">
                <a href="home.html" class="text-dark small font-weight-bold text-decoration-none">
                    <p class="h4 m-0"><i class="feather-home"></i></p>
                    Home
                </a>
            </div>
            <div class="col selected">
                <a href="trending.html" class="text-danger small font-weight-bold text-decoration-none">
                    <p class="h4 m-0"><i class="feather-map-pin text-danger"></i></p>
                    Trending
                </a>
            </div>
            <div class="col bg-white rounded-circle mt-n4 px-3 py-2">
                <div class="bg-danger rounded-circle mt-n0 shadow">
                    <a href="checkout.html" class="text-white small font-weight-bold text-decoration-none">
                        <i class="feather-shopping-cart"></i>
                    </a>
                </div>
            </div>
            <div class="col">
                <a href="favorites.html" class="heart text-dark small font-weight-bold text-decoration-none" checked="false">
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
<!-- <script src="../../vendor/js/add_favorite.js"></script> -->