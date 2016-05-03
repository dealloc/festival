<?php
// Created by dealloc. All rights reserved.

namespace Festival\Mailers\Contact;

use Festival\Mailers\Mailer;

class ContactMailer extends Mailer
{
	/**
	 * @param string $recipient
	 */
	public function send($sender, $subject, $content)
	{
		$recipient = env('mail.from.address');

		parent::send($recipient, $subject, 'mails.contact', compact('content'), $sender);
	}
}