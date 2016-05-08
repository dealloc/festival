<?php
// Created by dealloc. All rights reserved.

namespace Festival\Commands\Handlers\Artists;

use Festival\Commands\Artists\CreateArtistCommand;
use Festival\Contracts\Repositories\Artists\ArtistRepository;

/**
 * The handler for the CreateArtistCommand.
 *
 * Class CreateArtistHandler
 * @package Festival\Commands\Handlers\Artists
 */
class CreateArtistHandler
{
	/**
	 * @var \Festival\Contracts\Repositories\Artists\ArtistRepository
	 */
	private $repository;

	/**
	 * CreateArtistHandler constructor.
	 * 
	 * @param \Festival\Contracts\Repositories\Artists\ArtistRepository $repository
	 */
	public function __construct(ArtistRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
	 * Handle the CreateArtistCommand.
	 *
	 * @param \Festival\Commands\Artists\CreateArtistCommand $command
	 * @return \Festival\Entities\Artists\Artist|null
	 */
	public function handle(CreateArtistCommand $command)
	{
		return $this->repository->create([
			'name' => $command->getName(),
			'description' => $command->getDescription(),
			'start' => $command->getStart()->toDateTimeString(),
			'end' => $command->getEnd()->toDateTimeString(),
			'image' => $command->getImage()
		]);
	}
}