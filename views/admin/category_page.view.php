<?php
require "database/database.php";
require "models/admin/category/category.process.php";
?>
<link rel="stylesheet" href="../../vendor/css/cate_form.css">
<link rel="stylesheet" href="../../vendor/css/update_cate.css">
<link rel="stylesheet" href="../../vendor/js/restaurant_page.js">

<div class="main-wrapper">
    <!-- Main -->
    <main class="main users chart-page" id="skip-target">
        <div class="container">
            <h2 class="main-title">Category</h2>

            <form action="models/admin/category/category.model.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Enter Name:</label>
                    <input type="text" class="form-control" placeholder="Name" id="" name="category" value="">
                </div>
                <div class="form-group">
                    <input type="file" class="border form-control" id="product_image_url" value=""
                        name="product_image_url" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Category</button>
            </form>
            <hr>
            <?php
            $categos = [];
            $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
            if ($id) {
                $categos = get_cate($id);
            }
            ?>
            <div id="restar" class="restar" style="display: none;">
                <div class="restar-content">
                    <span class="close">&times;</span>
                    <form action="./customer_page.view.php" method="post">
                        <input type="hidden" name="category_id" value="<?= isset($categos['category_id']) ? $categos['category_id'] : '' ?>">
                        <div class="form_group">
                            <input style="border:1px solid black;" type="text" class="form-control" placeholder="Name"
                                id="names" name="category" value="<?= isset($categos['category_name']) ? $categos['category_name'] : '' ?>">
                        </div>
                        <div class="form_group">
                            <input type="file" class="border form-control" id="product_image_url"
                                name="product_image_url" value="<?= isset($categos['picture']) ? $categos['picture'] : '' ?>">
                        </div>
                        <button type="submit">Update Category</button>
                    </form>
                </div>
            </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                    foreach ($categories as $category):
                    ?>
                        <tr>
                            <td><?= $category['category_id'] ?></td>
                            <td><?= $category['category_name'] ?></td>
                            <td><img src="<?= $category['picture'] ?>" class="img" alt=""></td>
                            <td class="button">
                                <a href="#?id=<?= $category['category_id'] ?>" class="btn btn-primary">Edit</a>
                                <a href="?id=<?= $category['category_id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
    <script>
        var modal = document.getElementById("restar");
        let edits = document.querySelectorAll('.button');
        var span = document.getElementsByClassName("close")[0];
        for (let edit of edits) {
            edit.firstElementChild.onclick = function () {
                modal.style.display = "block";
            }
            span.onclick = function () {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        }
    </script>
</div>
