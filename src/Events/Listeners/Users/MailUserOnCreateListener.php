<?php
// Created by dealloc. All rights reserved.

namespace Festival\Events\Listeners\Users;

use Festival\Events\Users\CreateUserEvent;
use Festival\Mailers\Users\UserMailer;

/**
 * Send a welcome email when the CreateUserEvent is fired.
 *
 * Class MailUserOnCreateListener
 * @package Festival\Events\Listeners\Users
 */
class MailUserOnCreateListener
{
	/**
	 * @var \Festival\Mailers\Users\UserMailer
	 */
	private $mailer;

	/**
	 * MailUserOnCreateListener constructor.
	 *
	 * @param \Festival\Mailers\Users\UserMailer $mailer
	 */
	public function __construct(UserMailer $mailer)
	{
		$this->mailer = $mailer;
	}

	/**
	 * Handle the CreateUserEvent.
	 *
	 * @param \Festival\Events\Users\CreateUserEvent $event
	 */
	public function handle(CreateUserEvent $event)
	{
		$this->mailer->welcome($event->getUser());
	}
}