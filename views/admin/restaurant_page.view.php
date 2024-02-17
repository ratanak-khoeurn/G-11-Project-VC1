<link rel="stylesheet" href="../../vendor/css/restaurant_form.css">
<div class="main-wrapper">
    <!-- ! Main -->
    <main   class="main users chart-page" id="skip-target">
      <div class="container">
        <h2 class="main-title">Restaurants</h2>
        <button class="add-admin"><a href="form_add_admin.view.php">Add Restaurant</a>  </button>
      </div>
      <form method="post" action="">
        <div class="group">
            <label for="restaurant_name">Restaurant Name:</label>
            <input type="text" id="restaurant_name" name="restaurant_name" placeholder="Enter your restaurant name" required><br>

        </div>
        <div class="group">
            <label for="restaurant_address">Restaurant Address:</label>
            <input type="text" id="restaurant_address" name="restaurant_address" placeholder="Enter your restaurant address" required><br>

        </div>
        <div class="group">
            <label for="restaurant_image_url">Restaurant Image:</label>
            <input type="text" id="restaurant_image_url" name="restaurant_image_url" placeholder="Enter your restaurant image" required><br>

        </div>
        <div class="group">
            <label for="restaurant_owner_name">Restaurant Owner Name:</label>
            <input type="text" id="restaurant_owner_name" name="restaurant_owner_name" placeholder="Enter your name" required><br><br>

        </div>
            <button type="submit" class="submit">Submit</button>
        </form>
    </main>
</div>