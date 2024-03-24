<?php
require "layouts/admin/header.php";
require "layouts/admin/navbar.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Information Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2 class="title" style="align-item:center; text-align:center; margin-top:10%;">Product Information</h2>
    <form action="" method="" class="border border-primary" style="width: 500px; margin-left: 25%; border-radius:20px; padding:20px; margin-top:3%">
      <div class="form-group" >
        <label for="product_image_url">Image URL</label>
        <input type="text" class="border form-control" id="product_image_url" name="product_image_url" placeholder="enter image URL" required>
      </div>
      <div class="form-group">
        <label for="product_name">Product Name</label>
        <input type="text" class="border form-control" id="product_name" name="product_name" placeholder="enter product name" required>
      </div>
      <div class="form-group">
        <label for="restaurant_name">Restaurant Name</label>
        <input type="text" class="border form-control" id="restaurant_name" name="restaurant_name" placeholder="enter restaurant name" required>
      </div>
      <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="border form-control" id="price" name="price" placeholder="enter price" required>
      </div>
      <div class="form-group">
        <label for="discount">Discount</label>
        <input type="number" class="border form-control" id="discount" name="discount" placeholder="enter discount" required>
      </div>
      <button type="submit" class="border btn btn-primary">Submit</button>
    </form>
  </div>

  <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
z
