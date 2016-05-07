<?php
// Created by dealloc. All rights reserved.

namespace Festival\Entities\News\Comments;

use Festival\Entities\News\News;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = [ 'news_id', 'content', 'user_id' ];

	protected $hidden = [ 'user_id', 'news_id' ];

	public function article()
	{
		return $this->belongsTo(News::class, null, null, 'news');
	}
}