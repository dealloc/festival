<?php
// Created by dealloc. All rights reserved.

namespace Festival\Repositories\News;

use Festival\Contracts\Repositories\News\NewsRepository;
use Festival\Entities\News\News;
use Festival\Repositories\EloquentEntityRepository;

class EloquentNewsRepository extends EloquentEntityRepository implements NewsRepository
{
	public function __construct(News $item)
	{
		parent::__construct($item);
	}
}