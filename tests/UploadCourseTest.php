<?php

use Schoo\User;

class UploadCourseTest extends TestCase
{
    /**
     * Test user dashboard.
     * */
    public function testDashBoardLoadsCorrectly()
    {
        $user = factory(\Schoo\User::class)->create();
        $this->actingAs($user)
            ->withSession(['name' => 'johndoe'])
            ->visit('/dashboard')
            ->see('Schoo');
    }

    /**
     * Test upload.
     * */
    public function testCourseUploadSuccessfully()
    {
        $user = factory(\Schoo\User::class)->create();
        $this->actingAs($user)
          ->withSession(['name' => 'johndoe'])
          ->visit('/dashboard');

        $this->click('library_add');
        $this->type('git', 'course')
            ->type('some random text', 'description')
            ->type('https://www.youtube.com/watch?v=Dji9ALCgfpM', 'url')
            ->select('Languages', 'section')
            ->press('Create')
            ->seePageIs('/dashboard')
            ->seeInDatabase('courses', ['course' => 'git']);
    }

    // /**
    //  * Test Invalid Course Input Fails
    //  */
    // public function testInvalidInputCantBeUploaded()
    // {
    //     $this->loginAUser();
    //     $this->click('library_add');
    //     $this->type('goat', 'course')
    //         ->type('some', 'description')
    //         ->type('google.com', 'url')
    //         ->select('Computer Science', 'section')
    //         ->press('Create')
    //         ->seePageIs('/dashboard')
    //         ->see("'Oops', 'Invalid Inputs'")
    //         ->notSeeInDatabase('courses', ['course' => '']);
    // }

    /**
     * [loginAUser description]
     * @return [type] [description]
     */
    public function loginAUser()
    {
        $user = factory(\Schoo\User::class)->create();
        $this->actingAs($user);
        $this->call('GET', '/dashboard');
    }


}
