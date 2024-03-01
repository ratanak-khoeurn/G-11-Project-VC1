<?php
require_once '../../database/database.php';
require_once '../../models/signin.model.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Escape the query string to prevent SQL injection.
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']); //123

    // Get data from database
    $user = getUser($email);
    // Check if user exists
    if (count($user) >= 0) {
        if ($email == $user['email']) {
            if (($password == $user['password']) && ($user['role'] == 'admin')) {
                header('Location: /admin_home');
            } else {
?>
                <script>
                    setInterval(function() {
                        alert("Email or password invalid, please try again.");
                    }, 1000);
                </script>

<?php
                header('Location: /admin');
            }
        } else {
            header('Location: /admin');
            echo '<script>alert("Your email not admin");</script>';
        }
    }
}
