<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: wheat;">
    
</body>
</html> 




<?php

use app\controllers\AuthController;
use app\controllers\siteController;
use app\core\Application;
use app\core\Controller;
use app\controllers\AdminController;
use app\controllers\CategoryController;
require '../vendor/autoload.php';  


session_start();




$app = new Application(dirname(__DIR__));


$app->router->get('/', [siteController::class, 'home']);
$app->router->post('/', [siteController::class, 'logOut']);

$app->router->get('/about', [siteController::class, 'contactView']);
$app->router->post('/about',[siteController::class, 'handleContact']);

$app->router->get('/login', [siteController::class,'login']);
$app->router->post('/login', [AuthController::class,'login']);

$app->router->get('/logout',[siteController::class, 'logout']);


$app->router->get('/register', [siteController::class,'register']);
$app->router->post('/register', [AuthController::class,'register']);

$app->router->get('/admin-dashboard', [siteController::class, 'adminDashboard']);
$app->router->post('/admin-dashboard', [siteController::class, 'logOut']);

$app->router->get('/401', [siteController::class, 'error401']);

$app->router->get('/admin-products',[AdminController::class, 'showProducts']);
$app->router->post('/admin-products', [AdminController::class, 'switch']);

$app->router->get('/admin-charts',[siteController::class, 'adminCharts']);
$app->router->get('/admin-users',[siteController::class, 'adminUsers']);

$app->router->get('/admin-orders',[siteController::class, 'adminOrders']);

$app->router->get('/product-details', [siteController::class, 'productDetails']);
$app->router->post('/product-details', [siteController::class, 'addToCart']);

$app->router->get('/cart',[siteController::class, 'cartPage']);

$app->run();
?>



