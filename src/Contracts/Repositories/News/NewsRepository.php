<?php
// Created by dealloc. All rights reserved.

namespace Festival\Contracts\Repositories\News;

use Festival\Contracts\Repositories\EntityRepository;

/**
 * Generic contract for interacting with news item entities.
 *
 * Interface NewsRepository
 * @package Festival\Contracts\Repositories\News
 */
interface NewsRepository extends EntityRepository
{
	public function findByIdentifier($identifier);
}