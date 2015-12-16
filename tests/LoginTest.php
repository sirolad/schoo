<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    /**
     * Test Index.
     *
     * @return void
     */
    public function testIndexPage()
    {
        $this->visit('/')
             ->see('Schoo');
    }
}
