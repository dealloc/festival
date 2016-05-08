<?php
// Created by dealloc. All rights reserved.

namespace Festival\Repositories;

use Festival\Contracts\Repositories\EntityRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Generic implementation for interacing with entities using Eloquent.
 *
 * Class EloquentEntityRepository
 * @package Festival\Repositories
 */
abstract class EloquentEntityRepository implements EntityRepository
{
	/**
	 * @var \Illuminate\Database\Eloquent\Model
	 */
	protected $model;

	public function __construct(Model $model)
	{
		$this->model = $model;
	}

	/**
	 * Retrieve all entities from the storage.
	 *
	 * @return Collection
	 */
	public function all()
	{
		return $this->model->all();
	}

	/**
	 * Retrieve all entities from the storage in a paginated form.
	 *
	 * @param int $amount The amount of entities per "page"
	 * @return Paginator
	 */
	public function paginated($amount = 15)
	{
		return $this->model->query()->paginate($amount);
	}

	/**
	 * Create a new instance.
	 *
	 * @param array $attributes
	 * @return mixed
	 */
	public function create(array $attributes)
	{
		return $this->model->create($attributes);
	}
}