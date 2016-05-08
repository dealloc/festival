<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Controllers\Api;

use Festival\Events\Contacts\CreateContactEvent;
use Festival\Http\Controllers\Controller;
use Festival\Http\Requests\Contacts\CreateContactRequest;

/**
 * Controller for all contact related API calls.
 *
 * Class ContactController
 * @package Festival\Http\Controllers\Api
 */
class ContactController extends Controller
{
	/**
	 * Create new contact.
	 *
	 * @param \Festival\Http\Requests\Contacts\CreateContactRequest $request
	 * @return array
	 */
	public function create(CreateContactRequest $request)
	{
		event(new CreateContactEvent($request));

		return $request->all();
	}
}