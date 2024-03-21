<?php
// session_start();
require "./database/database.php";
require "models/order/add.cart.model.php"
?>

<header class="section-header">
  <section class="header-main shadow-sm bg-primary-style2" style="background-color: #E21B70;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-1">
          <a href="/" class="brand-wrap mb-0">
            <img alt="#" class="img-fluid" src="assets/images/logo_web.png" />
          </a>
        </div>
        <div class="col-3 d-flex align-items-center m-none">
          <div class="dropdown mr-3">
            <a class="btn-border-1 text-white dropdown-toggle d-flex align-items-center py-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div>
                <i class="feather-map-pin mr-2 primary-dark rounded-pill p-2 icofont-size"></i>
              </div>
              <div>
                <p class="text-white mb-0 small">Select Province</p>
                <span class='regoin'>province</span>
              </div>
            </a>
            <div class="dropdown-menu p-0 drop-loc" aria-labelledby="navbarDropdown">
              <div class="osahan-country">
                <div class="search_location bg-primary p-3 text-right">
                  <div class="input-group rounded shadow-sm overflow-hidden">
                    <div class="input-group-prepend">
                      <button class="border-0 btn btn-outline-secondary text-dark bg-white btn-block">
                        <i class="feather-search"></i>
                      </button>
                    </div>
                    <input type="text" class="shadow-none border-0 form-control" placeholder="Enter Your Province" />
                  </div>
                </div>
                <div class="p-3 border-bottom">
                  <a href="#" class="text-decoration-none">
                    <p class="font-weight-bold text-primary m-0">
                      <i class="feather-navigation"> Your region restaurant</i>
                    </p>
                  </a>
                </div>
                <div class="filter" style="max-height: 300px; overflow-y: auto;">
                  <h6 class="px-3 py-3 bg-light pb-1 m-0 border-bottom">
                    Choose your Province
                  </h6>
                  <div class="custom-control border-bottom px-0 custom-radio">
                    <input type="radio" id="customRadio1" name="location" class="custom-control-input" />
                    <label class="custom-control-label py-3 w-100 px-3" for="customRadio1">Phnom Penh</label>
                  </div>
                  <div class="custom-control border-bottom px-0 custom-radio">
                    <input type="radio" id="customRadio2" name="location" class="custom-control-input" />
                    <label class="custom-control-label py-3 w-100 px-3" for="customRadio2">Battambang</label>
                  </div>
                  <div class="custom-control border-bottom px-0 custom-radio">
                    <input type="radio" id="customRadio3" name="location" class="custom-control-input" />
                    <label class="custom-control-label py-3 w-100 px-3" for="customRadio3">Banteay Meanchey</label>
                  </div>
                  <div class="custom-control border-bottom px-0 custom-radio">
                    <input type="radio" id="customRadio4" name="location" class="custom-control-input" />
                    <label class="custom-control-label py-3 w-100 px-3" for="customRadio4">SiemReap</label>
                  </div>
                  <div class="custom-control border-bottom px-0 custom-radio">
                    <input type="radio" id="customRadio5" name="location" class="custom-control-input" />
                    <label class="custom-control-label py-3 w-100 px-3" for="customRadio5">Kompot</label>
                  </div>
                  <div class="custom-control border-bottom px-0 custom-radio">
                    <input type="radio" id="customRadio6" name="location" class="custom-control-input" />
                    <label class="custom-control-label py-3 w-100 px-3" for="customRadio6">Kandal</label>
                  </div>
                  <div class="custom-control border-bottom px-0 custom-radio">
                    <input type="radio" id="customRadio7" name="location" class="custom-control-input" />
                    <label class="custom-control-label py-3 w-100 px-3" for="customRadio7">Ratanakiri</label>
                  </div>
                  <div class="custom-control border-bottom px-0 custom-radio">
                    <input type="radio" id="customRadio8" name="location" class="custom-control-input" />
                    <label class="custom-control-label py-3 w-100 px-3" for="customRadio8">Kompong Chnang</label>
                  </div>
                  <div class="custom-control border-bottom px-0 custom-radio">
                    <input type="radio" id="customRadio9" name="location" class="custom-control-input" />
                    <label class="custom-control-label py-3 w-100 px-3" for="customRadio9">Kompong Thom</label>
                  </div>
                  <div class="custom-control border-bottom px-0 custom-radio">
                    <input type="radio" id="customRadio10" name="location" class="custom-control-input" />
                    <label class="custom-control-label py-3 w-100 px-3" for="customRadio10">Kompong Cham</label>
                  </div>
                  <div class="custom-control border-bottom px-0 custom-radio">
                    <input type="radio" id="customRadio11" name="location" class="custom-control-input" />
                    <label class="custom-control-label py-3 w-100 px-3" for="customRadio11">Kompong Speu</label>
                  </div>
                  <div class="custom-control border-bottom px-0 custom-radio">
                    <input type="radio" id="customRadio12" name="location" class="custom-control-input" />
                    <label class="custom-control-label py-3 w-100 px-3" for="customRadio12">Prey Veng</label>
                  </div>
                  <div class="custom-control border-bottom px-0 custom-radio">
                    <input type="radio" id="customRadio13" name="location" class="custom-control-input" />
                    <label class="custom-control-label py-3 w-100 px-3" for="customRadio13">Takeo</label>
                  </div>
                  <div class="custom-control border-bottom px-0 custom-radio">
                    <input type="radio" id="customRadio14" name="location" class="custom-control-input" />
                    <label class="custom-control-label py-3 w-100 px-3" for="customRadio14">Pailin</label>
                  </div>
                  <div class="custom-control border-bottom px-0 custom-radio">
                    <input type="radio" id="customRadio15" name="location" class="custom-control-input" />
                    <label class="custom-control-label py-3 w-100 px-3" for="customRadio15">Pursat</label>
                  </div>
                  <div class="custom-control border-bottom px-0 custom-radio">
                    <input type="radio" id="customRadio16" name="location" class="custom-control-input" />
                    <label class="custom-control-label py-3 w-100 px-3" for="customRadio16">Koh Kong</label>
                  </div>
                  <div class="custom-control border-bottom px-0 custom-radio">
                    <input type="radio" id="customRadio17" name="location" class="custom-control-input" />
                    <label class="custom-control-label py-3 w-100 px-3" for="customRadio17">Kep</label>
                  </div>
                  <div class="custom-control border-bottom px-0 custom-radio">
                    <input type="radio" id="customRadio18" name="location" class="custom-control-input" />
                    <label class="custom-control-label py-3 w-100 px-3" for="customRadio18">Mondol Kiri</label>
                  </div>
                  <div class="custom-control border-bottom px-0 custom-radio">
                    <input type="radio" id="customRadio19" name="location" class="custom-control-input" />
                    <label class="custom-control-label py-3 w-100 px-3" for="customRadio19">Svay Reang</label>
                  </div>
                  <div class="custom-control border-bottom px-0 custom-radio">
                    <input type="radio" id="customRadio20" name="location" class="custom-control-input" />
                    <label class="custom-control-label py-3 w-100 px-3" for="customRadio20">Steng Traeng</label>
                  </div>
                  <div class="custom-control border-bottom px-0 custom-radio">
                    <input type="radio" id="customRadio21" name="location" class="custom-control-input" />
                    <label class="custom-control-label py-3 w-100 px-3" for="customRadio21">Preh Sihaknok</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-8">
          <div class="d-flex align-items-center justify-content-end pr-5">
            <a href="/all_restaurants" class="widget-header mr-4 text-white">
              <div class="icon d-flex align-items-center">
                <i class="feather-search h6 mr-2 mb-0"></i>
                <span>Restaurants</span>
              </div>
            </a>

            <a href="<?php echo isset($_SESSION['user']) ? '/offers' : 'javascript:void(0)'; ?>" id="offers" class="widget-header mr-4 text-white golden-btn widget-header mr-4 text-dark btn m-none">
              <div class="icon d-flex align-items-center">
                <i class="feather-disc h6 mr-2 mb-0"></i>
                <span>Offers</span>
              </div>
            </a>
            <a href="/signin" class="widget-header mr-4 text-white m-none <?= isset($_SESSION['user']['first_name']) ? 'd-none' : '' ?>">
              <div class="icon d-flex align-items-center">
                <i class="feather-user h6 mr-2 mb-0"></i>
                <span>Sign in</span>
              </div>
            </a>
            <span class="user-name" style="color:white;text-align:center;margin-right:10px">
              <?= isset($_SESSION['user']['first_name']) ? $_SESSION['user']['first_name'] : '' ?>
            </span>

            <?php

            ?>
            <div class="dropdown mr-4 m-none">
              <a href="#" class="dropdown-toggle text-white py-3 d-block" style="width: 43px;height:75px;" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                $picture_path = isset($_SESSION['user']['picture']) && $_SESSION['user']['picture'] != '' ? $_SESSION['user']['picture'] : '../../../assets/images/avatar/no-profile-pic-icon-11.jpg';
                ?>
                <img style="width: 100%;height:100%" alt="#" src="../../../assets/images/user/<?php echo $picture_path; ?>" class="img-fluid rounded-circle header-user mr-2 header-user" />
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <?php
                if (isset($_SESSION['user'])) {
                ?>
                  <a class="dropdown-item" href="/profile">My account</a>
                  <a class="dropdown-item" href="faq.html">Delivery support</a>
                  <a class="dropdown-item" href="contact-us.html">Contant us</a>
                  <a class="dropdown-item" href="terms.html">Term of use</a>
                  <a class="dropdown-item" href="privacy.html">Privacy policy</a>
                  <a class="dropdown-item" href="controllers/logout/logout.controller.php">Logout</a>
                <?php
                }
                ?>
              </div>
            </div>

            <a href="<?php echo isset($_SESSION['user']) ? '/checkout' : 'javascript:void(0);'; ?>" id="cartLink" class="widget-header mr-4 text-white">
              <div class="icon d-flex align-items-center">
                <i class="feather-shopping-cart h6 mr-2 mb-0"></i>
                <span>Cart</span>
                <?php
                if (isset($_SESSION['user'])) {
                  $orderCount = count_order();
                  echo '<span id="cart-count">(' . $orderCount . ')</span>';
                }
                ?>
              </div>
            </a>

            <?php if (!isset($_SESSION['user'])) : ?>
              <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
              <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
              <script>
                document.getElementById('cartLink').addEventListener('click', function(event) {
                  event.preventDefault();

                  swal({
                    title: "You don't have account!",
                    text: "you need to register first.",
                    timer: 2000
                  });
                });
                document.getElementById('offers').addEventListener('click', function(event) {
                  event.preventDefault();

                  swal({
                    title: "You don't have account!",
                    text: "you need to register first.",
                    timer: 2000
                  });
                });
              </script>
            <?php endif; ?>
            <style>
              #cart-count {
                background-color: red;
                color: white;
                padding: 2px 2px;
                border-radius: 50%;
                font-size: 10px;
                position: relative;
                top: -8px;
                left: -px;
              }
            </style>
          </div>
          </a>
          <a class="toggle mt-2" href="#">
            <span></span>
          </a>
        </div>
      </div>
    </div>
    </div>
  </section>
</header>
<script src="vendor/js/search_province.js"></script>