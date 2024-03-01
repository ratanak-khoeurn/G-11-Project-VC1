<?php
require "database/database.php";
require "models/admin/restuarant/resturant.process.php";
?>

<link rel="stylesheet" href="../../vendor/css/restaurant_form.css">
<script src="../../vendor/js/restaurant_page.js" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


<div class="main">
    <h1 class="main-title" style="margin-top: 20px;">Restaurants</h1>
    <div class="option">
        <button class="btn-add">Add Restaurant</button>
        <div class="search">
            <input type="text" placeholder="         Search Reataurant Here ">

        </div>
    </div>
    <style>
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            border: 1px solid #ccc;
            z-index: 9999;
        }
        .option{
            display: flex;
            width: 100%;
            justify-content: space-between;
            height: 70px;            
        }
        .btn-add{
            background: #E21B70;
            margin-top: 10px;
        }
        .option input{
            background: #E21B70;
            height: 50px;
            top: 0;
            width: 400px;
        }


        i {
            display: flex;
            justify-content: space-around;
            text-align: center;
            padding: 5px 10px;
            width: 30px;
        }

        .fa-pen {
            color: blue;
            cursor: pointer;
            font-size: 15px
        }

        .fa-trash {
            color: red;
            cursor: pointer;
        }

        .edit_form_content {
            background-color: #fefefe;
            margin: auto;
            margin-top: 10%;
            padding: 20px;
            border: 1px solid #888;
            width: 100%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            animation-name: modalopen;
            animation-duration: 0.4s;
            border-radius: 10px;
        }


        /* Animation */
        @keyframes modalopen {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Close button */
        .closed {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .closed:hover,
        .closed:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        form {

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            width: 90%;
            height: 570px;
            background: transparent;
            border: 2px solid #fff;
            color: white;
            padding: 15px 10px;
        }

        .group {
            display: flex;
            flex-direction: column;
        }

        .update {
            width: 93%;
            margin-right: 30px;
        }

        .manin-card {
            margin-top: 30px;
            width: 100%;
            height: auto;
            display: flex;
            justify-content: start;
            flex-wrap: wrap;
        }

        .card {
            width: 30%;
            background: white;
            height: 50vh;
            margin-top: 20px;
            margin-right: 30px;
            box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5);


        }

        .card-header {
            width: 100%;
            height: 15%;
            background:#E21B70;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-header h2{
            color: white;
        }

        .card-content {
            height: 100%;

        }

        .text {
            text-align: start;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }

        .card-body {
            width: 100%;
            height: 70%;
        }

        .card-footer {
            width: 100%;
            height: 15%;
            display: flex;
            justify-content: space-around;
            align-items: center;
            background: transparent;



        }
        button{
            background: #E21B70;
        }
    </style>
    <div class="manin-card" style="overflow: auto; max-height: 700px;">
        <?php
                $restaurants = get_restaurant();
                foreach ($restaurants as $restaurant):
        ?>
        <div class="card">
            <div class="card-header">
                <h2><?=$restaurant['res_name'] ?></h2>
            </div>
            <div class="card-content">
                <div class="card-body" style="position: relative;">
                    <img src="../../../assets/images/restaurant/<?=$restaurant['restaurant_image_url'] ?>" alt="" style="width: 100%; height: 100%;">
                    <div class="text" style="position: absolute; top: 60%; left: 50%; transform: translate(-50%, -50%); color: white; height: 50%; width: 100%; background-color: rgba(0, 0, 100, 0.4); opacity: 1; margin-top: 38px; z-index: 1;padding-left:10px">
                        <h4><?=$restaurant['region'] ?></h4>
                        <p><?=$restaurant['res_address'] ?></p>
                        <p>open</p>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="models/admin/restuarant/delete.restaurant.model.php?id=<?=$restaurant['res_id']?>&image=<?= urlencode($restaurant['restaurant_image_url']) ?>"><img src="../../assets/images/icons/delete.png" alt="" style="border-radius: 50%; width:40px;height:40px"></a>
                    <a href="controllers/admin/restaurant/edit.restaurant.controller.php?id=<?=$restaurant['res_id']?>"><img src="../../assets/images/icons/edit.png" alt="" style="border-radius: 50%; width:40px;height:40px"></a>
                    <a href="#"><img src="../../assets/images/FOOD.jpg" alt="" style="border-radius: 50%; width:40px;height:40px"></a>


                </div>
            </div>
          
        </div>
        <?php
            endforeach; ?>
    </div>
    <div id="restar" class="restar">
        <div class="restar-content">
            <span class="close" style="cursor: pointer;">&times;</span>

            <form method="post" action="../models/admin/restuarant/restaurant.model.php" enctype="multipart/form-data">
                <div class="group">
                    <label for="restaurant_name">Name:</label>
                    <input type="text" id="restaurant_name" name="restaurant_name" placeholder="Enter your restaurant name" required><br>
                </div>
                <div class="group">
                    <label for="restaurant_address">Address:</label>
                    <input type="text" id="restaurant_address" name="restaurant_address" placeholder="Enter your restaurant address" required><br>
                </div>
                <div class="group">
                    <label for="restaurant_image_url">Image:</label>
                    <input type="file" id="restaurant_image_url" name="restaurant_image_url" accept="image/*" enctypart="multipart/form-data"  required><br>
                </div>
                <div class="group">
                    <label for="province">Choose Region</label>
                    <select class="form-control" id="region" name="region" required>
                        <option value="">Select a regoin</option>
                        <option value="Kandal">Kandal</option>
                            <option value="Svayreang">Svayreang</option>
                    </select>
                </div>
                <div class="group">
                    <label for="province">Manager</label>
                    <select class="form-control" id="manager" name="manager" required>
                        <option value="">Select a Manager</option>
                        <option value="siem">Siem</option>
                        <option value="Nak">Nak</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <button type="submit" class="submit">Submit</button>
            </form>
        </div>
    </div>
</div>