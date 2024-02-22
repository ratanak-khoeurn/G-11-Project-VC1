<?php
    require "database/database.php";
    require "models/admin/restuarant/resturant.process.php";
?>

<link rel="stylesheet" href="../../vendor/css/restaurant_form.css">
<script src="../../vendor/js/restaurant_page.js" defer></script>

<div class="container">
    <h2 class="main-title">Restaurants</h2>
    <button class="btn-add">Add Restaurant</button>
    <style>
        table, td, th {
            border: 1px solid;
        }

        table {
            margin-top: 10px;
            width: 100%;
            border-collapse: collapse;
        }
    </style>
    <table>
            <thead>
                    <tr>
                        <th>ID</th>
                        <th>Resturant Name</th>
                        <th>Resturant Address</th>
                        <th>Restaurant's image</th>
                        <th>Region</th>
                        <th>Name Owner</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                        $rests= get_restaurant();
                    
                        foreach ($rests as $rest) {
                    ?>
                        
        
                        <tr>    
                          <td><?=$rest['res_id']?></td>
                          <td><?=$rest['res_name']?></td>
                          <td><?=$rest['res_address']?></td>
                          <td><img src="../../../assets/images/restaurant/<?=$rest['restaurant_image_url']?>" class="img" style="width: 70px;height:65px;border-radius:50%; margin-left:55px; padding:3px" alt=""></td>
                          <td><?=$rest['region']?></td>
                          <td><?=$rest['restaurant_owner_name']?></td>
                      </tr>
                        
                      <?php
                        }
     ?>
                </tbody>
            </table>
    <div id="restar" class="restar">
        <div class="restar-content">
            <span class="close">&times;</span>

            <form method="post" action="../models/admin/restuarant/restaurant.model.php" enctype="multipart/form-data">
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
                    <input type="file" id="restaurant_image_url" name="restaurant_image_url" enctypart = "multipart/form-data"><br>

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
                        <label for="province">Restaurant's Manager</label>
                        <select class="form-control" id="region" name="region" required>
                            <option value="">Select a Manager</option>
                            <option value="restaurant1">Siem</option>
                            <option value="restaurant2">Nak</option>
                            <option value="restaurant3">Luch</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                <button type="submit" class="submit">Submit</button>
            </form>
         
        </div>
    </div>
</div>