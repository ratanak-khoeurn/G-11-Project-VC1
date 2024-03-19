<?php
require "database/database.php";
require "models/admin/products/product.model.php";
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="../../vendor/css/product_form.css">
<script src="../../../vendor/js/product_page.js" defer></script>
<script src="../../../vendor/js/search_product.js" defer></script>

<div class="container">
  <button class="btn-add" style="background:#E21B70;margin-top:20px;">Add Product +</button>
  <input type="text" class="search_btn" name="search_box" placeholder="Search products here.............">
  <hr>
  <div class="manin-card" style="overflow: auto; max-height: 700px;">
    <?php
    if(isset($_SESSION['admin'])){
      $products = get_product();

    }else{
      $products = get_product_base_name($_SESSION['manager']['first_name'].$_SESSION['manager']['last_name']);
    }
    foreach ($products as $product) {
      $_SESSION['res_names'] = $product['restaurant_name'];
      
      ?>
      <div class="card">
        <div class="card-header">
          <h2>
            <?= $product['product_name'] ?>
          </h2>
        </div>
        <div class="card-content">
          <div class="card-body" style="position: relative;">
            <img src=" ../../../assets/images/products/<?= $product['product_img'] ?>" alt="" style="width: 100%; height: 100%;">
            <div class="text" style="position: absolute; top: 60%; left: 50%; transform: translate(-50%, -50%); color: white; height: 50%; width: 100%; background-color: rgba(0, 0, 100, 0.4); opacity: 1; margin-top: 28px; z-index: 1;padding-left:10px">
              <h4> <?= $product['restaurant_name'] ?></h4>
              <p> Price : <?= $product['price'] ?> $</p>
              <p> Discount: <?= $product['discount'] ?>%</p>
            </div>
          </div>
          <div class="card-footer">
            <a href="../../models/admin/products/product_delete.model.php?id=<?= $product['id'] ?>&image=<?= urlencode($product['product_img']) ?>"><img src="../../assets/images/icons/delete.png" alt="" style="border-radius: 50%; width:30px;height:30px"></a>
            <a href="../../controllers/admin/products/edit.controller.php?id=<?= $product['id'] ?>&image=<?= urlencode($product['product_img']) ?>"><img src="../../assets/images/icons/delete_admin.png" alt="" style="border-radius: 5%; width:30px;height:30px"></a>
            <a href="../../controllers/history/product.controller.php"><img src="assets/images/History_pic.png" alt="" style="border-radius: 50%; width:60px;height:35px"></a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
  <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <?php
      $restaurants = get_restaurant();
      $categories = get_category();
      ?>
      <form action="models/admin/products/product_process.model.php" method="post" enctype="multipart/form-data" class="form_add_product">
        <div class="mb-3">
          <div class="form-group">
            <label for="product_image_url">Image URL</label>
            <input type="file" class="border form-control" id="product_img" name="product_img" placeholder="enter image URL" required>
          </div>
          <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" class="border form-control" id="product_name" name="product_name" placeholder="enter product name" required>
          </div>
        </div>
        <div class="form-group">
          <label for="restaurant_name">Restaurant Name</label>
          <select class="form-control" id="restaurant_name" name="restaurant_name" required>
            <?php
            if(isset($_SESSION['admin'])){
            foreach ($restaurants as $restaurant) {
            ?>
              <option value="<?php echo $restaurant['res_name'] ?>"><?php echo $restaurant['res_name'] ?></option>
            <?php
            }
          }else{
            session_start();
            
            ?>
            <option value="<?php echo $_SESSION['res_names'] ?>"><?php echo $_SESSION['res_names'] ?></option>
            <?php
          }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="category_name">Category Type</label>
          <select class="form-control" id="category_name" name="category_name" required>
            <?php
            foreach ($categories as $category) {
            ?>
              <option value="<?php echo $category['category_name'] ?>"><?php echo $category['category_name'] ?> </option>
            <?php
            }
            ?>
          </select>
        </div>

        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" class="border form-control" id="price" name="price" placeholder="enter price" required>
        </div>
        <div class="form-group">
          <label for="discount">Discount</label>
          <input type="number" class="border form-control" id="discount" name="discount" placeholder="enter discount" required>
        </div>
        <button type="submit" class="border btn ">Submit</button>
      </form>
    </div>
  </div>




</div>

<style>
  .form_add_product {
    margin-left: 40px;
    height: 80%;
  }
  .modal-content{
    margin-top: 50px;
  }
  .edit {
    color: blue;
    margin-right: 15px;
  }

  .delete {
    color: red;
    margin-left: 5px;
  }

  hr {
    border: 4px solid black;
  }

  .search_btn {
    background-color: #E21B70;
    color: white;
    margin-left: 49%;
    width: 30%;
    padding: 12px;
    border-radius: 20px;
  }

  .btn-add {
    background-color: #E21B70;

  }

  input[type=file]::file-selector-button {
    background-color: #E21B70;
    color: white;
    border: 0px;
    border-right: 1px solid #050505;
    padding: 10px 5px;
    margin-right: 20px;
    transition: .5s;
  }

  input[type=file]::file-selector-button:hover {
    background-color: #E21B70;
    border: 0px;
    border-right: 1px solid #2e2a2a;
    color: black;
  }

  .popup {

    /* position: fixed; */
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px;
    border: 1px solid #ccc;
    /* z-index: 9999; */
  }


  i {
    display: flex;
    justify-content: space-around;
    text-align: center;
    padding: 5px 10px;
    width: 30px;
  }

  .fa-pen {
    color: blue;
    cursor: pointer;
    font-size: 15px
  }

  .fa-trash {
    color: red;
    cursor: pointer;
  }

  .edit_form_content {
    background-color: #E21B70;
    margin: auto;
    margin-top: 10%;
    padding: 20px;
    border: 1px solid #888;
    width: 100%;
    /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); */
    animation-name: modalopen;
    animation-duration: 0.4s;
    border-radius: 5px;
  }


  /* Animation */
  @keyframes modalopen {
    from {
      opacity: 0;
    }

    to {
      opacity: 1;
    }
  }

  /* Close button */
  .closed {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .closed:hover,
  .closed:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }

  form {

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    width: 90%;
    height: 570px;
    background: transparent;
    border: 2px solid #fff;
    color: white;
    padding: 15px 10px;
  }

  .group {
    display: flex;
    flex-direction: column;
  }

  .update {
    width: 93%;
    margin-right: 30px;
  }

  input {
    width: 500px;
    margin: 8px 0;
  }

  .manin-card {
    margin-top: 30px;
    width: 100%;
    height: auto;
    display: flex;
    justify-content: start;
    flex-wrap: wrap;
  }

  .card {
    width: 22%;
    background: white;
    height: 42vh;
    margin-top: 20px;
    margin-right: 30px;
    box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5);
    cursor: pointer;
    border-radius: 10px;


  }

  .card:hover {
    width: 22%;
    height: 41vh;
  }

  .card-header {
    width: 100%;
    height: 15%;
    background: #E21B70;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .card-header h2 {
    color: white;
  }

  .card-content {
    height: 100%;

  }

  .text {
    text-align: start;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
  }

  .card-body {
    width: 100%;
    height: 70%;
  }

  .card-footer {
    width: 100%;
    height: 15%;
    display: flex;
    justify-content: space-around;
    align-items: center;
    background: transparent;

  }
</style>