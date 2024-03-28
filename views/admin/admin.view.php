<?php
require "./models/order/add.cart.model.php";
?>
<div class="main-wrapper">
  <link rel="stylesheet" href="../../vendor/plugins/chart.min.js">
  <!-- ! Main -->
  <main class="main users chart-page" id="skip-target">
    <div class="container">
      <h2 class="main-title">DASHBOARD</h2>
      <div class="row stat-cards">
        <div class="col-md-6 col-xl-3">
          <article class="stat-cards-item">
            <div class="stat-cards-icon primary">
              <i data-feather="bar-chart-2" aria-hidden="true"></i>
            </div>
            <div class="stat-cards-info">
              <p class="stat-cards-info__num"><?= count_restaurants() ?></p>
              <p class="stat-cards-info__title">Total visits</p>
              <p class="stat-cards-info__progress">
                <span class="stat-cards-info__profit success">
                  <i data-feather="trending-up" aria-hidden="true"></i>
                </span>
                Restaurants
              </p>
            </div>
          </article>
        </div>
        <div class="col-md-6 col-xl-3">
          <article class="stat-cards-item">
            <div class="stat-cards-icon warning">
              <i data-feather="file" aria-hidden="true"></i>
            </div>
            <div class="stat-cards-info">
              <p class="stat-cards-info__num"><?= count_category() ?></p>
              <p class="stat-cards-info__title">Total visits</p>
              <p class="stat-cards-info__progress">
                <span class="stat-cards-info__profit success">
                  <i data-feather="trending-up" aria-hidden="true"></i>
                </span>
                Category
              </p>
            </div>
          </article>
        </div>
        <div class="col-md-6 col-xl-3">
          <article class="stat-cards-item">
            <div class="stat-cards-icon purple">
              <i data-feather="file" aria-hidden="true"></i>
            </div>
            <div class="stat-cards-info">
              <p class="stat-cards-info__num"><?= count_product() ?></p>
              <p class="stat-cards-info__title">Total visits</p>
              <p class="stat-cards-info__progress">
                <span class="stat-cards-info__profit danger">
                  <i data-feather="trending-down" aria-hidden="true"></i>
                </span>
                Products
              </p>
            </div>
          </article>
        </div>
        <div class="col-md-6 col-xl-3">
          <article class="stat-cards-item">
            <div class="stat-cards-icon success">
              <i data-feather="feather" aria-hidden="true"></i>
            </div>
            <div class="stat-cards-info">
              <p class="stat-cards-info__num"><?= count_order() ?></p>
              <p class="stat-cards-info__title">Total visits</p>
              <p class="stat-cards-info__progress">
                <span class="stat-cards-info__profit warning">
                  <i data-feather="trending-up" aria-hidden="true"></i>
                </span>
                All orders
              </p>
            </div>
          </article>
        </div>
      </div>
      <div class="row">
        <div class="chart" style="height:60vh;padding:0 15px" >
          <canvas id="myChart" aria-label="Site statistics" role="img"></canvas>
        </div>
      </div>
    </div>
</div>
</main>
</div>