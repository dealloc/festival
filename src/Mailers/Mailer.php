<?php
// Created by dealloc. All rights reserved.

namespace Festival\Mailers;

use Illuminate\Contracts\Mail\Mailer as MailerContract;
use Illuminate\Mail\Message;

abstract class Mailer
{
	/**
	 * @var \Illuminate\Contracts\Mail\Mailer
	 */
	private $mailer;
	
	public function __construct(MailerContract $mailer)
	{
		$this->mailer = $mailer;
	}

	/**
	 * @param string $recipient
	 * @param string $subject
	 * @param string $view
	 * @param array $data
	 * @param array|null $sender
	 */
	public function send($recipient, $subject, $view, array $data = [ ], array $sender = null)
	{
		if ( is_null($sender) )
			$sender = $this->getFrom();

		$this->mailer->send($view, $data, function (Message $message) use ($recipient, $subject, $sender)
		{
			$message->to($recipient);
			$message->subject($subject);
			$message->from($sender[ 'address' ], array_get($sender, 'from'));
		});
	}

	/**
	 * Get the senders address and name from the settings.
	 *
	 * @return array
	 */
	protected function getFrom()
	{
		return config('mail.from');
	}
}