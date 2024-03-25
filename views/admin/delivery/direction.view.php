<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direction Example</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.css" />
    <style>
        #map {
            height: 500px;
            width: 100%;
        }

        .first {
            width: 90%;
            display: flex;
            flex-direction: column;
            /* padding: 0 30px; */


        }

        .main {
            display: flex;
            width: 90%;
            justify-content: space-between;
            padding-left: 30px;
        }
        .main1{
            padding-left: 30px;
        }
    </style>
</head>

<body>
    <div class="first">
<?php
require "database/database.php";
require "models/order/add.cart.model.php";
$orderId = $_SESSION['id'];
$orderData = location_customer($orderId); 
// echo $orderData['location'];

?>
        <div class="main">
            <div>
                <label for="customerLocation">Customer Location:</label>
                <input type="text" id="customerLocation" placeholder="Enter customer's location" value="<?= $orderData[0]['location']?>">
            </div>
            <div>
                <label for="deliveryLocation">Delivery Person Location:</label>
                <input type="text" id="deliveryLocation" placeholder="Enter delivery person's location">
            </div>
            <button id="showDirections">Show Directions</button>
        </div>
        <div class="main1">
            <h1>Your Direction :</h1>
            <div id="map"></div>
        </div>
    </div>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.js"></script>
    <script>
        document.getElementById('showDirections').addEventListener('click', function () {
            var customerLocation = document.getElementById('customerLocation').value.trim();
            var deliveryLocation = document.getElementById('deliveryLocation').value.trim();

            // Check if inputs are empty
            if (customerLocation === '' || deliveryLocation === '') {
                alert('Please enter both customer and delivery person locations.');
                return;
            }

            var map = L.map('map', {
                center: [12.5657, 104.991],
                zoom: 7,
                maxBounds: [
                    [9.241, 102.133], // Southwest corner of Cambodia
                    [14.704, 107.631] // Northeast corner of Cambodia
                ]
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Geocode customer location
            var customerMarker = L.marker([0, 0]).addTo(map);
            var deliveryMarker = L.marker([0, 0]).addTo(map);

            var customerLat, customerLon, deliveryLat, deliveryLon;

            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${customerLocation}&countrycodes=KH`) // Limit search to Cambodia
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        customerLat = parseFloat(data[0].lat);
                        customerLon = parseFloat(data[0].lon);
                        customerMarker.setLatLng([customerLat, customerLon]).bindPopup('Customer Location').openPopup();
                    } else {
                        alert('Could not find customer location.');
                    }
                });

            // Geocode delivery location
            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${deliveryLocation}&countrycodes=KH`) // Limit search to Cambodia
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        deliveryLat = parseFloat(data[0].lat);
                        deliveryLon = parseFloat(data[0].lon);
                        deliveryMarker.setLatLng([deliveryLat, deliveryLon]).bindPopup('Delivery Person Location').openPopup();

                        // Draw route line between customer and delivery locations
                        L.Routing.control({
                            waypoints: [
                                L.latLng(customerLat, customerLon),
                                L.latLng(deliveryLat, deliveryLon)
                            ]
                        }).addTo(map);
                    } else {
                        alert('Could not find delivery person location.');
                    }
                });
        });
    </script>
</body>

</html>