<?php
require 'database/database.php';
require 'models/admin/category/category.process.php';

?>

<div class="col-md-8 mb-3"
    style="display:flex; flex-direction:column; justify-content:center; align-items: center; margin-left: 16%; margin-top:20px; height: 100%;">
    <div id="checkout" style="width: 100%;">
        <div class="osahan-cart-item mb-3 rounded shadow-sm bg-white overflow-hidden">
            <div class="osahan-cart-item-profile bg-white p-3">
                <div class="d-flex flex-column">
                    <h6 class="mb-3 font-weight-bold">Delivery Address</h6>
                    <div class="row">
                        <div class="custom-control col-lg-6 custom-radio mb-3 position-relative border-custom-radio">
                            <input type="radio" id="customRadioInline1" name="customRadioInline1"
                                class="custom-control-input" checked>
                            <label class="custom-control-label w-100" for="customRadioInline1">
                                <div>
                                    <div class="p-3 bg-white rounded shadow-sm w-100">
                                        <div class="d-flex align-items-center mb-2">
                                            <h6 class="mb-0">Home</h6>
                                            <p class="mb-0 badge badge-success ml-auto"><i
                                                    class="icofont-check-circled"></i> Default</p>
                                        </div>
                                        <p class="small text-muted m-0">1001 Veterans Blvd</p>
                                        <p class="small text-muted m-0">Redwood City, CA 94063</p>
                                    </div>
                                    <a href="#" data-toggle="modal" data-target="#exampleModal"
                                        class="btn btn-block btn-light border-top">Edit</a>
                                </div>
                            </label>
                        </div>
                        <div class="custom-control col-lg-6 custom-radio position-relative border-custom-radio">
                            <input type="radio" id="customRadioInline2" name="customRadioInline1"
                                class="custom-control-input">
                            <label class="custom-control-label w-100" for="customRadioInline2">
                                <div>
                                    <div class="p-3 rounded bg-white shadow-sm w-100">
                                        <div class="d-flex align-items-center mb-2">
                                            <h6 class="mb-0">Work</h6>
                                            <p class="mb-0 badge badge-light ml-auto"><i
                                                    class="icofont-check-circled"></i> Select</p>
                                        </div>
                                        <p class="small text-muted m-0">Model Town, Ludhiana</p>
                                        <p class="small text-muted m-0">Punjab 141002, India</p>
                                    </div>
                                    <a href="#" data-toggle="modal" data-target="#exampleModal"
                                        class="btn btn-block btn-light border-top">Edit</a>
                                </div>
                            </label>
                        </div>
                    </div>
                    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#exampleModal">ADD NEW ADDRESS
                    </a>
                </div>
            </div>
            <div class="accordion mb-3 rounded shadow-sm bg-white overflow-hidden" id="accordionExample">
                <div class="osahan-card bg-white border-bottom overflow-hidden" style="width:100%">
                    <div class="osahan-card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="d-flex p-3 align-items-center btn btn-link w-100" type="button"
                                data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo">
                                <i class="feather-globe mr-3"></i> Net Banking
                                <i class="feather-chevron-down ml-auto"></i>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="osahan-card-body border-top p-3">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <style>
                                            .btn-group-toggle label.btn {
                                                border: none;
                                                /* Remove borders from all buttons */
                                            }
                                        </style>
                                        <form>
                                            <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                                <label class="btn btn-outline-secondary active">
                                                    <input type="radio" name="options" id="option1" checked>
                                                    <img src="assets/images/checkout/ABA.jpg" alt="" width="100px">
                                                </label>
                                                <label class="btn btn-outline-secondary">
                                                    <input type="radio" name="options" id="option2">
                                                    <img src="assets/images/checkout/AC.png" alt="" width="100px">

                                                </label>
                                                <label class="btn btn-outline-secondary" style="border:none;">
                                                    <input type="radio" name="options" id="option3">
                                                    <img src="assets/images/checkout/WING.png" alt="" width="100px">
                                                </label>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div id="image-container">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Bootstrap JS and jQuery -->
                            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                            <script
                                src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

                            <script>
                                $(document).ready(function () {
                                    // Function to display image based on selected radio button
                                    $('input[type="radio"]').change(function () {
                                        var imageSrc = '';
                                        if ($(this).is(':checked') && $(this).attr('id') === 'option1') {
                                            imageSrc = 'assets/images/checkout/QR-CODE.jpg';
                                        } else if ($(this).is(':checked') && $(this).attr('id') === 'option2') {
                                            imageSrc = 'assets/images/checkout/QR-CODE.jpg';
                                        } else if ($(this).is(':checked') && $(this).attr('id') === 'option3') {
                                            imageSrc = 'assets/images/checkout/QR-CODE.jpg';
                                        }
                                        $('#image-container').html('<img src="' + imageSrc + '" alt="QR Code Image" class="img-fluid">');
                                    });
                                    // Display default image
                                    $('#image-container').html('<img src="assets/images/checkout/QR-CODE.jpg" alt="Default QR Code Image" class="img-fluid">');
                                });
                            </script>

                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="osahan-card bg-white overflow-hidden">
            <div class="osahan-card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="d-flex p-3 align-items-center btn btn-link w-100" type="button"
                        data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                        aria-controls="collapseThree">
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
<div class="payment"
    style="background-color:teal; width: 65.8%; margin-left:16.5%; border-radius:10px; margin-bottom:10px">
    <a class="btn btn-success btn-block btn-lg" href="/successfull.html">PAY $1329<i
            class="feather-arrow-right"></i></a>
</div>
</div>