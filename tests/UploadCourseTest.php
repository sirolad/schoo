<?php

namespace Schoo;

use Schoo\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UploadCourseTest extends TestCase
{
    public function testDashBoardLoadsCorrectly()
    {
        $user = factory(\Schoo\User::class)->create();
        $this->actingAs($user)
            ->withSession(['name' => 'johndoe'])
            ->visit('/courses')
            ->see('Schoo');
    }
    public function testCourseUplaod()
    {
        $user = factory(\Schoo\User::class)->create();
        $this->actingAs($user)
          ->withSession(['name' => 'johndoe'])
          ->visit('/courses');
        //create a user
        $this->createUser();
        $this->click('library_add');
        $this->type('git', 'course')
            ->type('some random text', 'description')
            ->type('https://www.youtube.com/watch?v=Dji9ALCgfpM', 'url')
            ->select('Languages', 'section')
            ->press('Create')
            ->seePageIs('/courses');
        $this->assertResponseOk();

    }

    private function createUser()
    {
        User::create([
            'name' => 'johndoe',
            'email' => 'john@doe.com',
            'password' => bcrypt('password')
        ]);
    }
}
