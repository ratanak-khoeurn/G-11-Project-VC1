<?php
require 'utils/url.php';
require 'database/database.php';
if (urlIs("/admin") || urlIs('/category') || urlIs('/form_category')) { 
    require "admin_router.php";

} else if (urlIs('/signin') || urlIs('/signup') || urlIs('/product')) {
    require "authentication_router.php";
}else{
    require 'router.php';
}

