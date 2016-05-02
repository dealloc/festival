<?php
// Created by dealloc. All rights reserved.

namespace Festival\Entities\Artists;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Artist
 * @package Entities\Artists
 */
class Artist extends Model
{
	protected $fillable = [ 'name', 'description', 'start', 'end', 'image' ];
}