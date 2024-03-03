<?php
    require "../../../database/database.php";
    require "../../../models/add.user/add.user.model.php";
?>
<link rel="stylesheet" href="../../../vendor/css/update.data.user.css">
<div class="main">
    <form action="../../../controllers/admin/delivery/update.delivery.controller.php?image=<?= $delivery['picture'] ?>" method="POST" enctype="multipart/form-data">
        <div class="group_input">
            <label for="first_name">First Name</label>
            <input type="text" placeholder="First Name" value="<?=$delivery['first_name']?>" name="first_name" id="first_name" required>
        </div>
        <div class="group_input">
            <label for="last_name">Last Name</label>
            <input type="text" placeholder="Last Name" value="<?=$delivery['last_name']?>" name="last_name" id="last_name" required>
        </div>
        <div class="group_input">
            <label for="email">Email</label>
            <input type="email" placeholder="Email" name="email" value="<?=$delivery['email']?>" id="email" required>
        </div>
        <div class="group_input">
            <label for="password">Password</label>
            <input type="password" placeholder="Password" value="<?=$delivery['password']?>" name="password" id="password" required>
        </div>
        <div class="group_input">
            <label for="role">Role</label>
            <select name="role" id="role" required>
            <option value="admin" <?php echo ($delivery['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
            <option value="delivery" <?php echo ($delivery['role'] == 'delivery') ? 'selected' : ''; ?>>Delivery</option>
            <option value="restaurant_owner" <?php echo ($delivery['role'] == 'restaurant_owner') ? 'selected' : ''; ?>>Restaurant Owner</option>
            </select>
        </div>
        <div class="group_input">
            <label for="phone">Phone</label>
            <input type="text" placeholder="Phone" name="phone" id="phone" value="<?=$delivery['phone']?>">
        </div>
        <div class="group_input">
            <label for="profile">Profile</label>
            <input type="file" name="profile" id="profile"  onchange="displayImage(event)">
        </div>
        <input type="hidden" value="<?=$delivery['user_id']?>" name="id">
        <div class="img">
            <label>Your Profile</label>
            <div class="pic">
                <img id="previewImage" src="../../../assets/images/user/<?=$delivery['picture']?>" alt="">
            </div>
        </div>
        <div class="group_input">
            <button type="submit">Update User</button>
            <button type="button" style="margin-top: 20px;" onclick="hide()">Cancel</button>
        </div>
    </form>
</div>

<script>
    function displayImage(event) {
        var selectedFile = event.target.files[0];
        var previewImage = document.getElementById('previewImage');


        var reader = new FileReader();
        reader.onload = function (event) {
            previewImage.src = event.target.result;
        };

        reader.readAsDataURL(selectedFile);
    }
    var urlParams = new URLSearchParams(window.location.search);
    var pValue = urlParams.get('p');
    console.log(pValue);

    function hide() {
        if (pValue == 'manager') {
            window.location.href = '/manager_admin';

        } if (pValue == 'admin') {
            window.location.href = '/add_admin';
        }
        if (pValue == 'delivery') {
            window.location.href = '/deliverer_admin';
        }
    }
</script>