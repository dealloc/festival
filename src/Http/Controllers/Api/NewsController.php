<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Controllers\Api;

use Festival\Commands\News\CreateNewsCommand;
use Festival\Contracts\Repositories\NewsItems\NewsItemRepository;
use Festival\Http\Controllers\Controller;
use Festival\Http\Requests\News\CreateNewsRequest;

class NewsController extends Controller
{
	public function create(CreateNewsRequest $request)
	{
		return $this->execute(new CreateNewsCommand($request));
	}

	public function all(NewsItemRepository $repository)
	{
		return $repository->paginated();
	}
}