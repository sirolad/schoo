<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SearchTest extends TestCase
{
    /**
     * Test  courses
     */
    // public function testSearchCoursesPageHasRightContent()
    // {
    //     $this->visit('/search')
    //          ->see('Search Results')
    //          ->dontSee('log Out');

    //     $this->assertViewHas('courses');
    // }

    /**
     * Check page loads.
     * */
    public function testSearchCoursesLoadsCorrectly()
    {
        Session::start();
        $credentials = [
            '_token' => csrf_token(),
            'search' => 'languages',
        ];

        $response = $this->call('POST', 'search', $credentials);

        //$this->assertResponseOk();
        //$this->assertEquals('Search Results ' . $credentials['search'], $response->getContent());
        // $this->visit('/')
        //      ->submitForm('search', ['_token' => csrf_token(), 'search' => 'a']);
    }
}
