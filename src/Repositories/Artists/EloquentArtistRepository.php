<?php
// Created by dealloc. All rights reserved.

namespace Festival\Repositories\Artists;

use Festival\Contracts\Repositories\Artists\ArtistRepository;
use Festival\Entities\Artists\Artist;
use Festival\Repositories\EloquentEntityRepository;

/**
 * Eloquent implementation for interacting with artists.
 *
 * Class EloquentArtistRepository
 * @package Festival\Repositories\Artists
 */
class EloquentArtistRepository extends EloquentEntityRepository implements ArtistRepository
{
	/**
	 * EloquentArtistRepository constructor.
	 * 
	 * @param \Festival\Entities\Artists\Artist $artist
	 */
	public function __construct(Artist $artist)
	{
		parent::__construct($artist);
	}
}