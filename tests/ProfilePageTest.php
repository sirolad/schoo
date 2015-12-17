<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfilePageTest extends TestCase
{
    /**
     * Check profile page loads
     * */
    public function testEditProfilePageLoadsCorrectly()
    {
        $user = factory(\Schoo\User::class)->create();
        $this->actingAs($user)
          ->withSession(['name' => 'johndoe'])
          ->visit('/courses');

        $this->call('GET', '/profile');
        $this->assertResponseOk();
    }

     /**
     * Create User to test profile page functionality
     * */
    private function createUser()
    {
        return User::create([
          'name' => 'johndoe',
          'email' => 'john@doe.com',
          'password' => md5('password')
        ]);
    }
}
