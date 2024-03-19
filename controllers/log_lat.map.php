<?php
require 'database/database.php';
require 'models/admin/category/category.process.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $address = $_POST['address'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    echo $latitude,$longitude;

    // Insert data into database
    // $sql = "INSERT INTO locations (address, latitude, longitude) VALUES (?, ?, ?)";
    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param("sdd", $address, $latitude, $longitude);

    // // Execute the statement
    // if ($stmt->execute()) {
    //     echo "Location stored successfully.";
    // } else {
    //     echo "Error storing location: " . $conn->error;
    // }

    // // Close the statement
    // $stmt->close();
}
?>

<!-- Your HTML and JavaScript code here -->
