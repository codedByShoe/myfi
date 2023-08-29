<?php
if (!function_exists('view')) {
	function view($response, $template, $data = [], $layout = 'app.php')
	{
		$appTitle = ["title" => $_ENV['APP_NAME'] ?? 'Slim'];
		$phpView = new Slim\Views\PhpRenderer(views_path(), $appTitle);
		$phpView->setLayout("layouts/{$layout}");
		$response = $phpView->render($response, $template, $data);
		return $response;
	}
}
if (!function_exists('base_path')) {
	function base_path()
	{
		return __DIR__ . '/../';
	}
}

if (!function_exists('views_path')) {
	function views_path()
	{
		return __DIR__ . '/../views';
	}
}
