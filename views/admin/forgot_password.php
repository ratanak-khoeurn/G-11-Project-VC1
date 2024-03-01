
<?php 
require "../../database/database.php";
?>

<style>
    #video-background {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        object-fit: cover;
    }
/* 
    #restar {
        position: relative;
        margin: auto;
        display: flex;
        align-items: center;
        height: 100%;
    } */

    .restar-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: rgba(255, 255, 255, 0.8);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        text-align: center; /* Center align the content */
    }

    .form-container {
        display: inline-block; /* Allow the container to take the width of its content */
        text-align: left; /* Reset text alignment */
        padding: 50px;
    }

    .form-group {
        margin-bottom: 50px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        font-size: 16px;
    }

    input[type="email"] {
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
    }
/* 
    input[type="file"] {
        margin-top: 5px;
    } */

    button[type="submit"] {
        width: calc(50% - 12px); /* Take 50% width minus padding */
        padding: 12px;
        border: none;
        border-radius: 6px;
        font-size: 18px;
        cursor: pointer;
    }

    button[type="submit"] {
        background-color: #007bff;
        color: #fff;
    }

    /* button[type="submit"]:hover {
        background-color: #0056b3;
    } */
/* 
    button[type="button"] {
        background-color: #ccc;
        color: #000;
    } */

    /* button[type="button"]:hover {
        background-color: #999;
    } */

    /* #old-image {
        display: block;
        margin: 0 auto;
        max-width: 100%;
        max-height: 200px;
        margin-bottom: 20px;
    } */
</style>

<video id="video-background" autoplay loop muted>
    <source src="../../../assets/images/bg.mp4" type="video/mp4">
</video>

<div id="restar">
    <div class="restar-content">
        <div class="form-container">
            <form action="../../../models/admin/send_password_reset.php" method ="post">
                <h1>Forgot password</h1>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="border form-control " id="email" name="email" placeholder="Enter email" required>
                </div>
                <button type="submit">Send</button>
            </form>
        </div>
    </div>
</div>