<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";
$routes = [
    // '/admin' => 'controllers/admin/admin_home.controller.php',
    '/manager'=> 'controllers/manager/manager_home.controller.php'
];

if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
} else {
   http_response_code(404);
   $page = 'views/errors/404.php';
   
}

