<?php

use DI\Container;
use Dotenv\Dotenv;
use Dotenv\Exception\InvalidPathException;

$container = new Container();
$app = \DI\Bridge\Slim\Bridge::create($container);

$middleware = require_once __DIR__ . '/../app/middleware.php';
$middleware($app);


try {
$env = Dotenv::createImmutable(__DIR__ . '/../');
$env->load();
} catch(InvalidPathException $e) {}


// Load container dependencies into the container
$services = require __DIR__ . '/../app/services.php';
$services($container);

// Grab the container before calling routes to initialize it globally because we are using eloquent
$container->get('db');

$routes = require_once __DIR__ . '/../app/routes.php';
$routes($app);

return $app;
