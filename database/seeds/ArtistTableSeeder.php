<?php
// Created by dealloc. All rights reserved.

use Illuminate\Database\Seeder;

class ArtistTableSeeder extends Seeder
{
    public function run()
    {
        factory(\Festival\Entities\Artists\Artist::class, 15)->create();
    }
}