<?php

namespace Festival\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
	/**
	 * Pass authorization if not checked.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
    }

	/**
	 * Define the rules for validating this request.
	 *
	 * @return array
	 */
	abstract public function rules();
}
