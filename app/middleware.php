<?php

use Slim\App;
use Tracy\Debugger;

return function(App $app)
{
	$app->addRoutingMiddleware();	
	Debugger::enable(Debugger::Detect, __DIR__ . '/../storage/logs');
	Debugger::$dumpTheme = 'dark';
};
