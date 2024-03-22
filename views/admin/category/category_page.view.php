<?php
require "database/database.php";
require "models/admin/category/category.process.php";
?>
<link rel="stylesheet" href="../../vendor/css/cate_form.css">
<link rel="stylesheet" href="../../vendor/css/update_cate.css">
<link rel="stylesheet" href="../../vendor/js/restaurant_page.js">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                    <input type="file" class="border form-control" id="product_image_url" value="" name="product_image_url" required>
                </div>
                <button type="submit" class="btn btn-primary" onclick="mySuccess()">Add Category </button>
            </form>
            <hr>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NameCategory</th>
                        <th>Picture</th>
                        <th>Number Of Products</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $categories = get_category();
                    foreach ($categories as $Index => $category) :
                    ?>
                        <tr>
<<<<<<< HEAD
                            <td><?= $Index + 1 ?></td>
                            <td><?= $category['category_name'] ?></td>
                            <td><img src="../../../assets/images/categories/<?= $category['picture'] ?>" class="img" alt=""></td>
                            <td></td>
                            <td class="button">
                                <a href="controllers/admin/category/edit_category.controller.php?id=<?= $category['category_id'] ?>&image=<?= urlencode($category['picture']) ?>" class="btn btn-primary">Edit</a>
                                <a href="#" class="btn btn-danger" onclick="confirmDelete(<?= $category['category_id'] ?>, '<?= urlencode($category['picture']) ?>')">Delete</a>
=======
                            <td><?= $Index+1 ?></td>
                            <td><?= $category['name'] ?></td>
                            <td><img src="../../../assets/images/categories/<?= $category['image'] ?>" class="img" alt=""></td>
                            <td></td>
                            <td class="button">
                            <a href="controllers/admin/category/edit_category.controller.php?id=<?= $category['id'] ?>&image=<?= urlencode($category['image']) ?>" class="btn btn-primary">Edit</a>
                                <a href="controllers/admin/category/delete_category.controller.php?id=<?= $category['id'] ?>&image=<?= urlencode($category['image']) ?>" class="btn btn-danger">Delete</a>
>>>>>>> 63f21736c37ddd6d5355864b78f1d29267113345
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
    <script>
        function mySuccess() {
        swal({
            title: "Success",
            text: "You are successful",
            icon: "success",
            buttons: false,
            timer: 5000, // Adjust the duration as needed
            showConfirmButton: false,
            animation: "pop",
            customClass: {
                popup: 'animated tada'
            }
        });
    }

        function confirmDelete(categoryId, pictureUrl) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                buttons: ["Cancel", "Yes, delete it!"],
                dangerMode: true,
            }).then((confirmed) => {
                if (confirmed) {
                    // Perform the deletion
                    fetch(`controllers/admin/category/delete_category.controller.php?id=${categoryId}&image=${pictureUrl}`, {
                            method: 'DELETE'
                        })
                        .then(response => {
                            if (response.ok) {

                                swal("Deleted!", "Your file has been deleted.", "success")
                                    .then(() => {

                                        window.location.reload();
                                    });

                            } else {

                                swal("Error!", "Failed to delete the file.", "error");
                            }
                        })
                        .catch(error => {

                            swal("Error!", "An error occurred while deleting the file.", "error");
                            console.error('Error:', error);
                        });
                }
            });
        }
    </script>
</div>