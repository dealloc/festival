<?php
// Created by dealloc. All rights reserved.

namespace Festival\Contracts\Repositories;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;

/**
 * Generic contract for interacting with data entities.
 *
 * Interface EntityRepository
 * @package Festival\Contracts\Repositories
 */
interface EntityRepository
{
	/**
	 * Retrieve all entities from the storage.
	 *
	 * @return Collection
	 */
	public function all();

	/**
	 * Retrieve all entities from the storage in a paginated form.
	 *
	 * @param int $amount The amount of entities per "page"
	 * @return Paginator
	 */
	public function paginated($amount = 15);

	/**
	 * Create a new instance.
	 *
	 * @param array $attributes
	 * @return mixed
	 */
	public function create(array $attributes);
}