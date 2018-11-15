<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class UserTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Test to see if regular user can see admin option.
     *
     * @return void
     */
    public function testUserConnected()
    {
        $user = factory(User::class)->create([
            'email' => 'johndoe@notaprof.com',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)
                    ->visit('/')
                    ->assertsee($user->name)
                    ->assertDontSee('Utilisateurs')
                    ->assertDontSee('Administrateurs');
        });
    }

    /**
     * Test to see if admin user can see admin option.
     *
     * @return void
     */
    public function testAdminConnected()
    {
        $user = factory(User::class)->create([
            'email' => 'johndoe@notaprof.com',
            'admin' => 1,
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)
                    ->visit('/')
                    ->assertsee($user->name)
                    ->assertSee('Utilisateurs')
                    ->assertSee('Administrateurs');
        });
    }
}
