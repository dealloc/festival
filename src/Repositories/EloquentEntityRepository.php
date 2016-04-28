<?php
// Created by dealloc. All rights reserved.

namespace Repositories;

use Contracts\Repositories\EntityRepository;
use Illuminate\Database\Eloquent\Model;

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
	
	public function all()
	{
		return $this->model->all();
	}

	public function paginated($amount = 15)
	{
		return $this->model->query()->paginate($amount);
	}

	public function create(array $attributes)
	{
		return $this->model->create($attributes);
	}
}