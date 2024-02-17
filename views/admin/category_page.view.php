<link rel="stylesheet" href="../../vendor/css/cate_form.css">
<div class="main-wrapper">
    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
        <div class="container">
            <h2 class="main-title">Category</h2>
            <form action="" method="post">
   
                    <div class="form-group">
                        <label for="">Enter Name:</label>
                        <input type="text" class="form-control" placeholder="Name" id="" name="category">

                    </div>
                    <div class="form-group">
                        <label for="">Enter URL:</label>
                        <input type="text" class="border form-control" id="product_image_url" name="product_image_url" placeholder="enter image URL" required>

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
                <tr>
                    <td>1</td>
                    <td>Drink</td>
                    <td><img src="../../assets//images//logo_web.png" alt=""></td>
                    <td>
                        <a href="" class="btn btn-primary active ">Edit</a>
                        <a href="" class="btn btn-primary active ">Delete</a>
                    </td>
                </tr>
        </table>
        </div>
    </main>
</div>