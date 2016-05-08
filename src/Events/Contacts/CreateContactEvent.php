<?php
// Created by dealloc. All rights reserved.

namespace Festival\Events\Contacts;

use Festival\Events\Event;
use Festival\Http\Requests\Contacts\CreateContactRequest;

/**
 * Event fired when a new message was send to contact the site administrators.
 *
 * Class CreateContactEvent
 * @package Festival\Events\Contacts
 */
class CreateContactEvent extends Event
{
	private $subject;
	private $content;
	private $sender;

	/**
	 * CreateContactEvent constructor.
	 * 
	 * @param \Festival\Http\Requests\Contacts\CreateContactRequest $request
	 */
	public function __construct(CreateContactRequest $request)
	{
		$this->sender = $request->get('sender');
		$this->subject = $request->get('subject');
		$this->content = $request->get('content');
	}

	/**
	 * @return string
	 */
	public function getSubject()
	{
		return $this->subject;
	}

	/**
	 * @return string
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * @return string
	 */
	public function getSender()
	{
		return $this->sender;
	}
}