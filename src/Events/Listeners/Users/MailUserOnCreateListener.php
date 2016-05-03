<?php
// Created by dealloc. All rights reserved.

namespace Festival\Events\Listeners\Users;

use Festival\Events\Users\CreateUserEvent;
use Festival\Mailers\Users\UserMailer;

class MailUserOnCreateListener
{
	/**
	 * @var \Festival\Mailers\Users\UserMailer
	 */
	private $mailer;

	public function __construct(UserMailer $mailer)
	{
		$this->mailer = $mailer;
	}

	public function handle(CreateUserEvent $event)
	{
		$this->mailer->welcome($event->getUser());
	}
}