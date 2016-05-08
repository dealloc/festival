<?php
// Created by dealloc. All rights reserved.

namespace Festival\Mailers\Contact;

use Festival\Mailers\Mailer;

/**
 * Mailer for mails to administrators from contact form.
 *
 * Class ContactMailer
 * @package Festival\Mailers\Contact
 */
class ContactMailer extends Mailer
{
	/**
	 * Send a contact email to the administrator.
	 *
	 * @param string $sender
	 * @param string $subject
	 * @param string $content
	 * @internal param string $recipient
	 */
	public function contact($sender, $subject, $content)
	{
		$recipient = config('mail.from.address');

		parent::send($recipient, $subject, 'mails.contact', compact('content'), [ 'address' => $sender ]);
	}
}