<?php

namespace Schoo;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DashboardPageTest extends TestCase
{
    /**
     * test dashboard using ModelFactory
     **/
    public function testDashboardLoads()
    {
        $user = factory(\Schoo\User::class)->create();
        $this->actingAs($user);
        $this->call('GET', '/courses');
        $this->assertResponseOk();
    }

    /**
     * Test user details on dashboard
     * */
    public function testUserDetailsLoadOnDashboard()
    {
        $user = factory(\Schoo\User::class)->create();
        $this->actingAs($user);
        $this->call('GET', '/courses');
        $this->seePageIs('/courses');
        $this->assertViewHas([]);
    }

    /**
     * Test courses show on dashboard
     * */
    public function testCoursesLoadOnPage()
    {
        $user = factory(\Schoo\User::class)->create();
        $this->actingAs($user);
        $this->call('GET', '/courses');
        $this->seePageIs('/courses');
        $this->assertViewHas('courses');
    }
}
