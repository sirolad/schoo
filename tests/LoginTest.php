<?php

use Schoo\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    public function testLoginPageResponse()
    {
        $response = $this->call('GET', '/login');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testLoginPageHasRightContent()
    {
        $this->visit('/login')
            ->see('Schoo')
            ->see('Register')
            ->see('Log in');
    }

    public function createUser()
    {
        User::create([
            'name' => 'johndoe',
            'email' => 'a@b.com',
            'password'=> md5('password')
        ]);
    }

    public function testLoginPageWorksCorrectly()
    {
        $this->createUser();
        $this->visit('/login')
            ->type('a@b.com', 'email')
            ->type('password', ('password'))
            ->check('remember')
            ->press('Log In')
            ->seePageIs('/courses');
    }


    public function testPageHasFaceBookLogin()
    {
        $this->visit('/login')
            ->see('facebook');
    }
    public function testPageHasTwitterLogin()
    {
        $this->visit('/login')
            ->see('twitter');
    }
    public function testPageHasGithubLogin()
    {
        $this->visit('/login')
            ->see('github');
    }
}
