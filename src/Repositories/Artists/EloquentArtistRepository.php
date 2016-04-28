<?php
// Created by dealloc. All rights reserved.

namespace Repositories\Artists;

use Contracts\Repositories\Artists\ArtistRepository;
use Repositories\EloquentEntityRepository;

class EloquentArtistRepository extends EloquentEntityRepository implements ArtistRepository
{
}