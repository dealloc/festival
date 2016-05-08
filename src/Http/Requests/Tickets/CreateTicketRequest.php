<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Requests\Tickets;

use Festival\Http\Requests\Request;

/**
 * Request for validating and authorizing request to purchase a ticket.
 *
 * Class CreateTicketRequest
 * @package Festival\Http\Requests\Tickets
 */
class CreateTicketRequest extends Request
{
	/**
	 * Define the rules for validating this request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [];
	}
}