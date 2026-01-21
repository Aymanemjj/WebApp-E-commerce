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

require '../vendor/autoload.php';  


session_start();




$app = new Application(dirname(__DIR__));


$app->router->get('/', [siteController::class, 'home']);
$app->router->post('/', [siteController::class, 'logOut']);

$app->router->get('/about', [siteController::class, 'contactView']);
$app->router->post('/about',[siteController::class, 'handleContact']);

$app->router->get('/login', [siteController::class,'login']);
$app->router->post('/login', [AuthController::class,'login']);

$app->router->get('/register', [siteController::class,'register']);
$app->router->post('/register', [AuthController::class,'register']);

$app->router->get('/admin-dashboard', [siteController::class, 'admin_dashboard']);
$app->router->post('/admin-dashboard', [siteController::class, 'logOut']);

$app->router->get('/401', [siteController::class, 'error401']);

$app->run();
?>



