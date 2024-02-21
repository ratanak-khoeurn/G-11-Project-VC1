<link rel="stylesheet" href="../../vendor/css/manager.css">
<script src="../../vendor/js/manager.js" defer></script>
<div class="container">
    <h2 class="title">Restaurant's Manager</h2>
    <button class="add" onclick="show_form()">Add Restaurant's Manager</button>
    <div id="my_modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form action="#" method="post">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="lname">First Name</label>
                        <input type="text" id="lname" name="lastname" placeholder="Your last name..">

                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                    </div>
                    <div class="form-group">
                        <label for="restaurant_name">Restaurant Name</label>
                        <select class="form-control" id="restaurant_name" name="restaurant_name" required>
                            <option value="">Select a restaurant</option>
                            <option value="restaurant1">Restaurant 1</option>
                            <option value="restaurant2">Restaurant 2</option>
                            <option value="restaurant3">Restaurant 3</option>
                            <!-- Add more options as needed -->
                        </select>
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
                    <button class="close" onclick="hide_form()">Cancel</button>
            </form>
        </div>
    </div>