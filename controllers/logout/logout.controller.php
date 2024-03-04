<?php
session_start(); // Start the session

// Destroy the session
session_destroy();

// Redirect the user to the homepage
header('Location: /');
exit(); // Terminate script execution after redirect
?>  
