<?php

namespace Schoo;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationPageTest extends TestCase
{
    /**
     * Check registration page
     * */
    public function testRegistrationPageLoadsCorrectly()
    {
        $this->call('GET', '/signup');
        $this->assertResponseOk();
    }

    /**
     * Check content of registration page
     * */
    public function testRegistrationPageHasRightContent()
    {
        $this->visit('/signup')
            ->see('Schoo')
            ->see('Signup')
            ->see('Login');
    }

    /**
     * check no logout on registration
     * */
    public function testRegistrationPageHasNoHomeLink()
    {
        $this->visit('/signup')
            ->dontSeeLink('/');
    }

    /**
     * check no logout on registration page
     * */
    public function testRegistrationPageHasNoLogoutLink()
    {
        $this->visit('/signup')
            ->dontSeeLink('/logout');
    }

    /**
     * test registration works
     * */
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
