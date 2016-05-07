<?php

namespace Festival\Entities\Users;

use Festival\Entities\News\News;
use Festival\Entities\Tickets\Ticket;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'email', 'password', 'secret',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'secret'
    ];

    public function articles()
    {
        return $this->hasMany(News::class);
    }

	public function tickets()
	{
		return $this->hasMany(Ticket::class);
	}
}
