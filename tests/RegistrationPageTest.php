<?php

namespace Schoo;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationPageTest extends TestCase
{
    public function testRegistrationPageLoadsCorrectly()
    {
        $this->call('GET', '/signup');
        $this->assertResponseOk();
    }
    public function testRegistrationPageHasRightContent()
    {
        $this->visit('/signup')
            ->see('Schoo')
            ->see('Signup')
            ->see('Login');
    }
    public function testRegistrationPageHasNoHomeLink()
    {
        $this->visit('/signup')
            ->dontSeeLink('/logout');
    }
    public function testRegistrationPageHasNoLogoutLink()
    {
        $this->visit('/signup')
            ->dontSeeLink('/logout');
    }
    public function testRegisterPageWorksCorrectly()
    {
        $this->visit('/signup')
            ->type('johndoe', 'username')
            ->type('john@doe.com', 'email')
            ->type('password', 'password')
            ->press('Sign Up')
            ->seePageIs('/courses')
            ->seeInDatabase('users', ['username' =>'johndoe']);
    }
}
