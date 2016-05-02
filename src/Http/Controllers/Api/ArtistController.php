<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Controllers\Api;

use Festival\Commands\Artists\CreateArtistCommand;
use Festival\Http\Controllers\Controller;
use Festival\Http\Requests\Artists\CreateArtistRequest;

class ArtistController extends Controller
{
	public function create(CreateArtistRequest $request)
	{
		return $this->execute(new CreateArtistCommand($request));
	}
}