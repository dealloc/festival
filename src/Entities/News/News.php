<?php
// Created by dealloc. All rights reserved.

namespace Festival\Entities\News;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	protected $table = 'news';

	protected $fillable = [ 'title', 'content', 'user_id', 'identifier' ];

	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
		return 'identifier';
	}
}