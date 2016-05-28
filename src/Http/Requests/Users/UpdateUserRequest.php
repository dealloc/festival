<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Requests\Users;

use Festival\Http\Requests\Request;

class UpdateUserRequest extends Request
{
    /**
     * Define the rules for validating this request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fname'  => 'required|string',
            'lname'  => 'required|string',
            'street' => 'required|string',
            'house'  => 'required|string',
        ];
    }
}