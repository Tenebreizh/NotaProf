<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\User;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk get page test.
     *
     * @return void
     */
    public function testGetLoginPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee(env('APP_NAME'));
        });
    }
    
    /**
     * Test to verify if a register user can connect himself
     *
     * @return void
     */
    public function testLogin()
    {
        $user = factory(User::class)->create([
            'email' => 'johndoe@notaprof.com',
        ]);      

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'secret')
                    ->press('Connexion')
                    ->assertPathIs('/');
        });

    }
}
