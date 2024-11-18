<?php
    require_once './app/libs/router.php';
    require_once './app/controllers/ViajeController.php';

    $router = new Router();

    $router->addRoute('viajes', 'GET', 'ViajeController', 'getAll');
    $router->addRoute('viajes/:id', 'GET', 'ViajeController', 'get');
    $router->addRoute('viajes', 'POST', 'ViajeController', 'add');  
    $router->addRoute('viajes/:id', 'PUT', 'ViajeController', 'update');

    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);