<?php
// Created by dealloc. All rights reserved.

namespace Festival\Entities\Tickets;

use Festival\Entities\Users\User;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	protected $fillable = [ 'user_id', 'token' ];

	protected $with = ['owner'];

	public function owner()
	{
		return $this->belongsTo(User::class, null, null, 'user');
	}
}