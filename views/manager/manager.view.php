<?php
// session_start();
require "database/database.php";
require "models/manager/manager.model.php";
require "models/admin/products/product.model.php";
require_once "models/admin/restuarant/resturant.process.php";
?>
<link rel="stylesheet" href="../../../vendor/css/manager_page.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<body>

    <nav>
        <div class="left">
            <a href="#"><img src="../../assets/images/restaurant/<?= $_SESSION['manager']['picture']?>" alt="" style="width: 70px;height:70px;margin-left:30px"></a>
            <div name="restaurants" style="border:none; width:100px; margin-left:20px; justify-content:center; align-items:center;display:flex">
                <?php
                $products = get_product();
                $unique_names = array();
                foreach ($products as $product) {
                    $restaurant_name = $product['restaurant_name'];
                    $unique_names[$restaurant_name] = $restaurant_name;
                }
                ?>
                <select name="all_restaurant" style="background-color:#E21B70; border:none; color:white">
                    <option value="restaurants">Choose Manager</option>
                    <?php
                    foreach ($unique_names as $restaurant_name) {
                    ?>
                        <option value="<?= $restaurant_name ?>"><?= $restaurant_name ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="profile-container">
            <span class="user-name" style="color:white;text-align:center;margin-right:10px">Your Name</span>
            <img alt="#" src="../../../assets/images/avatar/no-profile-pic-icon-11.jpg" class="profile-image">
        </div>
    </nav>
    <div class="container">
        <div class="right">
            <main class="main">
                <div class="main_left">
                    <form action="#" class="form_add_product" style="height:100%">
                        <h2>Add New Product</h2>
                        <div class="group_label">
                            <label for="">Name:</label>
                            <input type="text" id="name" name="name" placeholder="Enter restaurant's name" />
                        </div>
                        <div class="group_label">
                            <label for="">Price</label>
                            <input type="number" id="price" name="price" placeholder="Enter the price" />
                        </div>
                        <div class="group_label">
                            <label for="">Category:</label>
                            <input type="text" id="cate" name="cate" placeholder="Enter product's category" />
                        </div>
                        <div class="group_label">
                            <label for="">Discount:</label>
                            <input type="number" id="discount" name="discount" placeholder="Enter product's discount" />
                        </div>
                        <div class="group_label">
                            <label for="">Picture:</label>
                            <input type="file" id="pic" name="pic" placeholder="choose your image product" />
                        </div>
                        <button class="submit">SUBMIT</button>
                    </form>
                </div>
                <div class="main_right">
                    <div class="top">
                        <h2 style="text-decoration: underline;">List of the Product</h2 style="text-decoration: underline;">
                        <input type="text" id="search" placeholder="Search..." />
                    </div>
                    <hr style="width: 100%;">
                    <div class=MG-4>
                        <div class="card_product">
                            <?php
                            $products_manager = get_products();
                            foreach ($products_manager as $product) {

                            ?>​
                                <div class="card">
                                    <img src="../../assets/images/products/<?= $product['product_img'] ?>" alt="#" class="pro_img">
                                    <div class="card_footer">
                                        <h3 class="manager_name"><?= $product['product_name'] ?></h3>
                                        <span class="price">price: <?= $product['price'] ?> $</span>
                                        <span class="discount">discount: <?= $product['discount'] ?> $</span>

                                        <span class="category">manager: <?= $product['restaurant_name'] ?></span>
                                        <div class="button">
                                            <button class="update">Update</button>
                                            <button class="delete">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>