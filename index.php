<?php
session_start();
require 'utils/url.php';
require 'database/database.php';
<<<<<<< HEAD
if ( urlIs('/category') || urlIs('/add_admin') || urlIs('/restaurant_admin') || urlIs('/product_admin')|| urlIs('/manager_admin') || urlIs('/customer_admin') || urlIs('/deliverer_admin')|| urlIs('/admin_home')|| urlIs('/add_user') ){ 
=======
if (isset($_SESSION['admin']) && $_SESSION['admin'] != ''){ 
>>>>>>> b94e1bddc64de52c69a793c3ba268ab0fce4fc17
    require "admin_router.php";

} else if (urlIs('/signin') || urlIs('/signup')|| urlIs("/manager")|| urlIs('/deliverer')|| urlIs('/admin') || urlIs('/forgot_password')|| urlIs('/code_security')|| urlIs('/recover_password')) {
 
    require "authentication_router.php";
}
elseif(isset($_SESSION['users']) && $_SESSION['users'] != '' || !isset($_SESSION['users'])|| !isset($_SESSION['admin']))
{
    require 'router.php';
}

