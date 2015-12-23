<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SearchTest extends TestCase
{
    /**
     * Check page loads.
     * */
    public function testSearchRouteLoadsCorrectly()
    {
        Session::start();
        $credentials = [
            '_token' => csrf_token(),
            'search' => 'languages',
        ];

       $this->call('POST', 'search', $credentials);
    }

    /**
     * Check page loads.
     * */
    public function testEmptySearchRouteLoadsCorrectly()
    {
        $credentials = [
            '_token' => csrf_token(),
            'search' => '',
        ];

       $this->call('POST', 'search', $credentials);
    }

    /**
     * Test result route
     */
    public function testSearchPageloads()
    {
        $response = $this->call('POST', '/search');

        $this->assertEquals(302, $response->getStatusCode());
    }
}
