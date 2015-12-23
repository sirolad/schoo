<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LogoutTest extends TestCase
{
    public function testLogoutWorksCorrectly()
    {
        $this->visit('logout')
             ->seePageIs('/');
    }

    /**
     * Test Logout Page response
     *
     * @return void
     */
    public function testLoginPageLoadsCorrectly()
    {
        $response =$this->call('GET', '/logout');

        $this->assertEquals(302, $response->getStatusCode());
    }
}
