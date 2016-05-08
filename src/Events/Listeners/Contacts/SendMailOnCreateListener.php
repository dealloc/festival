<?php
// Created by dealloc. All rights reserved.

namespace Festival\Events\Listeners\Contacts;

use Festival\Events\Contacts\CreateContactEvent;
use Festival\Mailers\Contact\ContactMailer;

/**
 * Sends an email when the CreateContactEvent is fired.
 *
 * Class SendMailOnCreateListener
 * @package Festival\Events\Listeners\Contacts
 */
class SendMailOnCreateListener
{
	/**
	 * @var \Festival\Mailers\Contact\ContactMailer
	 */
	private $mailer;

	/**
	 * SendMailOnCreateListener constructor.
	 *
	 * @param \Festival\Mailers\Contact\ContactMailer $mailer
	 */
	public function __construct(ContactMailer $mailer)
	{
		$this->mailer = $mailer;
	}

	/**
	 * Handle the CreateContactEvent.
	 *
	 * @param \Festival\Events\Contacts\CreateContactEvent $event
	 */
	public function handle(CreateContactEvent $event)
	{
		$this->mailer->contact($event->getSender(), $event->getSubject(), $event->getContent());
	}
}