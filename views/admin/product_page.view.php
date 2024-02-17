<link rel="stylesheet" href="../../vendor/css/product_form.css">
<div class="main-wrapper">
  <!-- ! Main -->
  <main class="main users chart-page" id="skip-target">
    <div class="container">
      <h2 class="main-title">Products</h2>
      <button class="btn-add">Add Product</button>
    </div>
    <form action="" method="" style="display:none;">
      <div class="form-group">
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
  </main>
  <script src="../../vendor/js/product_page.js"></script>
</div>