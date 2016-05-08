<?php
// Created by dealloc. All rights reserved.

namespace Festival\Commands\Artists;

use Carbon\Carbon;
use Festival\Http\Requests\Artists\CreateArtistRequest;

/**
 * Command for creating a new artist.
 *
 * Class CreateArtistCommand
 * @package Festival\Commands\Artists
 */
class CreateArtistCommand
{
	private $name;
	private $description;
	private $start;
	private $end;
	private $image;

	/**
	 * CreateArtistCommand constructor.
	 * 
	 * @param \Festival\Http\Requests\Artists\CreateArtistRequest $request
	 */
	public function __construct(CreateArtistRequest $request)
	{
		$this->name = $request->get('name');
		$this->description = $request->get('description');
		$this->start = Carbon::parse($request->get('start'));
		$this->end = Carbon::parse($request->get('end'));
		$this->image = $request->get('image');
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @return Carbon
	 */
	public function getStart()
	{
		return $this->start;
	}

	/**
	 * @return Carbon
	 */
	public function getEnd()
	{
		return $this->end;
	}

	/**
	 * @return string
	 */
	public function getImage()
	{
		return $this->image;
	}
}