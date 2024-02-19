<link rel="stylesheet" href="../../vendor/css/restaurant_form.css">
<script src="../../vendor/js/restaurant_page.js" defer></script>

<div class="container">
    <h2 class="main-title">Restaurants</h2>
    <button class="btn-add">Add Restaurant</button>
    <div id="restar" class="restar">
        <div class="restar-content">
            <span class="close">&times;</span>
            <form method="post" action="models/admin/restuarant/restaurant.model.php">
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
                        <label for="province">Choose Region</label>
                        <select class="form-control" id="region" name="region" required>
                            <option value="">Select a regoin</option>
                            <option value="restaurant1">Kandal</option>
                            <option value="restaurant2">Bonteaymeanchey</option>
                            <option value="restaurant3">Svayreang</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                <div class="group">
                    <label for="restaurant_owner_name">Restaurant Owner Name:</label>
                    <input type="text" id="restaurant_owner_name" name="restaurant_owner_name" placeholder="Enter your name" required><br><br>

                </div>
                <button type="submit" class="submit">Submit</button>
            </form>
        </div>
    </div>
</div>