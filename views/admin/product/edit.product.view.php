<?php
require "../../../database/database.php";
require "../../../models/admin/products/product.model.php";
?>

<style>
    .form-container {
        display: flex;
        margin-left: 10px;
        width: 100%;
    }
    .product_info {
        display: flex;
        width: 100%;
    }
    .product_info .form-group,
    .product_price .form-group {
        display: flex;
        flex-direction: column;
        width: 100%;
    }
    .product_price{
        display: flex;
        width: 100%;
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
        margin: 100px 0px 100px 0px;
        padding: 20px;
        display: flex;
        align-items: center;
    }

    .restar-content {
        position: absolute;
        left: 50%;
        margin-top: 74%;
        width: 50%;
        transform: translate(-50%, -50%);
        padding: 30px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: rgba(255, 255, 255, 0.8);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .form-container {
        display: inline-block;
        text-align: left;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    select,
    input[type="text"],
    input[type="number"],
    input[type="file"] {
        width: calc(100% - 24px);
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        box-sizing: border-box;
        font-size: 16px;
    }

    input[type=file]::file-selector-button {
        background-color: #E21B70;
        color: #000;
        border: 0px;
        border-right: 1px solid #050505;
        padding: 10px 5px;
        margin-right: 20px;
        transition: .5s;
        color: white;
    }

    input[type=file]::file-selector-button:hover {
        background-color: #eee;
        border: 0px;
        border-right: 1px solid #2e2a2a;
        color: black;
    }

    input[type="file"] {
        margin-top: 3px;
    }

    button[type="submit"],
    button[type="button"] {
        width: calc(50% - 12px);
        padding: 12px;
        border: none;
        border-radius: 6px;
        font-size: 18px;
        cursor: pointer;
    }

    button[type="submit"] {
        background-color: #007bff;
        color: #fff;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }

    button[type="button"] {
        background-color: #ccc;
        color: #000;
    }

    button[type="button"]:hover {
        background-color: #999;
    }

    #old-image {
        display: block;
        margin: 0 auto;
        max-width: 60%;
        max-height: 100px;
        margin-bottom: 20px;
    }
</style>

<video id="video-background" autoplay loop muted>
    <source src="../../../assets/images/bg.mp4" type="video/mp4">
</video>

<div id="restar">
    <div class="restar-content">
        <div class="form-container">
            <?php
            $id = $_GET['id'];
            $products = get_product_one($id);
            ?>
            <form action="../../../controllers/admin/products/product.upate.controller.php?image=<?= $products['product_img'] ?>" method="post" enctype="multipart/form-data" class="form_update">

                <input type="hidden" name="product_id" value="<?= $products['id'] ?>">
                <div class="product_info">

                    <div class="form-group">
                        <label for="names">Name:</label>
                        <input type="text" class="form-control" id="names" name="product_name" value="<?= $products['product_name'] ?>" placeholder="Enter category name">
                    </div>
                    <div class="form-group">
                        <label for="product_name">Restaurant Name</label>
                        <select class="form-control" id="product_name" name="restaurant_name" required>
                            <option value="">Select a restaurant</option>
                            <?php
                            $restuarant = get_restaurant();
                            var_dump($restuarant);
                            foreach ($restuarant as $res) {
                                
                                ?>
                                <option value="<?= $res['id'] ?>" <?php echo ($products['res_id'] == $res['id']) ? 'selected' : ''; ?>><?= $res['name'] ?>
                            </option> <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="product_price">

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="border form-control" id="price" name="price" placeholder="enter price" value="<?= $products['price'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="discount">Discount</label>
                        <input type="number" class="border form-control" id="discount" name="discount" placeholder="enter discount" value="<?= $products['discount'] ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category_name">Category Type</label>
                    <select class="form-control" id="category_name" name="category_name" required>
                        <?php
                        $categories = get_category();
                        foreach ($categories as $category) {
                        ?>
                            <option value="<?php echo $category['name'] ?>"><?php echo $category['name'] ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="product_image_url">Choose Image:</label>
                    <input type="text" class="border form-control" name="image" id="file-name" value="<?= $products['product_img'] ?>" readonly>
                    <input type="file" class="border form-control" id="product_image_url" name="product_image_url">
                </div>
                <div class="form-group">
                    <img id="old-image" src="../../../assets/images/products/<?= $products['product_img'] ?>" alt="Old Image">
                </div>
                <button style="background-color: #E21B70;" type="submit">Update Product</button>
                <button type="button" onclick="window.history.back()">Cancel</button>
            </form>
        </div>
    </div>
</div>