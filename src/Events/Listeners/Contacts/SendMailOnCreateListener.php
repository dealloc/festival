<?php
// Created by dealloc. All rights reserved.

namespace Festival\Events\Listeners\Contacts;

use Festival\Events\Contacts\CreateContactEvent;
use Festival\Mailers\Contact\ContactMailer;

class SendMailOnCreateListener
{
	/**
	 * @var \Festival\Mailers\Contact\ContactMailer
	 */
	private $mailer;

	public function __construct(ContactMailer $mailer)
	{
		$this->mailer = $mailer;
	}

	public function handle(CreateContactEvent $event)
	{
		$this->mailer->contact($event->getSender(), $event->getSubject(), $event->getContent());
	}
}