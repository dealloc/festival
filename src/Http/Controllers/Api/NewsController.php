<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Controllers\Api;

use Festival\Commands\News\CreateNewsCommand;
use Festival\Contracts\Repositories\News\NewsRepository;
use Festival\Http\Controllers\Controller;
use Festival\Http\Requests\News\CreateNewsRequest;

class NewsController extends Controller
{
	public function create(CreateNewsRequest $request)
	{
		return $this->execute(new CreateNewsCommand($request));
	}

	public function all(NewsRepository $repository)
	{
		return $repository->paginated();
	}
}