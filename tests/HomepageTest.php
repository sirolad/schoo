<?php

namespace Schoo;

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

    public function testLogoutIsNotOnPage()
    {
          $this->visit('/')
               ->dontSeeLink('Logout');
    }
    public function testCoursesArePresent()
    {
          $this->visit('/');
          $this->assertViewHas('courses');
    }

    public function testOtherThingsOnHome()
    {
        $this->visit('/')
             ->see('Our Services')
             ->see('Contact Us')
             ->dontSee('1214252345');
    }
}
