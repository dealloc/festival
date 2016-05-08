<?php
// Created by dealloc. All rights reserved.

namespace Festival\Http\Controllers\Api;

use Festival\Commands\Artists\CreateArtistCommand;
use Festival\Http\Controllers\Controller;
use Festival\Http\Requests\Artists\CreateArtistRequest;

/**
 * Controller for all artist related API requests.
 *
 * Class ArtistController
 * @package Festival\Http\Controllers\Api
 */
class ArtistController extends Controller
{
	/**
	 * Create new artist.
	 *
	 * @param \Festival\Http\Requests\Artists\CreateArtistRequest $request
	 * @return mixed
	 */
	public function create(CreateArtistRequest $request)
	{
		return $this->execute(new CreateArtistCommand($request));
	}
}