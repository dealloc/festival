<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Controllers\Api;

use Festival\Contracts\Auth\AuthenticateService;
use Festival\Contracts\Repositories\Tickets\TicketRepository;
use Festival\Http\Controllers\Controller;

class TicketsController extends Controller
{
	public function index(AuthenticateService $service, TicketRepository $repository)
	{
		return $repository->allForUser($service->user());
	}

	public function create()
	{
	}
}