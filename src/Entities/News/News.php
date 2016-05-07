<?php
// Created by dealloc. All rights reserved.

namespace Festival\Entities\News;

use Festival\Entities\News\Comments\Comment;
use Festival\Entities\Users\User;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	protected $table = 'news';

	protected $fillable = [ 'title', 'content', 'user_id', 'identifier' ];

	protected $with = [ 'comments', 'author' ];

	protected $hidden = [ 'user_id' ];
	
	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
		return 'identifier';
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function author()
	{
		return $this->belongsTo(User::class, null, null, 'user');
	}
}