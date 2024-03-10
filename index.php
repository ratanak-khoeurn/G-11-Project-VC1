<?php
session_start();
require 'utils/url.php';
require 'database/database.php';
if (isset($_SESSION['admin']) && $_SESSION['admin'] != ''){ 
    require "admin_router.php";

}else if (urlIs('/signin') || urlIs('/signup')|| urlIs("/manager")|| urlIs('/deliverer')|| urlIs('/admin') || urlIs('/forgot_password')|| urlIs('/code_security')|| urlIs('/recover_password')) {
    require "authentication_router.php";
}
elseif(isset($_SESSION['users']) && $_SESSION['users'] != '' || !isset($_SESSION['users'])|| !isset($_SESSION['admin']))
{
    require 'router.php';
}

