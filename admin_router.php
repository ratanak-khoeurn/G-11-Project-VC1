<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";
$routes = [
    '/admin' => 'controllers/admin/admin.controller.php',
    '/add_admin' => 'views/admin/admin_page.view.php',
    '/trainer-review' => 'controllers/admin/add.admin.controller.php',  
    '/trainer-classroom' => 'controllers/classroom/classroom.controller.php',
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

