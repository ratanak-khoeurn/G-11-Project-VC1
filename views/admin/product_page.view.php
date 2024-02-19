<link rel="stylesheet" href="../../vendor/css/product_form.css">
<script src="../../vendor/js/product_page.js" defer></script>
<div class="container">
  <h2 class="main-title">Products</h2>
  <button class="btn-add">Add Product</button>
  <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <form action="models/admin/products/product_process.model.php" method="post">
        <div class="mb-3">
          <div class="form-group">
            <label for="product_image_url">Image URL</label>
            <input type="text" class="border form-control" id="product_img" name="product_img" placeholder="enter image URL" required>
          </div>
          <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" class="border form-control" id="product_name" name="product_name" placeholder="enter product name" required>
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
          <input type="number" class="border form-control" id="discount" name="discount" placeholder="enter discount" required>
        </div>
        <button type="submit" class="border btn ">Submit</button>
      </form>
    </div>
  </div>
</div>
