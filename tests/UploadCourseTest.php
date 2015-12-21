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
}
