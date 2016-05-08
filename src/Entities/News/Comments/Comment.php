<?php
// Created by dealloc. All rights reserved.

namespace Festival\Entities\News\Comments;

use Festival\Entities\News\News;
use Illuminate\Database\Eloquent\Model;

/**
 * Comment model.
 *
 * Class Comment
 * @package Festival\Entities\News\Comments
 */
class Comment extends Model
{
	protected $fillable = [ 'news_id', 'content', 'user_id' ];

	protected $hidden = [ 'user_id', 'news_id' ];

	/**
	 * The article this comment is related to.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function article()
	{
		return $this->belongsTo(News::class, null, null, 'news');
	}
}