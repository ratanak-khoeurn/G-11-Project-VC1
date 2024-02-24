<?php
require "database/database.php";
require "models/admin/restuarant/resturant.process.php";
?>

<link rel="stylesheet" href="../../vendor/css/restaurant_form.css">
<script src="../../vendor/js/restaurant_page.js" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


<div class="container">
    <h2 class="main-title">Restaurants</h2>
    <button class="btn-add">Add Restaurant</button>
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

        table,
        td,
        th {
            border: 1px solid;
        }

        table {
            margin-top: 10px;
            width: 100%;
            border-collapse: collapse;
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

        .update{
            width: 93%;
            margin-right: 30px;
        }

        input {
            width: 500px;
            margin: 8px 0;
        }
    </style>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Image</th>
                <th>Region</th>
                <th>Manager</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $rests = get_restaurant();

            foreach ($rests as $index => $rest) {
            ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $rest['res_name'] ?></td>
                    <td><?= $rest['res_address'] ?></td>
                    <td><img src="../../../assets/images/restaurant/<?= $rest['restaurant_image_url'] ?>" class="img" style="width: 70px;height:65px;border-radius:50%; margin-left:55px; padding:3px" alt=""></td>
                    <td><?= $rest['region'] ?></td>
                    <td><?= $rest['restaurant_owner_name'] ?></td>
                    <td class="td-icon">
                        <a href=" ?"><i class="fas fa-pen"> </i></a>
                        <a href="#"><i class="fas fa-trash"> </i></a>
                    </td> <!-- Corrected position of this line -->
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
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
                    <input type="file" id="restaurant_image_url" name="restaurant_image_url" enctypart="multipart/form-data"><br>
                </div>
                <div class="group">
                    <label for="province">Choose Region</label>
                    <select class="form-control" id="region" name="region" required>
                        <option value="">Select a regoin</option>
                        <option value="Kandal">Kandal</option>
                        <option value="Bonteaymeanchey">Bonteaymeanchey</option>
                        <option value="Svayreang">Svayreang</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <div class="group">
                    <label for="province">Manager</label>
                    <select class="form-control" id="manager" name="manager" required>
                        <option value="">Select a Manager</option>
                        <option value="siem">Siem</option>
                        <option value="Nak">Nak</option>
                        <option value="Heang">Heang</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <button type="submit" class="submit">Submit</button>
            </form>
        </div>
    </div>
    <div id="edit_form" class="popup" style="display: none;">
        <div class="edit_form_content">
            <span class="closed">&times;</span>
            <form method="post" action="../models/admin/restuarant/update.restaurant.php" enctype="multipart/form-data">
                <div class="group_form">
                    <label for="restaurant_name">Name:</label>
                    <input type="text" id="restaurant_name"  name="restaurant_name" placeholder="Enter your restaurant name" required><br>
                </div>
                <div class="group_form">
                    <label for="restaurant_address">Address:</label>
                    <input type="text" id="restaurant_address"  name="restaurant_address" placeholder="Enter your restaurant address" required><br>
                </div>
                <div class="group_form">
                    <label for="restaurant_image_url">Image:</label>
                    <input type="file" id="restaurant_image_url"  name="restaurant_image_url" enctypart="multipart/form-data"><br>
                </div>
                <div class="group_form">
                    <label for="province">Choose Region</label>
                    <select class="form-control" id="region" name="region" required>
                        <option value="">Select a regoin</option>
                        <option value="restaurant1">Kandal</option>
                        <option value="restaurant2">Bonteaymeanchey</option>
                        <option value="restaurant3">Svayreang</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <div class="group_form">
                    <label for="province">Manager</label>
                    <select class="form-control" id="manager" name="manager" required>
                        <option value="">Select a Manager</option>
                        <option value="restaurant1">Siem</option>
                        <option value="restaurant2">Nak</option>
                        <option value="restaurant3">Luch</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <button type="submit" class="update">Update</button>
            </form>
        </div>
        <script>
            const showFormBtns = document.querySelectorAll('.td-icon');
            const formPopup = document.getElementById('edit_form');
            const closeButton = formPopup.querySelector('.closed');

            showFormBtns.forEach(show_btn => {
                show_btn.firstElementChild.addEventListener('click', function() {
                    formPopup.style.display = 'block';
                });
            });

            closeButton.addEventListener('click', function() {
                formPopup.style.display = 'none';
            });
        </script>

    </div>
</div>