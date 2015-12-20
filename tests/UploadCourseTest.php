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
            ->visit('/courses')
            ->see('Schoo');
    }

    /**
     * Test upload.
     * */
    public function testCourseUpload()
    {
        $user = factory(\Schoo\User::class)->create();
        $this->actingAs($user)
          ->withSession(['name' => 'johndoe'])
          ->visit('/courses');

        //$this->createUser();
        $this->click('library_add');
        $this->type('git', 'course')
            ->type('some random text', 'description')
            ->type('https://www.youtube.com/watch?v=Dji9ALCgfpM', 'url')
            ->select('Languages', 'section')
            //->findByNameOrId('#create')
            ->press('Create')
            ->seePageIs('/courses');
    }
}
