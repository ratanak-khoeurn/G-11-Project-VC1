<?php
require 'database/database.php';
require 'models/admin/category/category.process.php';
?>

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<style>
    #map {
        height: 300px;
        width: 40%;
    }

    form {
        padding: 25px;
        width: 50%;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-left: 30px;
        align-items: center;
        padding-top: 30px;
        display: flex;
        flex-direction: column;
    }

    input {
        width: 85%;
        padding: 10px;
        margin-bottom: 30px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    button[type="buttons"] {
        padding: 9px 18px;
        background-color: #E21B70;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        align-self: self-start;
        margin-left: 40px;
    }
</style>


<div class="container">
    <div id="checkout" class="osahan-cart-item mb-3 rounded shadow-sm bg-white overflow-hidden">
        <div class="osahan-cart-item-profile bg-white p-3">
            <h6 class="mb-3 font-weight-bold">Your Address</h6>
            <div class="row">
                <div id="map"></div>
                <form id="locationForm">
                    <input type="text" id="address" name="address" placeholder="Enter your address">
                    <input type="number" id="phone" name="phone" placeholder="Enter your number">
                    <input type="hidden" id="latitude" name="latitude">
                    <input type="hidden" id="longitude" name="longitude">
                    <button type="buttons" id="submitButton">Submit</button>
                </form>
            </div>
        </div>

        <div class="accordion mb-3 rounded shadow-sm bg-white overflow-hidden" id="accordionExample">
            <div class="osahan-card bg-white border-bottom overflow-hidden">
                <div class="osahan-card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="d-flex p-3 align-items-center btn btn-link w-100" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="feather-globe mr-3"></i> CREDIT/DEBIT CARD
                            <i class="feather-chevron-down ml-auto"></i>
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="osahan-card-body border-top p-3" style="display: flex; flex-direction: column; align-items: center;">
                        <div class="container">
                            <div class="row" style="height: 500px;">
                                <div class="container-fluid d-flex justify-content-center">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span>CREDIT/DEBIT CARD PAYMENT</span>

                                                    </div>

                                                    <div class="col-md-6 text-right" style="margin-top: -5px;">

                                                        <img src="https://img.icons8.com/color/36/000000/visa.png">
                                                        <img src="https://img.icons8.com/color/36/000000/mastercard.png">
                                                        <img src="https://img.icons8.com/color/36/000000/amex.png">

                                                    </div>

                                                </div>

                                            </div>
                                            <div class="card-body" style="height: 400px">
                                                <div class="form-group">
                                                    <label for="cc-number" class="control-label">CARD NUMBER</label>
                                                    <input id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="&bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull;" required>
                                                </div>

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="cc-exp" class="control-label">CARD EXPIRY</label>
                                                            <input id="cc-exp" type="tel" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder="&bull;&bull; / &bull;&bull;" required>
                                                        </div>


                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="cc-cvc" class="control-label">CARD CVC</label>
                                                            <input id="cc-cvc" type="tel" class="input-lg form-control cc-cvc" autocomplete="off" placeholder="&bull;&bull;&bull;&bull;" required>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="form-group">
                                                    <label for="numeric" class="control-label">CARD HOLDER NAME</label>
                                                    <input type="text" class="input-lg form-control">
                                                </div>

                                                <div class="form-group">
                                                    <button id="payNowButton" style="background-color: #E21B70; color: white" class="btn btn-lg btn-block">Pay Now</button>

                                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                                    <script>
                                                        document.addEventListener("DOMContentLoaded", function() {
                                                            var payNowButton = document.getElementById('payNowButton');

                                                            payNowButton.addEventListener('click', function(event) {
                                                                event.preventDefault();

                                                                Swal.fire({
                                                                    title: "Auto close alert!",
                                                                    html: "I will close in <b></b> milliseconds.",
                                                                    timer: 2000,
                                                                    timerProgressBar: true,
                                                                    didOpen: () => {
                                                                        Swal.showLoading();
                                                                        const timer = Swal.getPopup().querySelector("b");
                                                                        const timerInterval = setInterval(() => {
                                                                            timer.textContent = `${Math.ceil(Swal.getTimerLeft() / 1000)}`;
                                                                        }, 100);
                                                                        Swal.resumeTimer();
                                                                    },
                                                                    willClose: () => {
                                                                        clearInterval(timerInterval);
                                                                    }
                                                                }).then((result) => {
                                                                    if (result.dismiss === Swal.DismissReason.timer) {
                                                                        console.log("I was closed by the timer");
                                                                    }
                                                                });
                                                            });
                                                        });
                                                    </script>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="osahan-card bg-white overflow-hidden">
            <div class="osahan-card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="d-flex p-3 align-items-center btn btn-link w-100" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="feather-dollar-sign mr-3"></i> Cash on Delivery
                        <i class="feather-chevron-down ml-auto"></i>
                    </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body border-top">
                    <h6 class="mb-3 mt-0 mb-3 font-weight-bold">Cash</h6>
                    <p class="m-0">Please keep exact change handy to help us serve you better</p>
                    <div class="footer" style="display: flex; justify-content: end; gap:15px ">
                        <button type="button" class="btn btn-primary" style="background:#E21B70;">Yes</button>
                        <button type="button" class="btn btn-secondary">No</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var map = L.map('map').setView([12.565679, 104.990967], 8); // Default center (Cambodia)
        var marker;

        // Add OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19
        }).addTo(map);

        // Add marker on map click
        function placeMarker(location) {
            if (marker) {
                map.removeLayer(marker);
            }
            marker = L.marker(location).addTo(map);
        }
        document.getElementById("submitButton").addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default button behavior
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
                            map.setView(location, 16); // Set map view to the geocoded location
                            placeMarker(location);
                            document.getElementById('latitude').value = lat;
                            document.getElementById('longitude').value = lon;
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
    });
</script>