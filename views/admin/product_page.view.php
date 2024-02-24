<?php
require "database/database.php";
require "models/admin/products/product.model.php";
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="../../vendor/css/product_form.css">
<script src="../../vendor/js/product_page.js" defer></script>
<script src="../../vendor/js/search_product.js" defer></script>

<div class="container">
  <h2 class="main-title">Products</h2>
  <button class="btn-add">Add Product +</button>
  <input type="text" class="search_btn" name="search_box" placeholder="Search products here.............">
  <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <form action="models/admin/products/product_process.model.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <div class="form-group">
            <label for="product_image_url">Image URL</label>
            <input type="file" class="border form-control" id="product_img" name="product_img"
              placeholder="enter image URL" required>
          </div>
          <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" class="border form-control" id="product_name" name="product_name"
              placeholder="enter product name" required>
          </div>
        </div>
        <div class="form-group">
          <label for="restaurant_name">Restaurant Name</label>
          <select class="form-control" id="restaurant_name" name="restaurant_name" required>
            <option value="">Select a restaurant</option>
            <option value="restaurant1">Restaurant 1</option>
            <option value="restaurant2">Restaurant 2</option>
            <option value="restaurant3">Restaurant 3</option>
            <!-- Add more options as needed -->
          </select>
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" class="border form-control" id="price" name="price" placeholder="enter price" required>
        </div>
        <div class="form-group">
          <label for="discount">Discount</label>
          <input type="number" class="border form-control" id="discount" name="discount" placeholder="enter discount"
            required>
        </div>
        <button type="submit" class="border btn ">Submit</button>
      </form>
    </div>
  </div>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Restaurant Name</th>
        <th>Image URl</th>
        <th>Price</th>
        <th>Discount</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $products = get_product();
      foreach ($products as $index=>$product) {
        ?>

        <tr>
          <td>
          <?php echo $index + 1; ?>
          </td>
          <td>
            <?= $product['product_name'] ?>
          </td>
          <td>
            <?= $product['restaurant_name'] ?>
          </td>
          <td><img src="<?= $product['product_img'] ?>" class="img"
              style="width: 70px;height:70px;border-radius:50%; margin-right:5px; padding:3px" alt=""></td>
          <td>
            <?= $product['price'] ?>
          </td>
          <td>
            <?= $product['discount'] ?>
          </td>
          <td style="width:15%; justify-content: space-between;">
            <a href="../../models/admin/products/product_edit.model.php?id=<?= $product['id'] ?>"><i class="material-icons edit">edit</i></a>
            <a href="../../models/admin/products/product_delete.model.php?id=<?= $product['id'] ?>"><i
                class="material-icons delete">delete</i></a>
          </td>
        </tr>

        <?php
      }
      ?>
    </tbody>
  </table>
</div>
<style>
  .edit {
    color: blue;
    margin-right: 15px;
  }

  .delete {
    color: red;
    margin-left: 5px;
  }

  .search_btn {
    background-color: blue;
    color: white;
    margin-left: 49%;
    width: 30%;
    padding: 12px;
    border-radius: 50px;
  }

  .btn-add {
    background-color: blue;
    border-radius: 50px;
  }
</style>