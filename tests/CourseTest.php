<?php

use Schoo\User;
use Schoo\Course;
use Schoo\Http\Controllers\CourseController;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CourseTest extends TestCase
{
    // /**
    //  * Test Course and User Model Relationship
    //  */
    // public function testRelationWithUser()
    // {
    //     $this->createUser();
    //     $course = $this->createCourse();

    //     $this->assertEquals( $course->user_id, $course->user->id );
    // }

    // /**
    //  * Create User to test login functionality.
    //  * */
    // public function createUser()
    // {
    //     User::create([
    //         'id'       => 1,
    //         'name'     => 'johndoe',
    //         'email'    => 'a@b.com',
    //         'password' => md5('password'),
    //     ]);
    // }

    // /**
    //  * Create User to test login functionality.
    //  * */
    // public function createCourse()
    // {
    //     Course::create([
    //         'course'     => 'phone',
    //         'description'    => 'something very good',
    //         'url' => 'https://www.youtube.com/watch?v=Dji9ALCgfpM',
    //         'video_id' => 'Dji9ALCgfpM',
    //         'user_id' => 1,
    //     ]);
    // }

    /**
     * Test  courses
     */
    public function testAllCoursesPageHasRightContent()
    {
        $this->visit('/all-courses')
             ->see('Available Courses')
             ->dontSee('log Out');

        $this->assertViewHas('courses');
    }

    /**
     * Check page loads.
     * */
    public function testAllCoursesLoadsCorrectly()
    {
        $this->call('GET', '/all-courses');
        $this->assertResponseOk();
    }

    /**
     * testIndex description
     * @return void
     */
    public function testIndex()
    {
        $response = $this->call('GET', 'dashboard');
        $courses = Course::all();

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $courses);
    }

    /**
     * Test video id is obtained
     */
    public function testGetVideoId()
    {
        $course = new CourseController();
        $test = $course->getVideoId('https://www.youtube.com/watch?v=Dji9ALCgfpM');

        $this->assertEquals('Dji9ALCgfpM', $test);
    }

}
