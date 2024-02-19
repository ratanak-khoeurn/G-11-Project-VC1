<link rel="stylesheet" href="../../vendor/css/product_form.css">
<script src="../../vendor/js/product_page.js" defer></script>
<div class="container">
  <h2 class="main-title">Products</h2>
  <button class="btn-add">Add Product</button>
  <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <form action="process.php" method="post">
        <div class="mb-3">
          <div class="form-group">
            <label for="product_image_url">Image URL</label>
            <input type="text" class="border form-control" id="product_image_url" name="product_image_url" placeholder="enter image URL" required>
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

  <table>
    <tr>
      <th>ID</th>
      <th>Product Name</th>
      <th>Restaurant Name</th>
      <th>Image URl</th>
      <th>Price</th>
      <th>Discount</th>
    </tr>
    <tr>
      <td>01</td>
      <td>Milk</td>
      <td>Drink-Master</td>
      <td>Food lolo</td>
      <td>1234$</td>
      <td>- - - -</td>
    </tr>
    <tr>
      <td>02</td>
      <td>Pork</td>
      <td>CC-Omakasek</td>
      <td>Food lolo</td>
      <td>10000$</td>
      <td>- - - -</td>
    </tr>
    <tr>
      <td>03</td>
      <td>Stage</td>
      <td>HLN-MoMO</td>
      <td>Food lolo</td>
      <td>200340$</td>
      <td>- - - -</td>
    </tr>
    <tr>
      <td>04</td>
      <td>Wine</td>
      <td>Drink II-Master</td>
      <td>Food lolo</td>
      <td>200000$</td>
      <td>- - - -</td>
    </tr>
  </table>
</div>