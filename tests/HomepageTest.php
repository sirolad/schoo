<?php


class HomepageTest extends TestCase
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
     * Dont see logout on main page.
     * */
    public function testLogoutIsNotOnPage()
    {
        $this->visit('/')
               ->dontSeeLink('Logout');
    }

    /**
     * Test courses can be viewed on landing page.
     * */
    public function testCoursesArePresent()
    {
        $this->visit('/');
        $this->assertViewHas('courses');
    }

    /**
     * Test other things on main page.
     * */
    public function testOtherThingsOnHome()
    {
        $this->visit('/')
             ->see('Our Services')
             ->see('Contact Us')
             ->dontSee('1214252345');
    }

    /**
     * Test Computer courses
     */
    public function testComputerCoursesPageHasRightContent()
    {
        $this->visit('/computer-science')
             ->see('Computer Science')
             ->dontSee('log Out');

        $this->assertViewHas('courses');
    }

    /**
     * Check page loads.
     * */
    public function testComputerCoursesLoadsCorrectly()
    {
        $this->call('GET', '/computer-science');
        $this->assertResponseOk();
    }

    /**
     * Test  courses
     */
    public function testSoftwareCoursesPageHasRightContent()
    {
        $this->visit('/software-development')
             ->see('Software Development')
             ->dontSee('log Out');

        $this->assertViewHas('courses');
    }

    /**
     * Check page loads.
     * */
    public function testSoftwareCoursesLoadsCorrectly()
    {
        $this->call('GET', '/software-development');
        $this->assertResponseOk();
    }

    /**
     * Check page loads.
     * */
    public function test404ErrorPage()
    {
        $response = $this->call('GET', '/something');
        $this->assertEquals(404, $response->getStatusCode());
    }

    /**
     * Test  courses
     */
    public function testPersonalCoursesPageHasRightContent()
    {
        $this->visit('/personal-development')
             ->see('Personal Development')
             ->dontSee('log Out');

        $this->assertViewHas('courses');
    }

    /**
     * Check page loads.
     * */
    public function testPersonalCoursesLoadsCorrectly()
    {
        $this->call('GET', '/personal-development');
        $this->assertResponseOk();
    }

    /**
     * Test  courses
     */
    public function testLanguageCoursesPageHasRightContent()
    {
        $this->visit('/languages')
             ->see('Languages')
             ->dontSee('log Out');

        $this->assertViewHas('courses');
    }

    /**
     * Check page loads.
     * */
    public function testLanguageCoursesLoadsCorrectly()
    {
        $this->call('GET', '/languages');
        $this->assertResponseOk();
    }

    /**
     * Test  courses
     */
    public function testGeneralCoursesPageHasRightContent()
    {
        $this->visit('/general-knowledge')
             ->see('General Knowledge')
             ->dontSee('log Out');

        $this->assertViewHas('courses');
    }

    /**
     * Check page loads.
     * */
    public function testGeneralCoursesLoadsCorrectly()
    {
        $this->call('GET', '/general-knowledge');
        $this->assertResponseOk();
    }
}
