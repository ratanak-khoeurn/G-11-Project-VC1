<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";
$routes = [
    '/signin' => 'controllers/signin/signin.controller.php',
    '/signup' => 'controllers/signup/signup.controller.php',
    '/product' => 'controllers/product/product.controller.php',
    '/manager' => 'controllers/manager/manager.controller.php',
    '/deliverer'=> 'controllers/deliverer/deliverer.controller.php',
    '/admin' => 'controllers/admin/admin_home.controller.php',
    '/manager_home'=> 'controllers/manager/manager_home.controller.php',
    '/forgot_password'=> 'controllers/recoverpassword/forgot_password.controller.php',
    '/code_security'=> 'controllers/recoverpassword/forgot_password.code.controller.php',
    // '/recover_passwrd'=> 'controllers/recoverpassword/recover_password.controller.php',


    // '/trainer-review' => 'controllers/reviews/review.controller.php',
    // '/trainer-classroom' => 'controllers/classroom/classroom.controller.php',



];

if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
} else {
    http_response_code(404);
    $page = 'views/errors/404.php';
}
require $page;
