<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Controllers\Api;

use Festival\Events\Contacts\CreateContactEvent;
use Festival\Http\Controllers\Controller;
use Festival\Http\Requests\Contacts\CreateContactRequest;

class ContactController extends Controller
{
	public function create(CreateContactRequest $request)
	{
		event(new CreateContactEvent($request));

		return $request->all();
	}
}