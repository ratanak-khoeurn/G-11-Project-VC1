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
                        <form id="locationForm" method="post" action="#">
                            <input type="text" id="address" name="address" placeholder="Enter your address">
                            <input type="number" id="phone" name="phone" placeholder="Enter your address">
                            <input type="hidden" id="latitude" name="latitude">
                            <input type="hidden" id="longitude" name="longitude">
                            <button type="submit">Submit</button>
                        </form>
                        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
                        <script>
                            var map = L.map('map').setView([12.5657, 104.991], 7);
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                            }).addTo(map);
                            document.getElementById('locationForm').addEventListener('submit', function(event) {
                                event.preventDefault();

                                var address = document.getElementById('address').value;
                                fetch('https://nominatim.openstreetmap.org/search?format=json&q=' + encodeURIComponent(address))
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data && data.length > 0) {
                                            var latitude = parseFloat(data[0].lat);
                                            var longitude = parseFloat(data[0].lon);
                                            document.getElementById('latitude').value = latitude;
                                            document.getElementById('longitude').value = longitude;
                                            document.getElementById('locationForm').submit();
                                        } else {
                                            alert('Address not found. Please enter a valid address.');
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                        alert('An error occurred while geocoding. Please try again.');
                                    });
                            });
                        </script>
                    </div>
                </div>
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
                                                    <button style="background-color: #E21B70;color:white" class="btn btn-lg btn-block" >Payment</button>
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
</div>