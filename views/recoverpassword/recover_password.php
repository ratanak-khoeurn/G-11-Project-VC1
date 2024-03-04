


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

    #restar {
        position: relative;
        margin: auto;
        display: flex;
        align-items: center;
        height: 100%;
    }

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
        padding: 35px;
    }



    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        font-size: 16px;
    }

    input[type="email"] {
        width: 100%;
        padding: 10px;
        border: 1px solid ;
        border-radius: 6px;
        font-size: 16px;
        margin-bottom: 20px;
    }


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


</style>

<video id="video-background" autoplay loop muted>
    <source src="../../../assets/images/bg.mp4" type="video/mp4">
</video>

<div id="restar">
    <div class="restar-content">
        <div class="form-container">
            <form action="#" method ="post">
            <h1 >
               New Password
            </h1>
            <p class="text-center">Please create a new password for your account</p>
            <label for="password">New Password</label>
            <div>
                <input type="password" name="new-password" id="new-password" value="<?= isset($_POST['new-password'])? $_POST['new-password'] : ""?>" placeholder="••••••••••••" >
                <span ><?= isset($errors['new_password'])? $errors['new_password']: ""; ?></span>
            </div>
            <label for="password" >Confirm Password</label>
            <div>
                <input type="password" name="confirm-password" id="password" value="<?= isset($_POST['confirm-password'])? $_POST['confirm-password'] : ""?>" placeholder="••••••••••••"  >
                <span ><?= isset($errors['confirm_password'])? $errors['confirm_password'] : ""; ?></span>   
            </div>
            <button type="submit" >Change</button>
            </form>
        </div>
    </div>
</div>