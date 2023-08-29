<?php

use App\Controllers\CalendarController;
use App\Controllers\Welcome;
use Slim\App;

return function (App $app) {
	$app->get('/', [Welcome::class, 'index']);
	$app->get('/counter', [Welcome::class, 'show']);
	$app->get('/calendar', [CalendarController::class, 'index']);
};
