<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Management</title>
    <link rel="stylesheet" href="../../vendor/css/add_user.css">
</head>

<body>
    <div class="container">
        <h2 style="margin-top: 20px;">Delivery Management System</h2>
        <div id="my_modal" class="modal">
            <div class="modal-content">
                <form action="#" method="post">
                    <div class="names">
                        <div class="form-group-name">
                            <label for="firstname">First Name</label>
                            <input type="text" id="firstname" name="firstname" placeholder="Enter your first name">
                        </div>
                        <div class="form-group-name">
                            <label for="lastname">Last Name</label>
                            <input type="text" id="lastname" name="lastname" placeholder="Enter your last name">
                        </div>
                    </div>
                    <div class="names">
                        <div class="form-group-name">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email">
                        </div>
                        <div class="form-group-name">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Enter your password">
                        </div>

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
                    <button class="submit" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>