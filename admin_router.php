<?php
// session_start();
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";
$routes = [
    '/category' => 'controllers/admin/category/category.controller.php',
    '/add_admin' => 'views/admin/admin_page.view.php',
    '/restaurant_admin' => 'controllers/admin/restaurant/restaurant_page.controller.php',
    '/product_admin' => 'controllers/admin/products/product_page.controller.php',
    '/manager_admin' => 'controllers/admin/manager.controller.php',
    '/customer_admin' => 'controllers/admin/customer.controller.php',
    '/deliverer_admin' => 'controllers/admin/delivery/deliverer.controller.php',
    '/admin_admin' => 'controllers/admin/admin.controller.php',
    '/add_user'=> 'controllers/admin/add.user.controller.php',
    '/comment'=> 'controllers/admin/comment.controller.php',
    '/admin' => 'controllers/admin/admin_home.controller.php',
    '/order' => 'controllers/admin/orders.controller.php',



];  

if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
} else {
   http_response_code(404);
   $page = 'views/errors/404.php';
}
require "layouts/admin/header.php";
require "layouts/admin/nav-top.php";
require "layouts/admin/navbar.php";
require $page;
require "layouts/admin/footer.php";

