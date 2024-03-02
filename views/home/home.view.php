<?php
require 'database/database.php';
require 'models/admin/category/category.process.php';


?>
<div class="osahan-home-page">
    <div class="bg-primary p-3 d-none">
      <div class="text-white">
        <div class="title d-flex align-items-center">
          <a class="toggle" href="#">
            <span></span>
          </a>
          <h4 class="font-weight-bold m-0 pl-5">Browse</h4>
          <a class="text-white font-weight-bold ml-auto" data-toggle="modal" data-target="#exampleModal"
            href="#">Filter</a>
        </div>
      </div>
      <div class="input-group mt-3 rounded shadow-sm overflow-hidden">
        <div class="input-group-prepend">
          <button class="border-0 btn btn-outline-secondary text-dark bg-white btn-block">
            <i class="feather-search"></i>
          </button>
        </div>
        <input type="text" class="shadow-none border-0 form-control" placeholder="Search for restaurants or dishes" />
      </div>
    </div>

    <div class="container">
      <div class="cat-slider">
      <?php
        $categories = get_category();
            foreach ($categories as $category):
              ?>
              <div class="cat-item px-1 py-3">
                <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html">
                  <img alt="#" src="../../../assets/images/categories/<?= $category['picture'] ?>" class="img-fluid mb-2"
                    style="height: 100px; width: 250px;" />
                  <p class="m-0 small">
                    <?= $category['category_name'] ?>
                  </p>
                </a>
              </div>
            <?php endforeach; ?>
      </div>
    </div>



    <div class="bg-theme-black py-3" style="height:70vh; background-image: url('assets/images/pg.jpg'); background-size: cover; background-position: center;">
      <div class="container">
        <h1>Delicious, hygienic food, fast delivery <b>GO-FOOD</b></h1>
        <br>
        <form class="example" action="">
          <input type="text" placeholder="Search.." name="search">
          <button type="submit"> inter</button>
        </form>



        <style>
          .bg-theme-black{
            margin-left: 17%;
            width: 66%;
          }
          .contaoner, h1{
            font: oblique;
            margin-left: 60%;
            margin-top: 10%;
            b{
              color: #B82222;
            }
            
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
    <div class="container">
      <div class="pt-4 pb-2 title d-flex align-items-center">
        <h5 class="m-0">Trending this week</h5>
        <a class="font-weight-bold ml-auto" href="trending.html">View all <i class="feather-chevrons-right"></i></a>
      </div>

      <div class="trending-slider">
        <div class="osahan-slider-item">
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
              <a href="/restaurant">
                <img alt="#" src="assets/images/trending1.png" class="img-fluid item-img w-100" />
              </a>
            </div>
            <div class="p-3 position-relative">
              <div class="list-card-body">
                <h6 class="mb-1">
                  <a href="/restaurant" class="text-black">Famous Dave's Bar-B-Que
                  </a>
                </h6>
                <p class="text-gray mb-3">Vegetarian • Indian • Pure veg</p>
                <p class="text-gray mb-3 time">
                  <span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 15–30
                    min</span>
                  <span class="float-right text-black-50"> $350 FOR TWO</span>
                </p>
              </div>
              <div class="list-card-badge">
                <span class="badge badge-danger">OFFER</span>
                <small> Use Coupon OSAHAN50</small>
              </div>
            </div>
          </div>
        </div>
        <div class="osahan-slider-item">
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
              <a href="/restaurant">
                <img alt="#" src="assets/images/trending2.png" class="img-fluid item-img w-100" />
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
              <div class="list-card-badge">
                <span class="badge badge-success">OFFER</span>
                <small>65% off</small>
              </div>
            </div>
          </div>
        </div>
        <div class="osahan-slider-item">
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
              <a href="/restaurant">
                <img alt="#" src="assets/images/trending3.png" class="img-fluid item-img w-100" />
              </a>
            </div>
            <div class="p-3 position-relative">
              <div class="list-card-body">
                <h6 class="mb-1">
                  <a href="/restaurant" class="text-black">The osahan Restaurant
                  </a>
                </h6>
                <p class="text-gray mb-3">North • Hamburgers • Pure veg</p>
                <p class="text-gray mb-3 time">
                  <span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 15–25
                    min</span>
                  <span class="float-right text-black-50"> $500 FOR TWO</span>
                </p>
              </div>
              <div class="list-card-badge">
                <span class="badge badge-danger">OFFER</span>
                <small>65% OSAHAN50</small>
              </div>
            </div>
          </div>
        </div>
        <div class="osahan-slider-item">
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
              <a href="/restaurant">
                <img alt="#" src="assets/images/trending2.png" class="img-fluid item-img w-100" />
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
              <div class="list-card-badge">
                <span class="badge badge-success">OFFER</span>
                <small>65% off</small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="py-3 title d-flex align-items-center">
        <h5 class="m-0">Most popular</h5>
        <a class="font-weight-bold ml-auto" href="most_popular.html">26 places <i
            class="feather-chevrons-right"></i></a>
      </div>

      <div class="most_popular">
        <div class="row">
          <div class="col-md-3 pb-3">
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
                <a href="/restaurant">
                  <img alt="#" src="assets/images/popular1.png" class="img-fluid item-img w-100" />
                </a>
              </div>
              <div class="p-3 position-relative">
                <div class="list-card-body">
                  <h6 class="mb-1">
                    <a href="/restaurant" class="text-black">The osahan Restaurant
                    </a>
                  </h6>
                  <p class="text-gray mb-1 small">• North • Hamburgers</p>
                  <p class="text-gray mb-1 rating"></p>
                  <ul class="rating-stars list-unstyled">
                    <li>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star"></i>
                    </li>
                  </ul>
                  <p></p>
                </div>
                <div class="list-card-badge">
                  <span class="badge badge-danger">OFFER</span>
                  <small>65% OSAHAN50</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 pb-3">
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
                <a href="/restaurant">
                  <img alt="#" src="assets/images/popular2.png" class="img-fluid item-img w-100" />
                </a>
              </div>
              <div class="p-3 position-relative">
                <div class="list-card-body">
                  <h6 class="mb-1">
                    <a href="/restaurant" class="text-black">Thai Famous Indian Cuisine</a>
                  </h6>
                  <p class="text-gray mb-1 small">• Indian • Pure veg</p>
                  <p class="text-gray mb-1 rating"></p>
                  <ul class="rating-stars list-unstyled">
                    <li>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star"></i>
                    </li>
                  </ul>
                  <p></p>
                </div>
                <div class="list-card-badge">
                  <span class="badge badge-success">OFFER</span>
                  <small>65% off</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 pb-3">
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
                <a href="/restaurant">
                  <img alt="#" src="assets/images/popular3.png" class="img-fluid item-img w-100" />
                </a>
              </div>
              <div class="p-3 position-relative">
                <div class="list-card-body">
                  <h6 class="mb-1">
                    <a href="/restaurant" class="text-black">The osahan Restaurant
                    </a>
                  </h6>
                  <p class="text-gray mb-1 small">• Hamburgers • Pure veg</p>
                  <p class="text-gray mb-1 rating"></p>
                  <ul class="rating-stars list-unstyled">
                    <li>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star"></i>
                    </li>
                  </ul>
                  <p></p>
                </div>
                <div class="list-card-badge">
                  <span class="badge badge-danger">OFFER</span>
                  <small>65% OSAHAN50</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 pb-3">
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
                <a href="/restaurant">
                  <img alt="#" src="assets/images/popular4.png" class="img-fluid item-img w-100" />
                </a>
              </div>
              <div class="p-3 position-relative">
                <div class="list-card-body">
                  <h6 class="mb-1">
                    <a href="/restaurant" class="text-black">Bite Me Now Sandwiches</a>
                  </h6>
                  <p class="text-gray mb-1 small">American • Pure veg</p>
                  <p class="text-gray mb-1 rating"></p>
                  <ul class="rating-stars list-unstyled">
                    <li>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star"></i>
                    </li>
                  </ul>
                  <p></p>
                </div>
                <div class="list-card-badge">
                  <span class="badge badge-success">OFFER</span>
                  <small>65% off</small>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 pb-3">
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
                <a href="/restaurant">
                  <img alt="#" src="assets/images/popular5.png" class="img-fluid item-img w-100" />
                </a>
              </div>
              <div class="p-3 position-relative">
                <div class="list-card-body">
                  <h6 class="mb-1">
                    <a href="/restaurant" class="text-black">The osahan Restaurant
                    </a>
                  </h6>
                  <p class="text-gray mb-1 small">• North • Hamburgers</p>
                  <p class="text-gray mb-1 rating"></p>
                  <ul class="rating-stars list-unstyled">
                    <li>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star"></i>
                    </li>
                  </ul>
                  <p></p>
                </div>
                <div class="list-card-badge">
                  <span class="badge badge-danger">OFFER</span>
                  <small>65% OSAHAN50</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 pb-3">
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
                <a href="/restaurant">
                  <img alt="#" src="assets/images/popular6.png" class="img-fluid item-img w-100" />
                </a>
              </div>
              <div class="p-3 position-relative">
                <div class="list-card-body">
                  <h6 class="mb-1">
                    <a href="/restaurant" class="text-black">Thai Famous Indian Cuisine</a>
                  </h6>
                  <p class="text-gray mb-1 small">• Indian • Pure veg</p>
                  <p class="text-gray mb-1 rating"></p>
                  <ul class="rating-stars list-unstyled">
                    <li>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star"></i>
                    </li>
                  </ul>
                  <p></p>
                </div>
                <div class="list-card-badge">
                  <span class="badge badge-success">OFFER</span>
                  <small>65% off</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 pb-3">
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
                <a href="/restaurant">
                  <img alt="#" src="assets/images/popular7.png" class="img-fluid item-img w-100" />
                </a>
              </div>
              <div class="p-3 position-relative">
                <div class="list-card-body">
                  <h6 class="mb-1">
                    <a href="/restaurant" class="text-black">The osahan Restaurant
                    </a>
                  </h6>
                  <p class="text-gray mb-1 small">• Hamburgers • Pure veg</p>
                  <p class="text-gray mb-1 rating"></p>
                  <ul class="rating-stars list-unstyled">
                    <li>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star"></i>
                    </li>
                  </ul>
                  <p></p>
                </div>
                <div class="list-card-badge">
                  <span class="badge badge-danger">OFFER</span>
                  <small>65% OSAHAN50</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 pb-3">
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
                <a href="/restaurant">
                  <img alt="#" src="assets/images/popular8.png" class="img-fluid item-img w-100" />
                </a>
              </div>
              <div class="p-3 position-relative">
                <div class="list-card-body">
                  <h6 class="mb-1">
                    <a href="/restaurant" class="text-black">Bite Me Now Sandwiches</a>
                  </h6>
                  <p class="text-gray mb-1 small">American • Pure veg</p>
                  <p class="text-gray mb-1 rating"></p>
                  <ul class="rating-stars list-unstyled">
                    <li>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star star_active"></i>
                      <i class="feather-star"></i>
                    </li>
                  </ul>
                  <p></p>
                </div>
                <div class="list-card-badge">
                  <span class="badge badge-success">OFFER</span>
                  <small>65% off</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="pt-2 pb-3 title d-flex align-items-center">
        <h5 class="m-0">Most sales</h5>
        <a class="font-weight-bold ml-auto" href="#">26 places <i class="feather-chevrons-right"></i></a>
      </div>

      <div class="most_sale">
        <div class="row mb-3">
          <div class="col-md-4 mb-3">
            <div
              class="d-flex align-items-center list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
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
                <a href="/restaurant">
                  <img alt="#" src="assets/images/sales1.png" class="img-fluid item-img w-100" />
                </a>
              </div>
              <div class="p-3 position-relative">
                <div class="list-card-body">
                  <h6 class="mb-1">
                    <a href="/restaurant" class="text-black">The osahan Restaurant
                    </a>
                  </h6>
                  <p class="text-gray mb-3">North • Hamburgers • Pure veg</p>
                  <p class="text-gray mb-3 time">
                    <span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 15–25
                      min</span>
                    <span class="float-right text-black-50">
                      $500 FOR TWO</span>
                  </p>
                </div>
                <div class="list-card-badge">
                  <span class="badge badge-danger">OFFER</span>
                  <small>65% OSAHAN50</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div
              class="d-flex align-items-center list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
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
                <a href="/restaurant">
                  <img alt="#" src="assets/images/sales2.png" class="img-fluid item-img w-100" />
                </a>
              </div>
              <div class="p-3 position-relative">
                <div class="list-card-body">
                  <h6 class="mb-1">
                    <a href="/restaurant" class="text-black">Thai Famous Cuisine</a>
                  </h6>
                  <p class="text-gray mb-3">
                    North Indian • Indian • Pure veg
                  </p>
                  <p class="text-gray mb-3 time">
                    <span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 30–35
                      min</span>
                    <span class="float-right text-black-50">
                      $250 FOR TWO</span>
                  </p>
                </div>
                <div class="list-card-badge">
                  <span class="badge badge-success">OFFER</span>
                  <small>65% off</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div
              class="d-flex align-items-center list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
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
                <a href="/restaurant">
                  <img alt="#" src="assets/images/sales3.png" class="img-fluid item-img w-100" />
                </a>
              </div>
              <div class="p-3 position-relative">
                <div class="list-card-body">
                  <h6 class="mb-1">
                    <a href="/restaurant" class="text-black">The osahan Restaurant
                    </a>
                  </h6>
                  <p class="text-gray mb-3">North • Hamburgers • Pure veg</p>
                  <p class="text-gray mb-3 time">
                    <span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 15–25
                      min</span>
                    <span class="float-right text-black-50">
                      $500 FOR TWO</span>
                  </p>
                </div>
                <div class="list-card-badge">
                  <span class="badge badge-danger">OFFER</span>
                  <small>65% OSAHAN50</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="osahan-menu-fotter fixed-bottom bg-white px-3 py-2 text-center d-none">
    <div class="row">
      <div class="col selected">
        <a href="home.html" class="text-danger small font-weight-bold text-decoration-none">
          <p class="h4 m-0"><i class="feather-home text-danger"></i></p>
          Home
        </a>
      </div>
      <div class="col">
        <a href="most_popular.html" class="text-dark small font-weight-bold text-decoration-none">
          <p class="h4 m-0"><i class="feather-map-pin"></i></p>
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