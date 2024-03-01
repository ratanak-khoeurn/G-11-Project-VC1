<link rel="stylesheet" href="../../vendor/css/add_user.css">
<div class="main">
    <h1>User Management System</h1>
    <form action="../../controllers/admin/users/add.user.controller.php" method="POST" enctype="multipart/form-data">
        <div class="group_input">
            <label for="first_name">First Name</label>
            <input type="text" placeholder="First Name" name="first_name" id="first_name" required>
        </div>
        <div class="group_input">
            <label for="last_name">Last Name</label>
            <input type="text" placeholder="Last Name" name="last_name" id="last_name" required>
        </div>
        <div class="group_input">
            <label for="email">Email</label>
            <input type="email" placeholder="Email" name="email" id="email" required>
        </div>
        <div class="group_input">
            <label for="password">Password</label>
            <input type="password" placeholder="Password" name="password" id="password" required>
        </div>
        <div class="group_input">
            <label for="role">Role</label>
            <select name="role" id="role" required>
                <option value="admin">Admin</option>
                <option value="delivery">Delivery</option>
                <option value="restaurant_owner">Restaurant Owner</option>
            </select>
        </div>
        <div class="group_input">
            <label for="phone">Phone</label>
            <input type="tel" placeholder="Phone" name="phone" id="phone">
        </div>
        <div class="group_input">
            <label for="profile">Profile</label>
            <input type="file" name="profile" id="profile" accept="image/*" required onchange="displayImage(event)">
        </div>
        <div class="img">
            <label for="">Your Profile</label>
            <div class="pic">
                <img id="previewImage" src="" alt="">
            </div>
        </div>

        <div class="group_input">

            <button type="submit">Create User</button>
        </div>
    </form>
</div>
<script>
    function displayImage(event) {
        var selectedFile = event.target.files[0];
        var previewImage = document.getElementById('previewImage');

        var reader = new FileReader();
        reader.onload = function(event) {
            previewImage.src = event.target.result;
        };

        reader.readAsDataURL(selectedFile);
    }
</script>