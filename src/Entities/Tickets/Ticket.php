<?php
// Created by dealloc. All rights reserved.

namespace Festival\Entities\Tickets;

use Festival\Entities\Users\User;
use Illuminate\Database\Eloquent\Model;

/**
 * The ticket model.
 *
 * Class Ticket
 * @package Festival\Entities\Tickets
 */
class Ticket extends Model
{
	protected $fillable = [ 'user_id', 'token' ];

	protected $with = [ 'owner' ];

	protected $hidden = [ 'user_id' ];

	/**
	 * The user that created this ticket.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function owner()
	{
		return $this->belongsTo(User::class, null, null, 'user');
	}
}