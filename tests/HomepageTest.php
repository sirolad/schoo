<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomePageTest extends TestCase
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

    /**
     * Dont see logout on main page
     * */
    public function testLogoutIsNotOnPage()
    {
          $this->visit('/')
               ->dontSeeLink('Logout');
    }

    /**
     * Test courses can be viewed on landing page
     * */
    public function testCoursesArePresent()
    {
          $this->visit('/');
          $this->assertViewHas('courses');
    }

    /**
     * Test other things on main page
     * */
    public function testOtherThingsOnHome()
    {
        $this->visit('/')
             ->see('Our Services')
             ->see('Contact Us')
             ->dontSee('1214252345');
    }
}
