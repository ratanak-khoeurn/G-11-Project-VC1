<?php
session_start();
require 'utils/url.php';
require 'database/database.php';
if (isset($_SESSION['admin']) && $_SESSION['admin'] != '' || isset($_SESSION['manager'])){ 
    require "admin_router.php";

}else if (urlIs('/signin') || urlIs('/signup')|| urlIs('/deliverer')|| urlIs('/forgot_password')|| urlIs('/code_security')|| urlIs('/recover_password') || urlIs('/manager')) {
    require "authentication_router.php";
}
elseif(isset($_SESSION['user']) && $_SESSION['user'] != ''|| !isset($_SESSION['admin']) || !isset($_SESSION['manager']))
{
    require 'router.php';
}

