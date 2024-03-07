<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Gurdeep Osahan" />
    <meta name="author" content="Gurdeep Osahan" />
    <link rel="shortcut icon" href="assets/images/logo_web_red.png" type="image/x-icon">
    <link rel="stylesheet" href="../../vendor/css/restaurant_form.css">
    <title>Foodride - Online Food Ordering Website Template</title>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
        }

        .login-page {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
            /* Optional: Hide overflow content */
        }

        #vid {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .text {
            position: absolute;
            z-index: 1;
            color: white;
            font-size: 2rem;
            text-align: center;
            width: 80%;
            top: 50%;
            transform: translateY(-50%);
        }

        button {
            padding: 10px 20px;
            font-size: 1.2rem;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: pink;
            transform: scale(1.05);
        }

        span {
            color:pink;
        }

        /* Modal styles */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 9999;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.4);
            transition: 0.5s;
           
        }

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            /* Center horizontally */
            margin-top: 10vh;
            /* Adjust top margin for vertical centering */
            padding: 10px;
            width: 50%;
            border-radius: 5px;
            height: 60%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        form {
            width: 97%;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 80%;
        }

        .form-group {
            width: 90%;
            margin-bottom: 20px;
        }

        .border {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 91%;
            text-align: center;
            font-size: 1.2rem;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #45a049;
        }

        input[type="text"],
        input[type="number"]{
            width: 100%;
            height: 40px;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 1rem;
        }
        /* .form-group .i {
            border: 1px solid #e5e5e5;
        } */

        input[type=file]::file-selector-button {
            background-color: #fff;
            color: #000;
            border: 0px;
            border-right: 1px solid #e5e5e5;
            padding: 10px 15px;
            margin-right: 20px;
            transition: .5s;
        }

        input[type=file]::file-selector-button:hover {
            background-color: #eee;
            border: 0px;
            border-right: 1px solid #e5e5e5;
        }

        .custom-file-input::-webkit-file-upload-button {
            visibility: hidden;
        }

        .custom-file-input::before {
            content: 'Choose Image';
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            padding: 6px 12px;
            outline: none;
            border: none;
            cursor: pointer;
        }

        .custom-file-input:hover::before {
            background-color: pink;
        }

        .custom-file-input:active::before {
            background-color: #45a049;
        }
        .head{
            color: black;
        }
    </style>
</head>

<body>
    <div class="login-page">
        <video loop autoplay muted id="vid">
            <source src="assets/images/bg.mp4" type="video/mp4" />
            <source src="assets/images/bg.mp4" type="video/ogg" />
            Your browser does not support the video tag.
        </video>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="close_form()">&times;</span>
                <form action="controllers/signin/check_signin_admin.controller.php" method="post">
                    <h1 class="head">SIGN IN YOUR ACCOUNT</h1>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="border form-control" id="email" name="email" placeholder="Enter email" required>
                        
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="border form-control" id="password" name="password" placeholder="Enter password" required>
                    </div>
                    <div class="form-group">
                        <a href="" style=" text-decoration: none;" >Forgot Password</a>
                    </div>
                    <button type="submit" class="border btn ">SIGN IN</button>
                </form>
            </div>
        </div>
        <div class="text">
            <h1>WELCOME TO <span>ADMIN</span></h1>
            <p>Your one-stop destination for online food ordering</p>
            <p>If you are the admin please Signin here:</p>
            <button class="signin" onclick="show_form()">SIGN IN</button>
        </div>
    </div>
    <script>
        let form = document.getElementById('myModal');
        let signInBtn = document.querySelector('.signin');

        function show_form() {
            form.style.display = 'block';
        }

        function close_form() {
            form.style.display = 'none';
        }
    </script>
</body>

</html>