<?php


class DashboardPageTest extends TestCase
{
    /**
     * test dashboard using ModelFactory.
     **/
    public function testDashboardLoadsCorrectly()
    {
        $this->loginAUser();
        $this->assertResponseOk();
    }

    /**
     * Test user details on dashboard.
     * */
    public function testUserDetailsLoadOnDashboard()
    {
        $this->loginAUser();
        $this->seePageIs('/dashboard');
        $this->assertViewHas('user');
    }

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

    /**
     * Test courses show on dashboard.
     * */
    public function testCoursesLoadOnDashboardSuccessfully()
    {
        $this->loginAUser();
        $this->seePageIs('/dashboard');
        $this->assertViewHas('courses');
    }
}
