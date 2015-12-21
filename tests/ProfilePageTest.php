<?php


class ProfilePageTest extends TestCase
{
    /**
     * Check profile page loads.
     * */
    public function testEditProfilePageLoadsCorrectly()
    {
        $this->login();

        $this->call('GET', '/profile');
        $this->assertResponseOk();
    }

    /**
     * Create User to test profile page functionality.
     * */
    private function createUser()
    {
        return User::create([
          'name'     => 'johndoe',
          'username' => 'kola',
          'email'    => 'john@doe.com',
          'password' => md5('password'),
        ]);
    }

    public function login()
    {
        $user = factory(\Schoo\User::class)->create();
        $this->actingAs($user)
          ->withSession(['name' => 'johndoe'])
          ->visit('/dashboard');
    }
    /**
     * test that profile is edited successfully
     */

    public function testProfileIsEditedSuccessfully()
    {
        $this->login();

        $this->visit('/profile')
            ->type('johndoe', 'name')
            ->type('kola', 'username')
            ->type('john@doe.com', 'email')
            ->press('Save Changes')
            ->seePageIs('/dashboard')
            ->seeInDatabase('users', ['username' => 'kola']);
    }

    /**
     * Test Image can be uploaded
     */
    public function testPhotoCanBeUploaded()
    {
        $this->login();
        $this->visit('/profile');
        $this->post('/profile/avatar', ['avatar' => ' /public/images/147.jpg']);
    }
}
