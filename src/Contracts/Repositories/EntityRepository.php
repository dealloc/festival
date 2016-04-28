<?php
// Created by dealloc. All rights reserved.

namespace Festival\Contracts\Repositories;

interface EntityRepository
{
	public function all();

	public function paginated($amount = 15);

	public function create(array $attributes);
}