<?php
require "../../../database/database.php";
require "../../../models/admin/products/product.model.php";
?>

<style>
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

    .restar-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 30px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: rgba(255, 255, 255, 0.8);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        text-align: center;
        /* Center align the content */
    }

    .form-container {
        display: inline-block;
        /* Allow the container to take the width of its content */
        text-align: left;
        /* Reset text alignment */
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
        /* Take 100% width minus padding */
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        box-sizing: border-box;
        font-size: 16px;
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
            <form action="../../../controllers/admin/products/product.upate.controller.php?image=<?= $products['product_img'] ?>" method="post" enctype="multipart/form-data">

                <input type="hidden" name="product_id" value="<?= $products['id'] ?>">

                <div class="form-group">
                    <label for="names">Name:</label>
                    <input type="text" class="form-control" id="names" name="product_name" value="<?= $products['product_name'] ?>" placeholder="Enter category name">
                </div>
                <div class="form-group">
                    <label for="product_name">Restaurant Name</label>
                    <select class="form-control" id="product_name" name="restaurant_name" required>
                        <option value="">Select a restaurant</option>
                        <option value="restaurant1" <?php echo ($products['restaurant_name'] == 'restaurant1') ? 'selected' : ''; ?>>Restaurant 1</option>
                        <option value="restaurant2" <?php echo ($products['restaurant_name'] == 'restaurant2') ? 'selected' : ''; ?>>Restaurant 2</option>
                        <option value="restaurant3" <?php echo ($products['restaurant_name'] == 'restaurant3') ? 'selected' : ''; ?>>Restaurant 3</option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="border form-control" id="price" name="price" placeholder="enter price" value="<?= $products['price'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="discount">Discount</label>
                    <input type="number" class="border form-control" id="discount" name="discount" placeholder="enter discount" value="<?= $products['discount'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="product_image_url">Choose Image:</label>
                    <input type="text" class="border form-control" name="image" id="file-name" value="<?= $products['product_img'] ?>" readonly>
                    <input type="file" class="border form-control" id="product_image_url" name="product_image_url">
                </div>
                <div class="form-group">
                    <img id="old-image" src="../../../assets/images/products/<?= $products['product_img'] ?>" alt="Old Image">
                </div>
                <button type="submit">Update Product</button>
                <button type="button" onclick="window.history.back()">Cancel</button>
            </form>
        </div>
    </div>
</div>