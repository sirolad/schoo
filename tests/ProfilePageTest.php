<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfilePageTest extends TestCase
{
    public function testEditProfilePageLoadsCorrectly()
    {
        $user = factory(\Schoo\User::class)->create();
        $this->actingAs($user)
          ->withSession(['name' => 'johndoe'])
          ->visit('/courses');

        $this->call('GET', '/profile');
        $this->assertResponseOk();
    }

    private function createUser()
    {
        return User::create([
          'name' => 'johndoe',
          'email' => 'john@doe.com',
          'password' => md5('password')
        ]);
    }
}
