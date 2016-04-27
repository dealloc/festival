<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FrontendTest extends TestCase
{
    /**
     * Test the frontend views
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')->see('it works!');
    }
}
