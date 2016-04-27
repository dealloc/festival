<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MetaDataTest extends TestCase
{
    /**
     * Test the metadata endpoint
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/api')->seeJson([
			'name' => 'Evento API v1',
			'author' => 'Wannes Gennar'
		]);
    }
}
