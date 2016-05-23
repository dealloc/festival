<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Controllers\Web;

use Festival\Http\Controllers\Controller;

class ViewController extends Controller
{
	public function app()
	{
		return view('app');
	}
}