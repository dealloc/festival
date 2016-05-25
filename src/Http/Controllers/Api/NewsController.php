<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Controllers\Api;

use Festival\Commands\News\CreateNewsCommand;
use Festival\Contracts\Repositories\News\NewsRepository;
use Festival\Http\Controllers\Controller;
use Festival\Http\Requests\News\CreateNewsRequest;

/**
 * Controller for all news related API calls.
 *
 * Class NewsController
 * @package Festival\Http\Controllers\Api
 */
class NewsController extends Controller
{
	/**
	 * Create new news article.
	 *
	 * @param \Festival\Http\Requests\News\CreateNewsRequest $request
	 * @return mixed
	 */
	public function create(CreateNewsRequest $request)
	{
		return $this->execute(new CreateNewsCommand($request));
	}

	/**
	 * Retrieve all news items.
	 *
	 * @param \Festival\Contracts\Repositories\News\NewsRepository $repository
	 * @return \Illuminate\Contracts\Pagination\Paginator
	 */
	public function all(NewsRepository $repository)
	{
		return $repository->paginated();
	}

	public function get(NewsRepository $repository, $article)
	{
		return $repository->findByIdentifier($article);
	}
}