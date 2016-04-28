<?php
// Created by dealloc. All rights reserved.

namespace Festival\Repositories\Artists;

use Festival\Contracts\Repositories\Artists\ArtistRepository;
use Festival\Entities\Artists\Artist;
use Festival\Repositories\EloquentEntityRepository;

class EloquentArtistRepository extends EloquentEntityRepository implements ArtistRepository
{
	public function __construct(Artist $artist)
	{
		parent::__construct($artist);
	}
}