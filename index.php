<?php
require 'utils/url.php';
require 'database/database.php';
if (urlIs("/admin") || urlIs('/category') || urlIs('/add_admin') || urlIs('/restaurant_admin') || urlIs('/product_admin')){ 
    require "admin_router.php";

} else if (urlIs('/signin') || urlIs('/signup')) {
    require "authentication_router.php";
}else{
    require 'router.php';
}

