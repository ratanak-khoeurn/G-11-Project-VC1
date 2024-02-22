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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            
            <form method="post" action="../models/admin/restuarant/restaurant.model.php" enctype="multipart/form-data">
=======
            <form method="post" action="../../models/admin/restuarant/restaurant.model.php">
>>>>>>> 3ee686cd6166d2e0299b0505be3332294b4c7147
=======
            <form method="post" action="../../models/admin/restuarant/restaurant.model.php">
=======
            <form method="post" action="models/admin/restuarant/restaurant.model.php">
>>>>>>> origin/get_data_restaurant
>>>>>>> 8d7a046fed55ba093c33d56cd5ce89d0de2e738d
=======
            <form method="post" action="models/admin/restuarant/restaurant.model.php">
=======
            <form method="post" action="../../models/admin/restuarant/restaurant.model.php">
>>>>>>> fbf2f4885c4912c5a58b0b6f2c45266a2c6c1d6e
=======
            
            <form method="post" action="../models/admin/restuarant/restaurant.model.php" enctype="multipart/form-data">
>>>>>>> origin/get_data_restaurant
>>>>>>> 96ddc4b3b53b14a367e81f2d4612cbbd45c40260
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                    <input type="file" id="restaurant_image_url" name="restaurant_image_url" placeholder="Enter your restaurant image " required><br>
=======
                    <input type="file" id="restaurant_image_url" name="restaurant_image_url" enctypart = "multipart/form-data"><br>
>>>>>>> 3ee686cd6166d2e0299b0505be3332294b4c7147
=======
                    <input type="file" id="restaurant_image_url" name="restaurant_image_url" enctypart = "multipart/form-data"><br>
=======
                    <input type="file" id="restaurant_image_url" name="restaurant_image_url" placeholder="Enter your restaurant image" required><br>
>>>>>>> origin/get_data_restaurant
>>>>>>> 8d7a046fed55ba093c33d56cd5ce89d0de2e738d
=======
                    <input type="file" id="restaurant_image_url" name="restaurant_image_url" placeholder="Enter your restaurant image" required><br>
=======
                    <input type="file" id="restaurant_image_url" name="restaurant_image_url" enctypart = "multipart/form-data"><br>
>>>>>>> fbf2f4885c4912c5a58b0b6f2c45266a2c6c1d6e
=======
                    <input type="file" id="restaurant_image_url" name="restaurant_image_url" placeholder="Enter your restaurant image " required><br>
>>>>>>> origin/get_data_restaurant
>>>>>>> 96ddc4b3b53b14a367e81f2d4612cbbd45c40260

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
                    <input type="text" id="restaurant_owner_name" name="restaurant_owner_name" placeholder="Enter your name" required><br>

                </div>
                <button type="submit" class="submit">Submit</button>
            </form>
         
        </div>
    </div>
</div>