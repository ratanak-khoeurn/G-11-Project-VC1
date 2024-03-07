<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $restaurant_id = $_POST["restaurant_id"];
    $restaurant_name = $_POST["restaurant_name"];
    $restaurant_address = $_POST["restaurant_address"];
    $restaurant_image_url = $_POST["restaurant_image_url"];
    $restaurant_owner_name = $_POST["restaurant_owner_name"];

    // Output the submitted data in a card layout
    echo ' 
    <div class="card" style="width:200px; border:1px solid black; padding:10px; border-radius:20px; background-color:rgba(0, 183, 255, 0.356)">
        <img src="' . $restaurant_image_url . '" alt="Restaurant Image" style="width:200px; border-radius:10px;">
        <div class="container">
            <h4 style="backgroundColor:pink"><b>' . $restaurant_name . '</b></h4>
            <p>Restaurant ID: ' . $restaurant_id . '</p>
            <p>Address: ' . $restaurant_address . '</p>
            <p>Owner Name: ' . $restaurant_owner_name . '</p>
        </div>
    </div>';
} else {
    // Display the form
    echo '
    <style>
        body{
            background-color: rgba(0, 183, 255, 0.400);
            background-image:url(https://img.freepik.com/premium-photo/spaghetti-food-photography-delicious-italian-cuisine-created-with-generative-ai_115122-5680.jpg);
            background-size: 600px 700px;
            background-repeat: no-repeat;
        }
        .form-container {
            margin-top: 3%;
            margin-left: 56%;
            width: 30%;
            border: 2px solid black;
            padding:10px;
            border-radius:20px;
            background-color:rgba(121, 32, 199, 0.594)

        }
        .form-container label {
            margin-top:15px;
            display: block;
            margin-bottom: 10px;
        }
        .form-container input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid teal;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-container button {
            background-color: #4CAF50;
            width:180px;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 30%;
        }
        .form-container button:hover {
            background-color: #45a049;
        }
        /* Card layout styles */
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 50%;
            margin: auto;
            text-align: center;
        }
        .container {
            padding: 2px 16px;
        }
    </style>
    <div class="form-container">
        <form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
            <label for="restaurant_id">Restaurant ID:</label>
            <input type="text" id="restaurant_id" name="restaurant_id" placeholder="Enter your restaurant id" required><br>
            <label for="restaurant_name">Restaurant Name:</label>
            <input type="text" id="restaurant_name" name="restaurant_name" placeholder="Enter your restaurant name" required><br>
            <label for="restaurant_address">Restaurant Address:</label>
            <input type="text" id="restaurant_address" name="restaurant_address" placeholder="Enter your restaurant address" required><br>
            <label for="restaurant_image_url">Restaurant Image:</label>
            <input type="text" id="restaurant_image_url" name="restaurant_image_url" placeholder="Enter your restaurant image" required><br>
            <label for="restaurant_owner_name">Restaurant Owner Name:</label>
            <input type="text" id="restaurant_owner_name" name="restaurant_owner_name" placeholder="Enter your name" required><br><br>
            <button type="submit">Submit</button>
        </form>
    </div>';
}
?>
