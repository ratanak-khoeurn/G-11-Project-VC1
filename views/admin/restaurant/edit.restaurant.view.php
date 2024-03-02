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
if (!empty($restaurant)) {

?>
    <div id="edit_form" class="edit-form-container">
        <div class="edit_form_content">
            <form method="post" action="../../../controllers/admin/restaurant/update.restaurant.controller.php?image=<?= $restaurant['restaurant_image_url'] ?>" enctype="multipart/form-data" class="restaurant-form">
                <div class="group_form">
                    <input type="hidden" name="restaurant_id" value="<?= $restaurant['res_id'] ?>">
                </div>
                <div class="group_form">
                    <label for="restaurant_name">Name:</label>
                    <input type="text" id="restaurant_name" value="<?= $restaurant['res_name'] ?>" name="restaurant_name" placeholder="Enter your restaurant name" required>
                </div>
                <div class="group_form">
                    <label for="restaurant_address">Address:</label>
                    <input type="text" id="restaurant_address" value="<?= $restaurant['res_address'] ?>" name="restaurant_address" placeholder="Enter your restaurant address" required>
                </div>
                <div class="group_form">
                    <label for="restaurant_image_url">Image:</label>
                    <input type="file" id="restaurant_image_url" name="restaurant_image_url">
                </div>

                <div class="group_form">
                    <label for="old_image">Old Image:</label>
                    <input type="text" id="old_image" value="<?= $restaurant['restaurant_image_url'] ?>" name="old_image">
                </div>
                <div class="group_form">
                    <label for="region">Choose Region:</label>
                    <select class="form-control" id="restaurant" name="region">
                        <option value="">Select Province</option>
                        <option value="Kandal" <?php echo ($restaurant['region'] == 'Kandal') ? 'selected' : ''; ?>>Kandal</option>
                        <option value="Svayreang" <?php echo ($restaurant['region'] == 'Svayreang') ? 'selected' : ''; ?>>Svay Reang</option>
                        <option value="Siem Reap" <?php echo ($restaurant['region'] == 'Siem Reap') ? 'selected' : ''; ?>> Siem Reap</option>
                    </select>
                </div>
                <div class="group_form">
                    <label for="restaurant_owner_name">Manager:</label>
                    <select class="form-control" id="manager" name="restaurant_owner_name" required>
                        <option value="">Select a Manager</option>
                        <option value="Siem" <?php echo ($restaurant['restaurant_owner_name'] = 'Siem') ? 'selected' : ''; ?>>Siem</option>
                        <option value="Nak" <?php echo ($restaurant['restaurant_owner_name'] = 'Nak') ? 'selected' : ''; ?>>Nak</option>
                        <option value="Luch" <?php echo ($restaurant['restaurant_owner_name'] = 'Luch') ? 'selected' : ''; ?>>Luch</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <button type="submit" class="update-button">Update</button>
                <a href="/restaurant_admin"><button type="button" class="cancel-button">Cancel</button></a>

            </form>
        </div>
    </div>
<?php }

?>
<style>
    .edit-form-container {
        max-width: 700px;
        margin: 0 auto;
        background-color: transparent;
        /* Light gray background color */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 1);
        margin-top: 5%;
        height: 570px;
        color: white;
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

    #restar {
        position: relative;
        margin: auto;
        display: flex;
        align-items: center;
        height: 100%;
    }


    .edit_form_content {
        position: relative;
    }

    .closed {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        color: #999;
    }

    .group_form {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 15px;
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
</style>