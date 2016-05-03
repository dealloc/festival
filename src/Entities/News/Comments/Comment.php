<?php
// Created by dealloc. All rights reserved.

namespace Festival\Entities\Newsz\Comments;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = [ 'news_id', 'content', 'user_id' ];
}