<?php
// Created by dealloc. All rights reserved.

namespace Festival\Repositories\News;

use Festival\Contracts\Repositories\News\NewsRepository;
use Festival\Entities\News\News;
use Festival\Repositories\EloquentEntityRepository;

/**
 * Eloquent implementation for interacting with news items.
 *
 * Class EloquentNewsRepository
 * @package Festival\Repositories\News
 */
class EloquentNewsRepository extends EloquentEntityRepository implements NewsRepository
{
	/**
	 * EloquentNewsRepository constructor.
	 * 
	 * @param \Festival\Entities\News\News $item
	 */
	public function __construct(News $item)
	{
		parent::__construct($item);
	}
}