<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Requests\Contacts;

use Festival\Http\Requests\Request;

/**
 * Request for validating and authorizing request to contact the administrators.
 *
 * Class CreateContactRequest
 * @package Festival\Http\Requests\Contacts
 */
class CreateContactRequest extends Request
{
	/**
	 * Define the rules for validating this request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'sender'  => 'required|email',
			'subject' => 'required|string',
			'content' => 'required|string',
		];
	}
}