<?php
require 'database/database.php';
require 'models/admin/category/category.process.php';
?>

<div class="col-md-8 mb-3" style="display:flex; flex-direction:column; justify-content:center; align-items: center; margin-left: 16%; margin-top:20px; height: 100%;width:100%">
    <div id="checkout" style="width: 100%; height: 50%;">
        <div class="osahan-cart-item mb-3 rounded shadow-sm bg-white overflow-hidden" style="height:100%;width:100%;">
            <div class="osahan-cart-item-profile bg-white p-3">
                <div class="d-flex flex-column" style="height:100%;width:100%">
                    <h6 class="mb-3 font-weight-bold">Your Address</h6>
                    <div class="row">
                        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
                        <style>
                            #map {
                                height: 300px;
                                width: 40%;
                                display: flex;
                                flex-direction: column;
                            }

                            form {
                                display: flex;
                                flex-direction: column;
                                width: 50%;
                                border: 1px solid #ccc;
                                border-radius: 5px;
                                margin-left: 30px;
                                align-items: center;
                                padding-top: 30px;
                            }

                            input {
                                width: 85%;
                                padding: 8px;
                                margin-bottom: 10px;
                                border: 1px solid #ccc;
                                border-radius: 3px;
                                margin-bottom: 40px;
                            }

                            button[type="submit"] {
                                padding: 8px 25px;
                                background-color: #E21B70;
                                color: #fff;
                                border: none;
                                border-radius: 3px;
                                cursor: pointer;
                                align-self: self-start;
                                margin-left: 34px;
                            }
                        </style>


                        <div id="map"></div>
                        <form id="locationForm">
                            <input type="text" id="address" name="address" placeholder="Enter your address">
                            <input type="number" id="phone" name="phone" placeholder="Enter your number">
                            <input type="hidden" id="latitude" name="latitude">
                            <input type="hidden" id="longitude" name="longitude">
                            <button type="submit">Submit</button>
                        </form>
                        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
                        <script>
        var map = L.map('map').setView([12.565679, 104.990967], 8); // Default center (Cambodia)
        var marker;

        // Add OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19
        }).addTo(map);

        // Add marker on map click
        map.on('click', function(e) {
            placeMarker(e.latlng);
        });

        function placeMarker(location) {
            if (marker) {
                map.removeLayer(marker);
            }
            marker = L.marker(location).addTo(map);
        }

        // Handle form submission
        document.getElementById("submitBtn").addEventListener('click', function() {
            var address = document.getElementById("address").value.trim();
            if (address !== '') {
                fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${address}&countrycodes=KH`) // Limit search to Cambodia
                    .then(response => response.json())
                    .then(data => {
                        console.log('Geocoding API Response:', data); // Log the API response for debugging
                        if (data.length > 0) {
                            var result = data[0];
                            var lat = result.lat;
                            var lon = result.lon;
                            console.log('Latitude:', lat, 'Longitude:', lon); // Log the retrieved latitude and longitude
                            var location = L.latLng(lat, lon);
                            placeMarker(location);
                            map.setView(location, 16); // Set map view to the geocoded location
                        } else {
                            alert('Location not found. Please try again. Make sure the address is within Cambodia.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred. Please try again later.');
                    });
            } else {
                alert('Please enter an address.');
            }
        });
    </script>
                    </div>
                </div>
            </div>

        </div>
        
    </div>

</div>

<!-- Leaflet JavaScript -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    var map = L.map('map').setView([12.5657, 104.991], 7);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    document.getElementById('locationForm').addEventListener('submit', function(event) {
        event.preventDefault();

        var address = document.getElementById('address').value;
        fetch('https://nominatim.openstreetmap.org/search?format=json&q=' + encodeURIComponent(address) + '&countrycodes=KH') // Limit search to Cambodia
            .then(response => response.json())
            .then(data => {
                if (data && data.length > 0) {
                    var latitude = parseFloat(data[0].lat);
                    var longitude = parseFloat(data[0].lon);
                    document.getElementById('latitude').value = latitude;
                    document.getElementById('longitude').value = longitude;
                    document.getElementById('locationForm').submit();
                } else {
                    alert('Address not found. Please enter a valid address within Cambodia.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while geocoding. Please try again.');
            });
    });
</script>
