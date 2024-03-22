<?php
require "../../../database/database.php";
require "../../../models/admin/restuarant/resturant.process.php";
?>
<video id="video-background" autoplay loop muted>
    <source src="../../../assets/images/udate_restaurat.mp4" type="video/mp4">
</video>
<?php
$id = $_GET['id'];
$restaurant = get_restaurant_one($id);
$managers = get_manager();
if (!empty($restaurant)) {

?>
    <div id="edit_form" class="edit-form-container">
        <div class="edit_form_content">
            <form method="post" action="../../../controllers/admin/restaurant/update.restaurant.controller.php?image=<?= $restaurant['restaurant_image_url'] ?>" enctype="multipart/form-data" class="restaurant-form">
                <h1>UPDATE RESTAURANT</h1>
                <div class="group_form">
                    <input type="hidden" name="restaurant_id" value="<?= $restaurant['id'] ?>">
                </div>
                <div class="group_form">
                    <label for="restaurant_name">Name:</label>
                    <input type="text" id="restaurant_name" value="<?= $restaurant['name'] ?>" name="restaurant_name" placeholder="Enter your restaurant name" required>
                </div>
                <div class="group_form">
                    <label for="restaurant_address">Address:</label>
                    <input type="text" id="restaurant_address" value="<?= $restaurant['location'] ?>" name="restaurant_address" placeholder="Enter your restaurant address" required>
                </div>
                <div class="group_form">
                    <label for="restaurant_image_url">Image:</label>
                    <input type="file" id="restaurant_image_url" name="image">
                </div>

                <div class="group_form">
                    <label for="old_image">Old Image:</label>
                    <input type="text" id="old_image" value="<?= $restaurant['image'] ?>" name="old_image">
                </div>
                <div class="group_form">
                    <label for="restaurant_owner_name">Manager:</label>
                    <select class="form-control" id="manager" name="restaurant_owner_name" required>
                        <option value="">Select a Manager</option>
                        <option value="Siem" <?php echo ($restaurant['restaurant_owner_name'] = 'Siem') ? 'selected' : ''; ?>>Siem</option>
                        <option value="Nak" <?php echo ($restaurant['restaurant_owner_name'] = 'Nak') ? 'selected' : ''; ?>>Nak</option>
                        <option value="Luch" <?php echo ($restaurant['restaurant_owner_name'] = 'Luch') ? 'selected' : ''; ?>>Luch</option>
                        <option value="Sok Heang" <?php echo ($restaurant['restaurant_owner_name'] = 'Sok Heang') ? 'selected' : ''; ?>>Sok Heang</option>
                        <option value="Makara" <?php echo ($restaurant['restaurant_owner_name'] = 'Makara') ? 'selected' : ''; ?>>Makara</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <div class="group">
                    <div class="delivery_conatiner">
                        <label for="delivery" class="label">Delivery Option</label>
                        <div class="delivery-options">
                            <label class="delivery-option">
                                <input type="radio" name="delivery" value="free" <?php if ($restaurant['delivery'] == "free") echo "checked"; ?> onclick="togglePriceInput(false)">
                                <span>Free Delivery</span>
                            </label>
                            <label class="delivery-option">
                                <input type="radio" name="delivery" value="paid" <?php if ($restaurant['delivery'] == "paid") echo "checked"; ?> onclick="togglePriceInput(true)">
                                <span>Paid Delivery</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div id="price_input_container" style="display: <?= ($restaurant['delivery'] == "paid") ? "block" : "none" ?>; width: auto;">
                    <label for="deliveryPrice" class="label">Delivery Price</label>
                    <input type="number" id="deliveryPrice" name="deliveryPrice" placeholder="Enter delivery price" value="<?= $restaurant['delivery_price'] ?>" class="delivery-price-input">
                </div>

                <script>
                    function togglePriceInput(show) {
                        var price_input_container = document.getElementById("price_input_container");
                        var deliveryPrice = document.getElementById("deliveryPrice");

                        price_input_container.style.display = show ? "block" : "none";

                        price_input_container.style.width = "auto";

                        if (show) {
                            price_input_container.style.width = deliveryPrice.offsetWidth + "px";
                        }
                    }
                </script>
                <button type="submit" class="update-button">Update</button>
                <a href="/restaurant_admin"><button type="button" class="cancel-button">Cancel</button></a>

            </form>
        </div>
    </div>
<?php }

?>
<style>
    body {
        margin: 0px;
    }

    #edit_form {

        height: 100%;
        width: 100%;
        display: flex;
    }

    .edit-form-container {
        position: relative;
        max-width: 45%;
        height: 100%;
        background-color: white;
        padding: 0px 15px 0px 15px;
        box-shadow: 0 0 10px rgba(0, 3, 0, 1);
        color: white;
        left: 53%
    }

    #video-background {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        object-fit: cover;
    }

    h1 {
        color: #E21B70;
        text-align: center;
    }

    #restar {
        position: relative;
        margin: auto;
        display: flex;
        align-items: center;
        height: 100%;
        flex-wrap: wrap;
    }

    .edit_form_content {
        position: relative;
        width: 100%;
    }

    .closed {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        color: #999;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 10px;
        color: black;
    }

    .group_form {
        display: flex;
        flex-wrap: wrap;
        width: 80%;
    }

    input[type="text"],
    input[type="file"],
    select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        box-sizing: border-box;
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
        background-color: #eee;
        border: 0px;
        border-right: 1px solid #2e2a2a;
        color: black;
    }


    .cancel-button {
        background-color: #ccc;
        color: #333;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
        margin-right: 10px;
        margin-top: 10px;
        /* Add margin to separate from the update button */
    }

    .cancel-button:hover {
        background-color: #999;
        color: #fff;
    }


    button.update-button {
        background-color: #E21B70;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    button.update-button:hover {
        background-color: pink;
        color: black;
    }

    .restaurant-form {
        margin-left: 16%;
        margin-top: 10%;
    }
</style>