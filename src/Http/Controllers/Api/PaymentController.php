<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Controllers\Api;

use Festival\Http\Controllers\Controller;
use Festival\Http\Requests\Payments\CreatePaymentRequest;

class PaymentController extends Controller
{
    public function pay(CreatePaymentRequest $request)
    {
        return $request->all();
    }
}