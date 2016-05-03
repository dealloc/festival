<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Requests\Contacts;

use Festival\Http\Requests\Request;

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
			'sender'  => 'required|mail',
			'subject' => 'required|string',
			'content' => 'required|string',
		];
	}
}