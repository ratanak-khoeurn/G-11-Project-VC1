
<?php 
require "../../../database/database.php";
require "../../../models/admin/category/category.process.php";
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
        text-align: center; /* Center align the content */
    }

    .form-container {
        display: inline-block; /* Allow the container to take the width of its content */
        text-align: left; /* Reset text alignment */
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="file"] {
        width: calc(100% - 24px); /* Take 100% width minus padding */
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        box-sizing: border-box;
        font-size: 16px;
    }

    input[type="file"] {
        margin-top: 5px;
    }
    input[type=file]::file-selector-button {
    background-color: #E21B70;
    color: #000;
    border: 0px;
    border-right: 1px solid #050505;
    padding: 5px 5px;
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

    button[type="submit"], button[type="button"] {
        width: calc(50% - 12px); /* Take 50% width minus padding */
        padding: 12px;
        border: none;
        border-radius: 6px;
        font-size: 18px;
        cursor: pointer;
    }

    button[type="submit"] {
        background-color: #E21B70;
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
        max-width: 100%;
        max-height: 200px;
        margin-bottom: 20px;
    }
</style>

<video id="video-background" autoplay loop muted>
    <source src="../../../assets/images/bg.mp4" type="video/mp4">
</video>

<div id="restar">
    <div class="restar-content">
        <div class="form-container">
        <form action="../../../controllers/admin/category/update_category.controller.php?image=<?= $category['picture'] ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="category_id" value="<?= $category['category_id'] ?>"> 

                <div class="form-group">
                    <label for="names">Name:</label>
                    <input type="text" class="form-control" id="names" name="category" value="<?= $category['category_name'] ?>" placeholder="Enter category name">
                </div>
                <div class="form-group">
                    <label >Choose Image:</label>
                    <input type="text" class="border form-control" name="image_input" id="file-name" value="<?=$category['picture'] ?>">
                    <input type="file" class="border form-control" id="product_image_url" name="product_image_url">
                </div>
                <div class="form-group">
                    <img id="old-image" src="../../../assets/images/categories/<?= $category['picture'] ?>" alt="Old Image">
                </div>
                <button type="submit">Update Category</button>
                <button type="button" onclick="window.history.back()">Cancel</button>
            </form>
        </div>
    </div>
</div>
