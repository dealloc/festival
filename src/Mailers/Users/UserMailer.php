<?php
// Created by dealloc. All rights reserved.

namespace Festival\Mailers\Users;

use Festival\Entities\Users\User;
use Festival\Mailers\Mailer;

/**
 * Mailer for mails related to users.
 *
 * Class UserMailer
 * @package Festival\Mailers\Users
 */
class UserMailer extends Mailer
{
	/**
	 * Send a welcome email.
	 *
	 * @param \Festival\Entities\Users\User $user
	 */
	public function welcome(User $user)
	{
		parent::send($user->email, 'Welcome to Evento!', 'mails.registration', compact('user'));
	}
}