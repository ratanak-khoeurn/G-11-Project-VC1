<?php
require 'utils/url.php';
require 'database/database.php';
if ( urlIs('/category') || urlIs('/add_admin') || urlIs('/restaurant_admin') || urlIs('/product_admin')|| urlIs('/manager_admin') || urlIs('/customer_admin') || urlIs('/deliverer_admin')|| urlIs('/admin_home')|| urlIs('/add_user') ){ 
    require "admin_router.php";

} else if (urlIs('/signin') || urlIs('/signup')|| urlIs("/manager")|| urlIs('/deliverer')|| urlIs('/admin') || urlIs('/forgot_password')|| urlIs('/code_security')|| urlIs('/recover_password')) {
 
    require "authentication_router.php";
}
else{
    require 'router.php';
}

