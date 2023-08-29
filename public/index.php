<?php


// load dependencies
require __DIR__ . '/../vendor/autoload.php';

// bootstrap the application
$app = require_once __DIR__ . '/../bootstrap/app.php';

// turn the lights on
$app->run();
