<?php


namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Models\Test;

class Welcome
{
	public function index(Response $response): Response
	{
		$people = Test::get();
		return view($response, 'index.php', compact('people'));
	}

	public function show(Response $response): Response
	{
		$response = (new \Slim\Views\PhpRenderer(views_path()))->render($response, 'partials/counter.php');
		return $response;
	}
}
