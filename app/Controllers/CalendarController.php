<?php

namespace App\Controllers;

use App\Calendar\Calendar;
use Psr\Http\Message\ResponseInterface as Response;

class CalendarController
{
	public function index(Response $response)
	{
		$calendar = new Calendar('2023-08-28');
		$calendar->add_event('Holiday', '2023-08-29', 1, 'red');
		return view($response, 'calendar.php', compact('calendar'));
	}
}
