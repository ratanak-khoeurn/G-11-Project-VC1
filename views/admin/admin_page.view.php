<link rel="stylesheet" href="../../vendor/css/admin_page.css">
<script src="../../vendor/js/admin_page.js" defer></script>
<div class="container">
  <h2 class="title">Admins</h2>
  <button class="add">Add Admin</button>
  <div id="my_modal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <form action="controllers/admin/create_admin.controller.php" method="post">
        <div class="mb-3">
          <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Your first name..">

          </div>
          <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lastname" placeholder="Your last name..">

          </div>
          <div class="form-group">
            <label for="lname">Email</label>
            <input type="email" id="lname" name="email" placeholder="Your Email..">
          </div>
          <div class="form-group">
            <label for="lname">Pass word</label>
            <input type="password" id="lname" name="password" placeholder="Your Password..">
          </div>
          <div class="form-group">
            <label for="profile">Upload Profile</label>
            <input type="file" id="profile" name="profile">
          </div>

          <button class="submit" type="submit">Submit</button>
          <button class="close">Cancel</button>
      </form>
    </div>
  </div>