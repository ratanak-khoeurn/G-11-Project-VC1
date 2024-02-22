<?php
    require "database/database.php";
    require "models/admin/category/category.process.php";
?>
<link rel="stylesheet" href="../../vendor/css/cate_form.css">
<div class="main-wrapper">
    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
        <div class="container">
            <h2 class="main-title">Category</h2>
            <form action="models/admin/category/category.model.php" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="">Enter Name:</label>
                        <input type="text" class="form-control" placeholder="Name" id="" name="category">

                    </div>
                    <div class="form-group">
                        <input type="file" class="border form-control  " id="product_image_url" name="product_image_url" required >

                    </div>
                <button type="submit" class="btn btn-primary">Add Category</button>
            </form>
            <hr>
            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NameCategory</th>
                    <th>Picture</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $categories = get_category();
                ?>
                <?php foreach ($categories as $category) : ?>
                    <tr>
                        <td><?= $category['category_id'] ?></td>
                        <td><?= $category['category_name'] ?></td>
                        <td><img src="<?=$category['picture'] ?>" class="img"  alt=""></td>
                        <td>
                        <a href="" class="btn btn-primary active ">Edit</a>
                        <a href="" class="btn btn-primary active ">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
        </table>
        </div>
    </main>
</div>