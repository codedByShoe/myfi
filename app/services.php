<?php

use DI\Container;
use Illuminate\Database\Capsule\Manager;

return function(Container $container) {

	$container->set('settings', function() {
		$settings = require __DIR__ . '/../settings.php';
		return $settings;
	});

	$container->set('db', function($container) {
		$settings = $container->get('settings');
		$capsule = new Manager();	
		$capsule->addConnection($settings['db']);

		$capsule->setAsGlobal();
		$capsule->bootEloquent();

		return $capsule;
	});
};
