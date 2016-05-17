<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Controllers\Web;

use Festival\Http\Controllers\Controller;

class ViewController extends Controller
{
	public function home()
	{
		return view('welcome');
	}
}