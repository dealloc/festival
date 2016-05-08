<?php

namespace Festival\Entities\Users;

use Festival\Entities\News\News;
use Festival\Entities\Tickets\Ticket;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * The user model.
 *
 * Class User
 * @package Festival\Entities\Users
 */
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

	/**
	 * The news items this user created.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function articles()
    {
        return $this->hasMany(News::class);
    }

	/**
	 * The tickets this user owns.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function tickets()
	{
		return $this->hasMany(Ticket::class);
	}
}
