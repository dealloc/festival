<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Requests\Payments;

use Festival\Http\Requests\Request;

class CreatePaymentRequest extends Request
{
    /**
     * Define the rules for validating this request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'card.type'         => 'required|in:visa,amex,discover',
            'card.number'       => 'required|string|size:16',
            'card.cvc'          => 'required|string|max:3',
            'card.expire-month' => 'required|integer|min:1|max:12',
            'card.expire-year'  => 'required|integer|min:2016',
        ];
    }
}