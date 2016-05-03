<?php
// Created by dealloc. All rights reserved.

namespace Festival\Mailers\Users;

use Festival\Entities\Users\User;
use Festival\Mailers\Mailer;

class UserMailer extends Mailer
{
	public function welcome(User $user)
	{
		parent::send($user->email, 'Welcome to Evento!', 'mails.registration', compact('user'));
	}
}