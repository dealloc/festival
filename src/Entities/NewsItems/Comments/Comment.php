<?php
// Created by dealloc. All rights reserved.

namespace Festival\Entities\NewsItems\Comments;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = [ 'newsitem_id', 'content', 'user_id' ];
}