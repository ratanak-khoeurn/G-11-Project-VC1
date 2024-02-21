<link rel="stylesheet" href="../../vendor/css/deliverer.css">
<script src="../../vendor/js/manager.js" defer></script>
<div class="container">
    <h2 class="title">Deliverers</h2>
    <button class="add">Add Deliverer</button>
    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>ww
                <td>1</td>
                <td>Drink</td>
                <td>Drink</td>
                <td><img src="../../assets//images//logo_web.png" class="img" alt=""></td>
                <td>
                    <a href="" class="edit">Edit</a>
                    <a href="" class="delete">Delete</a>
                    <a href="" class="history">history</a>

                </td>
            </tr>
    </table>
    <div id="my_modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form action="#" method="post">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="lname">Full Name</label>
                        <input type="text" id="lname" name="lastname" placeholder="Your last name..">

                    </div>
                    <div class="form-group">
                        <label for="lname">Full Name</label>
                        <input type="text" id="lname" name="lastname" placeholder="Your last name..">

                    </div>
                    <div class="form-group">
                        <label for="lname">Email</label>
                        <input type="email" id="lname" name="lastname" placeholder="Your Email..">
                    </div>
                    <div class="form-group">
                        <label for="lname">Pass word</label>
                        <input type="password" id="lname" name="lastname" placeholder="Your Password..">
                    </div>

                    <button class="submit" type="submit">Submit</button>
                    <button class="close">Cancel</button>
            </form>
        </div>
    </div>

</div>