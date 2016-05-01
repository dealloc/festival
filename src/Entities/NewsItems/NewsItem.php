<?php
// Created by dealloc. All rights reserved.

namespace Festival\Entities\NewsItems;

use Illuminate\Database\Eloquent\Model;

class NewsItem extends Model
{
	protected $table = 'newsitems';

	protected $fillable = [ 'title', 'content', 'user_id' ];
}