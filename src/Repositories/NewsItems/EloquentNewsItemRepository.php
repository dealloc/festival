<?php
// Created by dealloc. All rights reserved.

namespace Repositories\NewsItems;

use Contracts\Repositories\NewsItems\NewsItemRepository;
use Repositories\EloquentEntityRepository;

class EloquentNewsItemRepository extends EloquentEntityRepository implements NewsItemRepository
{
	
}