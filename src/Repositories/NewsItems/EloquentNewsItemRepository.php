<?php
// Created by dealloc. All rights reserved.

namespace Festival\Repositories\NewsItems;

use Festival\Contracts\Repositories\NewsItems\NewsItemRepository;
use Festival\Entities\NewsItems\NewsItem;
use Festival\Repositories\EloquentEntityRepository;

class EloquentNewsItemRepository extends EloquentEntityRepository implements NewsItemRepository
{
	public function __construct(NewsItem $item)
	{
		parent::__construct($item);
	}
}